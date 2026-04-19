<?php
include("php/session_mainfile.php");
include ("php/config/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>NOM035</title>
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
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="home.php"><img class="img-fluid" data-aos="fade" src="assets/img/logo1.png" width="100px"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-3"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="php/logout.php">Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="py-5 mt-5">
        <div class="container py-4 py-xl-5">
            <div class="row">
                <div class="col-12 text-right pt-xl-2 pb-xl-2 pt-3 pb-3">
                    <div class="row">
                        <div class="col-2 col-md-2 col-lg-1 text-center align-self-center pt-xl-2 pb-xl-2 pt-3 pb-3"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-graph-up-arrow" style="color: var(--blue);font-size: 34px;">
                                <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm10 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V4.9l-3.613 4.417a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61L13.445 4H10.5a.5.5 0 0 1-.5-.5Z"></path>
                            </svg></div>
                        <div class="col-10 col-md-10 col-lg-11 text-right pt-xl-2 pb-xl-2 pt-3 pb-3 mr-0 pr-3">
                            <h1 class="p-0 m-0" style="text-align: left;font-family: 'Gotham Black';color: var(--blue);">Resultados NOM-035</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="padding-top: 0px;">
            <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3">
                <div class="col">
                    <div class="text-center d-flex flex-column justify-content-center align-items-center p-3">
                        <div class="bs-icon-xl bs-icon-circle text-white d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-2 bs-icon bs-icon-lg" style="background: #1b5bbc;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                                <path d="M17 20H22V18C22 16.3431 20.6569 15 19 15C18.0444 15 17.1931 15.4468 16.6438 16.1429M17 20H7M17 20V18C17 17.3438 16.8736 16.717 16.6438 16.1429M7 20H2V18C2 16.3431 3.34315 15 5 15C5.95561 15 6.80686 15.4468 7.35625 16.1429M7 20V18C7 17.3438 7.12642 16.717 7.35625 16.1429M7.35625 16.1429C8.0935 14.301 9.89482 13 12 13C14.1052 13 15.9065 14.301 16.6438 16.1429M15 7C15 8.65685 13.6569 10 12 10C10.3431 10 9 8.65685 9 7C9 5.34315 10.3431 4 12 4C13.6569 4 15 5.34315 15 7ZM21 10C21 11.1046 20.1046 12 19 12C17.8954 12 17 11.1046 17 10C17 8.89543 17.8954 8 19 8C20.1046 8 21 8.89543 21 10ZM7 10C7 11.1046 6.10457 12 5 12C3.89543 12 3 11.1046 3 10C3 8.89543 3.89543 8 5 8C6.10457 8 7 8.89543 7 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg></div>
                        <div class="px-3">
                            <span id="us_reg_div"><span id="us_reg">0</span></span>
                            <p class="mb-0">Usuarios Registrados</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center d-flex flex-column justify-content-center align-items-center p-3">
                        <div class="bs-icon-xl bs-icon-circle text-white d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-2 bs-icon bs-icon-lg" style="background: #ebc709;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20" fill="none">

                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 18C14.4183 18 18 14.4183 18 10C18 5.58172 14.4183 2 10 2C5.58172 2 2 5.58172 2 10C2 14.4183 5.58172 18 10 18ZM11 6C11 5.44772 10.5523 5 10 5C9.44771 5 9 5.44772 9 6V10C9 10.2652 9.10536 10.5196 9.29289 10.7071L12.1213 13.5355C12.5118 13.9261 13.145 13.9261 13.5355 13.5355C13.9261 13.145 13.9261 12.5118 13.5355 12.1213L11 9.58579V6Z" fill="currentColor"></path>
                            </svg></div>
                        <div class="px-3">
                            <div id="us_pend_div"><span id="us_pend">0</span></div>
                            <p class="mb-0">Usuarios Pendientes</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center d-flex flex-column justify-content-center align-items-center p-3">
                        <div class="bs-icon-xl bs-icon-circle text-white d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block mb-2 bs-icon bs-icon-lg" style="background: #67ad0e;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20" fill="none">
                                <path d="M9 2C8.44772 2 8 2.44772 8 3C8 3.55228 8.44772 4 9 4H11C11.5523 4 12 3.55228 12 3C12 2.44772 11.5523 2 11 2H9Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4 5C4 3.89543 4.89543 3 6 3C6 4.65685 7.34315 6 9 6H11C12.6569 6 14 4.65685 14 3C15.1046 3 16 3.89543 16 5V16C16 17.1046 15.1046 18 14 18H6C4.89543 18 4 17.1046 4 16V5ZM13.7071 10.7071C14.0976 10.3166 14.0976 9.68342 13.7071 9.29289C13.3166 8.90237 12.6834 8.90237 12.2929 9.29289L9 12.5858L7.70711 11.2929C7.31658 10.9024 6.68342 10.9024 6.29289 11.2929C5.90237 11.6834 5.90237 12.3166 6.29289 12.7071L8.29289 14.7071C8.68342 15.0976 9.31658 15.0976 9.70711 14.7071L13.7071 10.7071Z" fill="currentColor"></path>
                            </svg></div>
                        <div class="px-3">
                            <div id="us_conc_div"><span id="us_conc">0</span></div>
                            <p class="mb-0">Encuestas Concluidas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 mt-xl-2 pl-2 pr-2">
                    <form>
                        <div class="form-group">
                            <div class="input-group mt-2">
                                <div class="input-group-prepend"><span class="input-group-text">Distrito</span></div><select class="form-control" id="distrito" name="distrito" value="0" required="">
                                <option value="" disabled="disabled" selected="selected">Seleccione un distrito</option>
                                        <?php
                                        $distrito = sprintf("SELECT empleados_distrito FROM nom035_empleados GROUP BY empleados_distrito;");
                                        if ($distrito_stmt = $conn->prepare($distrito)) {
                                            $distrito_status = $distrito_stmt->execute();
                                            if ($distrito_status === true) {
                                                $distrito_stmt->store_result();
                                                if ($distrito_stmt->num_rows > 0) {
                                                    $distrito_stmt->bind_result($empleados_distrito);
                                                    while ($distrito_stmt->fetch()) {
                                                        echo '<option value="' . $empleados_distrito . '">' . $empleados_distrito . '</option>';
                                                    }
                                                } else {
                                                    echo '<option>No existen distritos</option>';
                                                }
                                            } else {
                                                echo $conn->error;
                                            }
                                        } else {
                                            exit($conn->error);
                                        }
                                        ?>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12 mt-xl-2 pl-2 pr-2">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div id="concluidos_pendientes"></div>
                        </div>
                        <div class="col-md-6 text-center mt-3 mb-3"><a class="btn btn-primary mb-4 mt-4" role="button" href="reportes.html">Resultados NOM035</a>
                                        <div id="resultado"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer data-aos="fade" class="bg-primary-gradient">
        <div class="container py-4 py-lg-5">
            <div class="row justify-content-center">
                <div class="col text-center text-lg-left d-flex flex-column align-items-center align-items-lg-start item social">
                    <div class="font-weight-bold d-flex align-items-center mb-2"><span class="bs-icon-md bs-icon-rounded bs-icon-primary-light d-flex justify-content-center align-items-center bs-icon mr-2" data-bss-hover-animate="bounce"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier">
                                <path fill-rule="evenodd" d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"></path>
                                <path d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                            </svg></span><span>NOM035</span></div>
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
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>    
    <script src="assets/js/svgactions.js"></script>
    <script src="assets/js/swal/sweetalert2.all.min.js"></script>
    <script src="assets/js/videomodal_visto.js"></script>
    <script src="assets/js/counter_animation.js"></script>
    <script src="assets/js/contador_resultados.js"></script>
</body>

</html>