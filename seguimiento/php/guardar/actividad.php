<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("../../../php/config/db.php");
if (isset($_POST['action']) && $_POST['action'] == "add_actividad") {  
    if(isset($_POST['otro_text'])){
        $otro_text = $_POST['otro_text'];
    }
    $seg_planes_id = $_POST['seg_planes_id'];
    $seg_actividades_plan_accion_id=$_POST['seg_actividades_plan_accion_id'];
    $seg_actividades_planes_consecutivo = $_POST['seg_actividades_planes_consecutivo'];
    $seg_planes_localidad = $_POST['seg_localidad'];
    $seg_planes_nempleado = $_POST['seg_nempleado'];
    $seg_planes_accion_consecutivo = $_POST['seg_planes_accion_consecutivo'];
    $seg_num_consecutivo_act= $_POST['seg_num_consecutivo_act'];
    $seg_actividades_nombre  = $_POST['seg_actividades_nombre'];
    if ($seg_actividades_nombre=="otro") {
        $seg_actividades_nombre  = $otro_text;
    }      
    $seg_actividades_evidencia  = $_POST['seg_actividades_evidencia'];
    $seg_actividades_tipo_tiempo  = $_POST['seg_actividades_tipo_tiempo'];        
    $seg_actividades_tipo_duedate = $_POST['seg_actividades_tipo_duedate']; 
    if($seg_actividades_tipo_duedate==""){
        $seg_actividades_tipo_duedate="9999-01-01 00:00:24";
    }else{
        $seg_actividades_tipo_duedate = date_create($seg_actividades_tipo_duedate);
        $seg_actividades_tipo_duedate = date_format($seg_actividades_tipo_duedate, 'Y-m-d');   
    }
    $seg_actividades_estatus = $_POST['seg_actividades_estatus'];
    $seg_planes_consecutivo = $_POST['seg_consecutivo']; 
    $seg_planes_accion_cat = $_POST['seg_planes_accion_cat'];
    $seg_planes_accion_dom = $_POST['seg_planes_accion_dom'];
    $seg_planes_accion_acc = $_POST['seg_planes_accion_acc'];
    $add_act = "INSERT INTO seg_planes_accion_actividad (
    seg_planes_id,
    seg_actividades_plan_accion_id,
    seg_actividades_planes_consecutivo,
    seg_planes_localidad,
    seg_planes_nempleado,
    seg_planes_accion_consecutivo,
    seg_num_consecutivo_act,
    seg_actividades_nombre,
    seg_actividades_evidencia,
    seg_actividades_tipo_tiempo,
    seg_actividades_tipo_duedate,
    seg_actividades_estatus,
    seg_consecutivo) VALUES (
    '$seg_planes_id',
    '$seg_actividades_plan_accion_id',
    '$seg_actividades_planes_consecutivo',
    '$seg_planes_localidad',
    '$seg_planes_nempleado',
    '$seg_planes_accion_consecutivo',
    '$seg_num_consecutivo_act',
    '$seg_actividades_nombre',
    '$seg_actividades_evidencia',
    '$seg_actividades_tipo_tiempo',
    '$seg_actividades_tipo_duedate',
    '$seg_actividades_estatus',
    '$seg_planes_consecutivo');";
    if ($add_exe = mysqli_query($conn, $add_act)) {
        header("location:../../planes.php?seg_planes_id=".$seg_planes_id."&seg_consecutivo=".$seg_planes_consecutivo."&seg_localidad=".$seg_planes_localidad."&seg_nempleado=".$seg_planes_nempleado."#ancla_plan_id_".$seg_actividades_planes_consecutivo);
    } else {
        echo $conn->error;
    }
}
?>

