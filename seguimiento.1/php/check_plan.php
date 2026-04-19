<?php
$pl = sprintf("SELECT * FROM seg_planes WHERE seg_nempleado = '$usuarios_nempleado'");
if ($pl_exe = mysqli_query($conn, $pl)) {
    $pl_cnt = mysqli_num_rows($pl_exe);
    if ($pl_cnt > 0) {
        $pl_row = mysqli_fetch_assoc($pl_exe);
        $seg_fecha_atla = $pl_row['seg_fecha_atla'];
        $date = date_create($seg_fecha_atla);
        $seg_fecha_atla = date_format($date, 'd-m-Y');
    } else {
        if ($tipo_seg == "manual") {
            if (isset($_POST['seg_nom_plan'])) {
                $seg_nom_plan = $_POST['seg_nom_plan'];
            } else {
                $seg_nom_plan = "Plan 1";
            }
            if (isset($_POST['seg_fech_plan'])) {
                $seg_fech_plan = $_POST['seg_fech_plan'];
            } else {
                $seg_fech_plan = "ENERO A JUNIO DE 2023";
            }
            $in_pl = sprintf("INSERT INTO seg_planes  (seg_consecutivo,seg_localidad,seg_nempleado,seg_nom_plan,seg_fech_plan) VALUES (1,'$localidad_r','$usuarios_nempleado','$seg_nom_plan','$seg_fech_plan')");
            if ($in_pl_exe = mysqli_query($conn, $in_pl)) {
                header("location:index.php?new_plan=1");
                exit();
            } else {
                echo $conn->error;
                exit();
            }
        } else {
            $in_pl = sprintf("INSERT INTO seg_planes (seg_consecutivo,seg_localidad,seg_nempleado,seg_nom_plan,seg_fech_plan) VALUES (1,'$localidad_r','$usuarios_nempleado','Plan 1','ENERO A JUNIO DE 2023');");
            $in_pl .= sprintf("INSERT INTO seg_planes (seg_consecutivo,seg_localidad,seg_nempleado,seg_nom_plan,seg_fech_plan) VALUES (2,'$localidad_r','$usuarios_nempleado','Plan 2','JULIO A DICIEMBRE 2023');");
            $in_pl .= sprintf("INSERT INTO seg_planes (seg_consecutivo,seg_localidad,seg_nempleado,seg_nom_plan,seg_fech_plan) VALUES (3,'$localidad_r','$usuarios_nempleado','Plan 3','ENERO A JUNIO 2024');");
            $in_pl .= sprintf("INSERT INTO seg_planes (seg_consecutivo,seg_localidad,seg_nempleado,seg_nom_plan,seg_fech_plan) VALUES (4,'$localidad_r','$usuarios_nempleado','Plan 4','JULIO A DICIEMBRE 2024');");
            if (mysqli_multi_query($conn, $in_pl)) {
                header("location:index.php?new_plan=1");
                exit();
            } else {
                echo $conn->error;
                exit();
            }
        }
    }
} else {
    echo $conn->error;
    exit();
}
