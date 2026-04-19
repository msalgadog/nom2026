<?php
if (!function_exists('nom035_h')) {
    function nom035_h($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    include("../../php/config/db.php");
    include("../../php/session_mainfile.php");
    
    // Saneo de GET parameters
    $distRepoParam = trim((string) ($_GET['dist_repo'] ?? ''));
    $compParam = trim((string) ($_GET['comp'] ?? ''));
    $distritoParam = trim((string) ($_GET['distrito'] ?? ''));
    $localidadParam = trim((string) ($_GET['localidad'] ?? ''));
    $locDistinParam = trim((string) ($_GET['loc_distin'] ?? ''));
    $locDistin2Param = trim((string) ($_GET['loc_distin_2'] ?? ''));
    
    $localidad = sprintf("SELECT empleados_t_localidad AS localidad FROM nom035_empleados WHERE empleados_n_empleado = '%s'",
        mysqli_real_escape_string($conn, (string) ($usuarios_nempleado ?? '')));
    if ($localidad_exe = mysqli_query($conn, $localidad)) {
        $localidad_cnt = mysqli_num_rows($localidad_exe);
        if ($localidad_cnt > 0) {
            $localidad_row = mysqli_fetch_assoc($localidad_exe);
            $localidad_r = $localidad_row['localidad'];
        } else {
            echo "No se encontro al usuario";
        }
    } else {
        echo $conn->error;
    }    
    include("../../php/config/sqldata.php");

    if ($usuarios_perfil == 5 || $usuarios_perfil == 6 || $usuarios_perfil == 7) {
        $sel='selected="selected"';
        echo '<option value="' . nom035_h($localidad_r) . '"' . $sel . '>' . nom035_h($localidad_r) . '</option>';
    } else {
        if (!empty($distRepoParam) || !empty($compParam)) {
            $varcomp = $compParam;
            $vardist = "";
            if ($varcomp === "TODOS") {
                $where = "WHERE empleados_comp IS NOT NULL  ";
            } else {
                $where = "WHERE empleados_comp='" . mysqli_real_escape_string($conn, $varcomp) . "'";
            }
            if (!empty($distritoParam)) {
                $vardist = $distritoParam;
            }
            if (!empty($vardist)) {
                if ($vardist === "TODOS") {
                    // No additional WHERE clause
                } else {
                    $where .= " AND empleados_distrito ='" . mysqli_real_escape_string($conn, $vardist) . "' ";
                }
    
            }
            $dists = sprintf("SELECT empleados_t_localidad FROM nom035_empleados $where GROUP BY empleados_t_localidad;");
            if ($dists_exe = mysqli_query($conn, $dists)) {
                $dists_cnt = mysqli_num_rows($dists_exe);
                if ($dists_cnt > 0) {
                    echo '<option value="">Seleccione Localidad </option>';
                    if ($localidadParam === "TODOS") {
                        echo '<option value="TODOS" selected>TODOS</option>';
                    } else {
                        echo '<option value="TODOS">TODOS</option>';
                    }
                    while ($dists_row = mysqli_fetch_assoc($dists_exe)) {
                        $sel = "";
                        if ($dists_row['empleados_t_localidad'] == 1 || $dists_row['empleados_t_localidad'] == "") {
                            // skip invalid records
                        } else {
                            if ($localidadParam !== '' && $localidadParam === $dists_row['empleados_t_localidad']) {
                                $sel = 'selected="selected"';
                            }
                            echo '<option value="' . nom035_h($dists_row['empleados_t_localidad']) . '"' . $sel . '>' . nom035_h($dists_row['empleados_t_localidad']) . '</option>';
                        }
                    }
                }
            } else {
                echo $conn->error;
            }
        }
        if (!empty($locDistinParam)) {
            $dists = sprintf("SELECT empleados_t_localidad FROM nom035_empleados WHERE empleados_t_localidad != %s GROUP BY empleados_t_localidad;",
                sqldata($locDistinParam, "text"));
            if ($dists_exe = mysqli_query($conn, $dists)) {
                $dists_cnt = mysqli_num_rows($dists_exe);
                if ($dists_cnt > 0) {
                    echo '<option value="">Seleccione Localidad 2</option>';
                    if ($_GET['dist_distin'] == "TODOS") {
                        echo '<option value="TODOS" selected>TODOS</option>';
                    } else {
                        echo '<option value="TODOS">TODOS</option>';
                    }
                    while ($dists_row = mysqli_fetch_assoc($dists_exe)) {
                        if (!empty($locDistin2Param)) {
                            $sel = "";
                            if ($locDistin2Param === $dists_row['empleados_t_localidad']) {
                                $sel = 'selected="selected"';
                            }
                            echo '<option value="' . nom035_h($dists_row['empleados_t_localidad']) . '"' . $sel . '>' . nom035_h($dists_row['empleados_t_localidad']) . '</option>';
                        } else {
                            $sel = "";
                            if ($locDistinParam === $dists_row['empleados_t_localidad']) {
                                $sel = 'selected="selected"';
                            }
                            echo '<option value="' . nom035_h($dists_row['empleados_t_localidad']) . '"' . $sel . '>' . nom035_h($dists_row['empleados_t_localidad']) . '</option>';
                        }
                    }
                }
            } else {
                echo $conn->error;
            }
        }
    }
} else {
    echo "Error: Not an AJAX request";
}
