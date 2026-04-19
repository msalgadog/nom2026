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
        
        // Saneo de GET parameters
        $compParam = trim((string) ($_GET['comp'] ?? ''));
        $distRepoParam = trim((string) ($_GET['dist_repo'] ?? ''));
        $localidadParam = trim((string) ($_GET['localidad'] ?? ''));
        $vdptoParam = trim((string) ($_GET['vdpto'] ?? ''));
        $grupoParam = trim((string) ($_GET['grupo'] ?? ''));
        
        $varcomp = $compParam;
        $vardist = "";
        $varloc  = "";
        $vardpto ="";

        if (!empty($distRepoParam)) {
            $vardist = $distRepoParam;
        }
        if (!empty($localidadParam)) {
            $varloc = $localidadParam;
        }
        if (!empty($vdptoParam)) {
            $vdpto = $vdptoParam;
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
        if (!empty($vdpto)) {
            if ($vdpto === "TODOS") {
                $where .= " AND empleados_t_localidad IS NOT NULL ";
            } else {
                $where .= " AND empleados_dpto ='" . mysqli_real_escape_string($conn, $vdpto) . "' ";
            }
        }
        $dists = sprintf("SELECT empleados_gurpo FROM nom035_empleados $where GROUP BY empleados_gurpo;");
        if ($dists_exe = mysqli_query($conn, $dists)) {
            $dists_cnt = mysqli_num_rows($dists_exe);
            if ($dists_cnt > 0) {
                echo '<option value="">Seleccione Grupo </option>';
                if ($grupoParam === "TODOS") {
                    echo '<option value="TODOS" selected>TODOS</option>';
                } else {
                    echo '<option value="TODOS">TODOS</option>';
                }
                while ($dists_row = mysqli_fetch_assoc($dists_exe)) {
                    $sel = "";
                    if (!empty($grupoParam) && $grupoParam === $dists_row['empleados_gurpo']) {
                        $sel = 'selected="selected"';
                    }
                    echo '<option value="' . nom035_h($dists_row['empleados_gurpo']) . '" ' . $sel . '>' . nom035_h($dists_row['empleados_gurpo']) . '</option>';
                }
            }
        } else {
            echo $conn->error;
        }
    } else {
        echo "Error 2";
    }
} else {
    echo "Error 3";
}
