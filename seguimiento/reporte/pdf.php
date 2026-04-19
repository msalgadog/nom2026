<?php
include("../../php/session_mainfile.php");
include("../../php/config/db.php");
ob_start();
if ($usuarios_perfil == 5 || $usuarios_perfil == 6 || $usuarios_perfil == 7) {
    $localidad = sprintf("SELECT empleados_t_localidad AS localidad, empleados_apaterno AS ap, empleados_amaterno as apM, empleados_nombres AS nom FROM nom035_empleados WHERE empleados_n_empleado = '$usuarios_nempleado'");
    if ($localidad_exe = mysqli_query($conn, $localidad)) {
        $localidad_cnt = mysqli_num_rows($localidad_exe);
        if ($localidad_cnt > 0) {
            $localidad_row = mysqli_fetch_assoc($localidad_exe);
            $localidad_r = $localidad_row['localidad'];
            $nom_r = $localidad_row['nom'];
            $ap_r = $localidad_row['ap'];
            $apM_r = $localidad_row['apM'];
        } else {
            echo "No se encontro al usuario";
            exit();
        }
    } else {
        echo $conn->error;
        exit();
    }
} else {
    $localidad_r = $_POST['sucursal'];
    $localidad=sprintf("SELECT empleados_t_localidad AS localidad, empleados_apaterno AS ap, empleados_amaterno as apM, empleados_nombres AS nom,seg_fecha_atla FROM costco.seg_planes 
    LEFT JOIN nom035_empleados ON seg_planes.seg_nempleado = nom035_empleados.empleados_n_empleado
    WHERE seg_localidad = '$localidad_r' LIMIT 1;");

    #$localidad = sprintf("SELECT empleados_t_localidad AS localidad, empleados_apaterno AS ap, empleados_amaterno as apM, empleados_nombres AS nom FROM nom035_empleados WHERE empleados_n_empleado = '$usuarios_nempleado'");
    if ($localidad_exe = mysqli_query($conn, $localidad)) {
        $localidad_cnt = mysqli_num_rows($localidad_exe);
        if ($localidad_cnt > 0) {
            $localidad_row = mysqli_fetch_assoc($localidad_exe);
            $localidad_r = $localidad_row['localidad'];
            $nom_r = $localidad_row['nom'];
            $ap_r = $localidad_row['ap'];
            $apM_r = $localidad_row['apM'];
            $seg_fecha_atla = $localidad_row['seg_fecha_atla'];
            $date = date_create($seg_fecha_atla);
            $seg_fecha_atla = date_format($date, 'd-m-Y');            
        } else {
            echo "No se encontro al usuario";
            exit();
        }
    } else {
        echo $conn->error;
        exit();
    }


    
}
$seg_consecutivo =  $_POST['consecutivo'];
$where = "WHERE seg_localidad ='$localidad_r' AND seg_consecutivo='$seg_consecutivo'";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>NOM035</title>
    <meta name="description" content="Aplicación NOM035 COSTCO">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="../../assets/css/Gotham%20Black.css">
    <link rel="stylesheet" href="../../assets/css/Gotham%20Regular.css">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="../../assets/css/Stats-icons.css">
    <link rel="stylesheet" href="../../assets/css/steps-progressbar.css">
</head>

<body>
    <div style="font-family: 'Gotham Regular';">

        <?php
        ##Listado de planes de acción
        $plan = sprintf("SELECT seg_planes_id,
                seg_consecutivo,
                seg_localidad,
                seg_nempleado,
                seg_nom_plan,
                seg_fech_plan,
                seg_fecha_atla,
                seg_fecha_modificacion FROM seg_planes $where ORDER BY seg_consecutivo ASC;");
        if ($plan_exe = mysqli_query($conn, $plan)) {
            $plan_cnt = mysqli_num_rows($plan_exe);
            if ($plan_cnt > 0) {
                $plan_row = mysqli_fetch_assoc($plan_exe);
                $seg_planes_id = $plan_row['seg_planes_id'];
                $seg_consecutivo = $plan_row['seg_consecutivo'];
                include "lista_planes.php";
            } else {
                echo '<div class="alert alert-warning" role="alert"><strong>Sin planes registrados</strong></div>';
            }
        } else {
            echo $conn->error;
        }
        ?>



    </div>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
<?php
$html = ob_get_clean();
#echo $html;
require_once "dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$options= $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=>true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper("letter");
$options->set('defaultFont', 'Helvetica');
$dompdf->render();
$dompdf->stream("archivo_.pdf",array("Attachment"=>false))
?>