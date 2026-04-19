<?php
if (!function_exists("ponecero")) {
    function ponecero($valor)
    {
        if (intval($valor)) {
            $valor;
        } else {
            $valor = 0;
        }
        return $valor;
    }
}

switch ($cont) {
    case '1':
        $count_1 = sprintf("SELECT COUNT(*) AS resultado FROM seg_planes_accion_actividad WHERE seg_actividades_estatus = 1 AND  seg_planes_localidad = '$sucursal' AND seg_consecutivo = '$plan'");
        $count_1_exe = $conn->query($count_1);
        $count_1_cnt = mysqli_num_rows($count_1_exe);
        if ($count_1_cnt > 0) {
            $resultado = $count_1_exe->fetch_assoc();
        } else {
            $resultado = "NA";
        }        
        break;
    case '2':
        $count_2 = sprintf("SELECT COUNT(*) AS resultado FROM seg_planes_accion_actividad WHERE seg_actividades_estatus = 2 AND  seg_planes_localidad = '$sucursal' AND seg_consecutivo = '$plan'");
        $count_2_exe = $conn->query($count_2);
        $count_2_cnt = mysqli_num_rows($count_2_exe);
        if ($count_2_cnt > 0) {
            $resultado = $count_2_exe->fetch_assoc();
        } else {
            $resultado = "NA";
        }        
        break;
    case '3':
        $count_3 = sprintf("SELECT COUNT(*) AS resultado  FROM seg_planes_accion_actividad WHERE seg_actividades_estatus = 3 AND  seg_planes_localidad = '$sucursal' AND seg_consecutivo = '$plan'");
        $count_3_exe = $conn->query($count_3);
        $count_3_cnt = mysqli_num_rows($count_3_exe);
        if ($count_3_cnt > 0) {
            $resultado = $count_3_exe->fetch_assoc();
        } else {
            $resultado = "NA";
        }        
        break;
    default:
        # code...
        break;
}

echo ponecero($resultado['resultado']);
?>


