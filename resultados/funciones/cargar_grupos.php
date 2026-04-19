<?php
if (!function_exists('nom035_h')) {
    function nom035_h($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

include("../../php/config/db.php");

// Saneo de POST parameters
$compParam = trim((string) ($_POST['comp'] ?? ''));
$grupoParam = "";
$whereClause = "";

$comp = str_replace("+", " ", $compParam);
$grupo = "";

if (!empty($_POST['grupo'])) {
    $grupoParam = true;
    $grupo = str_replace("+", " ", trim((string) $_POST['grupo']));
}

if ($comp !== "TODOS") {
    $whereClause = "WHERE empleados_comp = '" . mysqli_real_escape_string($conn, $comp) . "'";
} else {
    $whereClause = "";
}

$sql = sprintf("SELECT empleados_gurpo FROM nom035_empleados $whereClause GROUP BY empleados_gurpo;");
if ($sql_exe = mysqli_query($conn, $sql)) {
    $sql_cnt = mysqli_num_rows($sql_exe);
    if ($sql_cnt > 0) {
        if ($grupoParam) {
            if ($grupo === "TODOS") {
                echo '<option value="TODOS" disabled="disabled">Seleccione un grupo</option>';
                echo '<option value="TODOS" selected="selected">TODOS</option>';
            } else {
                echo '<option value="TODOS" disabled="disabled">Seleccione un grupo</option>';
                echo '<option value="TODOS">TODOS</option>';
            }
        } else {
            echo '<option value="TODOS" disabled="disabled" selected="selected">Seleccione un grupo</option>';
            echo '<option value="TODOS">TODOS</option>';
        }
        while ($sql_row = mysqli_fetch_assoc($sql_exe)) {
            if ($grupoParam) {
                if ($grupo === "TODOS") {
                    echo '<option value="' . nom035_h($sql_row['empleados_gurpo']) . '">Grupo: ' . nom035_h($sql_row['empleados_gurpo']) . '</option>';
                } elseif ($grupo === $sql_row['empleados_gurpo']) {
                    echo '<option value="' . nom035_h($sql_row['empleados_gurpo']) . '" selected="selected">Grupo: ' . nom035_h($sql_row['empleados_gurpo']) . '</option>';
                } else {
                    echo '<option value="' . nom035_h($sql_row['empleados_gurpo']) . '">Grupo: ' . nom035_h($sql_row['empleados_gurpo']) . '</option>';
                }
            } else {
                echo '<option value="' . nom035_h($sql_row['empleados_gurpo']) . '">Grupo: ' . nom035_h($sql_row['empleados_gurpo']) . '</option>';
            }
            
        }
    } else {
        echo '<option value="" selected="" disabled="">No existen datos para filtrar</option>';
    }
} else {
    echo $conn->error;
}