<?php
if (!function_exists('nom035_h')) {
    function nom035_h($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    include("../../php/config/db.php");
    include("../../php/config/sqldata.php");
    
    // Saneo de GET parameters
    $compParam = trim((string) ($_GET['comp'] ?? ''));
    $distDistinParam = trim((string) ($_GET['dist_distin'] ?? ''));
    $vdistParam = trim((string) ($_GET['vdist'] ?? ''));
    $vdist1Param = trim((string) ($_GET['vdist1'] ?? ''));
    
    if ($compParam === '0' || $compParam === '' || $distDistinParam === '0') {
        echo '<option value="">Seleccione Distrito</option>';
    }
    if ($compParam !== '' && $distDistinParam === '') {
        $compa = $compParam;
        if ($compa === "TODOS") {
            $where = "";
        } else {
            $where = "WHERE empleados_comp='" . mysqli_real_escape_string($conn, $compa) . "'";
        }
        $dists = sprintf("SELECT empleados_distrito FROM nom035_empleados $where GROUP BY empleados_distrito;");
        if ($dists_exe = mysqli_query($conn, $dists)) {
            $dists_cnt = mysqli_num_rows($dists_exe);
            if ($dists_cnt > 0) {
                if ($compa === "TODOS") {
                    echo '<option value="TODOS">TODOS</option>';
                } else {
                    echo '<option value="TODOS">TODOS</option>';
                }
                while ($dists_row = mysqli_fetch_assoc($dists_exe)) {
                    $sel = "";
                    if ($dists_row['empleados_distrito'] == null || $dists_row['empleados_distrito'] == "") {
                        // skip null districts
                    } else {
                        if ($vdistParam !== '' && $vdistParam == $dists_row['empleados_distrito']) {
                            $sel = 'selected="selected"';
                        }
                        echo '<option value="' . nom035_h($dists_row['empleados_distrito']) . '" ' . $sel . '>Distrito ' . nom035_h($dists_row['empleados_distrito']) . '</option>';
                    }
                }
            }
        } else {
            echo $conn->error;
        }
    }
    if ($compParam !== '' && $distDistinParam !== '') {
        $compa = $compParam;
        if ($compa === "TODOS") {
            $where = "";
        } else {
            $where = "WHERE empleados_comp='" . mysqli_real_escape_string($conn, $compa) . "'";
        }
        $dists = sprintf("SELECT empleados_distrito FROM nom035_empleados $where GROUP BY empleados_distrito;");
        if ($dists_exe = mysqli_query($conn, $dists)) {
            $dists_cnt = mysqli_num_rows($dists_exe);
            if ($dists_cnt > 0) {
                echo '<option value="">Seleccione Distrito</option>';
                if ($distDistinParam === "TODOS") {
                    echo '<option value="TODOS" selected>TODOS</option>';
                } else {
                    echo '<option value="TODOS">TODOS</option>';
                }
                while ($dists_row = mysqli_fetch_assoc($dists_exe)) {
                    $sel = "";
                    if ($distDistinParam === $dists_row['empleados_distrito']) {
                        $sel = 'selected="selected"';
                    }
                    echo '<option value="' . nom035_h($dists_row['empleados_distrito']) . '" ' . $sel . '>Distrito ' . nom035_h($dists_row['empleados_distrito']) . '</option>';
                }
            }
        } else {
            echo $conn->error;
        }
    }
    if ($distDistinParam !== '' && $compParam === '') {
        $dists = sprintf("SELECT empleados_distrito FROM nom035_empleados WHERE empleados_distrito != %s GROUP BY empleados_distrito;",
            sqldata($distDistinParam, "text"));
        if ($dists_exe = mysqli_query($conn, $dists)) {
            $dists_cnt = mysqli_num_rows($dists_exe);
            if ($dists_cnt > 0) {
                while ($dists_row = mysqli_fetch_assoc($dists_exe)) {
                    $sel = "";
                    if ($vdist1Param !== '') {
                        if ($vdist1Param === $dists_row['empleados_distrito']) {
                            $sel = "selected";
                        }
                    } else {
                        if ($distDistinParam === $dists_row['empleados_distrito']) {
                            $sel = "selected";
                        }
                    }
                    echo '<option value="' . nom035_h($dists_row['empleados_distrito']) . '" ' . $sel . '>Distrito ' . nom035_h($dists_row['empleados_distrito']) . '</option>';
                }
            }
        } else {
            echo $conn->error;
        }
    }
} else {
    echo "Error: Not an AJAX request";
}
