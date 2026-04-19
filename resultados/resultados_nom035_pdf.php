<?php
include("../php/session_mainfile.php");
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
$requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$rp = trim((string) ($_GET['rp'] ?? ''));
$compParam = trim((string) ($_GET['comp'] ?? ''));
$grupoParam = trim((string) ($_GET['grupo'] ?? ''));
$distritoParam = trim((string) ($_GET['distrito'] ?? ''));
$localidadParam = trim((string) ($_GET['localidad'] ?? ''));
$dptoParam = trim((string) ($_GET['dpto'] ?? ''));
$edadParam = trim((string) ($_GET['edad'] ?? ''));
$generoParam = trim((string) ($_GET['genero'] ?? ''));

if ($compParam !== '') {
    $comp = $compParam;
    $c1 = '<strong>Compañia: </strong>' . nom035_h($compParam);
}
if ($grupoParam !== '') {
    $js_var_grupo = $grupoParam;
    $c2 = '<strong>Grupo: </strong>' . nom035_h($grupoParam);
}
if ($distritoParam !== '') {
    $js_var_distrito = $distritoParam;
    $c3 = '<strong>Distrito: </strong>' . nom035_h($distritoParam);
}
if ($localidadParam !== '') {
    $js_var_localidad = $localidadParam;
    $c4 = '<strong>Localidad: </strong>' . nom035_h($localidadParam);
}
if ($dptoParam !== '') {
    $js_var_departamento = $dptoParam;
    $c5 = '<strong>Departamento: </strong>' . nom035_h($dptoParam);
}
if ($edadParam !== '') {
    $edad = $edadParam;
    $c51  = explode(",", $edadParam);
    $c6   = "<strong>Edad: </strong>" . $c51[0] . "-" . $c51[1];
}
if ($generoParam !== '') {
    $gen = $generoParam;
    $c7  = "<strong>Género: </strong>" . nom035_h($generoParam);
}
if ($requestMethod === "GET" && $rp === "1") {
    include("funciones/extrae_respuestas.php");
} else {
    $r = NULL;
    $regreso = "";
    if ($usuarios_perfil==8 ||$usuarios_perfil==7 ||$usuarios_perfil==6 ||$usuarios_perfil==5) {
        include("funciones/extrae_respuestas_individual.php");    
    }elseif($usuarios_perfil==4){
        include("funciones/extrae_respuestas_distrito.php");  
    }elseif($usuarios_perfil==3||$usuarios_perfil==2||$usuarios_perfil==1){

    }    
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
            <div class="row pt-0 pb-0">
                <div class="col">
                <?php if ($usuarios_perfil == 1 || $usuarios_perfil == 2 || $usuarios_perfil == 3 || $usuarios_perfil == 4 || $usuarios_perfil == 5 || $usuarios_perfil == 6 || $usuarios_perfil == 7) : ?>
                <div class="row p-3">
                    <div class="col-12">
                        <h6>Calificación final NOM-035 <?php echo $c4; ?></h6>
                    </div>
                    <div class="col-6  border bg-dark text-white">Nivel de riesgo del centro de trabajo</div>
                    <div class="col-6  border bg-dark text-white">Necesidad de acción</div>
                    <div class="col-6 border d-flex justify-content-center align-items-center" style="color:#000000;background-color:<?php echo $final_color; ?>;"><?php echo $final_txt; ?></div>
                    <div class="col-6 border text-justify"><?php echo $final_texto_nom; ?></div>
                </div>
            <?php endif; ?>  
            <?php if ($usuarios_perfil == 8) : ?>
                <div class="row p-3">
                    <div class="col-12">
                        <h4>Calificación final NOM-035 <?php echo $c1; ?></h4>
                    </div>
                    <div class="col-12 border bg-dark text-white">Nivel de riesgo del centro de trabajo</div>
                    <div class="col-12 border d-flex justify-content-center align-items-center" style="color:#000000;background-color:<?php echo $final_color; ?>;"><?php echo $final_txt; ?></div>
                </div>
            <?php endif; ?>                                 
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
                                                <div id="C1" class="progress " style="height: 26px;margin-bottom: 7px;">
                                                    <div class="progress-bar" aria-valuenow="<?php echo C("C1",$C1,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo C("C1",$C1,"RESULTADO"); ?>%;background:<?php echo C("C1",$C1,"COLOR"); ?>;"><?php echo C("C1",$C1,"MENSAJE"); ?></div>
                                                </div><br />
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
                                                <div id="C-1" class="progress " style="height: 26px;margin-bottom: 7px;">
                                                <div class="progress-bar" aria-valuenow="<?php echo C("C2",$C2,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo C("C2",$C2,"RESULTADO"); ?>%;background:<?php echo C("C2",$C2,"COLOR"); ?>;"><?php echo C("C2",$C2,"MENSAJE"); ?></div>
                                                </div><br />
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
                                                <div id="C-2" class="progress pb-xl-0 mb-xl-0" style="height: 26px;margin-bottom: 7px;">
                                                <div class="progress-bar" aria-valuenow="<?php echo C("C3",$C3,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo C("C3",$C3,"RESULTADO"); ?>%;background:<?php echo C("C3",$C3,"COLOR"); ?>;"><?php echo C("C3",$C3,"MENSAJE"); ?></div>
                                                </div><br />
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
                                                <div id="C-3" class="progress " style="height: 26px;margin-bottom: 7px;">
                                                <div class="progress-bar" aria-valuenow="<?php echo C("C4",$C4,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo C("C4",$C4,"RESULTADO"); ?>%;background:<?php echo C("C4",$C4,"COLOR"); ?>;"><?php echo C("C4",$C4,"MENSAJE"); ?></div>
                                                </div><br />
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
                                                <div id="C-4" class="progress pb-xl-0 mb-xl-0" style="height: 26px;margin-bottom: 7px;">
                                                <div class="progress-bar" aria-valuenow="<?php echo C("C5",$C5,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo C("C5",$C5,"RESULTADO"); ?>%;background:<?php echo C("C5",$C5,"COLOR"); ?>;"><?php echo C("C5",$C5,"MENSAJE"); ?></div>
                                                </div><br />
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
                pdf.save('Reporte para NOM-035.pdf');
                //window.open(pdf.output('bloburl')); // to debug
            }
        });
    </script>        
</body>

</html>