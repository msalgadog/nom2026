<?php
include("../session_mainfile.php");
include("../config/db.php");
include("../funciones/perfiles.php");
include("../funciones/avance.php");
include("../funciones/sqldata.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST['comp'],$_POST['dpto'],$_POST['loc'],$_POST['edad'],$_POST['antig'],$_POST['sexo'],$_POST['nempleado'],$_POST['ap'],$_POST['apm'],$_POST['nombre'])){
        $demograficos = sprintf("SELECT demograficos_nempleado FROM nom035_demograficos WHERE demograficos_nempleado = ?");
        if($dem_stmt = $conn->prepare($demograficos)){
            $dem_stmt->bind_param("i",$usuarios_nempleado);
            $dem_status = $dem_stmt->execute();
            if ($dem_status===true) {
                $dem_stmt->store_result();
                if($dem_stmt->num_rows>0){
                    header("Location: ../../home.php?demograficos=prevok");
                }else{
                    $insert_dem = sprintf("INSERT INTO nom035_demograficos (demograficos_comp,demograficos_loc,demograficos_dpto,demograficos_nempleado,demograficos_apaterno,demograficos_amaterno,demograficos_nombres,demograficos_genero,demograficos_edad,demograficos_antiguedad) VALUES (?,?,?,?,?,?,?,?,?,?)");
                    if ($insert_stmt=$conn->prepare($insert_dem)) {
                        $demograficos_comp = $_POST['comp'];
                        $demograficos_loc = $_POST['loc'];
                        $demograficos_dpto = $_POST['dpto'];
                        $demograficos_nempleado = $_POST['nempleado'];
                        $demograficos_apaterno = $_POST['ap'];
                        $demograficos_amaterno = $_POST['apm'];
                        $demograficos_nombres = $_POST['nombre'];
                        $demograficos_genero = $_POST['sexo'];
                        $demograficos_edad = $_POST['edad'];
                        $demograficos_antiguedad = $_POST['antig'];
                        $insert_stmt->bind_param("sssissssii",$demograficos_comp,$demograficos_loc,$demograficos_dpto,$demograficos_nempleado,$demograficos_apaterno,$demograficos_amaterno,$demograficos_nombres,$demograficos_genero,$demograficos_edad,$demograficos_antiguedad);
                        $status_insert = $insert_stmt->execute();
                        if($status_insert===false){
                            echo $insert_stmt->error;
                            exit();
                        }else{
                            $completado=1;
                            $fecha          = date('Y-m-d H:i:s');
                            $update_avance = sprintf("UPDATE nom035_usuario_avance SET usuario_avance_demograficos =?,
                            usuario_avance_demograficos_fecha =? WHERE usuario_avance_nempleado=?;");
                            if($update_avance_stmt = $conn->prepare($update_avance)){
                                $update_avance_stmt->bind_param("isi",$completado,$fecha,$demograficos_nempleado);
                                $status_update_avance_stmt = $update_avance_stmt->execute();
                                if ($status_update_avance_stmt===false) {
                                    exit($update_avance_stmt->error);
                                }else{
                                   header("Location:../../home.php?demograficos=ok");
                                }
                            }else{
                                exit($conn->error);
                            }
                        }
                        
                    }else{
                        exit($conn->error);
                    }
                }
            }else{
                exit($dem_stmt->error);
            }
        }else{
            exit($conn->error);
        }
    }else{
        exit("Formulario mal recibido");
    }
}else{
    exit("No se puede procesar el formulario");
}
?>