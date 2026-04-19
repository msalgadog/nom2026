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
$r = [];
$todos = "";
$requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$rp = trim((string) ($_GET['rp'] ?? ''));
$compParam = trim((string) ($_GET['comp'] ?? ''));
$grupoParam = trim((string) ($_GET['grupo'] ?? ''));
$distritoParam = trim((string) ($_GET['distrito'] ?? ''));
$localidadParam = trim((string) ($_GET['localidad'] ?? ''));
$dptoParam = trim((string) ($_GET['dpto'] ?? ''));
$edadParam = trim((string) ($_GET['edad'] ?? ''));
$generoParam = trim((string) ($_GET['genero'] ?? ''));

if ($rp !== '' && $compParam === '' && $grupoParam === '' && $distritoParam === '' && $localidadParam === '' && $dptoParam === '') {
    $todos = "Filtro: TODOS";
}
if ($compParam !== '') {
    $comp = $compParam;
    $c1   = '<li class="breadcrumb-item"><span><strong>Compañia:</strong> '  . nom035_h($compParam) . '</span></li>';
}
if ($grupoParam !== '') {
    $js_var_grupo = $grupoParam;
    $c2   = '<li class="breadcrumb-item"><span><strong>Grupo:</strong> '  . nom035_h($grupoParam) . '</span></li>';
}
if ($distritoParam !== '') {
    $js_var_distrito = $distritoParam;
    $c3   = '<li class="breadcrumb-item"><span><strong>Distrito:</strong> '  . nom035_h($distritoParam) . '</span></li>';
}
if ($localidadParam !== '') {
    $js_var_localidad = $localidadParam;
    $c4  = '<li class="breadcrumb-item"><span><strong>Localidad:</strong> '  . nom035_h($localidadParam) . '</span></li>';
}
if ($dptoParam !== '') {
    $js_var_departamento = $dptoParam;
    $c5   = '<li class="breadcrumb-item"><span><strong>Departamento:</strong> '  . nom035_h($dptoParam) . '</span></li>';
}
if ($edadParam !== '') {
    $edad = $edadParam;
    $c51  = explode(",", $edadParam);
    $c5   = " Edad: " . $c51[0] . "-" . $c51[1];
}
if ($generoParam !== '') {
    $gen = $generoParam;
    $c6  = " Género: " . nom035_h($generoParam);
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
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="../assets/css/Stats-icons.css">
    <link rel="stylesheet" href="../assets/css/steps-progressbar.css">
    <script src="../assets/css/form-validator/theme-default.min.css"></script>
</head>

<body style="font-family: 'Gotham Regular';">
    <nav class="navbar navbar-light navbar-expand-md fixed-top bg-white navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="home.php"><img class="img-fluid" data-aos="fade" src="../assets/img/logo1.png" width="100px"></a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="../php/logout.php">Salir</a></li>
            </ul>
        </div>
    </nav>
    <section class="py-5 mt-5">
        <div class="container py-4 py-xl-5 mb-xl-0 pb-xl-2" data-toggle="tooltip" data-bss-tooltip="" style="margin-top: -1px;padding-bottom: 25px;margin-bottom: -32px;">
            <div class="row">
                <div class="col-12 text-right pt-xl-2 pb-xl-2 pt-3 pb-3">
                    <div class="row">
                        <div class="col-2 col-md-2 col-lg-1 text-center align-self-center pt-xl-2 pb-xl-2 pt-3 pb-3">
                            <div class="row">
                                <div class="col"><svg class="bi bi-graph-up-arrow" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" style="color: var(--blue);font-size: 34px;">
                                        <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z"></path>
                                    </svg></div>
                                <div class="col pl-0 pr-0 mt-2"><a class="btn btn-info btn-sm pr-2 pl-2" role="button" style="font-size: 11px;" href="../reportes.php"><i class="fas fa-backward"></i> Regresar</a></div>
                            </div>
                        </div>
                        <div class="col-10 col-md-10 col-lg-11 text-right pt-xl-2 pb-xl-2 pt-3 pb-3 mr-0 pr-3">
                            <h1 class="p-0 m-0" style="text-align: left;font-family: 'Gotham Black';color: var(--blue);">REPORTE CALIFICACIÓN FINAL POR LOCALIDAD</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col mt-lg-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../home.php"><span>Home</span></a></li>
                        <li class="breadcrumb-item"><a href="../resultados.php"><span>Resultados</span></a></li>
                        <li class="breadcrumb-item"><a href="../reportes.php"><span>Reportes</span></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><span>Reporte calificación final por localidad</span></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <form action="resultados_localidad.php" method="get" id="resultados_localidad" name="resultados_localidad"><input class="form-control" type="hidden" name="rp" value="1"><input class="form-control" type="hidden" name="mapa" value="1">
                                <div class="form-row">
                                    <div class="col-12 col-lg-6 text-left">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">Compañía</span></div>
                                                <select class="form-control filtro" name="comp" id="comp" data-validation="required">
                                                    <optgroup label="Compañías">
                                                        <option value="" disabled selected>Seleccione compañía </option>
                                                        <?php
                                                        $com = sprintf("SELECT empleados_comp FROM nom035_empleados group by empleados_comp;");
                                                        if ($com_exe = mysqli_query($conn, $com)) {
                                                            $com_cnt = mysqli_num_rows($com_exe);
                                                            if ($com_cnt > 0) {
                                                                $seltodos = "";
                                                                if ($compParam === "TODOS") {
                                                                    echo '<option value="TODOS" selected>TODOS </option>';
                                                                    $seltodos = 1;
                                                                } else {
                                                                    echo '<option value="TODOS">TODOS </option>';
                                                                    $seltodos = "";
                                                                }
                                                                while ($com_row = mysqli_fetch_assoc($com_exe)) {
                                                                    $sel = "";
                                                                    if ($com_row['empleados_comp'] == $compParam) {
                                                                        $sel = 'selected';
                                                                    }
                                                                    echo '<option value="' . $com_row['empleados_comp'] . '"' . $sel . '>' . $com_row['empleados_comp'] . '</option>';
                                                                }
                                                            } else {
                                                                echo "No existen compañías";
                                                            }
                                                        } else {
                                                            echo $conn->error;
                                                        }
                                                        ?>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6 text-left">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">Distrito</span></div>
                                                <select class="form-control filtro" name="distrito" id="distrito">
                                                    <optgroup>

                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="col-12 col-lg-6 text-left">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">Grupo</span></div>
                                                <select class="form-control filtro" name="grupo" id="grupo" data-campo="grupo" data-tipo="padre" data-hijo="localidad" data-inicial="2">

                                                </select>
                                            </div>
                                        </div>
                                    </div>  
                        -->
                                    <div class="col-12 col-lg-12">
                                        <div class="form-group text-center"><button class="btn btn-primary" type="submit">Generar Reporte</button></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <ol class="breadcrumb">
                <?php echo $c1 . " " . $c2 . " " . $c3 . " " . $c4 . " " . $c5; ?>
            </ol>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 mb-2 mt-2">
                    <a class="btn btn-primary btn-block" role="button" href="resultados_localidad_pdf.php?<?php echo nom035_h($_SERVER['QUERY_STRING'] ?? ''); ?>" target="_blank">Formato PDF</a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div><canvas id="myChart"></canvas></div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <table class="table table-dark  ">
                    <thead>
                        <tr>
                            <th colspan="5" class="text-center text-white">Riesgo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="background-color: #9BE5F7; color:#000000; font-size:12px;" class="text-center">Nulo | Cfinal < 50</td>
                            <td style="background-color: #6BF56E; color:#000000; font-size:12px;" class="text-center">Bajo | 50 <= Cfinal < 75 </td>
                            <td style="background-color: #FFFF00; color:#000000; font-size:12px;" class="text-center">Medio | 75 <= Cfinal < 99</td>
                            <td style="background-color: #FFC000; color:#000000; font-size:12px;" class="text-center">Alto | 99 <= Cfinal < 140</td>
                            <td style="background-color: #FF0000; color:#ffffff; font-size:12px;" class="text-center">Muy Alto | Cfinal >= 140</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer data-aos="fade" class="bg-primary-gradient">
        <div class="container py-4 py-lg-5" style="margin-top: -25px;">
            <div class="row justify-content-center">
                <div class="col text-center text-lg-left d-flex flex-column align-items-center align-items-lg-start item social">
                    <p class="text-muted copyright">Aplicación 2022</p>
                </div>
            </div>
            <hr>
            <div class="text-muted d-flex justify-content-between pt-3" style="background: var(--bs-gray-100);">
                <p class="mb-0">Copyright © 2022 HUMANPRO</p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="https://www.facebook.com/humanproconsultoria" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                            </svg></a></li>
                    <li class="list-inline-item"><a href="https://www.linkedin.com/company/humanpro" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-linkedin">
                                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"></path>
                            </svg></a></li>
                </ul>
            </div>
        </div>
    </footer>
    <div class="modal fade" role="dialog" tabindex="-1" id="cargando">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body" style="text-align: center;"><i class="fas fa-spinner fa-spin" style="font-size: 83px;color: var(--blue);"></i>
                    <p style="color: var(--blue);margin-top: 13px;font-family: 'Gotham Black';font-size: 26px;">Cargando Datos</p>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/chart.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="../assets/js/bold-and-bright.js"></script>
    <script>
        vcomp = "<?php echo $comp; ?>";
        vgrupo = "<?php echo $js_var_grupo; ?>";
        vdistrito = "<?php echo $js_var_distrito; ?>";
        vlocalidad = "<?php echo $js_var_localidad; ?>"
        vdepartamento = "<?php echo $js_var_departamento; ?>"
    </script>
    <!--<script src="../assets/js/resultados/cargar_filtros_funciones.js"></script>-->
    <script src="../assets/js/svgactions.js"></script>
    <script src="../assets/js/swal/sweetalert2.all.min.js"></script>
    <script src="../assets/js/form_validator/jquery.form-validator.min.js"></script>
    <script>
        $.validate({
            form: '#resultados_localidad',
            modules: 'html5',
            lang: 'es',
        });
        if (vcomp != "" || vdistrito != 0) {
            $.ajax({
                type: "GET",
                url: "functions/cargar_distritos.php",
                data: {
                    comp: vcomp,
                    dist_distin: vdistrito
                },
                success: function(response) {
                    $("#distrito").html(response).fadeIn();
                }
            });
        }
        $(document).on('change', '#comp', function() {
            var comp_select = $("#comp").val();
            $.ajax({
                type: "GET",
                url: "functions/cargar_distritos.php",
                data: {
                    comp: comp_select
                },
                success: function(response) {
                    $("#distrito").html(response).fadeIn();
                }
            });
        });
    </script>
    <?php if (isset($_GET['rp'])) : ?>
        <script>
            const ctx = document.getElementById('myChart').getContext('2d');
            var opciones = {
                scales: {
                    yAxes: [{
                        barPercentage: 0.5,
                        gridLines: {
                            display: true
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            zeroLineColor: "black",
                            zeroLineWidth: 2
                        },
                        ticks: {
                            min: 0,
                            max: 140,
                            stepSize: 10
                        },
                        scaleLabel: {
                            display: true,
                            labelString: "Puntos"
                        }
                    }]
                },
                elements: {
                    rectangle: {
                        borderSkipped: 'left',
                    }
                }
            };
            var MyChart = new Chart(ctx, {
                type: 'horizontalBar',
                options: opciones,
                data: {
                    labels: [<?php foreach ($r as $key => $value) {
                                    echo "'" . $key . "',";
                                } ?>],
                    datasets: [{
                        label: "Calificación Final",
                        data: [<?php foreach ($r as $key => $value) {
                                    echo "'" . $value->TOTAL . "',";
                                } ?>],
                        <?php echo "backgroundColor: [";
                        foreach ($r as $key => $value) {
                            echo "'" . $value->COLOR . "',";
                        }
                        echo "],"; ?>
                    }],
                },
            })
        </script>
    <?php endif; ?>
</body>

</html>