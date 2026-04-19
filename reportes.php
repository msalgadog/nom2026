<?php 
include("php/session_mainfile.php");
include("php/config/db.php");
if ($usuarios_perfil == 8) {
    if(isset($_GET['regreso'])&&$_GET['regreso']==1){
        header("location:home.php");
    }else{
        header("location:resultados/resultados_nom035.php");
    }
    exit();
}elseif ($usuarios_perfil==2) {
    #header("location:resultados.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>NOM035 <?php echo $usuarios_perfil ?></title>
    <meta name="description" content="Aplicación NOM035 COSTCO">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Gotham%20Black.css">
    <link rel="stylesheet" href="assets/css/Gotham%20Regular.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="assets/css/Stats-icons.css">
    <link rel="stylesheet" href="assets/css/steps-progressbar.css">
</head>

<body style="font-family: 'Gotham Regular';">
<nav class="navbar navbar-light navbar-expand-md fixed-top bg-white navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="home.php"><img class="img-fluid" data-aos="fade" src="assets/img/logo1.png" width="100px"></a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="php/logout.php">Salir</a></li>
            </ul>
        </div>
    </nav>
    <section class="py-5 mt-5" style="padding-bottom: 13px;margin-bottom: -24px;">

        <div class="container py-4 py-xl-5">
            <div class="row">
                <div class="col-12 text-right pt-xl-2 pb-xl-2 pt-3 pb-3">
                    <div class="row">
                        <div class="col-10 col-md-10 col-lg-11 text-right pt-xl-2 pb-xl-2 pt-3 pb-3 mr-0 pr-3">
                            <h1 class="p-0 m-0" style="text-align: left;font-family: 'Gotham Black';color: var(--blue);">Reportes NOM-035</h1>

                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-12 text-left align-self-center"><a class="btn btn-info btn-sm" role="button" href="resultados.php"><svg class="bi bi-backspace-fill" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"></path>
                                </svg> Regresar</a></div>
                        <div class="col mt-lg-3">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="home.php"><span>Home</span></a></li>
                                <li class="breadcrumb-item"><a href="resultados.php"><span>Resultados</span></a></li>
                                <li class="breadcrumb-item"><a href="#"><span>Reportes</span></a></li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p style="text-align: left;">Catálogo de reportes para la NOM-035</p>
                            <p style="text-align: left;">Seleccione el reporte que desea visualizar:</p>
                            <ul class="list-group" style="text-align: left;">
                                <?php if ($usuarios_perfil == 4||$usuarios_perfil == 3||$usuarios_perfil == 1) : ?>
                                    <li class="list-group-item"><span style="font-size: 24px;color: var(--teal);"><i class="fas fa-chart-bar" style="font-size: 24px;color: var(--success);"></i>&nbsp;</span><a href="resultados/resultados_mapa.php">REPORTE CALIFICACIÓN FINAL</a></li>
                                <?php endif; ?>
                                <?php if ($usuarios_perfil == 3||$usuarios_perfil == 1) : ?>
                                    <li class="list-group-item"><span style="font-size: 24px;color: var(--info);"><i class="fas fa-chart-bar" style="font-size: 24px;color: var(--success);"></i>&nbsp;</span><a href="resultados/resultados_localidad.php">REPORTE CALIFICACIÓN FINAL POR LOCALIDAD</a></li>
                                <?php endif; ?>
                                <?php if ($usuarios_perfil == 3||$usuarios_perfil == 1||$usuarios_perfil == 5||$usuarios_perfil == 6||$usuarios_perfil == 7) : ?>
                                    <li class="list-group-item"><span style="font-size: 24px;color: var(--info);"><i class="fas fa-chart-bar" style="font-size: 24px;color: var(--success);"></i>&nbsp;</span><a href="resultados/resultados_categorias.php">REPORTE POR CATEGORÍAS</a></li>
                                <?php endif; ?>
                                <?php if ($usuarios_perfil == 3||$usuarios_perfil == 1) : ?>
                                    <li class="list-group-item"><span style="font-size: 24px;color: var(--info);"><i class="fas fa-chart-bar" style="font-size: 24px;color: var(--success);"></i>&nbsp;</span><a href="resultados/resultados_cat_filtro.php?rcomp=DISTRITO">REPORTE POR CATEGORÍAS - COMPARATIVO DE TRES DISTRITOS</a></li>
                                <?php endif; ?>
                                <?php if ($usuarios_perfil == 3||$usuarios_perfil == 1) : ?>
                                    <li class="list-group-item"><span style="font-size: 24px;color: var(--info);"><i class="fas fa-chart-bar" style="font-size: 24px;color: var(--success);"></i>&nbsp;</span><a href="resultados/resultados_cat_filtro.php?rcomp=LOCALIDAD">REPORTE POR CATEGORÍAS - COMPARATIVO DE TRES LOCALIDADES</a></li>
                                <?php endif; ?>
                                <?php if ($usuarios_perfil == 3||$usuarios_perfil == 1||$usuarios_perfil == 5||$usuarios_perfil == 6||$usuarios_perfil == 7) : ?>
                                    <li class="list-group-item"><span style="font-size: 24px;color: var(--info);"><i class="fas fa-chart-bar" style="font-size: 24px;color: var(--success);"></i>&nbsp;</span><a href="resultados/resultados_dominio.php">REPORTE POR DOMINIOS</a></li>
                                <?php endif; ?>
                                <?php if ($usuarios_perfil == 3||$usuarios_perfil == 1||$usuarios_perfil == 2||$usuarios_perfil == 4||$usuarios_perfil == 5||$usuarios_perfil == 6||$usuarios_perfil == 7) : ?>
                                    <li class="list-group-item"><span style="font-size: 24px;color: var(--info);"><i class="fas fa-chart-bar" style="font-size: 24px;color: var(--success);"></i>&nbsp;</span><a href="resultados/resultados_nom035.php">REPORTE PARA NOM035</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
    <script src="assets/js/resultados/cargar_filtros.js"></script>
    <script src="assets/js/svgactions.js"></script>
    <script src="assets/js/swal/sweetalert2.all.min.js"></script>
    <script src="assets/js/videomodal_visto.js"></script>
</body>

</html>