<?php
session_start();
if (isset($_SESSION['loggedin'])) {
    header('Location: home.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - NOM035</title>
    <meta name="description" content="Aplicación NOM035 COSTCO">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Gotham%20Black.css">
    <link rel="stylesheet" href="assets/css/Gotham%20Regular.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md fixed-top navbar-shrink py-3" id="mainNav">
        <div class="container">
            <img class="img-fluid" data-aos="fade" src="assets/img/logo1.png" width="100px">
        </div>
    </nav>
    <header class="bg-primary-gradient py-5">
        <div class="container py-4 py-xl-5">
            <div class="row py-5">
            <div class="col-md-6 mb-4">
                    <div class="p-5 mx-lg-5" style="background: url(&quot;assets/img/blob.svg&quot;) center / contain no-repeat;"><img class="rounded img-fluid shadow w-100 fit-cover" style="min-height: 300px;" src="assets/img/portadanom.png"></div>
                </div>                
                <div class="col-md-6 text-center text-md-left d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-end mb-4">
                    <div style="max-width: 450px;">
                        <h2 class="font-weight-bold" style="color:#E47E08">¡Bienvenido!</h2>
                        <h2 class="font-weight-bold">NOM-035</h2>
                        <p class="my-3">Para poder participar es necesario iniciar sesión, por favor ingresa con el siguiente botón.</p>
                        <form class="d-flex justify-content-center flex-wrap justify-content-md-start flex-lg-nowrap" method="post">
                            <div class="my-2"><a class="btn btn-primary shadow" role="button" href="login.php">Iniciar Sesión</a></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <section></section>
    <footer data-aos="fade" class="bg-primary-gradient">
        <div class="container py-4 py-lg-5">
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/bold-and-bright.js"></script>
    <script src="assets/js/svgactions.js"></script>
    <script src="assets/js/swal/sweetalert2.all.min.js"></script>
    <?php if (isset($_GET['err'])) : ?>
        <?php if ($_GET['err'] == 1) : ?>
            <script>
                Swal.fire({
                    title: "Error",
                    icon: "warning",
                    text: "No se encontró el avance del usuario, por favor inicia nuevamente sesión para cargar nuevamente",
                    confirmButtonText: "Cerrar"
                });
            </script>
        <?php endif; ?>
        <?php if ($_GET['err'] == 2) : ?>
            <script>
                Swal.fire({
                    title: "Error",
                    icon: "warning",
                    text: "Usuario o contraseña incorrectos",
                    confirmButtonText: "Cerrar"
                });
            </script>
        <?php endif; ?>
        <?php if ($_GET['err'] == 3) : ?>
            <script>
                Swal.fire({
                    title: "Error",
                    icon: "warning",
                    text: "Validar el número de empleado, parece que es incorrecto",
                    confirmButtonText: "Cerrar"
                });
            </script>
        <?php endif; ?>
        <?php if ($_GET['err'] == 4 || $_GET['err'] == 5) : ?>
            <script>
                Swal.fire({
                    title: "Error",
                    icon: "error",
                    text: "Error inesperado",
                    confirmButtonText: "Cerrar"
                });
            </script>
        <?php endif; ?>
    <?php endif; ?>
</body>

</html>