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
    $gen = $generoParam;
    if($generoParam=="M"){
        $x6="HOMBRE";
    }else{
        $x6="MUJER";
    }    
    $c6  = "<strong>Género: </strong>" . nom035_h($x6);
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
                    <h6 class="pt-2 pb-0 text-center"><strong>REPORTE POR CATEGORIAS</strong></h6>
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
                                                <div id="C1" class="progress " style="height: 26px;margin-bottom: 7px;">
                                                    <div class="progress-bar" aria-valuenow="<?php echo C("C1",$C1,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo C("C1",$C1,"RESULTADO"); ?>%;background:<?php echo C("C1",$C1,"COLOR"); ?>;"><?php echo C("C1",$C1,"MENSAJE"); ?></div>
                                                </div><br />
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
                pdf.save('REPORTE POR CATEGORIAS');
                //window.open(pdf.output('bloburl')); // to debug
            }
        });
    </script>        
</body>

</html>