<?php
header('Content-Type: application/json; charset=utf-8');
include("../../../php/config/db.php");
$cancelado = $_POST['cancelado'];
$plan = $_POST['plan'];
$seg_planes_id = $_POST['seg_planes_id'];
$seg_planes_consecutivo = $_POST['seg_consecutivo'];
$seg_planes_localidad = $_POST['seg_localidad'];
$seg_planes_nempleado = $_POST['seg_nempleado'];
$cancelar = sprintf("UPDATE seg_planes_accion_actividad SET seg_actividades_estatus = 4, cancelado='$cancelado' WHERE idseg_planes_accion_actividad = '$plan';");
if ($cancelar_exe = mysqli_query($conn, $cancelar)) {
    header("location:../../planes_admin.php?seg_planes_id=".$seg_planes_id."&seg_consecutivo=".$seg_planes_consecutivo."&seg_localidad=".$seg_planes_localidad."&seg_nempleado=".$seg_planes_nempleado);

} else {
    echo $conn->error;
}
