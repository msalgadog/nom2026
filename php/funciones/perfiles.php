<?php 
$select_perfiles = sprintf("SELECT perfiles_id,perfiles_nombreperfil,perfiles_resultados,perfiles_seguimiento,perfiles_capacitacion,perfiles_ganadores,perfiles_comunidad FROM nom035_perfiles WHERE perfiles_id = ?;");
if ($perfiles_stmt = $conn->prepare($select_perfiles)) {
    $perfiles_stmt->bind_param("i",$usuarios_perfil);
    $perfiles_stmt->execute();
    $perfiles_stmt->store_result();
    if ($perfiles_stmt->num_rows>0) {
        $perfiles_stmt->bind_result($perfiles_id,$perfiles_nombreperfil,$perfiles_resultados,$perfiles_seguimiento,$perfiles_capacitacion,$perfiles_ganadores,$perfiles_comunidad);
        $perfiles_stmt->fetch();
        $menu_resultados = ($perfiles_resultados==1) ? true : false;
        $menu_seguimiento = ($perfiles_seguimiento==1) ? true : false;
        $menu_capacitacion = ($perfiles_capacitacion==1) ? true : false;
        $menu_ganadores = ($perfiles_ganadores==1) ? true : false;
        $menu_comunidad = ($perfiles_comunidad==1) ? true : false;
    }else{
        exit("No hay perfil");
    }
}else{
    exit($conn->error);
}
?>