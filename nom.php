<?php
$avance = false;
$preguntas = false;
include("php/session_mainfile.php");
include("php/config/db.php");
include("php/funciones/perfiles.php");
include("php/funciones/avance.php");
include("php/funciones/ruta.php");
include("php/funciones/sqldata.php");
include("php/funciones/selecciona_preguntas.php");

if (!function_exists('nom035_h')) {
    function nom035_h($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

// Saneo de GET parameters
$bloqueParam = trim((string) ($_GET['b'] ?? ''));
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
    <link rel="stylesheet" href="assets/css/form-validator/theme-default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="assets/css/steps-progressbar.css">
</head>

<body style="font-family: 'Gotham Regular';">
<nav class="navbar navbar-light navbar-expand-md  bg-white navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="home.php"><img class="img-fluid" data-aos="fade" src="assets/img/logo1.png" width="100px"></a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="php/logout.php">Salir</a></li>
            </ul>
        </div>
    </nav>
    <section class="py-5 mt-5 pb-xl-0 mt-xl-0 pt-xl-0">
        <div class="container">
            <div class="row">
                <div class="col-2 col-md-2 col-lg-1 text-center align-self-center pt-xl-2 pb-xl-2 pt-3 pb-3"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pencil-square" style="color: var(--blue);font-size: 34px;">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                    </svg></div>
                <div class="col-10 col-md-10 col-lg-11 text-right pt-xl-2 pb-xl-2 pt-3 pb-3 mr-0 pr-3">
                    <h1 class="p-0 m-0" style="text-align: left;font-family: 'Gotham Black';color: var(--blue);">Encuesta NOM-035</h1>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col mt-xl-3 mb-xl-3">
                            <ul class="progressbar w-100">
                                <li class="<?php if ($usuario_avance_bloque_1 == 0 || $usuario_avance_bloque_1 == 1) {
                                                echo "active";
                                            } else {
                                                echo "";
                                            } ?>">Bloque 1</li>
                                <li class="<?php if ($usuario_avance_bloque_1 == 1) {
                                                echo "active";
                                            } else {
                                                echo "";
                                            } ?>">Bloque 2</li>
                                <li class="<?php if ($usuario_avance_bloque_2 == 1) {
                                                echo "active";
                                            } else {
                                                echo "";
                                            } ?>">Bloque 3</li>
                                <li class="<?php if ($usuario_avance_bloque_3 == 1) {
                                                echo "active";
                                            } else {
                                                echo "";
                                            } ?>">Bloque 4</li>
                                <li class="<?php if ($usuario_avance_bloque_4 == 1) {
                                                echo "active";
                                            } else {
                                                echo "";
                                            } ?>">Bloque 5</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h4>Bloque <?php echo nom035_h($bloqueParam); ?></h4>
                </div>
            </div>
        </div>
    </section>
    <div class="container p-0">
        <form action="php/bloques/guardar.php" method="post" id="nom">
            <input type="hidden" name="bloque" value="<?php echo nom035_h($bloqueParam); ?>">
            <div>
                <table class="table table-striped table-hover table-bordered table-sm tableFixHead">
                    <thead>
                        <tr>
                            <th class="table-dark" colspan="2"></th>
                            <th class="table-dark text-center">Siempre</th>
                            <th class="table-dark text-center">Casi Siempre</th>
                            <th class="table-dark text-center">Algunas veces</th>
                            <th class="table-dark text-center">Casi nunca</th>
                            <th class="table-dark text-center">Nunca</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        $titulo = "";
                        $n = 1;
                        $style = "";
                        $id_tr = "";
                        $cls="";
                        while ($preg_stmt->fetch()) {
                            if ($pregunta_titutlo_bloque != $titulo) {
                               
                                $titulo = $pregunta_titutlo_bloque;
                                if ($_GET['b'] == 5) {
                                    switch ($titulo) {
                                        case 'Las preguntas siguientes están relacionadas con la atención a clientes y usuarios.':
                                            $ncampo = "atencion_clientes";
                                            $preg_sino = "En mi trabajo debo brindar servicio a clientes o usuarios:";
                                            $style = 'style="display:none;"';
                                            $id_tr = 'class="tr_atencion_clientes"';
                                            $cls="tr_atencion_clientes";
                                            break;
                                        case 'Las preguntas siguientes estan relacionadas con las actitudes de las personas que supervisa.':
                                            $ncampo = "soy_jefe";
                                            $preg_sino = "Soy jefe de otros trabajadores:  ";
                                            $style = 'style="display:none;"';
                                            $id_tr = 'class="tr_soy_jefe"';
                                            $cls="tr_soy_jefe";
                                            break;
                                        default:
                                            # code...
                                            break;
                                    }

                                    echo '<tr><td colspan="7" class="text-white" style="background-color:#056D89">';
                        ?> <label for="<?php echo $ncampo; ?>">
                                        <?php echo $preg_sino; ?>
                                    </label>
                                    <select name="<?php echo $ncampo; ?>" id="<?php echo $ncampo; ?>" class="form-control" data-validation="required" data-validation-error-msg="Esta pregunta debe ser contestada.">
                                        <optgroup>
                                            <option value="" disabled="disabled" selected="disabled">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">NO</option>
                                        </optgroup>
                                    </select>
                            <?php
                                    '</td></tr>';
                                    echo '<tr><td colspan="7" style="background-color:#056D89" class="text-white '.$cls.'" '.$style.'>' . $pregunta_titutlo_bloque . '</td></tr>';
                                }else{
                                    echo '<tr><td colspan="7" style="background-color:#056D89" class="text-white '.$cls.'">' . $pregunta_titutlo_bloque . '</td></tr>';
                                }
                                
                            }
                            ?>

                            <tr <?php echo  $id_tr; ?> <?php echo $style; ?>>
                                <td>
                                    <p><?php echo $pregunta_id; ?></p>
                                </td>
                                <td>
                                    <p><span><?php echo $pregunta_reactivo; ?></span><br></p>
                                    <p id="<?php echo "err_".$pregunta_item ?>"></p>
                                </td>
                                <td class="my-auto text-center text-center"><input type="radio" class="radioButton" value="<?php echo $pregunta_siempre; ?>" name="<?php echo "item_" . $pregunta_item; ?>" data-validation="required" data-validation-error-msg="Esta pregunta debe ser contestada." data-validation-error-msg-container="<?php echo "#err_".$pregunta_item ?>"></td>
                                <td class="my-auto text-center text-center"><input type="radio" class="radioButton" value="<?php echo $pregunta_casi_siempre; ?>" name="<?php echo "item_" . $pregunta_item; ?>"></td>
                                <td class="my-auto text-center text-center"><input type="radio" class="radioButton" value="<?php echo $pregunta_algunas_veces; ?>" name="<?php echo "item_" . $pregunta_item; ?>"></td>
                                <td class="my-auto text-center text-center"><input type="radio" class="radioButton" value="<?php echo $pregunta_casi_nunca; ?>" name="<?php echo "item_" . $pregunta_item; ?>"></td>
                                <td class="my-auto text-center text-center"><input type="radio" class="radioButton" value="<?php echo $pregunta_nunca; ?>" name="<?php echo "item_" . $pregunta_item; ?>"></td>
                            </tr>
                        <?php
                            $n++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>

    </div>
    <div class="container">
        <div class="form-group mt-xl-3" style="text-align: center;"><button class="btn btn-outline-primary btn-block btn-lg" type="submit">Guardar respuestas</button></div>
    </div>
    </form>
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
    <script src="assets/js/videomodal_visto.js"></script>
    <script src="assets/js/videomodal.js"></script>
    <script src="assets/js/nom_resp_final.js"></script>
    <script>
var $th = $('.tableFixHead').find('thead th')
$('.tableFixHead').on('scroll', function() {
  $th.css('transform', 'translateY('+ this.scrollTop +'px)');
});        
    </script>
</body>

</html>