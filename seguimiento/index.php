<?php
include("../php/session_mainfile.php");
include("../php/config/db.php");
$tipo_seg = "auto";
#($usuarios_perfil == 5 || $usuarios_perfil == 6 || $usuarios_perfil == 7)
if ($usuarios_perfil == 7) {
    $acceso = true;
    $localidad = sprintf("SELECT empleados_t_localidad AS localidad, empleados_apaterno AS ap, empleados_amaterno as apM, empleados_nombres AS nom FROM nom035_empleados WHERE empleados_n_empleado = '$usuarios_nempleado'");
    if ($localidad_exe = mysqli_query($conn, $localidad)) {
        $localidad_cnt = mysqli_num_rows($localidad_exe);
        if ($localidad_cnt > 0) {
            $localidad_row = mysqli_fetch_assoc($localidad_exe);
            $localidad_r = $localidad_row['localidad'];
            $nom_r = $localidad_row['nom'];
            $ap_r = $localidad_row['ap'];
            $apM_r = $localidad_row['apM'];
            include "php/check_plan.php";
        } else {
            echo "No se encontro al usuario";
            exit();
        }
    } else {
        echo $conn->error;
        exit();
    }
} else if ($usuarios_perfil == 1) {
    header("location:planes_accion.php");
} else {
    header("location:../home.php");
    exit();
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
</head>

<body style="font-family: 'Gotham Regular';">
    <nav class="navbar navbar-light navbar-expand-md fixed-top bg-white navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><img class="img-fluid" data-aos="fade" src="../assets/img/seguimiento.png" width="100px"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-3"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="../php/logout.php">Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="mt-5 pt-5 mb-0 pb-0 mb-0 pb-0">
        <div class="container py-4 py-xl-5 mb-xl-0 pb-xl-3">
            <div class="row mt-3 mb-3 mr-0 pl-0 ml-0">
                <div class="col-12 col-sm-4 col-lg-2 text-center align-self-center pt-xl-2 pb-xl-2 pt-3 pb-3"><img class="img-fluid" src="../assets/img/logo1.png"></div>
                <div class="col-sm-8 col-md-8 col-lg-6 offset-lg-4 mt-2 mb-2">
                    <ul class="list-group">
                        <li class="list-group-item"><span><strong>Localidad:</strong></span> <?php echo $localidad_r; ?></li>
                        <li class="list-group-item"><span><strong>Gerente:</strong></span> <?php echo $nom_r . " " . $ap_r . " " . $apM_r; ?></li>
                        <li class="list-group-item"><span><strong>Fecha:</strong></span> <?php echo $seg_fecha_atla;  ?></li>
                    </ul>
                </div>
                <div class="col pl-0 pr-0 mt-2"><a class="btn btn-info btn-sm pr-2 pl-2" role="button" style="font-size: 11px;" href="../home.php"><i class="fas fa-backward"></i> Regresar</a></div>
            </div>
        </div>
    </section>
    <section class="pb-5">
        <div class="container">
            <?php
            $pl = sprintf("SELECT seg_planes_id,
            seg_consecutivo,
            seg_localidad,
            seg_nempleado,
            seg_nom_plan,
            seg_fech_plan,
            seg_fecha_atla,
            seg_fecha_modificacion FROM seg_planes WHERE seg_nempleado = '$usuarios_nempleado' ORDER BY seg_consecutivo ASC;");
            if ($pl_exe = mysqli_query($conn, $pl)) {
                $pl_cnt = mysqli_num_rows($pl_exe);
                if ($pl_cnt > 0) {
                    while ($pl_row = mysqli_fetch_assoc($pl_exe)) {
            ?>
                        <div class="card shadow mt-2">
                            <div class="card-header">
                                <div class="row d-xl-flex align-items-center justify-content-xl-center align-items-xl-center">
                                    <div class="col-12 col-sm-8 align-self-center justify-content-xl-start align-items-xl-center mb-xl-0 pb-xl-0">
                                        <h3 class="pb-0 mb-0"><?php echo $pl_row['seg_nom_plan'] ?></h3>
                                        <div class="card">
                                            <div class="card-body d-xl-flex align-items-xl-center pb-2 pt-2">
                                                <h6 class="text-muted card-subtitle pb-0 mb-0 mt-0"><?php echo $pl_row['seg_fech_plan'] ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4 text-right">
                                        <form action="planes.php" method="GET" id="plan<?php echo $pl_row['seg_consecutivo'] ?>">
                                            <input type="hidden" name="seg_planes_id" value="<?php echo $pl_row['seg_planes_id'] ?>">
                                            <input type="hidden" name="seg_consecutivo" value="<?php echo $pl_row['seg_consecutivo'] ?>">
                                            <input type="hidden" name="seg_localidad" value="<?php echo $pl_row['seg_localidad'] ?>">
                                            <input type="hidden" name="seg_nempleado" value="<?php echo $pl_row['seg_nempleado'] ?>">
                                            <button class="btn btn-primary btn-sm" type="submit">Entrar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-bordered">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Categoría</th>
                                                <th>Dominio</th>
                                                <th>Acción NOM-035</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $seg_planes_id = $pl_row['seg_planes_id']; ?>
                                            <?php include "php/plan_accion.php"; ?>

                                        </tbody>
                                    </table>
                                </div>
                                <ul class="list-group list-group-horizontal">
                                    <?php include "php/plan_contador_acciones.php"; ?>
                                </ul>
                            </div>
                        </div>
            <?php
                    }
                } else {
                    echo "No hay planes";
                }
            } else {
                echo $conn->error;
                exit();
            }
            ?>
        </div>
    </section>
    <footer data-aos="fade" class="bg-primary-gradient">
        <div class="container py-4 py-lg-5" style="margin-top: -25px;">
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
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="../assets/js/bold-and-bright.js"></script>
    <script src="../assets/js/resultados/cargar_filtros.js"></script>
    <script src="../assets/js/svgactions.js"></script>
    <script src="../assets/js/swal/sweetalert2.all.min.js"></script>
    <script src="../assets/js/videomodal_visto.js"></script>
</body>

</html>