<?php
include("php/session_mainfile.php");
include("php/config/db.php");
include("php/funciones/perfiles.php");
include("php/funciones/avance.php");

if (!function_exists('nom035_h')) {
    function nom035_h($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

if ($usuario_avance_demograficos == 1) {
    header("Location: encuesta.php");
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
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/css/Gotham%20Black.css">
    <link rel="stylesheet" href="assets/css/Gotham%20Regular.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="assets/css/form-validator/theme-default.min.css">
</head>

<body style="font-family: 'Gotham Regular';">
<nav class="navbar navbar-light navbar-expand-md fixed-top bg-white navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="home.php"><img class="img-fluid" data-aos="fade" src="assets/img/logo1.png" width="100px"></a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="php/logout.php">Salir</a></li>
            </ul>
        </div>
    </nav>
    <section class="py-5 mt-5">
        <div class="container py-4 py-xl-5">
            <div class="row">
                <div class="col-2 col-md-2 col-lg-1 text-center align-self-center pt-xl-2 pb-xl-2 pt-3 pb-3"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil-square" style="color: var(--blue);font-size: 34px;">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                    </svg></div>
                <div class="col-10 col-md-10 col-lg-11 text-right pt-xl-2 pb-xl-2 pt-3 pb-3 mr-0 pr-3">
                    <h1 class="p-0 m-0" style="text-align: left;font-family: 'Gotham Black';color: var(--blue);">Datos demográficos</h1>
                </div>
                <div class="col-12">
                    <p class="text-justify"><strong><span style="color: rgb(33, 37, 41);">¡Gracias por el tiempo que vas a dedicar a esta actividad!</span></strong><br><span style="color: rgb(33, 37, 41);">Para hacer un análisis general de los resultados, es necesario obtener tus datos demográficos, por lo que te pedimos seleccionarlos de acuerdo a tu información.</span><br></p>
                </div>
            </div>
            <form name="demograficos" id="demograficos" method="POST" action="php/bloques/demograficos.php">
                <input type="hidden" name="actualiza_datos" value="1">
                <input type="hidden" name="nempleado" value="<?php echo $usuarios_nempleado; ?>">
                <input type="hidden" name="ap" value="<?php echo $empleados_amaterno; ?>">
                <input type="hidden" name="apm" value="<?php echo $empleados_apaterno; ?>">
                <input type="hidden" name="nombre" value="<?php echo $empleados_nombres; ?>">
                <div class="form-group"><label><span style="color: rgb(33, 37, 41);">Compañía</span><br></label>
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend"><span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="font-size: 24px;">
                                    <path d="M19 21V5C19 3.89543 18.1046 3 17 3H7C5.89543 3 5 3.89543 5 5V21M19 21L21 21M19 21H14M5 21L3 21M5 21H10M9 6.99998H10M9 11H10M14 6.99998H15M14 11H15M10 21V16C10 15.4477 10.4477 15 11 15H13C13.5523 15 14 15.4477 14 16V21M10 21H14" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg></span></div><select class="form-control" id="comp" name="comp" data-validation="required">
                            <optgroup >
                                <option value="" disabled="disabled" selected="selected">Seleccione una compañía</option>
                                <?php
                                $comp = sprintf("SELECT empleados_comp FROM nom035_empleados GROUP BY empleados_comp;");
                                if ($comp_stmt = $conn->prepare($comp)) {
                                    $comp_status = $comp_stmt->execute();
                                    if ($comp_status === true) {
                                        $comp_stmt->store_result();
                                        if ($comp_stmt->num_rows > 0) {
                                            $comp_stmt->bind_result($empleados_comp);
                                            while ($comp_stmt->fetch()) {
                                                echo '<option value="' . nom035_h($empleados_comp) . '">' . nom035_h($empleados_comp) . '</option>';
                                            }
                                        } else {
                                            echo '<option>No existen empresas</option>';
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
                <div class="form-group"><label>Localidad / Bodega</label>
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend"><span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="font-size: 24px;">
                                    <path d="M9 20L3.55279 17.2764C3.214 17.107 3 16.7607 3 16.382V5.61803C3 4.87465 3.78231 4.39116 4.44721 4.72361L9 7M9 20L15 17M9 20V7M15 17L19.5528 19.2764C20.2177 19.6088 21 19.1253 21 18.382V7.61803C21 7.23926 20.786 6.893 20.4472 6.72361L15 4M15 17V4M15 4L9 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg></span></div><select class="form-control" id="loc" name="loc" data-validation="required">
                            <optgroup >
                                <option value="" disabled="disabled" selected="selected">Seleccione una Localidad</option>
                                <?php
                                $loc = sprintf("SELECT empleados_t_localidad FROM nom035_empleados GROUP BY empleados_t_localidad;");
                                if ($loc_stmt = $conn->prepare($loc)) {
                                    $loc_status = $loc_stmt->execute();
                                    if ($loc_status === true) {
                                        $loc_stmt->store_result();
                                        if ($loc_stmt->num_rows > 0) {
                                            $loc_stmt->bind_result($empleados_t_localidad);
                                            while ($loc_stmt->fetch()) {
                                                echo '<option value="' . nom035_h($empleados_t_localidad) . '">' . nom035_h($empleados_t_localidad) . '</option>';
                                            }
                                        } else {
                                            echo '<option>No existen empresas</option>';
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
                <div class="form-group"><label>Departamento</label>
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend"><span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="font-size: 24px;">
                                    <path d="M10 6H5C3.89543 6 3 6.89543 3 8V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V8C21 6.89543 20.1046 6 19 6H14M10 6V5C10 3.89543 10.8954 3 12 3C13.1046 3 14 3.89543 14 5V6M10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6M9 14C10.1046 14 11 13.1046 11 12C11 10.8954 10.1046 10 9 10C7.89543 10 7 10.8954 7 12C7 13.1046 7.89543 14 9 14ZM9 14C10.3062 14 11.4174 14.8348 11.8292 16M9 14C7.69378 14 6.58249 14.8348 6.17065 16M15 11H18M15 15H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg></span></div><select class="form-control" id="dpto" name="dpto" data-validation="required">
                            <optgroup >
                                <option value="" disabled="disabled" selected="selected">Seleccione un departamento</option>
                            </optgroup>
                            <optgroup label="Bodega">
                                <option value="CAJAS">CAJAS</option>
                                <option value="CARNICERIA">CARNICERIA</option>
                                <option value="CENTRO AUDITIVO">CENTRO AUDITIVO</option>
                                <option value="CENTRO LLANTERO">CENTRO LLANTERO</option>
                                <option value="FARMACIA">FARMACIA</option>
                                <option value="FUENTE DE SODAS">FUENTE DE SODAS</option>
                                <option value="GERENCIA">GERENCIA</option>
                                <option value="MANTENIMIENTO">MANTENIMIENTO</option>
                                <option value="MEMBRESIAS">MEMBRESIAS</option>
                                <option value="MERCADERIAS">MERCADERIAS</option>
                                <option value="OPTICA">OPTICA</option>
                                <option value="PANADERIA">PANADERIA</option>
                                <option value="PREVISION DE RIESGOS">PREVISION DE RIESGOS</option>
                                <option value="RECIBO">RECIBO</option>
                                <option value="RECURSOS HUMANOS">RECURSOS HUMANOS</option>
                                <option value="SERVICIO A CLIENTES">SERVICIO A CLIENTES</option>
                                <option value="DELI">DELI</option>
                                <option value="SERVICIO MEDICO">SERVICIO MEDICO</option>
                                <option value="VENTAS">VENTAS</option>
                            </optgroup>
                            <optgroup label="Depot">
                                <option value="EMBARQUES">EMBARQUES</option>
                                <option value="GERENCIA ">GERENCIA </option>
                                <option value="MANTENIMIENTO">MANTENIMIENTO</option>
                                <option value="RECIBO">RECIBO</option>
                                <option value="SERVICIO MEDICO">SERVICIO MEDICO</option>
                                <option value="SORT">SORT</option>
                                <option value="TARIMAS">TARIMAS</option>
                                <option value="TIF TIPO INSPECCION FEDERAL">TIF TIPO INSPECCION FEDERAL</option>
								<option value="OPERACIONES">OPERACIONES</option>
                            </optgroup>
                            <optgroup label="Gas">
                                <option value="GASOLINERA">GASOLINERA</option>
                            </optgroup>
                            <optgroup label="Laboratorio de optica">
                                <option value="DISTRIBUCION">DISTRIBUCION</option>
                                <option value="GERENCIA">GERENCIA</option>
                                <option value="MANTENIMIENTO ">MANTENIMIENTO</option>
                                <option value="PRODUCCION ">PRODUCCION</option>
								<option value="OPERACIONES ">OPERACIONES</option>
                            </optgroup>
                            <optgroup label="Oficinas">
                                <option value="AUDITORIA">AUDITORIA</option>
                                <option value="COMPRAS">COMPRAS</option>
                                <option value="CONTRALORÍA">CONTRALORÍA</option>
                                <option value="DIRECCION">DIRECCION</option>                      
                                <option value="E-COMMERCE">E-COMMERCE</option>
                                <option value="FINANZAS /TESORERIA">FINANZAS /TESORERIA</option>
                                <option value="LEGAL">LEGAL</option>
                                <option value="MERCADOTECNIA">MERCADOTECNIA</option>
                                <option value="OPERACIONES">OPERACIONES</option>
                                <option value="REAL ESTATE">REAL ESTATE</option>
                                <option value="RECURSOS HUMANOS">RECURSOS HUMANOS</option>
                                <option value="SISTEMAS">SISTEMAS</option>
                                <option value="TRAFICO E IMPORTACIONES">TRAFICO E IMPORTACIONES</option>
                            </optgroup>

                        </select>
                    </div>
                </div>
                <div class="form-group"><label>Edad</label>
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend"><span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="font-size: 24px;">
                                    <path d="M8 7V3M16 7V3M7 11H17M5 21H19C20.1046 21 21 20.1046 21 19V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V19C3 20.1046 3.89543 21 5 21Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg></span></div><select class="form-control" id="edad" name="edad" data-validation="required">
                            <optgroup >
                                <option value="" selected="selected" disabled="">Seleccione su rango de edad</option>
                                <option value="1">18 a 24 años</option>
                                <option value="2">25 a 29 años</option>
                                <option value="3">30 a 34 años</option>
                                <option value="4">35 a 39 años</option>
                                <option value="5">40 a 44 años</option>
                                <option value="6">45 a 49 años</option>
                                <option value="7">50 a 54 años</option>
                                <option value="8">55 a 59 años</option>
                                <option value="9">60 a 64 años</option>
                                <option value="10">65 años o mas</option>
                        </select>
                    </div>
                </div>
                <div class="form-group"><label>Antigüedad</label>
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend"><span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="font-size: 24px;">
                                    <path d="M21 13.2554C18.2207 14.3805 15.1827 15 12 15C8.8173 15 5.7793 14.3805 3 13.2554M16 6V4C16 2.89543 15.1046 2 14 2H10C8.89543 2 8 2.89543 8 4V6M12 12H12.01M5 20H19C20.1046 20 21 19.1046 21 18V8C21 6.89543 20.1046 6 19 6H5C3.89543 6 3 6.89543 3 8V18C3 19.1046 3.89543 20 5 20Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg></span></div><select class="form-control" id="antig" name="antig" data-validation="required">
                            <optgroup>
                                <option value="" selected="selected" disabled>Seleccione antigüedad</option>
                                <option value="1">Menos de 1 año</option>
                                <option value="2">de 1 a 3 años</option>
                                <option value="3">de 4 a 6 años</option>
                                <option value="4">de 7 a 10 años</option>
                                <option value="5">de 11 a 14 años</option>
                                <option value="6">de 15 a 19 años</option>
                                <option value="7">de 20 a 25 años</option>
                                <option value="8">Más de 25 años</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="form-group"><label>Género</label>
                    <div class="input-group input-group-lg">
                        <div class="input-group-prepend"><span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="font-size: 24px;">
                                    <path d="M12 4.35418C12.7329 3.52375 13.8053 3 15 3C17.2091 3 19 4.79086 19 7C19 9.20914 17.2091 11 15 11C13.8053 11 12.7329 10.4762 12 9.64582M15 21H3V20C3 16.6863 5.68629 14 9 14C12.3137 14 15 16.6863 15 20V21ZM15 21H21V20C21 16.6863 18.3137 14 15 14C13.9071 14 12.8825 14.2922 12 14.8027M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg></span></div><select class="form-control" id="sexo" name="sexo" data-validation="required">
                            <optgroup>
                                <option value="" selected="selected" disabled="">Seleccione su Género</option>
                                <option value="MASCULINO">Masculino</option>
                                <option value="FEMENINO">Femenino</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="form-group" style="text-align: center;"><button class="btn btn-outline-primary btn-block btn-lg" type="submit">Guardar datos</button></div>
            </form>

        </div>
    </section>
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
    <script src="assets/js/form_validator/jquery.form-validator.min.js"></script>
    <script src="assets/js/swal/sweetalert2.all.min.js"></script>
    <script>
        $.validate({
            form: '#demograficos',
            modules: 'html5,security',
            lang: 'es',
            onError: function() {
                Swal.fire({
                    icon: "error",
                    title: "¡Espera!",
                    text: "Hace falta responder preguntas, revisa por favor las respuestas marcadas como pendientes y contesta.",
                    confirmButtonText: 'Continuar',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                })
            },
        });
    </script>
</body>

</html>