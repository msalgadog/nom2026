<?php
$avance_sql = sprintf("SELECT usuario_avance_id,usuario_avance_nempleado,usuario_avance_primer_login,usuario_avance_fecha_primer_login,usuario_avance_demograficos,usuario_avance_demograficos_fecha,usuario_avance_video,usuario_avance_video_fecha,usuario_avance_bloque_1,usuario_avance_bloque_1_fecha,usuario_avance_bloque_2,usuario_avance_bloque_2_fecha,usuario_avance_bloque_3,usuario_avance_bloque_3_fecha,usuario_avance_bloque_4,usuario_avance_bloque_4_fecha,usuario_avance_bloque_5,usuario_avance_bloque_5_fecha FROM nom035_usuario_avance WHERE usuario_avance_nempleado =?;");
if ($avance_stmt = $conn->prepare($avance_sql)) {
    $avance_stmt->bind_param("i",$usuarios_nempleado);
    $avance_status = $avance_stmt->execute();    
    if($avance_status===true){
        $avance_stmt->store_result();
        if($avance_stmt->num_rows>0){
            $avance = true;                    
            $avance_stmt->bind_result($usuario_avance_id,$usuario_avance_nempleado,$usuario_avance_primer_login,$usuario_avance_fecha_primer_login,$usuario_avance_demograficos,$usuario_avance_demograficos_fecha,$usuario_avance_video,$usuario_avance_video_fecha,$usuario_avance_bloque_1,$usuario_avance_bloque_1_fecha,$usuario_avance_bloque_2,$usuario_avance_bloque_2_fecha,$usuario_avance_bloque_3,$usuario_avance_bloque_3_fecha,$usuario_avance_bloque_4,$usuario_avance_bloque_4_fecha,$usuario_avance_bloque_5,$usuario_avance_bloque_5_fecha);
            $avance_stmt->fetch();
        }else{
            
            header("location:php/logout.php?err=1");
        }
    }else{
        exit($conn->error);
    }
}else{
    exit($conn->error);
}
