<?php
include("../../php/session_mainfile.php");
include("../../php/config/db.php");
ob_start();
#($usuarios_perfil == 5 || $usuarios_perfil == 6 || $usuarios_perfil == 7)
if ($usuarios_perfil == 7) {
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
    $localidad = sprintf("SELECT empleados_t_localidad AS localidad, empleados_apaterno AS ap, empleados_amaterno as apM, empleados_nombres AS nom,seg_fecha_atla FROM seg_planes 
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

    <title>NOM035</title>
    <meta name="description" content="Aplicación NOM035 COSTCO">

</head>

<body style="width:100%;">
    <div style="font-family: 'Gotham Regular'; font-size:12px;">

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

<table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td width="50%">
                        <table style="border-collapse: collapse;" width="100%">
                            <tr width="100%">
                            <td height="30px;" colspan="2" style="text-align: center;">Responsable Gerente de Recursos Humanos:</td>
                            </tr>
                            <tr width="100%">
                                <td height="30px;" width="20%">Nombre:</td>
                                <td width="80%">
                                    <div style="width:100%; height:30px; border-bottom: 1pt solid black;"></div>
                                </td>
                            </tr>
                            <tr width="100%">
                                <td height="30px;" width="20%">Firma:</td>
                                <td width="80%">
                                    <div style="width:100%; height:30px; border-bottom: 1pt solid black;"></div>
                                </td>
                            </tr>
                            <tr width="100%">
                                <td height="30px;" width="20%">Fecha:</td>
                                <td width="80%">
                                    <div style="width:100%; height:30px; border-bottom: 1pt solid black;"></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="50%">
                        <table style="border-collapse: collapse;" width="100%">
                            <tr width="100%">
                                <td height="30px;" colspan="2" style="text-align: center;">Validado por Gerente de Bodega:</td>
                            </tr>
                            <tr width="100%">
                                <td height="30px;" width="20%">Nombre:</td>
                                <td width="80%">
                                    <div style="width:100%; height:30px; border-bottom: 1pt solid black;"></div>
                                </td>
                            </tr>
                            <tr width="100%">
                                <td height="30px;" width="20%">Firma:</td>
                                <td width="80%">
                                    <div style="width:100%; height:30px; border-bottom: 1pt solid black;"></div>
                                </td>
                            </tr>
                            <tr width="100%">
                                <td height="30px;" width="20%">Fecha:</td>
                                <td width="80%">
                                    <div style="width:100%; height:30px; border-bottom: 1pt solid black;"></div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>


</body>

</html>
<?php
$html = ob_get_clean();
#echo $html;
require_once "dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper("letter");
$options->set('defaultFont', 'Helvetica');
$dompdf->render();
$dompdf->stream("archivo_.pdf", array("Attachment" => false))
?>