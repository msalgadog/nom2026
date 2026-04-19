<?php
include("../../session_mainfile.php");
include("../../config/db.php");

if ($_POST['distrito']=="TODOS") {
    $cuenta = sprintf("SELECT COUNT(nom035_usuarios.usuarios_id) AS UsuariosRegistrados FROM nom035_usuarios 
    LEFT JOIN nom035_empleados ON nom035_usuarios.usuarios_nempleado = nom035_empleados.empleados_n_empleado
    WHERE nom035_usuarios.usuarios_habilitado=1;");
    
    $encuestas = sprintf("SELECT COUNT(nom035_usuarios.usuarios_id) AS Encuestas FROM nom035_usuarios 
    LEFT JOIN nom035_usuario_avance ON nom035_usuarios.usuarios_nempleado = nom035_usuario_avance.usuario_avance_nempleado
    LEFT JOIN nom035_empleados ON nom035_usuarios.usuarios_nempleado = nom035_empleados.empleados_n_empleado
    WHERE nom035_usuarios.usuarios_habilitado =1 AND nom035_usuario_avance.nom_totalfin=1;");
}else{
    $cuenta = sprintf("SELECT COUNT(nom035_usuarios.usuarios_id) AS UsuariosRegistrados FROM nom035_usuarios 
    LEFT JOIN nom035_empleados ON nom035_usuarios.usuarios_nempleado = nom035_empleados.empleados_n_empleado
    WHERE nom035_usuarios.usuarios_habilitado=1 AND `nom035_empleados`.`empleados_distrito`=?;");
    
    $encuestas = sprintf("SELECT COUNT(nom035_usuarios.usuarios_id) AS Encuestas FROM nom035_usuarios 
    LEFT JOIN nom035_usuario_avance ON nom035_usuarios.usuarios_nempleado = nom035_usuario_avance.usuario_avance_nempleado
    LEFT JOIN nom035_empleados ON nom035_usuarios.usuarios_nempleado = nom035_empleados.empleados_n_empleado
    WHERE nom035_usuarios.usuarios_habilitado =1 AND nom035_usuario_avance.nom_totalfin=1 AND `nom035_empleados`.`empleados_distrito`=?;");    
}

if ($cuenta_stmt = $conn->prepare($cuenta)) {
    if ($_POST['distrito']=="TODOS") {
        # code...
    }else{
        $cuenta_stmt->bind_param('s',$_POST['distrito']);
    }
    $cuenta_stmt_status = $cuenta_stmt->execute();
    if ($cuenta_stmt_status===false) {
        $conteo_codigo=0;
        $conteo_mensaje=$cuenta_stmt->error;
        $conteo_numero=0;
    }else{
        $cuenta_stmt->store_result();
        if($cuenta_stmt){
            $cuenta_stmt->bind_result($UsuariosRegistrados);
            $cuenta_stmt->fetch();            
            $conteo_codigo=1;
            $conteo_mensaje="Se ha completado el conteo";
            $conteo_numero=$UsuariosRegistrados;
        }else{
            $conteo_codigo=0;
            $conteo_mensaje="No se encontraron resultados";
            $conteo_numero=0;
        }     
    }
    $resultado_cuenta = array("codigo"=>$conteo_codigo,"mensaje"=>$conteo_mensaje,"conteo"=>$conteo_numero);
}else{
    exit("error1".$conn->error);
}
/**/
if ($encuestas_stmt = $conn->prepare($encuestas)) {
    if ($_POST['distrito']=="TODOS") {
        # code...
    }else{
        $encuestas_stmt->bind_param('s',$_POST['distrito']);
    }    
    
    $encuestas_stmt_status = $encuestas_stmt->execute();
    if ($encuestas_stmt_status===false) {
        $encuestaconteo_codigo=0;
        $encuestaconteo_mensaje=$encuestas_stmt->error;
        $encuestaconteo_numero=0;
    }else{
        $encuestas_stmt->store_result();
        if($encuestas_stmt){
            $encuestas_stmt->bind_result($UsuariosRegistrados);
            $encuestas_stmt->fetch();            
            $encuestaconteo_codigo=1;
            $encuestaconteo_mensaje="Se ha completado el conteo de encuestas";
            $encuestaconteo_numero=$UsuariosRegistrados;
        }else{
            $encuestaconteo_codigo=0;
            $encuestaconteo_mensaje="No se encontraron resultados";
            $encuestaconteo_numero=0;
        }     
    }
    $resultado_encuestas = array("codigo"=>$encuestaconteo_codigo,"mensaje"=>$encuestaconteo_mensaje,"encuestaconteo"=>$encuestaconteo_numero);
}else{
    exit("error2".$conn->error);
}
$resultado = array(
    "conteo"=>$resultado_cuenta,
    "encuestas"=>$resultado_encuestas
);
echo json_encode($resultado);