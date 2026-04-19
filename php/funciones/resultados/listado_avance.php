<?php
include("../../session_mainfile.php");
include("../../config/db.php");
?>
    <div class="card">
        <div class="card-header">
            <h5 class="text-left mb-0">Aplicación por sucursal</h5>
        </div>
<?php
$listado_locosby_district = sprintf("SELECT COUNT(nom035_usuarios.usuarios_id) AS empleados_total,empleados_t_localidad AS localidad FROM nom035_usuarios 
LEFT JOIN nom035_usuario_avance ON nom035_usuarios.usuarios_nempleado = nom035_usuario_avance.usuario_avance_nempleado
LEFT JOIN nom035_empleados ON nom035_usuarios.usuarios_nempleado = nom035_empleados.empleados_n_empleado
WHERE nom035_usuarios.usuarios_habilitado =1 AND empleados_distrito =?
GROUP BY empleados_t_localidad;");
if($listado_stmt = $conn->prepare($listado_locosby_district)){
    $listado_stmt->bind_param('s',$_POST['distrito']);
    $estatus_listado = $listado_stmt->execute();
    $listado_stmt->store_result();
    if ($estatus_listado===false) {
        exit($listado_stmt->error);
    }else{        
        $listado_stmt->bind_result($empleados_total,$localidad);
        while ($listado_stmt->fetch()) {
?>

        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item text-left"><span class="text-left"><?php echo $localidad; ?></span>
                    
<?php
$listado_fin_district = sprintf("SELECT COUNT(nom035_usuarios.usuarios_id) AS empleados_total_fin  FROM nom035_usuarios 
LEFT JOIN nom035_usuario_avance ON nom035_usuarios.usuarios_nempleado = nom035_usuario_avance.usuario_avance_nempleado
LEFT JOIN nom035_empleados ON nom035_usuarios.usuarios_nempleado = nom035_empleados.empleados_n_empleado
WHERE nom035_usuarios.usuarios_habilitado =1 AND nom035_usuario_avance.nom_totalfin=1 AND  nom035_empleados.empleados_t_localidad =?
GROUP BY empleados_t_localidad;");
if($listado_fin_stmt = $conn->prepare($listado_fin_district)){
    $listado_fin_stmt->bind_param('s',$localidad);
    $estatus_listado_fin = $listado_fin_stmt->execute();
    $listado_fin_stmt->store_result();
    if($estatus_listado_fin===false){        
        exit($listado_fin_stmt->error);
    }else{        
        $empleados_total_fin=0;
        $listado_fin_stmt->bind_result($empleados_total_fin);        
        $listado_fin_stmt->fetch();
        if($empleados_total_fin>0){
            
        }
        
        echo $empleados_total_fin."/".$empleados_total;
        $percent = number_format(($empleados_total_fin / $empleados_total * 100), 2);
        echo '<div class="progress shadow-sm">';
        echo '<div class="progress-bar bg-success progress-bar-striped progress-bar-animated" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: '.$percent.'%;">'.$percent.'%</div>';
        echo '</div>';
        $listado_fin_stmt->close();
    }
}else{
    exit($conn->error);
}

?>
                        
                    
                </li>
            </ul>
        </div>
    
<?php
        }
        $listado_stmt->close();
    }
}else{
    exit($conn->error);
}
?>
</div>


