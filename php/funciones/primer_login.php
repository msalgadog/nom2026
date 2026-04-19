<?php
$completado=1;
$avance = sprintf("SELECT usuario_avance_primer_login FROM nom035_usuario_avance WHERE usuario_avance_nempleado = ?;");
if ($avance_stm = $conn->prepare($avance)) {
    $avance_stm->bind_param("i",$usuarios_nempleado);
    $avance_stm->execute();
    $avance_stm->store_result();
    if ($avance_stm->num_rows>0) {
        $avance_stm->bind_result($usuario_avance_primer_login);
        $avance_stm->fetch();
        if ($usuario_avance_primer_login==0) {
            $update_avance = sprintf("UPDATE nom035_usuario_avance SET usuario_avance_primer_login =?,
            usuario_avance_fecha_primer_login =? WHERE usuario_avance_nempleado=?;");
            if($update_avance_stmt = $conn->prepare($update_avance)){
                $update_avance_stmt->bind_param("isi",$completado,$fecha,$usuarios_nempleado);
                $status_update_avance_stmt = $update_avance_stmt->execute();
                if ($status_update_avance_stmt===false) {
                    exit($conn->error);
                }else{
                    $avanza_primer_login = true;
                }
            }else{
                exit($conn->error);
            }
        }else {
            $avanza_primer_login = true;
        }
    }else{
        $insert_avance = sprintf("INSERT INTO nom035_usuario_avance (usuario_avance_nempleado,usuario_avance_primer_login,usuario_avance_fecha_primer_login) VALUES (?,?,?)");
        if ($instmt=$conn->prepare($insert_avance)) {
            $instmt->bind_param("iis",$usuarios_nempleado,$completado,$fecha);
            $status_instmt=$instmt->execute();
            if ($status_instmt===false) {
                exit($conn->error);
            }else{
                $avanza_primer_login = true;
            }            
        }else{
            exit($conn->error);
        }
    }
}else{
    exit($conn->error);
}


?>