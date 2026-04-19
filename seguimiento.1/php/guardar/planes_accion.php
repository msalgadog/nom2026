<?php
include("../../../php/config/db.php");
if (isset($_POST['action']) && $_POST['action'] == "add") {  
    $seg_planes_id = $_POST['seg_planes_id'];
    $seg_planes_consecutivo = $_POST['seg_consecutivo'];
    $seg_planes_localidad = $_POST['seg_localidad'];
    $seg_planes_nempleado = $_POST['seg_nempleado'];
    $seg_planes_accion_consecutivo = $_POST['seg_planes_accion_consecutivo'];
    $seg_planes_accion_cat = $_POST['categoria'];
    $seg_planes_accion_dom = $_POST['dominio'];
    $seg_planes_accion_acc = $_POST['accion'];
    $add = sprintf("INSERT INTO seg_planes_accion (seg_planes_id,seg_planes_consecutivo,seg_planes_localidad,seg_planes_nempleado,seg_planes_accion_consecutivo,seg_planes_accion_cat,seg_planes_accion_dom,seg_planes_accion_acc) 
    VALUES ('$seg_planes_id','$seg_planes_consecutivo','$seg_planes_localidad','$seg_planes_nempleado','$seg_planes_accion_consecutivo','$seg_planes_accion_cat','$seg_planes_accion_dom','$seg_planes_accion_acc');
    ");
    if ($add_exe = mysqli_query($conn, $add)) {
        header("location:../../planes.php?seg_planes_id=".$seg_planes_id."&seg_consecutivo=".$seg_planes_consecutivo."&seg_localidad=".$seg_planes_localidad."&seg_nempleado=".$seg_planes_nempleado."#ancla_plan_id_".$seg_planes_accion_consecutivo);
    } else {
        echo $conn->error;
    }
}
?>