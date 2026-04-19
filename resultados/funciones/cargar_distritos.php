<?php
if (!function_exists('nom035_h')) {
    function nom035_h($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

include("../../php/config/db.php");

// Saneo de POST parameters
$compParam = trim((string) ($_POST['comp'] ?? ''));
$grupoParam = trim((string) ($_POST['grupo'] ?? ''));
$distritoParam = "";
$whereClause = "";

$comp = str_replace("+", " ", $compParam);
$grupo = str_replace("+", " ", $grupoParam);
$distrito = "";

if (!empty($_POST['distrito'])) {
    $distritoParam = true;
    $distrito = str_replace("+", " ", trim((string) $_POST['distrito']));
}

if ($comp === "TODOS" && $grupo !== "TODOS") {
    $whereClause = "WHERE empleados_gurpo = '" . mysqli_real_escape_string($conn, $grupo) . "'";
} elseif ($comp !== "TODOS" && $grupo === "TODOS") {
    $whereClause = "WHERE empleados_comp = '" . mysqli_real_escape_string($conn, $comp) . "'";
} elseif ($comp !== "TODOS" && $grupo !== "TODOS") {
    $whereClause = "WHERE empleados_comp = '" . mysqli_real_escape_string($conn, $comp) . "' AND empleados_gurpo = '" . mysqli_real_escape_string($conn, $grupo) . "'";
}

$sql = sprintf("SELECT empleados_distrito FROM nom035_empleados $whereClause GROUP BY empleados_distrito;");
if ($sql_exe = mysqli_query($conn, $sql)) {
    $sql_cnt = mysqli_num_rows($sql_exe);
    if ($sql_cnt > 0) {
        if ($distritoParam) {
            if ($distrito === "TODOS") {
                echo '<option value="TODOS" disabled="disabled">Seleccione un distrito</option>';
                echo '<option value="TODOS" selected="selected">TODOS</option>';
            } elseif ($distrito === $_POST['empleados_distrito']) {
                echo '<option value="TODOS" disabled="disabled">Seleccione un distrito</option>';
                echo '<option value="TODOS">TODOS</option>';
            } else {
                echo '<option value="TODOS" disabled="disabled">Seleccione un distrito</option>';
                echo '<option value="TODOS">TODOS</option>';
            }            
        } else {
            echo '<option value="TODOS" disabled="disabled" selected="selected">Seleccione un distrito</option>';
            echo '<option value="TODOS">TODOS</option>';
        }
        while ($sql_row = mysqli_fetch_assoc($sql_exe)) {
            if ($distritoParam) {
                if ($distrito === "TODOS") {
                    echo '<option value="' . nom035_h($sql_row['empleados_distrito']) . '">Distrito: ' . nom035_h($sql_row['empleados_distrito']) . '</option>';
                } elseif ($distrito === $sql_row['empleados_distrito']) {
                    echo '<option value="' . nom035_h($sql_row['empleados_distrito']) . '" selected="selected">Distrito: ' . nom035_h($sql_row['empleados_distrito']) . '</option>';
                } else {
                    echo '<option value="' . nom035_h($sql_row['empleados_distrito']) . '">Distrito: ' . nom035_h($sql_row['empleados_distrito']) . '</option>';
                }
            } else {
                echo '<option value="' . nom035_h($sql_row['empleados_distrito']) . '">Distrito: ' . nom035_h($sql_row['empleados_distrito']) . '</option>';
            }
        }
    } else {
        echo '<option value="" selected="" disabled="">No existen datos para filtrar</option>';
    }
} else {
    echo $conn->error;
}
