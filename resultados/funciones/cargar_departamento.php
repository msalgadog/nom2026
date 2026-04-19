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
$localidadParam = trim((string) ($_POST['localidad'] ?? ''));
$departamentoParam = "";
$whereClause = "";

$comp = str_replace("+", " ", $compParam);
$grupo = str_replace("+", " ", $grupoParam);
$distrito = str_replace("+", " ", $distritoParam);
$localidad = str_replace("+", " ", $localidadParam);
$departamento = "";

if (!empty($_POST['departamento'])) {
    $departamentoParam = true;
    $departamento = str_replace("+", " ", trim((string) $_POST['departamento']));
}

// Build WHERE clause with all combinations
if ($comp === "TODOS" && $grupo === "TODOS" && $distrito === "TODOS" && $localidad === "TODOS") {
    // No filter
} elseif ($comp === "TODOS" && $grupo === "TODOS" && $distrito === "TODOS" && $localidad !== "TODOS") {
    $whereClause = "WHERE empleados_t_localidad = '" . mysqli_real_escape_string($conn, $localidad) . "'";
} elseif ($comp === "TODOS" && $grupo === "TODOS" && $distrito !== "TODOS" && $localidad === "TODOS") {
    $whereClause = "WHERE empleados_distrito = '" . mysqli_real_escape_string($conn, $distrito) . "'";
} elseif ($comp === "TODOS" && $grupo === "TODOS" && $distrito !== "TODOS" && $localidad !== "TODOS") {
    $whereClause = "WHERE empleados_distrito = '" . mysqli_real_escape_string($conn, $distrito) . "' AND empleados_t_localidad = '" . mysqli_real_escape_string($conn, $localidad) . "'";
} elseif ($comp === "TODOS" && $grupo !== "TODOS" && $distrito === "TODOS" && $localidad === "TODOS") {
    $whereClause = "WHERE empleados_gurpo = '" . mysqli_real_escape_string($conn, $grupo) . "'";
} elseif ($comp === "TODOS" && $grupo !== "TODOS" && $distrito === "TODOS" && $localidad !== "TODOS") {
    $whereClause = "WHERE empleados_gurpo = '" . mysqli_real_escape_string($conn, $grupo) . "' AND empleados_t_localidad = '" . mysqli_real_escape_string($conn, $localidad) . "'";
} elseif ($comp === "TODOS" && $grupo !== "TODOS" && $distrito !== "TODOS" && $localidad === "TODOS") {
    $whereClause = "WHERE empleados_gurpo = '" . mysqli_real_escape_string($conn, $grupo) . "' AND empleados_distrito = '" . mysqli_real_escape_string($conn, $distrito) . "'";
} elseif ($comp === "TODOS" && $grupo !== "TODOS" && $distrito !== "TODOS" && $localidad !== "TODOS") {
    $whereClause = "WHERE empleados_gurpo = '" . mysqli_real_escape_string($conn, $grupo) . "' AND empleados_distrito = '" . mysqli_real_escape_string($conn, $distrito) . "' AND empleados_t_localidad='" . mysqli_real_escape_string($conn, $localidad) . "'";
} elseif ($comp !== "TODOS" && $grupo === "TODOS" && $distrito === "TODOS" && $localidad === "TODOS") {
    $whereClause = "WHERE empleados_comp = '" . mysqli_real_escape_string($conn, $comp) . "'";
} elseif ($comp !== "TODOS" && $grupo === "TODOS" && $distrito === "TODOS" && $localidad !== "TODOS") {
    $whereClause = "WHERE empleados_comp = '" . mysqli_real_escape_string($conn, $comp) . "' AND empleados_t_localidad = '" . mysqli_real_escape_string($conn, $localidad) . "'";
} elseif ($comp !== "TODOS" && $grupo === "TODOS" && $distrito !== "TODOS" && $localidad === "TODOS") {
    $whereClause = "WHERE empleados_comp = '" . mysqli_real_escape_string($conn, $comp) . "' AND empleados_distrito = '" . mysqli_real_escape_string($conn, $distrito) . "'";
} elseif ($comp !== "TODOS" && $grupo === "TODOS" && $distrito !== "TODOS" && $localidad !== "TODOS") {
    $whereClause = "WHERE empleados_comp = '" . mysqli_real_escape_string($conn, $comp) . "' AND empleados_distrito = '" . mysqli_real_escape_string($conn, $distrito) . "' AND empleados_t_localidad='" . mysqli_real_escape_string($conn, $localidad) . "'";
} elseif ($comp !== "TODOS" && $grupo !== "TODOS" && $distrito === "TODOS" && $localidad === "TODOS") {
    $whereClause = "WHERE empleados_comp = '" . mysqli_real_escape_string($conn, $comp) . "' AND empleados_gurpo = '" . mysqli_real_escape_string($conn, $grupo) . "'";
} elseif ($comp !== "TODOS" && $grupo !== "TODOS" && $distrito === "TODOS" && $localidad !== "TODOS") {
    $whereClause = "WHERE empleados_comp = '" . mysqli_real_escape_string($conn, $comp) . "' AND empleados_gurpo = '" . mysqli_real_escape_string($conn, $grupo) . "' AND empleados_t_localidad='" . mysqli_real_escape_string($conn, $localidad) . "'";
} else {
    $whereClause = "WHERE empleados_comp = '" . mysqli_real_escape_string($conn, $comp) . "' AND empleados_gurpo = '" . mysqli_real_escape_string($conn, $grupo) . "' AND empleados_distrito='" . mysqli_real_escape_string($conn, $distrito) . "' AND empleados_t_localidad='" . mysqli_real_escape_string($conn, $localidad) . "'";
}

$sql = sprintf("SELECT empleados_dpto FROM nom035_empleados $whereClause GROUP BY empleados_dpto;");
if ($sql_exe = mysqli_query($conn, $sql)) {
    $sql_cnt = mysqli_num_rows($sql_exe);
    if ($sql_cnt > 0) {
        if ($departamentoParam) {
            if ($departamento === "TODOS") {
                echo '<option value="TODOS" disabled="disabled">Seleccione un departamento</option>';
                echo '<option value="TODOS" selected="selected">TODOS</option>';
            } else {
                echo '<option value="TODOS" disabled="disabled">Seleccione un departamento</option>';
                echo '<option value="TODOS">TODOS</option>';
            }   
        } else {
            echo '<option value="TODOS" disabled="disabled" selected="selected">Seleccione un departamento</option>';
            echo '<option value="TODOS">TODOS</option>';
        }
        while ($sql_row = mysqli_fetch_assoc($sql_exe)) {
            if ($departamentoParam) {
                if ($departamento === "TODOS") {
                    echo '<option value="' . nom035_h($sql_row['empleados_dpto']) . '">' . nom035_h($sql_row['empleados_dpto']) . '</option>';
                } elseif ($departamento === $sql_row['empleados_dpto']) {
                    echo '<option value="' . nom035_h($sql_row['empleados_dpto']) . '" selected="selected">' . nom035_h($sql_row['empleados_dpto']) . '</option>';
                } else {
                    echo '<option value="' . nom035_h($sql_row['empleados_dpto']) . '">' . nom035_h($sql_row['empleados_dpto']) . '</option>';
                }
            } else {
                echo '<option value="' . nom035_h($sql_row['empleados_dpto']) . '">' . nom035_h($sql_row['empleados_dpto']) . '</option>';

            }
        }
    } else {
        echo '<option value="" selected="" disabled="">No existen datos para filtrar</option>';
    }
} else {
    echo $conn->error;
}