<?php
include("../php/config/db.php");

if (!function_exists('nom035_h')) {
    function nom035_h($value)
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

$comp = '';
$js_var_grupo = '';
$js_var_distrito = '';
$js_var_localidad  = '';
$js_var_departamento = '';
$js_var_edad = 0;
$js_var_gen  = 0;
$c1          = "";
$c2          = "";
$c3          = "";
$c4          = "";
$c5          = "";
$c6          = "";
$c7          = "";
$todos="";
$requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$rp = trim((string) ($_GET['rp'] ?? ''));
$compParam = trim((string) ($_GET['comp'] ?? ''));
$grupoParam = trim((string) ($_GET['grupo'] ?? ''));
$distritoParam = trim((string) ($_GET['distrito'] ?? ''));
$localidadParam = trim((string) ($_GET['localidad'] ?? ''));
$dptoParam = trim((string) ($_GET['dpto'] ?? ''));
$generoParam = trim((string) ($_GET['genero'] ?? ''));
$edadParam = trim((string) ($_GET['edad'] ?? ''));
$r = [];

if ($rp !== '' && $compParam === '' && $grupoParam === '' && $distritoParam === '' && $localidadParam === '' && $dptoParam === '') {
    $todos="Filtro: TODOS";
}
if ($compParam !== '') {
    $comp = $compParam;
    $c1   = '<strong>Compañia: </strong>'  . nom035_h($compParam) . '</li>';
}
if ($grupoParam !== '') {
    $js_var_grupo = $grupoParam;
    $c2   = '<strong>Grupo: </strong>'  . nom035_h($grupoParam) . '</li>';
}
if ($distritoParam !== '') {
    $js_var_distrito = $distritoParam;
    $c3   = '<strong>Distrito: </strong>'  . nom035_h($distritoParam) . '</li>';
}
if ($localidadParam !== '') {
    $js_var_localidad = $localidadParam;
    $c4  = '<strong>Localidad: </strong>'  . nom035_h($localidadParam) . '</li>';
}
if ($dptoParam !== '') {
    $js_var_departamento = $dptoParam;
    $c5   = '<strong>Departamento: </strong>'  . nom035_h($dptoParam) . '</li>';
}

if ($generoParam !== '') {
    if ($generoParam == "") {
        $v6 = "TODOS";
    } else {
        $v6 = $generoParam;
    }
    $js_var_genero = $generoParam;
    if($generoParam=="H"){
        $x6="HOMBRE";
    }else{
        $x6="MUJER";
    }
    $c6 = "<strong>Género: </strong>" . nom035_h($x6);
}
if ($edadParam !== '') {
    $edad = $edadParam;
    $c51  = explode(",", $edadParam);
    $c7   = "<strong>Edad: </strong>" . $c51[0] . "-" . $c51[1];
}
if ($requestMethod === "GET" && $rp === "1") {
    include("funciones/extrae_respuestas.php");
} else {
    $r = [];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>NOM035</title>
    <meta name="description" content="Aplicación NOM035 COSTCO">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="../assets/css/Gotham%20Black.css">
    <link rel="stylesheet" href="../assets/css/Gotham%20Regular.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/Stats-icons.css">
    <link rel="stylesheet" href="../assets/css/steps-progressbar.css">
</head>
<body style="width: 164mm;font-size: 10px;">
    <section id="print">
        <div class="container">
            <div class="row">
                <div class="col-12 pt-0 pb-0">
                    <h6 class="pt-2 pb-0 text-center"><strong>REPORTE CALIFICACIÓN DOMINIO</strong></h6>
                </div>
                <div class="col-12 pt-0 pb-0">
                        <hr class="pt-0 pb-0">
                        <p style="font-size: 12px;"><?php echo $todos . $c1 . " " . $c3 . " " . $c4 . " " . $c5 . " " . $c2 . " " . $c6 . " " . $c7; ?></p>
                        <hr class="pt-0 pb-0">
                </div>
            </div>
            <div class="row pt-0 pb-0" style="margin-top: 23px;">
                <div class="col">
                    <div class="row">
                        <div class="col-6 ">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="pt-0 pb-0" style="width: 60%;" colspan="2">Ambiente de trabajo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pb-0" colspan="2">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="pt-0 pb-0" style="margin-top: 0px;">Dominios</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="pt-0 pb-0">Condiciones en el ambiente de trabajo<div id="D1" class="progress">
                                                                <div class="progress-bar" aria-valuenow="<?php echo D("D1",$D1,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo D("D1",$D1,"RESULTADO"); ?>%;background:<?php echo D("D1",$D1,"COLOR"); ?>;"><?php echo D("D1",$D1,"MENSAJE"); ?></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="pt-0 pb-0" style="width: 60%;" colspan="2">Factores propios de la actividad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pb-0" colspan="2">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="pt-0 pb-0" style="margin-top: 0px;">Dominios</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="pt-0 pb-0">Carga de trabajo<div id="D-1" class="progress">
                                                                <div class="progress-bar" aria-valuenow="<?php echo D("D2",$D2,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo D("D2",$D2,"RESULTADO"); ?>%;background:<?php echo D("D2",$D2,"COLOR"); ?>;"><?php echo D("D2",$D2,"MENSAJE"); ?></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pt-0 pb-0">Falta de control sobre el trabajo<div id="D-2" class="progress">
                                                                <div class="progress-bar" aria-valuenow="<?php echo D("D3",$D3,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo D("D3",$D3,"RESULTADO"); ?>%;background:<?php echo D("D3",$D3,"COLOR"); ?>;"><?php echo D("D3",$D3,"MENSAJE"); ?></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="pt-0 pb-0" style="width: 60%;" colspan="2">Organización del tiempo de trabajo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pb-0" colspan="2">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="pt-0 pb-0" style="margin-top: 0px;">Dominios</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="pt-0 pb-0">Jornada de trabajo<div id="D-3" class="progress">
                                                                <div class="progress-bar" aria-valuenow="<?php echo D("D4",$D4,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo D("D4",$D4,"RESULTADO"); ?>%;background:<?php echo D("D4",$D4,"COLOR"); ?>;"><?php echo D("D4",$D4,"MENSAJE"); ?></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pt-0 pb-0">Interferencia en la relación trabajo-familia<div id="D-4" class="progress">
                                                                <div class="progress-bar" aria-valuenow="<?php echo D("D5",$D5,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo D("D5",$D5,"RESULTADO"); ?>%;background:<?php echo D("D5",$D5,"COLOR"); ?>;"><?php echo D("D5",$D5,"MENSAJE"); ?></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="pt-0 pb-0" style="width: 60%;" colspan="2">Liderazgo y relaciones en el trabajo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pb-0" colspan="2">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="pt-0 pb-0" style="margin-top: 0px;">Dominios</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="pt-0 pb-0">Liderazgo<div id="D-5" class="progress">
                                                                <div class="progress-bar" aria-valuenow="<?php echo D("D6",$D6,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo D("D6",$D6,"RESULTADO"); ?>%;background:<?php echo D("D6",$D6,"COLOR"); ?>;"><?php echo D("D6",$D6,"MENSAJE"); ?></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pt-0 pb-0">Relaciones en el trabajo<div id="D-6" class="progress">
                                                                <div class="progress-bar" aria-valuenow="<?php echo D("D7",$D7,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo D("D7",$D7,"RESULTADO"); ?>%;background:<?php echo D("D7",$D7,"COLOR"); ?>;"><?php echo D("D7",$D7,"MENSAJE"); ?></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pt-0 pb-0">Violencia<div id="D-7" class="progress">
                                                                <div class="progress-bar" aria-valuenow="<?php echo D("D8",$D8,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo D("D8",$D8,"RESULTADO"); ?>%;background:<?php echo D("D8",$D8,"COLOR"); ?>;"><?php echo D("D8",$D8,"MENSAJE"); ?></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="pt-0 pb-0" style="width: 60%;" colspan="2">Entorno organizacional</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pb-0" colspan="2">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="pt-0 pb-0" style="margin-top: 0px;">Dominios</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="pt-0 pb-0">Reconocimiento del desempeño<div id="D-8" class="progress">
                                                                <div class="progress-bar" aria-valuenow="<?php echo D("D9",$D9,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo D("D9",$D9,"RESULTADO"); ?>%;background:<?php echo D("D9",$D9,"COLOR"); ?>;"><?php echo D("D9",$D9,"MENSAJE"); ?></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="pt-0 pb-0">Insuficiente sentido de pertenencia e, inestabilidad<div id="D-9" class="progress">
                                                                <div class="progress-bar" aria-valuenow="<?php echo D("D10",$D10,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo D("D10",$D10,"RESULTADO"); ?>%;background:<?php echo D("D10",$D10,"COLOR"); ?>;"><?php echo D("D10",$D10,"MENSAJE"); ?></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bold-and-bright.js"></script>
    <script src="../assets/js/resultados/cargar_filtros.js"></script>
    <script src="../assets/js/svgactions.js"></script>
    <script src="../assets/js/swal/sweetalert2.all.min.js"></script>
    <script src="../assets/js/videomodal_visto.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        window.jsPDF = window.jspdf.jsPDF;
        let pdf = new jsPDF('p', 'pt', 'letter')
        pdf.html(document.getElementById('print'), {
            callback: function() {
                pdf.save('REPORTE CALIFICACIÓN DOMINIO.pdf');
                //window.open(pdf.output('bloburl')); // to debug
            }
        });
    </script>        
</body>

</html>