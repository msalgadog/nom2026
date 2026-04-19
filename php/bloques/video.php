<?php
include("../session_mainfile.php");
include("../config/db.php");
include("../funciones/sqldata.php");
include("../funciones/avance.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id'])) {
        if ($usuario_avance_video==1) {
            $estatus_video = array("mensaje"=>"Actividad video completada","codigo"=>0);
        }else{
            $completado=1;
            $fecha          = date('Y-m-d H:i:s');
            $update_avance = sprintf("UPDATE nom035_usuario_avance SET usuario_avance_video =?,
            usuario_avance_video_fecha =? WHERE usuario_avance_nempleado=?;");
            if($update_avance_stmt = $conn->prepare($update_avance)){
                $update_avance_stmt->bind_param("isi",$completado,$fecha,$usuarios_nempleado);
                $status_update_avance_stmt = $update_avance_stmt->execute();
                if ($status_update_avance_stmt===false) {                    
                    $estatus_video = array("mensaje"=>$update_avance_stmt->error,"codigo"=>2);
                }else{
                    $estatus_video = array("mensaje"=>"Actividad video guardada","codigo"=>1);
                }
            }else{
                $estatus_video = array("mensaje"=>$conn->error,"codigo"=>2);
            }
        }     
        echo json_encode($estatus_video);
    }else{
        exit("No se recibió el usuario");
    }
}else{
    exit("No se puede procesar el formulario");
}
?>