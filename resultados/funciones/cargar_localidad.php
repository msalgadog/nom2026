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
$distritoParam = trim((string) ($_POST['distrito'] ?? ''));
$localidadParam = "";
$whereClause = "";

$comp = str_replace("+", " ", $compParam);
$grupo = str_replace("+", " ", $grupoParam);
$distrito = str_replace("+", " ", $distritoParam);
$localidad = "";

if (!empty($_POST['localidad'])) {
    $localidadParam = true;
    $localidad = str_replace("+", " ", trim((string) $_POST['localidad']));
}

if ($comp === "TODOS" && $grupo === "TODOS" && $distrito !== "TODOS") {
    $whereClause = "WHERE empleados_distrito = '" . mysqli_real_escape_string($conn, $distrito) . "'";
} elseif ($comp === "TODOS" && $grupo !== "TODOS" && $distrito !== "TODOS") {
    $whereClause = "WHERE empleados_gurpo = '" . mysqli_real_escape_string($conn, $grupo) . "' AND empleados_distrito = '" . mysqli_real_escape_string($conn, $distrito) . "'";
} elseif ($comp === "TODOS" && $grupo !== "TODOS" && $distrito === "TODOS") {
    $whereClause = "WHERE empleados_gurpo = '" . mysqli_real_escape_string($conn, $grupo) . "'";
} elseif ($comp !== "TODOS" && $grupo === "TODOS" && $distrito === "TODOS") {
    $whereClause = "WHERE empleados_comp = '" . mysqli_real_escape_string($conn, $comp) . "'";
} elseif ($comp !== "TODOS" && $grupo === "TODOS" && $distrito !== "TODOS") {
    $whereClause = "WHERE empleados_comp = '" . mysqli_real_escape_string($conn, $comp) . "' AND empleados_distrito = '" . mysqli_real_escape_string($conn, $distrito) . "'";
} elseif ($comp !== "TODOS" && $grupo !== "TODOS" && $distrito === "TODOS") {
    $whereClause = "WHERE empleados_comp = '" . mysqli_real_escape_string($conn, $comp) . "' AND empleados_gurpo = '" . mysqli_real_escape_string($conn, $grupo) . "'";
} elseif ($comp !== "TODOS" && $grupo !== "TODOS" && $distrito !== "TODOS") {
    $whereClause = "WHERE empleados_comp = '" . mysqli_real_escape_string($conn, $comp) . "' AND empleados_gurpo = '" . mysqli_real_escape_string($conn, $grupo) . "' AND empleados_distrito ='" . mysqli_real_escape_string($conn, $distrito) . "'";
}

$sql = sprintf("SELECT empleados_t_localidad FROM nom035_empleados $whereClause GROUP BY empleados_t_localidad;");
if ($sql_exe = mysqli_query($conn, $sql)) {
    $sql_cnt = mysqli_num_rows($sql_exe);
    if ($sql_cnt > 0) {
        if ($localidadParam) {
            if ($localidad === "TODOS") {
                echo '<option value="TODOS" disabled="disabled">Seleccione una localidad</option>';
                echo '<option value="TODOS" selected="selected">TODOS</option>';
            } else {
                echo '<option value="TODOS" disabled="disabled">Seleccione una localidad</option>';
                echo '<option value="TODOS">TODOS</option>';
            }         

        } else {
            echo '<option value="TODOS" disabled="disabled" selected="selected">Seleccione una localidad</option>';
            echo '<option value="TODOS">TODOS</option>';
        }
        while ($sql_row = mysqli_fetch_assoc($sql_exe)) {
            if ($localidadParam) {
                if ($localidad === "TODOS") {
                    echo '<option value="' . nom035_h($sql_row['empleados_t_localidad']) . '">' . nom035_h($sql_row['empleados_t_localidad']) . '</option>';
                } elseif ($localidad === $sql_row['empleados_t_localidad']) {
                    echo '<option value="' . nom035_h($sql_row['empleados_t_localidad']) . '" selected="selected">' . nom035_h($sql_row['empleados_t_localidad']) . '</option>';
                } else {
                    echo '<option value="' . nom035_h($sql_row['empleados_t_localidad']) . '">' . nom035_h($sql_row['empleados_t_localidad']) . '</option>';
                }
            } else {
                echo '<option value="' . nom035_h($sql_row['empleados_t_localidad']) . '">' . nom035_h($sql_row['empleados_t_localidad']) . '</option>';
    
            }
        }
    } else {
        echo '<option value="" selected="" disabled="">No existen datos para filtrar</option>';
    }
} else {
    echo $conn->error;
}
