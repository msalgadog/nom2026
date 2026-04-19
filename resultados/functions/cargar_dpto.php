<?php
if (!function_exists('nom035_h')) {
    function nom035_h($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if (!empty($_GET['localidad']) || !empty($_GET['comp'])) {
        include("../../php/config/db.php");
        include("../../php/config/sqldata.php");
        include("../../php/session_mainfile.php");
        
        // Saneo de GET parameters
        $compParam = trim((string) ($_GET['comp'] ?? ''));
        $distRepoParam = trim((string) ($_GET['dist_repo'] ?? ''));
        $vdptoParam = trim((string) ($_GET['vdpto'] ?? ''));
        
        $localidad = sprintf("SELECT empleados_t_localidad AS localidad, empleados_dpto AS dpto FROM nom035_empleados WHERE empleados_n_empleado = '%s'",
            mysqli_real_escape_string($conn, (string) ($usuarios_nempleado ?? '')));
        if ($localidad_exe = mysqli_query($conn, $localidad)) {
            $localidad_cnt = mysqli_num_rows($localidad_exe);
            if ($localidad_cnt > 0) {
                $localidad_row = mysqli_fetch_assoc($localidad_exe);
                $localidad_r = $localidad_row['localidad'];
                $dpto_r = $localidad_row['dpto'];
            } else {
                echo "No se encontro al usuario";
            }
        } else {
            echo $conn->error;
        }

        if ($usuarios_perfil == 6) {
            $sel='selected="selected"';
            echo '<option value="' . nom035_h($dpto_r) . '"' . $sel . '>' . nom035_h($dpto_r) . '</option>';
        } else {
            $varcomp = $compParam;
            $vardist = "";
            $varloc  = "";

            if (!empty($distRepoParam)) {
                $vardist = $distRepoParam;
            }
            if (!empty($_GET['localidad'])) {
                $varloc = trim((string) $_GET['localidad']);
            }
            if ($varcomp === "TODOS") {
                $where = "WHERE empleados_comp IS NOT NULL  ";
            } else {
                $where = "WHERE empleados_comp='" . mysqli_real_escape_string($conn, $varcomp) . "'";
            }
            if (!empty($vardist)) {
                if ($vardist === "TODOS") {
                    $where .= " AND empleados_distrito IS NOT NULL  ";
                } else {
                    $where .= " AND empleados_distrito ='" . mysqli_real_escape_string($conn, $vardist) . "' ";
                }
            }
            if (!empty($varloc)) {
                if ($varloc === "TODOS") {
                    $where .= " AND empleados_t_localidad IS NOT NULL ";
                } else {
                    $where .= " AND empleados_t_localidad ='" . mysqli_real_escape_string($conn, $varloc) . "' ";
                }
            }

            $dists = sprintf("SELECT empleados_dpto FROM nom035_empleados $where GROUP BY empleados_dpto;");
            if ($dists_exe = mysqli_query($conn, $dists)) {
                $dists_cnt = mysqli_num_rows($dists_exe);
                if ($dists_cnt > 0) {
                    echo '<option value="">Seleccione Departamento </option>';
                    if ($vdptoParam === "TODOS") {
                        echo '<option value="TODOS" selected>TODOS</option>';
                    } else {
                        echo '<option value="TODOS">TODOS</option>';
                    }
                    while ($dists_row = mysqli_fetch_assoc($dists_exe)) {
                        $sel = "";
                        if (!empty($vdptoParam)) {
                            if ($vdptoParam === $dists_row['empleados_dpto']) {
                                $sel = 'selected="selected"';
                            }
                        }
                        echo '<option value="' . nom035_h($dists_row['empleados_dpto']) . '" ' . $sel . '>' . nom035_h($dists_row['empleados_dpto']) . '</option>';
                    }
                } else {
                    echo "Error 1";
                }
            } else {
                echo $conn->error;
            }
        }
    } else {
        echo "Error 2";
    }
} else {
    echo "Error 3";
}
