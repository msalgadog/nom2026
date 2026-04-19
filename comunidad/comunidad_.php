<?php
include("../php/session_mainfile.php");
include("../php/config/db.php");
$datos = sprintf("SELECT * FROM nom035_empleados WHERE empleados_n_empleado = '$usuarios_nempleado'");
if ($datos_exe = mysqli_query($conn,$datos)) {
    $datos_cnt = mysqli_num_rows($datos_exe);
    if($datos_cnt>0){
        $datos_row=mysqli_fetch_assoc($datos_exe);
        $key = "topotomachupichu";
        function encrypt($string, $key)
        {
            $result = '';
            for ($i = 0; $i < strlen($string); $i++) {
                $char    = substr($string, $i, 1);
                $keychar = substr($key, ($i % strlen($key)) - 1, 1);
                $char    = chr(ord($char) + ord($keychar));
                $result .= $char;
            }
            return base64_encode($result);
        }
        $token1 = encrypt($datos_row['empleados_n_empleado'], $key); ///n_empleado
        $token2 = encrypt($datos_row['empleados_nombres'], $key); ///usuario_nombre
        $token3 = encrypt($datos_row['empleados_apaterno'], $key); ///usuario_nombre
        $token4 = encrypt($datos_row['empleados_amaterno'], $key); ///usuario_nombre
    }else{
        echo "No se encontro al usuario";
    }
}else{
    echo $conn->error;
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
    <link rel="stylesheet" href="../assets/css/form-validator/theme-default.min.css">
    <link rel="stylesheet" href="../assets/css/Stats-icons.css">
    <link rel="stylesheet" href="../assets/css/steps-progressbar.css">
</head>

<body style="font-family: 'Gotham Regular';">
    <nav class="navbar navbar-light navbar-expand-md fixed-top bg-white navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><img class="img-fluid" data-aos="fade" src="../assets/img/logo1.png" width="100px"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-3"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="../php/logout.php">Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="py-5 mt-5">
        <div class="container py-4 py-xl-5">
            <div class="row">
                <div class="col-2 col-md-2 col-lg-1 text-center align-self-center pt-xl-2 pb-xl-2 pt-3 pb-3"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-people-fill" style="color: var(--blue);font-size: 34px;">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                        <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"></path>
                        <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"></path>
                    </svg></div>
                <div class="col-10 col-md-10 col-lg-11 text-right pt-xl-2 pb-xl-2 pt-3 pb-3 mr-0 pr-3">
                    <h1 class="p-0 m-0" style="text-align: left;font-family: 'Gotham Black';color: var(--blue);">Comunidad</h1>
                </div>
            </div>
        </div>
        <div class="container ">
            <div class="row text-center">
                <div class="col-12 text-left align-self-center"><a class="btn btn-info btn-sm" role="button" href="../home.php"><svg class="bi bi-backspace-fill" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"></path>
                        </svg> Regresar</a></div>
                <div class="col mt-lg-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../home.php"><span>Home</span></a></li>
                        <li class="breadcrumb-item"><a href="#"><span>Comunidad</span></a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card"><img class="card-img-top w-100 d-block card-img-top" src="../assets/img/correobanner.png">
                        <div class="card-body">
                            <h4 class="card-title">Comunicación&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chat-square-dots-fill" style="font-size: 33px;color: var(--orange);">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
                                </svg></h4>
                            <div class="carousel slide" data-ride="carousel" id="carousel-1">
                                <?php
                                $c = sprintf("SELECT Id_anuncio,imagen_anuncio,fecha_carga FROM anuncios WHERE activo = 1");
                                if ($c_exe = mysqli_query($conn, $c)) {
                                    $c_cnt = mysqli_num_rows($c_exe);
                                    if ($c_cnt > 0) {
                                        $i = 0;
                                        echo '<ol class="carousel-indicators">' . "\n";
                                        while ($i < $c_cnt) {
                                            if ($i == 0) {
                                                echo '<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>' . "\n";
                                            } else {
                                                echo '<li data-target="#carouselExampleIndicators" data-slide-to="' . $i . '"></li>' . "\n";
                                            }
                                            $i++;
                                        }
                                        echo '</ol>' . "\n";
                                        echo '<div class="carousel-inner">' . "\n";
                                        $n = 0;
                                        while ($c_row = mysqli_fetch_assoc($c_exe)) {
                                            if ($n == 0) {
                                                echo '<div class="carousel-item active">' . "\n";
                                                echo '<img src="../img/anuncios/' . $c_row['imagen_anuncio'] . '" class="d-block w-100" alt="..." style="">' . "\n";
                                                echo '</div>' . "\n";
                                            } else {
                                                echo '<div class="carousel-item">' . "\n";
                                                echo '<img src="../img/anuncios/' . $c_row['imagen_anuncio'] . '" class="d-block w-100" alt="..." style="">' . "\n";
                                                echo '</div>' . "\n";
                                            }
                                            $n++;
                                        }

                                        echo '</div>' . "\n";
                                    } else {
                                        echo "No se encontraron anuncios";
                                    }
                                } else {
                                    echo $conn->error;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card"><img class="card-img-top w-100 d-block card-img-top" src="../assets/img/correobanner.png">
                        <div class="card-body">
                            <h4 class="card-title">Material de referencia&nbsp;<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-chat-square-dots-fill" style="font-size: 33px;color: var(--orange);">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path>
                                </svg></h4>
                        </div>
                    </div>
                    <h5 class="font-weight-bold text-primary">Política de prevención de riesgos psicosociales</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-dark table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Documento</th>
                                    <th>Descargar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>POLITICA FACTORES DE RIESGO PSICOSOCIALES COSTCO DE MÉXICO, S.A. DE C.V.</td>
                                    <td class="text-center"><a href="NOM035_POLITICA_FACT_RIESGOS.pdf"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-cloud-download-fill text-center text-info" style="font-size: 38px;">
                                                <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"></path>
                                            </svg></a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>FORMATO NOM 035 STPS PRESTADORA Y COSTCO ADMINISTRATIVO</td>
                                    <td class="text-center"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-cloud-download-fill text-center text-info" style="font-size: 38px;">
                                            <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"></path>
                                        </svg></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>POSTER NOM035</td>
                                    <td class="text-center"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-cloud-download-fill text-center text-info" style="font-size: 38px;">
                                            <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"></path>
                                        </svg></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h5 class="font-weight-bold text-primary">Medidas y acciones realizadas</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-dark table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Documento</th>
                                    <th>Descargar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Próximamente</td>
                                    <td class="text-center"><a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-cloud-download-fill text-center text-info" style="font-size: 38px;">
                                                <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"></path>
                                            </svg></a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><span style="background-color: rgba(255, 255, 255, 0.05);">Próximamente</span><br></td>
                                    <td class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-cloud-download-fill text-center text-info" style="font-size: 38px;">
                                            <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"></path>
                                        </svg></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Próximamente</td>
                                    <td class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-cloud-download-fill text-center text-info" style="font-size: 38px;">
                                            <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"></path>
                                        </svg></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
    <div class="row">
        <div class="col" style="margin-top: 15px;">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Buzón NOM035</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto"><img src="../assets/img/mail.png" class="img-fluid" /></div>
                        <div class="col text-center">
                            <p class="text-justify">La NOM-035-STPS establece que para el proyecto debe haber una línea directa para que puedas hacer quejas/sugerencias, felicitaciones o denuncias de una forma segura. </p><button class="btn btn-warning text-center" data-toggle="modal" data-target="#buzonquejas" type="button"><svg class="bi bi-envelope-check" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" style="font-size: 26px;">
                                    <path fill-rule="evenodd" d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471 1.069.64.257.155.257-.154 1.33-.798L15 5.383V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825Zm1.22-.434L1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217L9.072 7.774 8 8.417l-1.072-.643ZM16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 1 .172.686l-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 0 1 .686-.172Z"></path>
                                </svg> Enviar mensaje</button>
                        </div>
                    </div>
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
    <form action="" id="form_buzon">
          <div class="modal fade" id="buzonquejas" tabindex="-1" role="dialog" aria-labelledby="buzonquejasTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="buzonquejasTitle">Buzón línea NOM-035</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                        <img class="card-img-top" src="../assets/img/correobanner.png" alt="Card image cap">
                        <div class="card-body">
                          <h4 class="card-title">Buzón línea NOM-035</h4>
                          <div class="row">
                            <div class="col-12"><div id="div_response_modal"></div></div>
                            <div class="col-12" id="div_form">
                              <input type="hidden" name="token1" id="token1" value="<?php echo $token1; ?>">
                              <input type="hidden" name="token2" id="token2" value="<?php echo $token2; ?>">
                              <input type="hidden" name="token3" id="token3" value="<?php echo $token3; ?>">
                              <input type="hidden" name="token4" id="token4" value="<?php echo $token4; ?>">
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="inputEmail4">Tipo de mensaje</label>
                                  <div class="card">
                                    <div class="card-body">
                                      <div class="form-check mt-3">
                                        <input class="form-check-input" type="radio" name="tipo_contacto" id="tipo_contacto1" value="1" data-validation="required">
                                        <label class="form-check-label" for="tipo_contacto1">
                                          Queja<span><i class="far fa-lightbulb" style="font-size: 1em; color: orange; margin-left: 25px; cursor: pointer;" data-toggle="tooltip" data-html="true" title="<p>Puedes comunicar cualquier situación negativa que hayas vivido durante el proyecto, tu mensaje lo recibe Humanpro para darle seguimiento. </p>"></i></span>
                                        </label>
                                      </div>
                                      <div class="form-check mt-3">
                                        <input class="form-check-input" type="radio" name="tipo_contacto" id="tipo_contacto1" value="2">
                                        <label class="form-check-label" for="tipo_contacto1">
                                          Felicitación<span><i class="far fa-lightbulb" style="font-size: 1em; color: orange; margin-left: 25px; cursor: pointer;" data-toggle="tooltip" data-html="true" title="<p>Puedes comunicar cualquier situación positiva que hayas vivido durante el proyecto, tu mensaje lo recibe Humanpro para darle seguimiento. </p>"></i></span>
                                        </label>
                                      </div>
                                      <div class="form-check mt-3">
                                        <input class="form-check-input" type="radio" name="tipo_contacto" id="tipo_contacto1" value="3">
                                        <label class="form-check-label" for="tipo_contacto1">
                                          Denuncia<span><i class="far fa-lightbulb" style="font-size: 1em; color: orange; margin-left: 25px; cursor: pointer;" data-toggle="tooltip" data-html="true" title="<p>Esta es la línea directa para que puedas hacer denuncias sobre cualquier situación que estés viviendo en tu centro/lugar de trabajo o área en relación a la NOM-035 y los factores psicosociales, de una forma segura, tu mensaje lo recibe RRHH Corporativo de Costco para darle seguimiento. </p>"></i></span>
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group col-md-12">
                                    <label for="inputPassword4">Comentario</label>
                                    <textarea name="mensaje_contacto" id="mensaje_contacto" class="form-control textarea" data-validation="required" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-success" id="form_btn_enviar">Enviar</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>    
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="../assets/js/bootbox.all.min.js"></script>
    <script src="../assets/js/bold-and-bright.js"></script>
    <script src="../assets/js/resultados/cargar_filtros.js"></script>
    <script src="../assets/js/svgactions.js"></script>
    <script src="../assets/js/swal/sweetalert2.all.min.js"></script>
    <script src="../assets/js/form_validator/jquery.form-validator.min.js"></script>
    
    <script src="../assets/js/videomodal_visto.js"></script>
    <script src="../assets/js/buzon.js"></script>
</body>

</html>