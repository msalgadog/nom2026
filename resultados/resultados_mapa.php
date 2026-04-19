<?php
include("../php/session_mainfile.php");
include("../php/config/db.php");
$comp = 0;
$js_var_grupo = 0;
$js_var_distrito = 0;
$js_var_localidad  = 0;
$js_var_departamento = 0;
$js_var_edad = 0;
$js_var_gen  = 0;
$c1          = "";
$c2          = "";
$c3          = "";
$c4          = "";
$c5          = "";
$c6          = "";
$c7          = "";
if (isset($_GET['comp'])) {
  if ($_GET['comp'] == "") {
    $v1 = "TODOS";
  } else {
    $v1 = $_GET['comp'];
  }
  $comp = $_GET['comp'];
  $c1   = '<li class="breadcrumb-item"><span><strong>Compañia:</strong> '  . $v1 . '</span></li>';
}
if (isset($_GET['grupo'])) {
  if ($_GET['grupo'] == "") {
    $v2 = "TODOS";
  } else {
    $v2 = $_GET['comp'];
  }
  $js_var_grupo = $_GET['grupo'];
  $c2   = '<li class="breadcrumb-item"><span><strong>Grupo:</strong> '  . $v2 . '</span></li>';
}
if (isset($_GET['distrito'])) {
  if ($_GET['distrito'] == "") {
    $v3 = "TODOS";
  } else {
    $v3 = $_GET['comp'];
  }
  $js_var_distrito = $_GET['distrito'];
  $c3   = '<li class="breadcrumb-item"><span><strong>Distrito:</strong> '  . $v3 . '</span></li>';
}
if (isset($_GET['localidad'])) {
  if ($_GET['localidad'] == "") {
    $v4 = "TODOS";
  } else {
    $v4 = $_GET['comp'];
  }
  $js_var_localidad = $_GET['localidad'];
  $c4  = '<li class="breadcrumb-item"><span><strong>Localidad:</strong> '  . $v4 . '</span></li>';
}
if (isset($_GET['dpto'])) {
  if ($_GET['dpto'] == "") {
    $v5 = "TODOS";
  } else {
    $v5 = $_GET['comp'];
  }
  $js_var_departamento = $_GET['dpto'];
  $c5   = '<li class="breadcrumb-item"><span><strong>Departamento:</strong> '  . $v5 . '</span></li>';
}

if (($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['rp']) && $_GET['rp'] == 1)||$usuarios_perfil == 4) {
 
  if ($usuarios_perfil == 4) {
    $mapa=1;
    include("funciones/extrae_respuestas_distrito.php");
  }else{
    include("funciones/extrae_respuestas.php");
  }
  
  if (property_exists($r, "TOLUCA")) {
    $TOLUCA = $r->TOLUCA->TEXTO;
  } else {
    $TOLUCA = "Sin Dato";
  }
  if (property_exists($r, "ATIZAPAN")) {
    $ATIZAPAN = $r->ATIZAPAN->TEXTO;
  } else {
    $ATIZAPAN = "Sin Dato";
  }
  if (property_exists($r, "OFICINAS")) {
    $OFICINAS = $r->OFICINAS->TEXTO;
  } else {
    $OFICINAS = "Sin Dato";
  }
  if (property_exists($r, "MIXCOAC")) {
    $MIXCOAC = $r->MIXCOAC->TEXTO;
  } else {
    $MIXCOAC = "Sin Dato";
  }
  if (property_exists($r, "POLANCO")) {
    $POLANCO = $r->POLANCO->TEXTO;
  } else {
    $POLANCO = "Sin Dato";
  }
  if (property_exists($r, "LINDAVISTA")) {
    $LINDAVISTA = $r->LINDAVISTA->TEXTO;
  } else {
    $LINDAVISTA = "Sin Dato";
  }
  if (property_exists($r, "VILLA_COAPA")) {
    $VILLA_COAPA = $r->VILLA_COAPA->TEXTO;
  } else {
    $VILLA_COAPA = "Sin Dato";
  }
  if (property_exists($r, "DEPOT")) {
    $DEPOT = $r->DEPOT->TEXTO;
  } else {
    $DEPOT = "Sin Dato";
  }
  if (property_exists($r, "LABORATORIO_OPTICA")) {
    $LABORATORIO_OPTICA = $r->LABORATORIO_OPTICA->TEXTO;
  } else {
    $LABORATORIO_OPTICA = "Sin Dato";
  }
  if (property_exists($r, "INTERLOMAS")) {
    $INTERLOMAS = $r->INTERLOMAS->TEXTO;
  } else {
    $INTERLOMAS = "Sin Dato";
  }
  if (property_exists($r, "SATELITE")) {
    $SATELITE = $r->SATELITE->TEXTO;
  } else {
    $SATELITE = "Sin Dato";
  }
  if (property_exists($r, "ARBOLEDAS")) {
    $ARBOLEDAS = $r->ARBOLEDAS->TEXTO;
  } else {
    $ARBOLEDAS = "Sin Dato";
  }
  /* */
  if (property_exists($r, "TOLUCA")) {
    $TOLUCA_COLOR = $r->TOLUCA->COLOR;
  } else {
    $TOLUCA_COLOR = "rgb(0, 0, 0)";
  }
  if (property_exists($r, "ATIZAPAN")) {
    $ATIZAPAN_COLOR = $r->ATIZAPAN->COLOR;
  } else {
    $ATIZAPAN_COLOR = "rgb(0, 0, 0)";
  }
  if (property_exists($r, "OFICINAS")) {
    $OFICINAS_COLOR = $r->OFICINAS->COLOR;
  } else {
    $OFICINAS_COLOR = "rgb(0, 0, 0)";
  }
  if (property_exists($r, "MIXCOAC")) {
    $MIXCOAC_COLOR = $r->MIXCOAC->COLOR;
  } else {
    $MIXCOAC_COLOR = "rgb(0, 0, 0)";
  }
  if (property_exists($r, "POLANCO")) {
    $POLANCO_COLOR = $r->POLANCO->COLOR;
  } else {
    $POLANCO_COLOR = "rgb(0, 0, 0)";
  }
  if (property_exists($r, "LINDAVISTA")) {
    $LINDAVISTA_COLOR = $r->LINDAVISTA->COLOR;
  } else {
    $LINDAVISTA_COLOR = "rgb(0, 0, 0)";
  }
  if (property_exists($r, "COAPA")) {
    $COAPA_COLOR = $r->COAPA->COLOR;
  } else {
    $COAPA_COLOR = "rgb(0, 0, 0)";
  }
  if (property_exists($r, "DEPOT")) {
    $DEPOT_COLOR = $r->DEPOT->COLOR;
  } else {
    $DEPOT_COLOR = "rgb(0, 0, 0)";
  }
  if (property_exists($r, "LABORATORIO_OPTICA")) {
    $LABORATORIO_OPTICA_COLOR = $r->LABORATORIO_OPTICA->COLOR;
  } else {
    $LABORATORIO_OPTICA_COLOR = "rgb(0, 0, 0)";
  }
  if (property_exists($r, "INTERLOMAS")) {
    $INTERLOMAS_COLOR = $r->INTERLOMAS->COLOR;
  } else {
    $INTERLOMAS_COLOR = "rgb(0, 0, 0)";
  }
  if (property_exists($r, "SATELITE")) {
    $SATELITE_COLOR = $r->SATELITE->COLOR;
  } else {
    $SATELITE_COLOR = "rgb(0, 0, 0)";
  }
  if (property_exists($r, "ARBOLEDAS")) {
    $ARBOLEDAS_COLOR = $r->ARBOLEDAS->COLOR;
  } else {
    $ARBOLEDAS_COLOR = "rgb(0, 0, 0)";
  }

  #$CDMX = '<div class="row"><div class="col-12" style="background-color:#ffffff;">Hola</div></div>';
  
  $CDMX = '<ul class="list-group text-dark">
    <li class="list-group-item" style="background-color: ' . $TOLUCA_COLOR . '!important;">TOLUCA: Riesgo: <span class="badge badge-primary">' . $TOLUCA . '</span></li>
    <li class="list-group-item" style="background-color: ' . $ATIZAPAN_COLOR . ';">ATIZAPÁN: Riesgo: <span class="badge badge-primary">' . $ATIZAPAN . '</span></li>
    <li class="list-group-item" style="background-color: ' . $OFICINAS_COLOR . ';" >OFICINAS: Riesgo: <span class="badge badge-primary">' . $OFICINAS . '</span></li>
    <li class="list-group-item" style="background-color: ' . $MIXCOAC_COLOR . ';">MIXCOAC: Riesgo: <span class="badge badge-primary">' . $MIXCOAC . '</span></li>
    <li class="list-group-item" style="background-color: ' . $POLANCO_COLOR . ';">POLANCO: Riesgo: <span class="badge badge-primary">' . $POLANCO . '</span></li>
    <li class="list-group-item" style="background-color: ' . $LINDAVISTA_COLOR . ';">LINDAVISTA: Riesgo: <span class="badge badge-primary">' . $LINDAVISTA . '</span></li>
    <li class="list-group-item" style="background-color: ' . $COAPA_COLOR . ';">VILLA COAPA: Riesgo: <span class="badge badge-primary">' . $COAPA . '</span></li>
    <li class="list-group-item" style="background-color: ' . $DEPOT_COLOR . ';">DEPOT: Riesgo: <span class="badge badge-primary">' . $DEPOT . '</span></li>
    <li class="list-group-item" style="background-color: ' . $LABORATORIO_OPTICA_COLOR . ';">LABORATORIO ÓPTICA: Riesgo: <span class="badge badge-primary">' . $LABORATORIO_OPTICA . '</span></li>
    <li class="list-group-item" style="background-color: ' . $INTERLOMAS_COLOR . ';">INTERLOMAS: Riesgo: <span class="badge badge-primary">' . $INTERLOMAS . '</span></li>
    <li class="list-group-item" style="background-color: ' . $SATELITE_COLOR . ';">SATELITE: Riesgo: <span class="badge badge-primary">' . $SATELITE . '</span></li>
    <li class="list-group-item" style="background-color: ' . $ARBOLEDAS_COLOR . ';">ARBOLEDAS: Riesgo: <span class="badge badge-primary">' . $ARBOLEDAS . '</span></li></ul>';
  
} else {
  echo "NANAIZ";
  $r = NULL;
}


?><?php  ?>
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
  <style>
    .tooltip-inner {
      min-width: 290px;
      /* the minimum width */
      text-align: left;
    }
  </style>
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
    <div class="container py-4 py-xl-5 mb-xl-0 pb-xl-2" data-toggle="tooltip" data-bss-tooltip="" style="margin-top: -1px;padding-bottom: 22px;margin-bottom: -10px;">
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
              <h1 class="p-0 m-0" style="text-align: left;font-family: 'Gotham Black';color: var(--blue);">REPORTE CALIFICACIÓN FINAL</h1>
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
            <li class="breadcrumb-item active" aria-current="page"><span>Reporte calificación final</span></li>
          </ol>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="row">
            <div class="col">
            <?php if($usuarios_perfil != 4): ?>
              <form action="resultados_mapa.php" method="get" id="resultados_mapa" name="resultados_mapa"><input class="form-control" type="hidden" name="rp" value="1"><input type="hidden" name="mapa" value="1">
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
                                if ($_GET['comp'] == "TODOS") {
                                  echo '<option value="TODOS" selected>TODOS </option>';
                                  $seltodos = 1;
                                } else {
                                  echo '<option value="TODOS">TODOS </option>';
                                  $seltodos = "";
                                }
                                while ($com_row = mysqli_fetch_assoc($com_exe)) {
                                  $sel = "";
                                  if (isset($_GET['comp'])) {
                                    if ($com_row['empleados_comp'] == $_GET['comp']) {
                                      $sel = 'selected';
                                    }
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
<?php endif;?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php if (($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['rp']) && $_GET['rp'] == 1)||$usuarios_perfil == 4) : ?>
    <div class="container">
      <ol class="breadcrumb">
        <?php echo $c1 . " " . $c2 . " " . $c3 . " " . $c4 . " " . $c5; ?>
      </ol>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 997.11 730.28">
            <defs>
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34" data-name="åçûìßííûé ãðàäèåíò 34" x1="552.61" y1="593.56" x2="570.5" y2="593.56" gradientTransform="matrix(1, 0, 0, 1, 0, 0)" gradientUnits="userSpaceOnUse">
                <stop offset=".48" stop-color="#e30613" />
                <stop offset=".51" stop-color="#d10505" />
              </linearGradient>
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="555.13" y1="589.04" x2="568.35" y2="589.04" gradientTransform="matrix(1, 0, 0, 1, 0, 0)" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#c9c8c8" />
                <stop offset=".06" stop-color="#d8d8d8" />
                <stop offset=".13" stop-color="#e2e2e2" />
                <stop offset=".21" stop-color="#e6e6e6" />
                <stop offset=".29" stop-color="#ececec" />
                <stop offset=".55" stop-color="#fff" />
                <stop offset="1" stop-color="#fff" />
              </linearGradient>
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-2" data-name="åçûìßííûé ãðàäèåíò 34" x1="551.03" y1="564.33" x2="568.93" y2="564.33" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-2" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="553.55" y1="559.81" x2="566.77" y2="559.81" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-3" data-name="åçûìßííûé ãðàäèåíò 34" x1="973.15" y1="459.82" x2="991.05" y2="459.82" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-3" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="975.67" y1="455.3" x2="988.89" y2="455.3" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-4" data-name="åçûìßííûé ãðàäèåíò 34" x1="913.15" y1="457.41" x2="931.05" y2="457.41" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-4" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="915.67" y1="452.89" x2="928.89" y2="452.89" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-5" data-name="åçûìßííûé ãðàäèåíò 34" x1="776.09" y1="598.33" x2="793.99" y2="598.33" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-5" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="778.61" y1="593.81" x2="791.83" y2="593.81" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-6" data-name="åçûìßííûé ãðàäèåíò 34" x1="698.09" y1="596.33" x2="715.99" y2="596.33" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-6" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="700.61" y1="591.81" x2="713.83" y2="591.81" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-7" data-name="åçûìßííûé ãðàäèåíò 34" x1="652.71" y1="567.33" x2="670.6" y2="567.33" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-7" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="655.22" y1="562.81" x2="668.45" y2="562.81" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-8" data-name="åçûìßííûé ãðàäèåíò 34" x1="589.71" y1="575.33" x2="607.6" y2="575.33" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-8" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="592.22" y1="570.81" x2="605.45" y2="570.81" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-9" data-name="åçûìßííûé ãðàäèåíò 34" x1="472.57" y1="551.5" x2="490.46" y2="551.5" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-9" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="475.08" y1="546.98" x2="488.31" y2="546.98" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-10" data-name="åçûìßííûé ãðàäèåíò 34" x1="426.57" y1="489.5" x2="444.46" y2="489.5" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-10" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="429.08" y1="484.98" x2="442.31" y2="484.98" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-11" data-name="åçûìßííûé ãðàäèåíò 34" x1="405.57" y1="508.5" x2="423.46" y2="508.5" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-11" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="408.08" y1="503.98" x2="421.31" y2="503.98" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-12" data-name="åçûìßííûé ãðàäèåíò 34" x1="328.57" y1="538.5" x2="346.46" y2="538.5" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-12" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="331.08" y1="533.98" x2="344.31" y2="533.98" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-13" data-name="åçûìßííûé ãðàäèåíò 34" x1="433.57" y1="454.88" x2="451.46" y2="454.88" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-13" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="436.08" y1="450.36" x2="449.31" y2="450.36" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-14" data-name="åçûìßííûé ãðàäèåíò 34" x1="469.57" y1="513.88" x2="487.46" y2="513.88" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-14" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="472.08" y1="509.36" x2="485.31" y2="509.36" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-15" data-name="åçûìßííûé ãðàäèåíò 34" x1="474.57" y1="483.88" x2="492.46" y2="483.88" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-15" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="477.08" y1="479.12" x2="490.31" y2="479.12" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-16" data-name="åçûìßííûé ãðàäèåíò 34" x1="499.57" y1="491.88" x2="517.46" y2="491.88" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-16" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="502.08" y1="487.36" x2="515.31" y2="487.36" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-17" data-name="åçûìßííûé ãðàäèåíò 34" x1="499.57" y1="449.32" x2="517.46" y2="449.32" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-17" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="502.08" y1="444.8" x2="515.31" y2="444.8" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-18" data-name="åçûìßííûé ãðàäèåíò 34" x1="238.74" y1="301.67" x2="256.64" y2="301.67" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-18" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="241.26" y1="297.15" x2="254.49" y2="297.15" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-19" data-name="åçûìßííûé ãðàäèåíò 34" x1="317.74" y1="205.67" x2="335.64" y2="205.67" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-19" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="320.26" y1="201.15" x2="333.49" y2="201.15" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-20" data-name="åçûìßííûé ãðàäèåíò 34" x1="283.74" y1="95.67" x2="301.64" y2="95.67" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-20" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="286.26" y1="91.15" x2="299.49" y2="91.15" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-21" data-name="åçûìßííûé ãðàäèåíò 34" x1="28.74" y1="77.67" x2="46.64" y2="77.67" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-21" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="31.26" y1="73.15" x2="44.49" y2="73.15" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-22" data-name="åçûìßííûé ãðàäèåíò 34" x1="25.74" y1="15.24" x2="43.64" y2="15.24" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-22" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="28.26" y1="10.72" x2="41.49" y2="10.72" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-23" data-name="åçûìßííûé ãðàäèåíò 34" x1="5.74" y1="26.24" x2="23.64" y2="26.24" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-23" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="8.26" y1="21.72" x2="21.49" y2="21.72" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-24" data-name="åçûìßííûé ãðàäèåíò 34" x1="194.74" y1="192.24" x2="212.64" y2="192.24" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-24" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="197.26" y1="187.72" x2="210.49" y2="187.72" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-25" data-name="åçûìßííûé ãðàäèåíò 34" x1="179.74" y1="393.24" x2="197.64" y2="393.24" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-25" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="182.26" y1="388.72" x2="195.49" y2="388.72" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-26" data-name="åçûìßííûé ãðàäèåíò 34" x1="47.74" y1="13.24" x2="65.64" y2="13.24" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-26" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="50.26" y1="8.72" x2="63.49" y2="8.72" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-27" data-name="åçûìßííûé ãðàäèåíò 34" x1="525.74" y1="495" x2="543.64" y2="495" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-27" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="528.26" y1="490.48" x2="541.49" y2="490.48" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-28" data-name="åçûìßííûé ãðàäèåíò 34" x1="454.74" y1="280" x2="472.64" y2="280" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-28" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="457.26" y1="275.48" x2="470.49" y2="275.48" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-29" data-name="åçûìßííûé ãðàäèåíò 34" x1="508.74" y1="302" x2="526.64" y2="302" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-29" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="511.26" y1="297.48" x2="524.49" y2="297.48" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-30" data-name="åçûìßííûé ãðàäèåíò 34" x1="499.74" y1="334" x2="517.64" y2="334" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-30" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="502.26" y1="329.48" x2="515.49" y2="329.48" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
              <linearGradient id="_çûìßííûé_ãðàäèåíò_34-31" data-name="åçûìßííûé ãðàäèåíò 34" x1="528.09" y1="320.9" x2="545.99" y2="320.9" xlink:href="#_çûìßííûé_ãðàäèåíò_34" />
              <linearGradient id="_îâûé_îáðàçåö_ãðàäèåíòà_1-31" data-name="Íîâûé îáðàçåö ãðàäèåíòà 1" x1="530.61" y1="316.38" x2="543.83" y2="316.38" xlink:href="#_îâûé_îáðàçåö_ãðàäèåíòà_1" />
            </defs>
            <g isolation="isolate">
              <g id="Capa_2" data-name="Capa 2">
                <g id="Capa_1-2" data-name="Capa 1">
                  <g>
                    <path d="M73.31,24.82l113.56,60,65.43,5.36,.65,13.25,1.74,1.16,.65,13.9,1.16,1.16,.58,22.22-1.23,14.48-.51,7.74-3.04,1.23v20.92l.65,4.85-1.88,4.78-.58,8.4v3.62l-16.79-1.16,1.74,7.82,1.23,6.59,3.04,6.01,2.39,4.78,3.62,.65,.58,2.97-1.81,1.16,1.81,1.23,.65,1.16v15.05l-.65,2.46,.65,1.74,4.13,2.39-2.97,7.82-19.83,14.98-1.81,1.88-1.16-3.62-3.04,1.23v-4.27l-1.81-4.2-.58-1.81-2.46-2.97-2.39-.65h-2.39l-6.59-1.74-2.39-3.62-1.23-2.39,1.23-3.04-1.23-2.39-1.16-2.39-1.88-2.46-2.39,1.23h-2.39l-2.39-1.74-2.39-2.46-2.46-1.81-1.74-2.39,1.23-2.39-.65-2.46-1.23-2.39-1.74-2.39v-2.39l-1.23-2.39-2.39-1.23,1.74-2.39h2.46l.65-2.39-2.46-2.39-2.39-.58-2.39-.65-2.39-.58-2.39-1.16-3.04-1.23-2.97-2.39-2.46-1.88-1.74-2.39-1.81-2.39-1.23-3.62-.58-2.39-1.16-2.39-2.46-1.74-2.39-.65-2.39-1.81-1.81-2.39-.58-2.39-.65-2.39-1.23-2.39-1.16-2.39-.58-2.46-.65-2.39-2.39-2.39-.65-2.39-.58-2.39v-2.46l-.58-2.39-.58-2.39-1.23-2.39-1.16-2.39-1.88-2.39-1.16-2.46-1.23-2.39-1.74-2.39-1.23-2.39v-2.39l-.65-2.39-.58-2.46-1.16-2.39-1.88-2.39-.51-2.39v-2.39l-.65-2.46v-2.39l-.58-2.39-.65-2.39-1.74-2.39v-4.85l-.65-2.39-1.23-2.39-1.74-2.39-.65-2.39-1.74-2.46v-9.55l1.74-2.39v-2.46l.65-2.39,.58-2.39-2.39-1.74-2.46-1.88-2.39-1.16-2.39-.58-2.39-.65-2.39-.58-1.23-4.78-1.16-2.46-1.23-2.39-2.39-1.23h-4.85l-2.97,.65h-2.39l-2.39-1.23-2.39-1.81-2.39-2.39-2.46-2.46-2.39-1.74-1.81-2.39-2.32-1.88-2.39-1.16-1.88-2.39-2.39-2.39-2.39-1.23-2.53-.65,1.23-2.39,1.81-2.39v-2.39l.58-2.46v-2.39l1.88-2.39,2.97-3.04,2.39-.58,1.74-2.39,1.3,1.3" fill="#ccd8dc" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M251.07,260.7l-4.13-2.39-.65-1.74,.65-2.46v-15.05l-.65-1.16-1.81-1.23,1.81-1.16-.58-2.97-3.62-.65-2.39-4.78-3.04-6.01-1.23-6.59-1.74-7.82,16.79,1.16v-3.62l.58-8.4,1.88-4.78-.65-4.85v-20.92l3.04-1.23,.51-7.74,1.23-14.48-.58-22.22-1.16-1.16-.65-13.9-1.74-1.16-.65-13.25,3.04,.65,18.53,.58,.65-17.37,44.44,1.23,2.46,2.9,2.39,2.46,1.81,2.39,1.74,2.39,1.88,2.39,2.39,1.88,.58,2.39,1.81,2.39,2.46,1.74,2.39,2.39,2.39,1.88,1.23,2.97,2.39,2.39,1.74,2.39,1.23,2.39,2.39,2.46,2.39,1.74,2.39,1.81,2.39,1.81,2.46,1.16,2.39,1.88,2.39,2.39,.58,2.39,1.16,2.39v2.39l.65,2.46,1.23,2.39,.58,2.39,1.81,2.39,1.23,2.39,.51,2.39-.51,2.46,.51,2.39,.65,2.39,.58,2.39,.65,2.39,1.16,2.46,1.23,2.39,1.74,2.39,3.04,2.39,2.46-.58,1.74,2.39,2.39,1.81,2.39,2.39,2.39,1.23,2.46,.58,3.04,1.23,1.16,2.39,2.39,1.23,2.46,.58,2.39,1.81,1.74,2.39,2.39,1.23,2.46,.51,2.39,.65,2.39,.58,.65,1.88-25.91,41.33,6.66,47.41-2.39-1.23-2.39-.51-2.39-2.39-2.39-1.88h-2.46l-2.39-.58-2.39,.58-2.39,1.23-1.23,2.39-.65,2.39-1.74,2.39-.65,2.39-1.23,2.46-1.74,2.39-1.81,2.39h-2.39l-2.46-1.74-1.74-2.46-2.39-1.16h-2.39l-2.97,.58-2.46-1.23-2.39-.58-2.39,.58h-2.39l-2.39,.65-2.39-.65-2.46-1.23-2.39-2.97-1.81-2.39-2.46-1.16-2.39-.65-2.39-.58-2.39-2.39-2.39-1.81h-2.39l-2.46,.58-2.39,.58-1.16,2.39v7.24l-1.81,2.39-2.39,.65-2.39,1.16-1.88,2.46v2.39l.65,2.39v2.39l-1.81,2.39-1.88,2.46v2.39l.65,2.97v2.39l-1.16,2.39-1.23,2.39-2.39,1.23-3.04,.65-2.39-.65-2.97-.58h-4.85l-1.16-2.39v-4.85l-2.46-1.81-2.39-1.74v-3.04l1.23-2.46-2.39-1.74-2.46-1.16h-2.39l-2.39-.65-1.23-2.39v-4.85l-.58-2.39v-2.39l.58-2.39v-2.46l-1.16-2.39-1.23-2.39-.65-2.39-1.74-2.39-1.23-2.39-2.39-1.81h-7.17l-2.39-1.81-1.88-.58" fill="#87a4af" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M480.51,355.58l7.24,9.05h8.4l-.58-22.87,2.97-3.55,2.39-1.23h7.24l2.39,.58,3.04,.65,2.97,.51,2.39-.51-.58-2.46-3.04-1.16-2.39-1.23-2.39-1.16-2.39-1.23-2.39-2.39-2.46-2.39-1.74-2.39-1.81-2.46-1.23-2.39-1.23-2.46-3.55-2.97-.58-2.39v-2.39l-.65-2.46-1.23-2.39v-2.39l-1.74-2.39-2.39-.65-2.39-.58-3.26-7.31,3.76-2.24,6.66-7.24,2.97-1.23h2.39l2.46-.58,1.81-2.46,2.39-1.74,1.23-2.39,1.16-2.39-3.04-4.27-4.92-4.34-3.47,3.18-.58-7.24,7.24-5.93,2.39-.65,2.39-1.16,1.81-2.39-.58-2.46,1.23-2.39,2.39-2.39,1.74-2.39h2.39l2.39,1.16,2.46,.65,2.39-1.81,2.39-1.74,1.23-2.46v-2.39l-1.23-2.39-1.23-2.39-1.16-2.39-2.39-2.46-4.2-1.81-1.81-2.39-1.23-2.39-1.23-2.46-1.16-2.39-1.23-2.39-1.16-2.39-2.39-1.74v-2.46l-.58-2.39-1.88-2.39-1.16-2.39-1.23-2.39-.58-2.39-1.16-2.46-.65-2.39-.58-2.39-2.39-2.39-2.39-2.39-1.88-2.46-2.39-2.39-2.39-2.39-2.39-1.23-2.39-.58-2.46-1.23-1.16-2.39-2.39-1.74-1.81-2.46-2.39-1.16h-2.39l-3.04-1.23h-13.25l-2.39-1.16-2.39-.65-2.39,1.81-2.46,1.23-2.39-.65-2.39-.58-2.39,.58-2.32,1.81-1.88,2.46-.51,2.39-.65,2.39v2.39l-.58,2.39-1.23,2.39-.58,2.46-2.46,2.39-.51,2.39-1.23,2.39-1.81,2.39-2.46,1.23-1.16,1.23-25.91,41.33,6.66,47.41,2.39,1.23,1.88,2.39,1.74,2.39,2.39,1.23,1.88,2.39,1.74,2.39,1.23,2.39v3.04l-.58,2.39-.65,2.46-.58,2.39-.58,2.39-.58,2.97,.58,2.39,.58,3.04v2.39l-1.16,2.39-1.88,2.46-1.74,2.39-.65,2.39-1.16,2.39-.58,2.39v2.39l1.23,2.46,1.74,3.55,2.39,1.88,1.81,2.39,.58,2.39,2.39,2.39,2.46,1.23,2.39,.58,2.39,1.16,3.04,1.23h2.39l2.39-1.74,1.23-2.46,1.23-2.39v-2.39l1.74-2.39,2.39-.65,2.39-1.23,2.46-.51h7.17l2.39,1.16,2.46,1.23,2.9,.58,2.46,1.16,2.39,1.23,1.16,2.39,1.88,2.39,2.39,1.88,2.97,1.16,2.39,.58,.65,2.39,1.74,2.39h2.46l2.39-.58,2.39-.58" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M286.54,313.53l-1.16-2.39v-4.85l-2.46-1.81-2.39-1.74v-3.04l1.23-2.46-2.39-1.74-2.46-1.16h-2.39l-2.39-.65-1.23-2.39v-4.85l-.58-2.39v-2.39l.58-2.39v-2.46l-1.16-2.39-1.23-2.39-.65-2.39-1.74-2.39-1.23-2.39-2.39-1.81h-7.17l-2.39-1.81-1.88-.58-2.97,7.82-19.83,14.98-1.81,1.88-1.16,2.39h-4.85l-.51,2.39-.65,2.39-1.23,2.39-1.16,2.46-1.81,2.39,.58,2.39,.65,2.39v4.78l2.97,1.23,2.39,.58,2.39-.58h4.85l2.39,1.23,2.39,1.74,2.39,2.39,3.04,2.39,1.23,2.46,1.16,2.39,2.46,2.39,2.39,1.16,2.39,1.88,1.23,2.39-.65,2.39,1.81,2.39,1.23,2.46,1.74,2.39,.65,2.39,1.23,2.39h2.39l2.39-.65,1.23,3.04v2.46l-1.23,2.39,2.39,1.74,2.39,1.81,1.81,2.46,2.39,1.16h2.39l2.39,1.81,1.88,2.39-3.04,1.16-2.46-.51-2.39-1.23,.65,2.39,2.39,1.81,2.46,1.16,2.39,1.88,2.39,1.16,1.74,2.39,1.23,2.39,.65,2.46v2.39l-.65,2.39,2.39,.58,2.39,1.81,1.81,2.39,.58,2.46,.58,2.39,1.88,2.39,.51,2.39,1.23,2.39,1.81,2.39,2.46,3.62,2.39,2.97,.58,2.39,1.16,2.46,2.39,1.16,1.88,2.39,2.39,1.23,2.39,1.81,2.39,2.39,1.88,2.46,1.16,2.39,.58,2.39,2.39,1.23,2.46,1.74,2.39,.65,2.39,1.16,2.39,.58,2.39,1.88,1.88,2.39,1.16-2.39v-2.46l-.65-2.39v-4.78l.65-2.39,1.81-2.46,1.81-2.39-2.39-2.39-2.39-1.81-1.23-2.39-2.39-2.46-1.88-2.97-.51-2.39-.65-3.04-1.74-2.39-1.23-2.39-.65-2.97v-2.39l-.58-2.39v-2.46l-1.16-2.39-.65-2.39-.58-2.39-.65-2.39-1.16-2.46-1.23-2.39-1.74-2.39-2.39-2.39-2.46-1.81-2.39,1.16-1.81,2.39-2.39,.65-2.46-1.16-1.16-2.46-.65-2.39v-4.78l-.58-2.39-1.16-2.46-1.23-2.39-1.81-2.39-2.46-2.39-1.74-2.39-1.81-2.39-.58-2.46-1.23-2.39-1.81-3.04-.58-2.39-.58-2.97v-2.39l1.16-2.39v-7.24l-.58-2.39,.58-2.39,1.81-.65" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M496.14,364.63l-.58-22.87,2.97-3.55,2.39-1.23h7.24l2.39,.58,3.04,.65,2.97,.51,2.39-.51-.58-2.46-3.04-1.16-2.39-1.23-2.39-1.16-2.39-1.23-2.39-2.39-2.46-2.39-1.74-2.39-1.81-2.46-1.23-2.39-1.23-2.46-3.55-2.97-.58-2.39v-2.39l-.65-2.46-1.23-2.39v-2.39l-1.74-2.39-2.39-.65-2.39-.58-3.26-7.31,3.76-2.24,6.66-7.24,2.97-1.23h2.39l2.46-.58,1.81-2.46,2.39-1.74,1.23-2.39,1.16-2.39-3.04-4.27-4.92-4.34-3.47,3.18-.58-7.24,7.24-5.93,2.39-.65,2.39-1.16,1.81-2.39-.58-2.46,1.23-2.39,2.39-2.39,1.74-2.39h2.39l2.39,1.16,2.46,.65,2.39-1.81,2.39-1.74,1.23-2.46,3.4,2.82-2.39,1.81-2.39,1.81-.58,2.39-.65,2.39,.65,2.39,2.39,1.23,1.81,2.39,.58,2.39v2.39l1.23,2.46,1.23,2.39v4.78l-2.46,1.88,.58,2.39,2.39,2.39v2.39l.65,2.39,2.39,1.23,2.46,1.23,2.39,1.74v2.39l.58,2.39v2.39l1.81,2.46,2.32,1.81,2.39,1.23,1.88,2.39,2.97,1.16,2.39,1.23,2.39,1.74,2.39,1.23,2.39,.65,2.46,.51h2.39l2.39,.65,1.88,2.39,.51,2.46v4.78l-.51,2.39v7.24l2.9,1.16-.51,2.97-1.23,2.39-1.81,2.46-2.46,2.39-1.74,2.39-2.39,1.81h-2.39l-3.04-.58h-2.39l-2.46,1.16-1.16,2.39-1.23,2.46-.58,2.39v4.78l-.58,2.39-.58,2.39h-3.04l-2.39,.65h-2.39l-2.39,.58-2.39,1.81-1.23,2.46-2.39,.51-1.81,2.46,1.81,2.39,1.81,2.39,.58,2.39v7.82l.58,4.85,2.39,1.74,1.88,2.39-1.23,2.46-2.39,1.81-2.39,.58-2.39,.65-1.88,2.39-.58,2.39-.58,2.39-.58,2.97v2.39l-1.88,2.39h-2.39l-2.97-.51-2.39,.51-1.81,2.46,1.81,2.39-1.16,2.39-2.46-.58-2.39-.65-1.16,2.39-2.46,.65-1.16-3.04v-2.39l-.65-2.39,.65-2.39,.51-2.97-1.16-4.27v-4.78l-1.23-2.39-.51-2.39-1.88-2.46-.58-2.39v-2.97l1.23-3.04v-2.39l-.65-2.39-.58-2.39-2.39-2.46-3.62-3.55-.43-1.59" fill="#87a4af" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M399.23,278.21l-2.39-1.16-2.39-.58-2.46-2.39-2.39-1.88h-2.39l-2.39-.51-2.39,.51-2.46,1.23-1.16,2.39-.65,2.39-1.74,2.39-.65,2.46-1.23,2.39-1.74,2.39-1.88,2.39h-2.39l-2.39-1.74-1.74-2.39-2.46-1.23h-2.39l-2.97,.58-2.39-1.23-2.39-.58-2.39,.58h-2.39l-2.46,.65-2.39-.65-2.39-1.16-2.39-2.97-1.88-2.39-2.39-1.23-2.39-.65-2.39-.58-2.39-2.39-2.46-1.81h-2.39l-2.39,.65-2.39,.51-1.23,2.39v7.24l-1.74,2.39-2.39,.65-2.46,1.23-1.81,2.39v2.39l.65,2.39v2.39l-1.88,2.46-1.81,2.39v2.39l.65,2.97v2.39l-1.23,2.39-1.16,2.39-2.46,1.23-3.04,.65-2.39-.65-2.97-.58h-2.39l-2.17-.14-1.81,.65-.58,2.39,.58,2.39v7.24l-1.16,2.39v2.39l.58,2.97,.58,2.39,1.81,3.04,1.23,2.39,.58,2.46,1.81,2.39,1.74,2.39,2.46,2.39,1.81,2.39,1.23,2.39,1.16,2.46,.58,2.39v4.78l.65,2.39,1.16,2.46,2.46,1.16,2.39-.65,1.81-2.39,2.39-1.16,2.46,1.81,2.39,2.39,1.74,2.39,1.23,2.39,1.16,2.46,.65,2.39,.58,2.39,.65,2.39,1.16,2.39v2.46l.58,2.39v2.39l.65,2.97,1.23,2.39,1.74,2.39,.65,3.04,.51,2.39,1.88,2.97,2.39,2.46,1.23,2.39,2.39,1.81,2.39,2.39-.22,1.59h4.78l8.4,4.27,.65,5.36-3.04,3.04-2.39,2.39-.58,2.46,4.85,1.74,2.39-2.39,5.36-1.81,9.05,.58,1.23,2.39,.51,2.39,1.23,.65,1.81,.58,1.81-1.23,1.81,.65,.58,5.36,3.04-6.51,1.23-17.44,1.16-13.82,5.36-7.17,7.24-3.62-.58-1.81-1.81-3.62,2.39-10.21,16.79-15.56,17.44,1.74,11.36-3.62,.65-16.79-6.01-7.17-2.75-.43v2.39l-1.23,2.39-1.23,2.46-2.39,1.74h-2.39l-3.04-1.23-2.39-1.16-2.39-.58-2.46-1.23-2.39-2.39-.58-2.39-1.81-2.39-2.39-1.88-1.74-3.55-1.23-2.46v-2.39l.58-2.39,1.16-2.39,.65-2.39,1.74-2.39,1.88-2.46,1.16-2.39v-2.39l-.58-3.04-.58-2.39,.58-2.97,.58-2.39,.58-2.39,.65-2.46,.58-2.39v-3.04l-1.23-2.39-1.74-2.39-1.88-2.39-2.39-1.23-1.74-2.39-1.88-2.39-2.61-1.09" fill="#ccd8dc" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M381.28,494.11l-3.04-.65-2.39-1.16-1.74-2.46h-2.46l-.65,2.46v2.39l2.46,2.39,1.16,2.39,.65,2.39-1.81,2.46-2.46,1.81-.51,2.97v2.39l.51,2.39-.51,2.39-2.39,1.23h-2.46l-1.81-2.39v-7.24l-1.23-2.39-2.39-1.74-2.39-1.88-2.39-1.74h-2.39l-2.46,1.23-1.74,2.39-1.23,2.39-2.39,1.23-2.39,.51-2.39,.65-1.88,2.39-1.16,2.39-2.39,.58-2.46-1.16h-2.39l-1.16-2.97,1.16-2.39,1.88-2.46,1.74-2.39,2.39-2.39,1.23-2.39,.65-2.39,.51-3.04v-2.46l.65-2.39,.58-2.39-.58-2.39-1.81-2.39-2.39-1.23-2.46-2.97-1.74-2.39-.65-2.39-1.16-3.04-1.23-2.39-.58-2.46-1.16-2.39-.65-2.39v-7.17l-.58-2.46-.65-2.39-.58-2.39,2.46-.58,2.39-1.16-.65-2.39,3.18-2.24,1.88,2.39,1.16-2.39v-2.46l-.65-2.39v-4.78l.65-2.39,1.81-2.46,1.59-.8h4.78l8.4,4.27,.65,5.36-3.04,3.04-2.39,2.39-.58,2.46,4.85,1.74,2.39-2.39,5.36-1.81,9.05,.58,1.23,2.39,.51,2.39,1.23,.65,1.81,.58,1.81-1.23,1.81,.65,.58,5.36-.58,3.04-3.04,8.47,5.43,8.9,.58,2.46-1.74,9.55,6.01,6.66-.65,6.01h-.58" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M470.74,471.89l-2.39-2.46-1.23-2.39-2.39-1.74h-2.39l-2.97,1.23-3.04,1.16-2.39,1.74-1.81,3.04-2.39,2.46-2.39,1.16-2.39,.58h-4.85l-2.39-.58-2.39-1.16-2.39-.65h-2.39l-2.46,.65-1.81,2.39v2.39l1.23,2.39,.58,2.39-1.16,2.46-1.23,2.39-4.78,3.55-2.39,1.81-2.46,.65h-4.78l-2.39,.51h-2.39l-2.46-.51-3.04-.65-2.39,.65-2.39,1.16-2.39,.58-2.39-.58-2.46-2.39-1.16-2.39v-2.39l.65-2.39,1.16-2.46,1.23-2.39,.58-2.39,1.16-2.39,.65-2.39,1.23-2.46,1.16-2.39h2.39l2.46,1.23h2.39l2.39-1.88v-2.39l-1.23-2.39,1.81-2.39h4.78l.65-2.39,1.23-2.39,.51-2.46,.65-2.39v-2.39l-1.16-2.39-2.46-1.81-2.39-.58-2.39,1.16-2.39,2.39-1.23,2.46-.65,2.39-2.39,1.81-2.39,.58-.58-2.39-.65-2.39v-2.46l.65-2.39,1.23-2.39,.58-2.39-.58-2.39-2.39-1.23-2.46,1.88-.58,2.39-.58,2.39v2.39l-1.23,2.39h-2.39v-4.78l.58-2.39,.65-2.39,1.74-2.46,2.39-2.39-.58-2.39-1.81-2.39-2.39-.65-2.39,.65-2.46,1.74v2.39l.65,2.46,1.81,2.39,1.16,2.39-.51,2.39-2.46,1.23-2.39,1.16-2.39,1.23-3.04,1.16-.58,3.04-3.04,8.47,5.43,8.9,.58,2.46-1.74,9.55,6.01,6.66-.65,6.01h-.58l-3.04-.65-2.39-1.16-1.74-2.46h-2.46l-.65,2.46v2.39l2.46,2.39,1.16,2.39,.65,2.39-1.81,2.46-2.46,1.81-.51,2.97v2.39l.51,2.39-.51,2.39-2.39,1.23h-2.46l-1.81-2.39v-7.24l-1.23-2.39-2.39-1.74-2.39-1.88-2.39-1.74h-2.39l-2.46,1.23-1.74,2.39-1.23,2.39-2.39,1.23-2.39,.51-2.39,.65-1.88,2.39-1.16,2.39-1.23,1.81,1.23,2.39v2.39l-2.39,1.23-2.46,.65-2.39,.51h-2.39l-2.39,.65-2.39,.58-2.46,2.39,.65,2.39,1.23,2.39,2.39,2.46,.58,2.39-.58,2.39v2.39l1.74,2.39,2.46,1.23,2.39,2.39,1.16,2.39,1.23,2.46,1.23,2.39,1.81,2.39,1.74,3.04,1.88,2.39,.58,2.39v4.2l2.39,1.16,3.04,1.23,2.39,1.23,2.39,2.39,2.39,.65,1.23-2.46-.65-1.81,2.39-.58h2.46l3.04,.58,2.97,.65,2.39,.58h3.04l2.39-.58,2.39-.65,2.39-1.23,2.46-1.74,2.39-1.23,2.39,.58,2.39,.65h2.97l2.39-.65,2.39,.65,.65,2.39,1.23,2.39,1.16,2.97v4.85l-1.16,2.39,.58,2.39h2.39l2.39-1.23h2.39l2.39,2.46,2.46,.58,2.39-1.16,2.39-2.39,2.39-2.39,2.39-2.46,3.04-1.16h4.85l2.39-1.23,2.39-1.81,1.23-2.39,.58-2.46-.58-2.39h-4.85l-2.39-1.16-1.16-2.46-.65-2.39v-2.39l1.81-2.39,.58-2.39-2.39-2.39-2.39-1.23-2.46-1.23h-4.78l-2.39-.51-2.39-1.88v-2.39l1.16-2.39,2.39-1.81h7.24l2.39,.58h2.39l1.23-2.39,.65-2.39h4.78l2.39,.65,2.46-1.88,1.16-2.39,2.39-1.23h2.46l2.39-1.74,2.39-.65,2.39,.65,2.39-1.81,1.81-2.39,1.16-2.97-.51-2.46-1.88-2.39-1.74-2.39,.51-2.39,2.46-1.88,2.39-2.39,2.39-2.39,1.81-2.39,1.23-2.39,2.39-2.39,2.97-2.97,1.88-2.46,.51-2.39-.51-2.39-1.23-2.39-2.39-2.39v-2.39l1.16-2.46,1.23-2.39,2.39-2.39,.58-1.81" fill="#87a4af" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M458.94,466.54l-2.61,1.16-2.39,1.74-1.81,3.04-2.39,2.46-2.39,1.16-2.39,.58h-4.85l-2.39-.58-2.39-1.16-2.39-.65h-2.39l-2.46,.65-2.39,.51-2.39,.65-2.39-1.81-1.88-2.39-.51-2.46-.65-2.39v-2.39l.65-2.39,1.74-2.39,2.39-.58,2.39-.65h2.46l2.39-1.74,2.39-1.88,2.39-1.74,2.39-1.81,2.39-1.23,2.46-1.23,2.39,.65,2.39,.58,1.88,2.39,2.39,2.39,1.74,2.46,1.88,2.39,1.16,4.78,3.18,1.88" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M460.53,447.29l-11.94-14.4-.65-3.04-.58-2.39v-3.62l-1.88-1.74v-7.89l9.12-8.4,13.75-10.13,9.63-7.24,10.78-17.44,6.66-5.36,1.16,.58,3.62,3.55,2.39,2.46,.58,2.39,.65,2.39v2.39l-1.23,3.04v2.97l.58,2.39,1.88,2.46,.51,2.39,1.23,2.39v4.78l1.16,4.27-.51,2.97-.65,2.39,.65,2.39v2.39l1.16,3.04,2.46-.65,1.16-2.39,2.39,.65,2.46,.58,1.16-2.39,2.39,1.81-1.16,2.39v2.46l2.39-1.23,2.39-.65,.58,2.39-2.39,1.23,1.16,2.39,2.39-1.23,2.46,.65,1.16,2.39-1.16,2.46-2.46,.51-2.39,1.88,1.23,2.39,2.39,.58,2.39,1.16,3.04,.65,2.39,.58,2.46,.65,2.97-.65,2.39,1.23,2.39,1.81,2.39,2.39,1.23,2.39,1.16,2.39,2.46,1.81,2.39,.65h10.78l2.39-.65,2.46-.58h2.39l2.39,1.23,2.39,1.16,2.39,2.39,1.23,2.46v2.39l-1.23,2.39-1.74,2.39-.65,2.39-.58,2.46v4.78l-.65,2.39-1.74,2.39-2.39,1.81-1.23,2.39-2.39,1.81-2.39,2.39-.65,2.46,1.23,2.39,.65,2.39-1.88,2.39-2.39-1.81-2.39-1.23-2.39-.58-2.46-1.16-1.16-2.39-1.23-2.46-1.16-2.39-1.23-2.39-2.39,.58-2.39,1.16-1.81,2.46-2.39,2.39-2.39-1.23-2.39-1.74-6.44,2.53-3.62-1.16-2.61-2.03-2.39-.58-2.46-1.16-2.39-1.23-2.39-1.81-2.39-1.23-2.39,.65-1.23,2.39-2.39,2.39-2.39,1.23-2.39-.65-2.97-.58-2.46-1.81-1.81-2.39-2.39-2.46-1.81-2.39h-16.79l-2.39-1.16,1.16-2.46,1.23-2.39,1.74-2.39v-7.17l1.23-2.46v-2.39l-1.23-2.39,1.23-2.39,1.81-2.39-1.81-2.46-2.39-2.39h-2.39l-2.46,1.88-2.39,2.39-2.39,1.74-2.39,.65h-1.81" fill="#ccd8dc" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M531.03,485.86l-3.62-1.16-2.61-2.03-2.39-.58-2.46-1.16-2.39-1.23-2.39-1.81-2.39-1.23-2.39,.65-1.23,2.39-2.39,2.39-2.39,1.23-2.39-.65-2.97-.58-2.46-1.81-1.81-2.39-2.39-2.46-1.81-2.39h-16.79l-2.39-1.16h-.65l-.58,1.81-2.39,2.39-1.23,2.39-1.16,2.46v2.39l2.39,2.39,1.23,2.39,.51,2.39-.51,2.39-1.88,2.46-2.97,2.97-2.39,2.39-1.23,2.39-1.81,2.39-2.39,2.39-2.39,2.39-2.46,1.88-.51,2.39,1.74,2.39,1.88,2.39,.51,2.46-1.16,2.97-1.81,2.39-2.39,1.81,1.38,2.61,2.39,1.16,1.88,2.39,2.39,1.88h2.39l2.97-.65,2.39-1.74,.65-2.46,2.39-1.16,2.39,1.74v4.85l.58,2.39,1.23,2.39,2.39,1.81,2.39-.65,.65-2.39,2.39-.51h2.39l2.39,.51,2.46,.65h2.39l2.39,1.74,2.39,1.88h2.39l2.46,.58,2.39,.58h4.78l2.39-1.16,1.81-2.39,2.39-1.23,2.39-.65,1.23-2.39-1.23-2.39-2.39-1.74-2.39-1.88-2.39-2.39-1.23-2.39-1.23-2.39v-4.85l-.51-2.39-1.23-2.39,.58-2.39,1.81-2.39,2.39-1.23h2.46l2.39-.58,1.74-2.39,2.39-2.39,2.46-1.23,2.39-2.39,1.81-2.39,2.39-.65,2.46,.65,2.39-1.23,2.39-2.39-1.23-2.39-.65-2.39v-2.39l-1.74-1.88" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M565.26,494.91l-2.46,.58-2.39,1.16h-2.39l-2.39,1.23-2.39,1.23-2.46,.58h-2.39l-1.16,2.46-1.81,2.39-1.16,2.39-2.39,2.39-1.23,2.39-.65,2.46-.58,2.39v2.39l-.65,2.39-1.16,2.39-2.39,1.81-2.46,1.81-2.39,2.39-2.39,2.39v2.46l-1.16,2.39-2.46,2.39-1.74,2.39-2.39,1.23h-7.31l.65-1.23,2.39-.65,1.23-2.39-1.23-2.39-2.39-1.74-2.39-1.88-2.39-2.39-1.23-2.39-1.23-2.39v-4.85l-.51-2.39-1.23-2.39,.58-2.39,1.81-2.39,2.39-1.23h2.46l2.39-.58,1.74-2.39,2.39-2.39,2.46-1.23,2.39-2.39,1.81-2.39,2.39-.65,2.46,.65,2.39-1.23,2.39-2.39-1.23-2.39-.65-2.39v-2.39l-1.74-1.88,6.44-2.53,2.39,1.74,2.39,1.23,2.39-2.39,1.81-2.46,2.39-1.16,2.39-.58,1.23,2.39,1.16,2.39,1.23,2.46,1.16,2.39,2.46,1.16,2.39,.58,2.39,1.23,2.39,1.81-.36,.8" fill="#87a4af" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M565.26,494.91l-2.46,.58-2.39,1.16h-2.39l-2.39,1.23-2.39,1.23-2.46,.58h-2.39l-1.16,2.46-1.81,2.39-1.16,2.39-2.39,2.39-1.23,2.39-.65,2.46-.58,2.39v2.39l-.65,2.39-1.16,2.39-2.39,1.81-2.46,1.81-2.39,2.39-2.39,2.39,1.23,.58,3.04,.65,2.39,1.23,1.74,2.39,2.39,.58,2.46-.58,2.39,1.74,1.16,2.39,.65,2.39,1.23,2.46,2.39,1.81h2.39l2.97-1.23-.58-2.39,1.23-2.39h2.39l2.39,1.23,1.23,2.39,.58,2.39,1.16,2.39,2.46,.58,2.39-1.74,2.39-.65h2.39l1.23,2.39v2.39l.65,2.39,1.74,2.46,2.39,.58,2.39,1.23,2.46-1.23,2.39-2.39,1.16-2.39v-4.78l1.23-2.46,.65-2.39,.58-2.39,.58-2.39,1.23-2.39,.58-2.39,.65-2.46,1.16-2.39,1.81-2.39,1.81-2.39,1.74-2.39,1.88-3.04v-4.85l-1.88-2.39-2.39-.58-1.74,2.46v2.39l-1.88,2.39-1.16,2.39-2.39,1.23-2.46,.51h-7.17l-1.81-2.39,1.23-2.39,1.74-2.97,2.46-1.16,2.39-1.23,2.39-2.39,1.81-2.39,.58-2.46-1.16-2.39-.58-2.39-.65-2.39-1.74-2.39-2.46-1.88-2.39-1.16-.65-2.39v-2.46l-.51-2.39v-2.39l-.65-2.39v-4.85l-.58-2.39-2.68-.07-1.74,2.39-2.39,1.81-1.23,2.39-2.39,1.81-2.39,2.39-.65,2.46,1.23,2.39,.65,2.39-1.88,2.39-.36,.72" fill="#ccd8dc" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M522.63,543.48l-1.23,3.04-.58,2.97-.58,2.46v2.39l-1.23,2.39-1.16,2.39-1.88,2.39-.58,2.39-.58,2.46v2.39l.58,2.39v4.78l-.58,3.04-1.23,2.46-1.23,2.39-1.16,2.97-1.81,2.39-1.16,2.39-2.39,1.23-2.46,2.39v3.04l.58,2.39,1.23,2.39,.65,2.39-1.23,2.46h-7.24l-2.39-1.88h-2.39l-2.39-1.74-2.39-1.23-2.46-.65-2.39,1.23-2.39-.58-2.39-.65h-2.39l-2.39,.65-2.46,1.81-2.39,.58-2.39-2.39-2.39-1.16-2.39-.65-2.46,.65h-2.39l-2.39,.51-1.23,2.46v2.39l1.23,2.39,.58,2.39-1.23,2.39-2.39,1.23-2.39,1.16-2.39,.65v9.63h-2.46l-2.39-.65-2.39-1.16h-2.97l-2.39-.58-2.39-1.23-2.46-.65h-7.17l-2.39-1.16-2.46-2.39-2.39-1.23-2.39-.58-2.39-.65-2.39-.51-2.39-.65-2.46-1.81-2.39-1.16-1.16-2.39-1.23-2.39-1.23-2.46-1.81-2.39,.65-2.39,.51-2.39-.51-2.39,1.74-4.85,.65-2.39,.58-2.39,1.59-1.45,2.39-1.23h2.39l2.39,2.46,2.46,.58,2.39-1.16,2.39-2.39,2.39-2.39,2.39-2.46,3.04-1.16h4.85l2.39-1.23,2.39-1.81,1.23-2.39,.58-2.46-.58-2.39h-4.85l-2.39-1.16-1.16-2.46-.65-2.39v-2.39l1.81-2.39,.58-2.39-2.39-2.39-2.39-1.23-2.46-1.23h-4.78l-2.39-.51-2.39-1.88v-2.39l1.16-2.39,2.39-1.81h7.24l2.39,.58h2.39l1.23-2.39,.65-2.39h4.78l2.39,.65,2.46-1.88,1.16-2.39,2.39-1.23h2.46l2.39-1.74,2.39-.65,2.39,.65,1.38,2.61,2.39,1.16,1.88,2.39,2.39,1.88h2.39l2.97-.65,2.39-1.74,.65-2.46,2.39-1.16,2.39,1.74v4.85l.58,2.39,1.23,2.39,2.39,1.81,2.39-.65,.65-2.39,2.39-.51h2.39l2.39,.51,2.46,.65h2.39l2.39,1.74,2.39,1.88h2.39l2.46,.58,2.39,.58h4.78l2.39-1.16,1.81-2.39h9.05l2.39-1.23v1.74" fill="#ccd8dc" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M398.29,586.18l-.58,2.39-.65,2.39-1.74,4.85,.51,2.39-.51,2.39-.58,2.46-1.81-2.46-1.88-2.39-1.74-2.39-1.88-2.46-2.39-1.81-2.39-1.23-2.39-1.16-4.85-2.97-2.39-1.88-2.39-2.39-2.97-.51-2.39-1.88-2.39-1.16h-2.46l-2.39-1.23-4.49-2.9,1.3-2.1-.65-1.81,2.39-.58h2.46l3.04,.58,2.97,.65,2.39,.58h3.04l2.39-.58,2.39-.65,2.39-1.23,2.46-1.74,2.39-1.23,2.39,.58,2.39,.65h2.97l2.39-.65,2.39,.65,.65,2.39,1.23,2.39,1.16,2.97v4.85l-1.16,2.39,.58,2.39h2.39l-1.59,1.45" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M576.05,557.95l-1.74-2.46-.65-2.39v-2.39l-1.23-2.39h-2.39l-2.39,.65-2.39,1.74-2.46-.58-1.16-2.39-.58-2.39-1.23-2.39-2.39-1.23h-2.39l-1.23,2.39,.58,2.39-2.97,1.23h-2.39l-2.39-1.81-1.23-2.46-.65-2.39-1.16-2.39-2.39-1.74-2.46,.58-2.39-.58-1.74-2.39-2.39-1.23-3.04-.65-1.23-.58v2.46l-1.16,2.39-2.46,2.39-1.74,2.39v1.74l-1.23,3.04-.58,2.97-.58,2.46v2.39l-1.23,2.39-1.16,2.39-1.88,2.39-.58,2.39-.58,2.46v2.39l.58,2.39v4.78l-.58,3.04-1.23,2.46-1.23,2.39-1.16,2.97-1.81,2.39-1.16,2.39,.58,1.81v2.46l1.16,2.39,1.23,2.39,1.16,2.39,1.23,2.39,2.39,.58,3.04-.58,2.39-2.39,2.46-2.39h2.39l2.97,.58h2.39l1.81-2.39,1.23-2.46,2.39-1.74,2.39,.58,2.46,.65,2.9-1.23,1.88-2.39,1.74-2.39,2.39-2.39,.65-2.46,.58-2.39v-3.04l-.58-2.39-1.16-2.39v-2.97l1.74-2.39,2.39-2.39,1.88-2.46v-2.39l2.39-.65,1.74,2.39,2.39,2.46v7.17l.65,2.39v4.85l2.39,.65,2.46,2.39,1.16,2.39,2.39,.58,1.81-2.46,.65-2.39,.51-2.39,.65-2.39v-2.39l-.65-2.39-.51-2.46-.65-2.39v-4.78l-.58-2.39,1.74-2.39h1.23" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M563.45,580.75v-4.85l-.65-2.39v-7.17l-2.39-2.46-1.74-2.39-2.39,.65v2.39l-1.88,2.46-2.39,2.39-1.74,2.39v2.97l1.16,2.39,.58,2.39v3.04l1.23-1.16,2.39-.65,2.39,.65h2.39l3.04-.65" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M563.45,580.75l2.39,.65,2.46,2.39,1.16,2.39,2.39,.58,1.23,1.81v4.78l1.74,2.97-.51,2.46v7.17l-2.46,.65-2.39,1.23-2.39,1.16-2.39,2.39h-2.39l-1.88-2.39-2.39-1.16-2.39-1.88-2.39-1.16-2.46-2.46h-2.39l-2.39-1.16-1.23-2.39-.51-2.46,.51-1.74,1.88-2.39,1.74-2.39,2.39-2.39,.65-2.46,.29-2.32,1.52-1.23,2.39-.65,2.39,.65h2.39l3.04-.65" fill="#ccd8dc" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M586.83,551.37v2.39l-1.16,2.39-2.39,2.39-2.46,1.23-2.39-1.23-2.39-.58h-1.23l-1.74,2.39,.58,2.39v4.78h1.16l2.46-1.74,2.39-.65,2.39,1.88,1.81,2.39,1.81,2.39,2.39,1.74,2.39,2.39,2.39,1.23,2.46-1.23,2.39-.51h2.39l2.39-1.23,2.39-2.39,2.39-1.23,2.46-1.16v-2.39l-2.46-1.88-2.39-2.39-2.39-1.23-2.39-1.16-2.39-2.39-2.39-1.81-2.46-.65-2.39-1.74-2.39-2.39h-1.23" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M496.14,364.63h-8.4l-7.24-9.05-2.39,.58-2.39,.58h-2.46l-1.74-2.39-.65-2.39-2.39-.58-2.97-1.16-2.39-1.88-1.88-2.39-1.16-2.39-2.39-1.23-2.46-1.16-2.9-.58-2.46-1.23-2.39-1.16h-7.17l-2.46,.51-2.39,1.23-2.39,.65,1.01,2.82,6.01,7.17-.65,16.79-11.36,3.62-17.44-1.74-16.79,15.56-2.39,10.21,1.81,3.62,.58,1.81-7.24,3.62-5.36,7.17-1.16,13.82-1.23,17.44-3.04,6.51,3.04-1.16,2.39-1.23,2.39-1.16,2.46-1.23,.51-2.39-1.16-2.39-1.81-2.39-.65-2.46v-2.39l2.46-1.74,2.39-.65,2.39,.65,1.81,2.39,.58,2.39-2.39,2.39-1.74,2.46-.65,2.39-.58,2.39v4.78h2.39l1.23-2.39v-2.39l.58-2.39,.58-2.39,2.46-1.88,2.39,1.23,.58,2.39-.58,2.39-1.23,2.39-.65,2.39v2.46l.65,2.39,.58,2.39,2.39-.58,2.39-1.81,.65-2.39,1.23-2.46,2.39-2.39,2.39-1.16,2.39,.58,2.46,1.81,1.16,2.39v2.39l-.65,2.39-.51,2.46-1.23,2.39-.65,2.39h-4.78l-1.81,2.39,1.23,2.39v2.39l-2.39,1.88h-2.39l-2.46-1.23h-2.39l-1.16,2.39-1.23,2.46-.65,2.39-1.16,2.39-.58,2.39-1.23,2.39-1.16,2.46-.65,2.39v2.39l1.16,2.39,2.46,2.39,2.39,.58,2.39-.58,2.39-1.16,2.39-.65,3.04,.65,2.46,.51h2.39l2.39-.51h4.78l2.46-.65,2.39-1.81,4.78-3.55,1.23-2.39,1.16-2.46-.58-2.39-1.23-2.39v-2.39l1.81-2.39,2.46-.65h2.39l2.39,.65,2.39,1.16,2.39,.58h4.85l2.39-.58,2.39-1.16,2.39-2.46,1.81-3.04,2.39-1.74,3.04-1.16,2.97-1.23h2.39l2.39,1.74,1.23,2.39,2.39,2.46h.65l1.16-2.46,1.23-2.39,1.74-2.39v-7.17l1.23-2.46v-2.39l-1.23-2.39,1.23-2.39,1.81-2.39-1.81-2.46-2.39-2.39h-2.39l-2.46,1.88-2.39,2.39-2.39,1.74-2.39,.65h-1.81l-11.94-14.4-.65-3.04-.58-2.39v-3.62l-1.88-1.74v-7.89l9.12-8.4,13.75-10.13,9.63-7.24,10.78-17.44,7.38-6.37" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M531.61,237.97l2.39,1.74,2.39,1.88,1.88,2.39,.51,2.39,.65,2.39-1.81,2.39,.65,2.46v2.39l.51,2.39,1.23,2.39v2.39l.65,2.46,.58,2.39v4.78l2.39,2.39,1.16,2.39-.51,2.46,2.39,.51,2.39,1.23,1.23,2.39,2.39,1.88,2.39,.51,2.39-.51,2.39,1.16,2.46,1.23,2.39,1.74,2.39,1.23,2.39,.58,2.39,.58,2.46,.65,2.39,1.23,2.39,1.16,2.39,1.81,2.39,.58,2.46,1.23h4.78l2.97,.58h4.78l2.39-.58,2.46,.58,1.16,2.39,1.23,2.39,2.39,.65,3.04-1.23,2.39-1.81h2.39l.58,2.39v2.39l.65,2.39v2.46l-1.81,2.39-1.81,2.39-1.16,2.39-1.23,2.39-1.16,2.46v4.78l-.65,2.39-1.23,2.39h-2.39l-1.74-2.39-2.46-2.39-2.39-.58-.65,2.39v2.46l-.51,2.39-.65,2.39v2.39l.65,2.39,.51,2.97v2.39l1.23,2.46,.65,2.39,.51,2.39v9.63l-.51,2.39v2.39l-.65,2.39v4.78l-.58,2.46v2.39l-.65,2.39v2.39l-.51,2.39v4.85l.51,2.39,.65,2.39v5.43l1.23,4.85,.51,2.39v4.78l1.23,2.97,.65,2.39,.58,2.39-.58,2.46-1.88,2.39-.51,2.39-1.88,2.39-1.74,2.39v2.46l1.23,2.39v2.39l-.65,2.39v2.39l1.16,2.39,1.23,2.46v2.39l-2.39,1.81h-2.39l-1.81,2.39-1.81,2.46-2.39,1.16-2.46-.65-1.74-2.39-2.39-1.16-1.45-1.37v-2.39l-1.23-2.46-2.39-2.39-2.39-1.16-2.39-1.23h-2.39l-2.46,.58-2.39,.65h-10.78l-2.39-.65-2.46-1.81-1.16-2.39-1.23-2.39-2.39-2.39-2.39-1.81-2.39-1.23-2.97,.65-2.46-.65-2.39-.58-3.04-.65-2.39-1.16-2.39-.58-1.23-2.39,2.39-1.88,2.46-.51,1.16-2.46-1.16-2.39-2.46-.65-2.39,1.23-1.16-2.39,2.39-1.23-.58-2.39-2.39,.65-2.39,1.23v-2.46l1.16-2.39-2.39-1.81-1.81-2.39,1.81-2.46,2.39-.51,2.97,.51h2.39l1.88-2.39v-2.39l.58-2.97,.58-2.39,.58-2.39,1.88-2.39,2.39-.65,2.39-.58,2.39-1.81,1.23-2.46-1.88-2.39-2.39-1.74-.58-4.85v-7.82l-.58-2.39-1.81-2.39-1.81-2.39,1.81-2.46,2.39-.51,1.23-2.46,2.39-1.81,2.39-.58h2.39l2.39-.65h3.04l.58-2.39,.58-2.39v-4.78l.58-2.39,1.23-2.46,1.16-2.39,2.46-1.16h2.39l3.04,.58h2.39l2.39-1.81,1.74-2.39,2.46-2.39,1.81-2.46,1.23-2.39,.51-2.97-2.89-1.16v-7.24l.51-2.39v-4.78l-.51-2.46-1.88-2.39-2.39-.65h-2.39l-2.46-.51-2.39-.65-2.39-1.23-2.39-1.74-2.39-1.23-2.97-1.16-1.88-2.39-2.39-1.23-2.32-1.81-1.81-2.46v-2.39l-.58-2.39v-2.39l-2.39-1.74-2.46-1.23-2.39-1.23-.65-2.39v-2.39l-2.39-2.39-.58-2.39,2.46-1.88v-4.78l-1.23-2.39-1.23-2.46v-2.39l-.58-2.39-1.81-2.39-2.39-1.23-.65-2.39,.65-2.39,.58-2.39,2.39-1.81,2.39-1.81,2.03,1.45" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M603.12,467.33l1.23,2.39,2.39,1.74,1.74,2.39,1.88,2.39,2.39,1.23,1.16,2.39,1.81,2.39-.58,2.46-2.39,.58-2.39-.58-1.23-2.46-1.23-2.39-1.16-2.39-.65-2.39-.58-2.39-1.16-2.46-1.23-2.89" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M753.81,647.99l2.39-2.39,3.62-1.23,1.88-2.39,.51-2.39-.51-2.46-1.88-2.39-1.74-2.39-1.88-2.39-2.39-2.39-2.39-1.81-1.74-2.39-2.39-2.39-1.88-2.39-2.39-2.39-1.23-2.46v-2.39l-2.97-2.39h-2.39l-2.39,1.23-2.39,.51h-2.39l-2.46-.51-2.39-1.23-.65-2.39-1.16-2.39-1.23-2.39-1.74-2.46-.65-2.39-2.39-1.81-2.39-1.23-2.46-2.39h-2.39l-2.97-1.23-3.04-1.16h-4.78l-2.39-.58-2.46-.65-2.97-.51h-2.39l-2.39-.65-2.39,1.16,2.39,1.23,2.39,1.16-1.81,2.46-2.39-.58-2.97,.58-2.39-1.23-.65-2.39-1.23-2.39-1.23-2.46-2.39-1.16-1.74-2.39-2.39-1.81-1.88-3.04-2.39-1.16-1.74-2.39-2.39-1.23-1.88-2.39-1.16-2.39-.58-2.46-1.23-2.39-1.81-2.39-.58-2.39v-3.62l-1.23-2.39-1.16-2.39-1.23-2.39-1.16-2.46-1.88-2.39-1.16-2.39-1.23-2.39-1.23-2.39-1.74-2.39-1.81-2.46-2.46-1.74-2.39-2.39-2.39-1.88-2.39-1.74-1.23-2.39-1.74-2.39-1.23-2.39-2.39-2.46-1.81-2.39-2.46-2.39-1.74-2.39-2.46-2.32,2.46-.07-1.23-2.46-1.16-2.39-.65-2.39v-4.78l.65-2.39,2.39-2.46,1.74-2.39-.51-2.39-.65-2.39-2.39-1.88-2.46-1.74-2.39-2.39-1.74-2.39-1.88-2.39-1.74-2.46-.65-2.39-1.16-2.39-.58-2.39-1.23-2.39-1.81-.65-2.39,1.81h-2.39l-1.81,2.39-1.81,2.46-2.39,1.16-2.46-.65-1.74-2.39-2.39-1.16-1.45-1.37-1.23,2.39-1.74,2.39-.65,2.39-.58,2.46v4.78l-.65,2.46,2.68,.07,.58,2.39v4.85l.65,2.39v2.39l.51,2.39v2.46l.65,2.39,2.39,1.16,2.46,1.88,1.74,2.39,.65,2.39,.58,2.39,1.16,2.39-.58,2.46-1.81,2.39-2.39,2.39-2.39,1.23-2.46,1.16-1.74,2.97-1.23,2.39,1.81,2.39h7.17l2.46-.51,2.39-1.23,1.16-2.39,1.88-2.39v-2.39l1.74-2.46,1.88,1.23,1.16-2.39,2.39-2.39,2.46,1.74v4.78l.51,2.39,3.04,1.88h2.46l1.16,2.39-1.16,2.39-2.46,.58-1.81,2.39v4.85l.65,2.39,1.16,2.39,2.46,1.23,2.39,.58,2.39-1.81,.58-2.39,2.39-2.39,2.39,.58,2.39,1.23,2.39,.58,.65,2.39-.65,2.39-.51,2.39-1.23,3.04-1.23,2.39-1.16,2.46-.65,2.39-.58,2.39-1.16,2.39-.65,2.39v2.46l.65,2.39,2.97,2.39,2.39,1.23,2.39,.51h2.39l2.39-.51,1.23,2.39-1.23,2.39-2.39,.58-2.39,1.81-1.23,5.36v2.39l-1.16,2.39-.58,2.46v4.78l1.23,2.39,2.39,1.23,2.39,.65,1.74,2.39,1.23,2.39,2.39,.58,2.39-1.23,2.46-2.39,2.39,.65,1.81,2.39,1.81,2.39,1.16-2.39v-2.39l1.88-2.39,2.39,2.39,1.74,2.39,1.88,2.39,1.16,2.39,1.81,2.46,2.39,1.16,2.39,1.23,2.39,.51,2.39,1.23h7.24l2.39,.65,1.23,2.39,1.16,2.39v4.85l-1.74,2.39h-.65v4.78l2.39,4.2,3.04,5.43h3.62l3.62-1.88,2.97-3.55,3.62-2.46,5.43-5.36,2.39,12.59,8.97,5.43,3.62,4.85h36.04l1.16-.65" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M574.82,567.51l2.46-1.74,2.39-.65,2.39,1.88,1.81,2.39,1.81,2.39,2.39,1.74,2.39,2.39,2.39,1.23,2.46-1.23,2.39-.51h2.39l2.39-1.23,2.39-2.39,2.39-1.23,2.46-1.16v-2.39l-2.46-1.88-2.39-2.39-2.39-1.23-2.39-1.16-2.39-2.39-2.39-1.81-2.46-.65-2.39-1.74-2.39-2.39h-1.23l1.23-4.85,.65-2.39,.58-2.39,.58-2.39,1.23-2.39,.58-2.39,.65-2.46,1.16-2.39,1.81-2.39,1.81-2.39,1.74-2.39,1.88-3.04v-4.85l-1.88-2.39,.65-1.74,2.39-2.39,2.46,1.74v4.78l.51,2.39,3.04,1.88h2.46l1.16,2.39-1.16,2.39-2.46,.58-1.81,2.39v4.85l.65,2.39,1.16,2.39,2.46,1.23,2.39,.58,2.39-1.81,.58-2.39,2.39-2.39,2.39,.58,2.39,1.23,2.39,.58,.65,2.39-.65,2.39-.51,2.39-1.23,3.04-1.23,2.39-1.16,2.46-.65,2.39-.58,2.39-1.16,2.39-.65,2.39v2.46l.65,2.39,2.97,2.39,2.39,1.23,2.39,.51h2.39l2.39-.51,1.23,2.39-1.23,2.39-2.39,.58-2.39,1.81-1.23,5.36v2.39l-1.16,2.39-.58,2.46v4.78l1.23,2.39,2.39,1.23,2.39,.65,1.74,2.39,1.23,2.39,2.39,.58,2.39-1.23,2.46-2.39,2.39,.65,1.81,2.39,1.81,4.2-1.23,2.39-2.39,1.16-2.39,1.88-2.46,1.16-2.39,1.81-2.39,1.81-2.39-1.23-2.97,1.23-2.39,1.23-2.46,1.16-2.39,1.81-1.16,2.39-2.46-.58-2.39-2.39-1.16-2.39-.65-2.46-.58-2.39h-2.39l-2.39,1.81-2.39,2.39,.51,2.39,2.39,2.39,1.23,2.39-1.74,2.46-2.39,.58-2.46-.58-1.16-2.46-2.39-1.16h-7.24l-2.39-2.39-2.39-1.81-2.46-.65h-2.39l-2.39,.65-3.04,1.23-2.39-1.23-2.39,1.81-2.46,.58-2.39-.58-2.39-1.23-1.74-2.39-1.23-2.39,1.23-1.81h2.39l2.39-2.39,2.39-1.16,2.39-1.23,2.46-.65v-7.17l.51-2.46-1.74-2.97v-4.78l-1.23-1.81,1.81-2.46,.65-2.39,.51-2.39,.65-2.39v-2.39l-.65-2.39-.51-2.46-.65-2.39h1.16" fill="#87a4af" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M591.1,621.57l-2.39-2.39-2.39-1.81-2.46-.65h-2.39l-2.39,.65-3.04,1.23-2.39-1.23-2.39,1.81-2.46,.58-2.39-.58-2.39-1.23-1.74-2.39-1.23-2.39,1.23-1.81-1.88-2.39-2.39-1.16-2.39-1.88-2.39-1.16-2.46-2.46h-2.39l-2.39-1.16-1.23-2.39-.51-2.46,.51-1.74-2.89,1.23-2.46-.65-2.39-.58-2.39,1.74-1.23,2.46-1.81,2.39h-2.39l-2.97-.58h-2.39l-2.46,2.39-2.39,2.39-3.04,.58-2.39-.58-1.23-2.39-1.16-2.39-1.23-2.39-1.16-2.39v-2.46l-.58-1.81-2.39,1.23-2.46,2.39v3.04l.58,2.39,1.23,2.39,.65,2.39-1.23,2.46h-7.24l-2.39-1.88h-2.39l-2.39-1.74-2.39-1.23-2.46-.65-2.39,1.23-2.39-.58-2.39-.65h-2.39l-2.39,.65-2.46,1.81-2.39,.58-2.39-2.39-2.39-1.16-2.39-.65-2.46,.65h-2.39l-2.39,.51-1.23,2.46v2.39l1.23,2.39,.58,2.39-1.23,2.39-2.39,1.23-2.39,1.16-2.39,.65v7.24l-.14,1.59,1.95,.14,2.39-1.16,2.39-.58,2.46,1.16,2.39,2.46,2.39,1.74,1.23,2.39,1.74,2.39,2.39,1.88,2.39,2.39,2.39,1.74,2.46,2.39,2.39,1.23,2.39,1.23,2.39,1.81,2.39,2.39,1.88,2.39,2.39,1.81,2.39,1.16,2.39,1.23,2.46,.65,2.39,.51,2.39,1.23,2.97,.65h2.39l2.39,.58,2.46,1.16,2.39,1.23,2.39,1.16,2.39,.65,3.04,1.23,2.39,1.74,2.46,1.23,2.97,.65,1.81,2.39,2.39,1.74,2.97,1.23h9.63l2.39,.65h3.04l2.39,.51,2.39,1.23,2.46,1.16,2.39,.65,2.39,.58h2.39l2.39,1.23,2.46,.65,2.97,.51,2.39,.65,2.39,2.39,1.23,2.39,2.39,1.81,2.39,.65,3.04,.51,1.74-2.39,1.23-2.39,1.23-2.39,.58-2.39,2.46-1.23,2.39-2.39,2.39-1.23,1.74-2.39,1.23-2.39v-2.39l-1.23-2.39,1.23-2.46-1.74-2.39-1.88-2.39-2.39-1.74-2.39-1.88-1.23-2.39-1.16-2.39-1.23-2.39v-2.39l-2.39-2.46-.58-2.39,.58-2.39,1.16-2.39v-4.85l-.51-2.39,.51-2.39h2.46l2.39-.58,.65-2.39-1.23-1.81" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M739.4,687h4.78l2.46,.58,1.81-2.39,.58-2.39-1.74-2.39-2.46-2.46v-2.39l.58-2.39v-7.17l1.88-2.46,2.39-2.39,1.16-2.39,.58-2.39,.65-2.39v-2.39l.58-2.46v-.51h-36.04l-3.62-4.85-8.97-5.43-2.39-12.59-5.43,5.36-3.62,2.46-2.97,3.55-3.62,1.88h-3.62l-3.04-5.43-2.39-4.2v-4.78h.65l1.74-2.39v-4.85l-1.16-2.39-1.23-2.39-2.39-.65h-7.24l-2.39-1.23-2.39-.51-2.39-1.23-2.39-1.16-1.81-2.46-1.16-2.39-1.88-2.39-1.74-2.39-2.39-2.39-1.88,2.39v2.39l-1.16,2.39v1.81l-1.23,2.39-2.39,1.16-2.39,1.88-2.46,1.16-2.39,1.81-2.39,1.81-2.39-1.23-2.97,1.23-2.39,1.23-2.46,1.16-2.39,1.81-1.16,2.39-2.46-.58-2.39-2.39-1.16-2.39-.65-2.46-.58-2.39h-2.39l-2.39,1.81-2.39,2.39,.51,2.39,2.39,2.39,1.23,2.39-1.74,2.46-2.39,.58-2.46-.58-1.16-2.46-2.39-1.16h-7.24l1.23,1.81-.65,2.39-2.39,.58h-2.46l-.51,2.39,.51,2.39v4.85l-1.16,2.39-.58,2.39,.58,2.39,2.39,2.46v2.39l1.23,2.39,1.16,2.39,1.23,2.39,2.39,1.88,2.39,1.74,1.88,2.39,1.74,2.39-1.23,2.46,1.23,2.39v2.39l-1.23,2.39-1.74,2.39-2.39,1.23-2.39,2.39-2.46,1.23-.58,2.39-1.23,2.39-1.23,2.39-1.16,1.23,1.81,2.39,2.39,1.23,2.46,.58,2.39,.58,2.39,.65,2.97,1.23,2.39,1.16,2.39,1.23,2.39,1.16,2.46,1.23h7.17l2.39,2.39,2.46,.58h9.55l2.46,1.16,2.39,.65,2.39,1.23,2.39,1.74,2.39,1.23,2.46,.65h2.39l2.39,.51,2.39,1.23,2.39,.65,3.04,.58h4.85l2.39-.58,2.97-1.88,2.39-1.16,2.39-1.81,2.39-1.16,2.46-.65,2.39-1.74,2.39-.65,2.39-1.23,2.39-2.39,2.46-1.16,2.39-.58,2.39-1.23h4.78l1.23-2.39,1.23-2.39,2.39-1.23,2.39-1.81h2.39l2.39-.58,3.04-.65,2.46,.65h2.97v-2.39l-2.46-.65-2.39-1.23v-2.39l1.23-2.39h2.39l2.39,1.23v2.39l.65,2.39,2.39-1.23h2.39l2.97-1.74,2.46-.65,1.16,3.04-2.97,1.23h-2.39l1.23,2.39,2.39,.58h2.39l2.39,.65,2.39,1.16,2.46,1.23,2.39,.58,2.39,.58,2.39,.58h2.39l-2.39-2.39-2.39-.58-2.39-1.16-2.39-.65-2.46-.58-2.39-.65,2.97-.58" fill="#ccd8dc" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M760.47,634.24l2.39-.65,2.39-.58,2.46-1.23,.51-2.39,.65-2.39-1.16-2.39v-4.85l.51-2.39,1.88-2.39,2.39-.65h2.39l2.39,1.23,2.46,1.81,1.16,2.39v2.97l.58,2.46v2.39l.65,2.39,1.74,2.39,2.39,.65,2.46,.58,3.04,1.16,2.39,1.23,2.39-1.23,1.23-2.39,1.74-2.39,1.81-2.39,1.81-2.39-.58-2.46,.58-2.39,2.39-1.74,2.39-2.39,1.23-2.46,2.39-1.16h7.82l2.39,1.16,2.46,1.23,2.39,2.39,2.39,2.39,2.39,2.46,2.39,1.74,.58,2.39,1.88,2.39,2.39,.65,2.39,.58,2.39,1.81v2.46l.58,2.39,16.29-1.88-1.88-22.8-1.74-1.23-.65-3.55-15.63,2.39-7.74,.65-2.39-.65-2.46-1.23-2.39-1.16-3.62-1.23-2.39-.58-2.39-1.16-2.39-1.88-2.39-1.16-1.23-2.39-.65-2.46-2.39-1.16-.58-2.39-1.16-2.46-1.88-2.39-2.97-1.16-1.81-2.46-2.39-.51-2.97,2.97-2.39,1.81-2.46,2.39-2.39,1.81h-4.78l-2.39,.58-2.46,.58h-3.04l-2.97,.65-2.39,.58h-2.39l-2.39,.65-2.39,.51h-2.46l-3.04,.65-.51,2.39,2.39-1.16,2.39,.58-1.81,2.39-2.46,1.16-1.74,2.46-2.39,1.16-2.39,.65-2.39-1.81-2.46,2.39h-2.39l-2.39,1.16-1.23,.65,2.97,2.39v2.39l1.23,2.46,2.39,2.39,1.88,2.39,2.39,2.39,1.74,2.39,2.39,1.81,2.39,2.39,1.88,2.39,1.74,2.39,.65-.51" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M843.92,636.63l-.58-2.39v-2.46l-2.39-1.81-2.39-.58-2.39-.65-1.88-2.39-.58-2.39-2.39-1.74-2.39-2.46-2.39-2.39-2.39-2.39-2.46-1.23-2.39-1.16h-7.82l-2.39,1.16-1.23,2.46-2.39,2.39-2.39,1.74-.58,2.39,.58,2.46-1.81,2.39-1.81,2.39-1.74,2.39-1.23,2.39-2.39,1.23-2.39-1.23-3.04-1.16-2.46-.58-2.39-.65-1.74-2.39-.65-2.39v-2.39l-.58-2.46v-2.97l-1.16-2.39-2.46-1.81-2.39-1.23h-2.39l-2.39,.65-1.88,2.39-.51,2.39v4.85l1.16,2.39-.65,2.39-.51,2.39-2.46,1.23-2.39,.58-2.39,.65-.65,.51,1.88,2.39,.51,2.46-.51,2.39-1.88,2.39-3.62,1.23-2.39,2.39-1.16,.65v.51l-.58,2.46v2.39l-.65,2.39-.58,2.39-1.16,2.39-2.39,2.39-1.88,2.46v7.17l-.58,2.39v2.39l2.46,2.46,1.74,2.39-.58,2.39-1.81,2.39,1.23,.8,2.1,.87,5.72,2.61,2.39,2.39-2.39-1.23h-2.46l2.97,2.46,2.46,1.16,2.39,1.81,2.39,1.81,2.39,1.23-1.74-2.46-1.88-2.39-1.74-2.39,2.39,1.23,2.39,1.16,2.46,1.23,2.39,2.39,2.39,1.74,2.39,2.39,2.39,2.46,2.46,1.81,1.74,2.39,2.39,2.39,1.88,2.46,1.74,2.39,1.23,2.39,2.39,1.74,2.39,.65,2.39,1.74,2.39,1.88,3.04,1.74,2.46,.65h2.39l2.39-1.81,2.39-1.81,2.39-2.39,2.46-2.39,2.39-2.39,1.74-2.39,.65-3.04,15.63-29.39,47.41-4.85,1.16-2.39-.51-2.39-.65-2.39,.65-2.39,.51-2.46-2.39-.58-2.39-1.23-2.39-1.23-.58-2.39-1.23-2.39-2.39-2.39-1.81-2.39-2.46-1.23-2.39-1.16-2.97-1.81-1.16-2.39-2.39,1.74-3.04-2.39-2.46-1.74-2.39-1.88-2.39-2.39-2.39-2.39-2.39-1.74h-1.23" fill="#87a4af" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M833.13,574.16l-2.46,1.74-2.39,1.88-2.39,.58-2.39,1.81,2.39,.58,2.39-.58,2.39-.65,2.46-1.74,1.81-2.39-1.81-1.23" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M132.81,161.1h-2.39l-2.46,1.23-.58,2.39-.58,2.39v2.39l-.65,2.46v2.39l.65,2.32,2.39,1.81,2.39,1.23,1.81-2.39,.58-2.46v-2.39l1.23-2.39v-2.39l-.65-2.39,1.23-2.39-2.97-1.81" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M963.48,451.05l-2.39-.58-2.46-.65-2.39-1.16-2.39-1.23-2.39-.51-4.27-.65-2.39,1.81-2.39,1.23-2.39,1.16-2.46,.58-2.39,.65-2.97,.58-3.04,.58-2.39,2.46-2.39,2.39-2.39,1.16-2.39,1.23-2.46,.58h-2.39l-2.39,.65-2.39,.51-2.39,.65-2.46,.58-2.39,.65-2.39,.58-2.39,1.16-2.39,.65-2.46,1.23-2.39,.51-2.39,1.23-2.39,.65-2.39,.51-2.46,1.23-2.39,1.88-2.39,1.74-2.39,1.81-2.39,1.23-2.46,1.74-1.16,2.39-1.23,2.46-.51,2.39-.65,2.39,1.81,1.23,.58,3.04v1.16l1.16,2.97v1.23l2.46,.58,1.81,.58,1.23,1.88,2.97,.51h3.04l37.78,42.05,43.21-58.19,7.24-15.05-2.39-19.76-2.97-.65" fill="#87a4af" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M833.13,574.16l-2.46,1.74-2.39,1.88-2.39,.58-2.39,1.81,2.39,.58,2.39-.58,2.39-.65,2.46-1.74,1.81-2.39-1.81-1.23" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M858.32,611.95l-1.74-1.23-.65-3.55-15.63,2.39-7.74,.65-2.39-.65-2.46-1.23-2.39-1.16-3.62-1.23-2.39-.58-2.39-1.16-2.39-1.88-2.39-1.16-1.23-2.39-.65-2.46-2.39-1.16-.58-2.39-1.16-2.46-1.88-2.39-2.97-1.16-1.81-2.46-2.39-.51,4.78-1.88,2.39-.51,2.39-.65h4.85l3.04-1.23,2.39-1.16h2.39l1.81,2.39-.58,2.39,2.39,4.27,1.23,2.39h2.39l1.74-2.39h2.39l2.46,.51,1.16-2.39,2.39-1.74,2.46-1.23,2.39-.65,3.04-.51-.65-2.46,.65-2.39-1.23-2.39-2.39-.65-2.39,.65h-2.39l1.16-2.39,2.39-.65,2.46-1.74,1.74-2.39,2.39-1.88,2.39-2.39,2.46-2.39,2.39-1.81,2.39-1.81,1.81-2.39,2.46-2.39,.51-2.46v-2.39l.65-4.78v-2.39l-.65-2.39v-2.46l1.88-2.39,1.74-2.39v-2.39l1.23-2.39,1.16-2.46v-10.13l-1.16-2.39,.65-2.39-1.88-2.46v-2.39l.65-2.39,1.23-2.39-.65-2.39v-2.39l1.81-3.04,.58,3.04v1.16l1.16,2.97v1.23l2.46,.58,1.81,.58,1.23,1.88,2.97,.51h3.04l37.78,42.05,6.66,60.07-65.5,7.82-1.23-.65" fill="#ccd8dc" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M918.39,544.71l43.21-58.19,7.24-15.05-2.39-19.76h1.81l2.39,.58,2.46,.58h2.39l2.39-.58,1.74-2.46,1.23-2.39-2.39-1.16-2.39,.65-2.46,.51-2.39,.65,1.23-2.39,2.39-.65,2.39-.58,2.39-.58h2.46l2.39,1.81,.65,2.39,1.74,2.97-.58,2.39,1.81,2.39,1.16,2.46,.65,2.39v7.17l-.65,3.62v2.39l-.58,2.39-1.16,2.46-1.88,2.39-1.74,2.39-1.81,2.39-1.81,2.39-1.16,2.46-1.23,2.39-.65,2.39-.58,2.39-2.39,3.62-.65,2.39,.65,2.39,.58,2.39,.65,2.46v2.39l-3.04,4.78-2.39,2.39-.58,2.39v2.46l2.39,1.81,2.39-1.23,2.39-.58,1.23,2.39v2.39l-1.81,2.39-2.46,1.88-2.39,1.16-1.16,2.39,1.16,2.46h2.39l2.46-1.23,.58,2.39-.58,2.39v2.39l-.58,2.46v2.39l-.65,2.39-.58,2.39-.65,2.39v2.46l-.51,2.39,.51,2.97v2.39l.65,2.39v2.39l-1.16,2.39-.65,2.46-.58,2.39-1.81,2.39-2.46-1.23-.51-2.39-.65-2.39-1.81-2.39-2.39-1.23-2.39-1.74v-2.39l.58-2.39v-2.46l-.58-2.39-.65-2.39-1.16-2.39-2.46,1.16-.51,2.46-.65,2.39-1.23,2.39-.51,2.39v2.39l-.65,2.39-2.46,1.23-2.39,.58-2.39,.65-2.39,1.16-1.74,2.39-1.23,2.46-.65,2.39-.58,2.39-.65,2.39-.51,2.39-1.23,2.39-1.16,2.46-.65,2.39-2.39,.58-1.81-2.46-3.04-1.16h-2.39l-6.01-50.45" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M967.61,596.96v-2.39l.65-2.39,1.81-2.39v-2.39l-.14-2.24-1.66,2.24-.65,2.39-1.16,2.39-1.23,2.39,2.39,2.39" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M995.91,483.47l-2.39-.58-2.39,1.23-1.88,2.39-.58,2.39-.58,2.39,1.16,2.46,2.39,.51,1.23-2.39,1.23-2.39,1.16-2.39,.65-3.62" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M94.44,143.66l-1.3,1.74v2.17l.87,2.1,.36,2.1,2.1,1.81,2.03,1.81,.87,2.39,1.59,2.1,.87,2.1,.29,2.1,2.39,.87v-6.88l-1.52-2.1-1.45-2.1-.58-2.1-.94-2.39-.65-1.88-1.38-1.09-2.17-1.23-1.37-1.52" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M112.39,206.12l-43.35-4.92,1.23-2.39,1.74-2.39v-4.78l1.23-2.46v-9.55l-1.81-2.39-2.39-1.81-2.39-1.81-1.74-2.39-1.23-2.46-1.23-2.39-1.16-2.39-1.23-2.39-.65-2.39-.58-2.46-2.46-2.39-2.39-2.39-1.74-3.62-1.88-2.39-2.39-1.81-2.39-1.23-2.39-2.39-2.39-1.74-2.46-2.46-2.39-1.16-2.39-2.39-2.39-1.88-1.23-2.39-1.74-2.39v-2.39l-.65-4.85v-12.01l-.58-2.39-1.16-2.39-.65-2.39-.58-2.39-2.39-2.39-.58-2.46,.58-2.39,.65-2.39,2.32,.65v-2.39l-2.32-1.88,.51-2.32v-2.39l-1.74-2.39-2.39,1.16-1.88-2.39-.58-2.39v-2.39l1.16-2.46v-2.46l-.58-2.39-1.16-2.39-1.88-2.39-1.16-2.39-1.74-2.39-2.46-2.46-.65-2.39v-2.39l.65-2.39,2.46-.58v-4.78l-2.46-2.39-1.81-2.46-.58-2.39-.65-2.39-.51-3.04-.65-2.39-1.23-2.39-.58-2.46-1.16-2.39-.58-2.39v-2.32l70.79,4.2,1.88,2.39v2.39l-1.88,2.39-1.74,2.39-2.39,.58-2.97,3.04-1.88,2.39v2.39l-.58,2.46v2.39l-1.81,2.39-1.23,2.39,1.88,2.39,2.39,1.81,1.23,2.39,.51,2.39-.51,2.39-.65,2.39-1.81,2.39-1.16,2.46,1.16,2.39v2.39l-.58,2.39-.58,2.39v2.46l.58,2.39,.58,2.39,2.46,2.39,.51,3.04-1.16,2.39-1.23,2.39v2.46l1.23,2.39,.65,2.39-.65,6.59-.58,2.39-.65,2.39v2.39l.65,2.39v4.92l1.74,2.39,.65,2.39v2.39l1.81,2.46,2.39,2.39,2.39,1.74,2.39,1.88,1.74,2.39,1.88,2.39,1.74,2.32,2.39,2.39,1.23,2.39,1.23,2.46,1.81,2.39,2.39,1.16,.58,2.39v2.46l.65,2.39,.58,2.39v4.78l1.16,2.46,1.23-2.46h2.39l.65,2.46v2.39l1.16,2.39,2.46-1.23,2.39,1.23v4.78l.58,2.39v2.46l.58,2.39,1.81,2.39,1.81,2.39h4.2l.65,2.39v10.28l.51,2.39-.43,1.3" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M112.83,209.6l-.51,2.97v2.46l1.16,2.39,2.39,.65,7.24,7.82,1.23,2.39v2.32l.51,2.39,1.23,2.46v2.39l.65,2.39,1.74,2.39,2.39,1.23,3.04,1.16v2.39h-2.39v2.46l1.81,2.39,1.16,2.39,.65,2.39-1.81,2.39-.58,2.46,1.74,2.39,1.88,2.39,2.39,1.81v-4.78l-.65-2.39-1.23-2.39v-2.46l1.23-2.39,2.39,1.23,1.23,2.39,1.23,2.39,1.81,2.39,.65,2.46,1.16,2.39,1.23,2.39,2.39,1.74v2.39l-.65,2.46-1.74,2.39-.65,2.39,.65,2.39,.58,2.39,.58,2.46-1.16,2.39,.58,2.39,1.81,2.39v2.39l.58,2.39,1.81,2.46v2.39l1.23,2.39,2.39,1.81,2.39,1.81v2.39l.58,2.39v2.46l.65,2.46v2.39l.51,2.39,1.88,2.39,3.55,7.24,1.81,2.39,.58,2.39-1.23,2.39-1.74,2.39-1.74,3.62,1.16,2.39,.58,2.39,.58,2.46v2.39l.58,2.39,2.46,2.39,1.74,2.39,2.39,1.23,2.39,1.74h3.04l.58-2.39v-2.39l1.88-2.39,2.39,1.81,1.16,2.39,1.23,2.46,1.23,2.39,.51,2.39,.65,2.39,1.81,2.39,2.39,1.81,2.39,1.16,2.39,2.39,.65,2.46-.65,2.39v2.39l2.39,1.81,3.04,1.23,2.46,.58,1.16,2.39v9.63l-1.81,2.39-1.23,2.39-1.16,2.39-2.46,1.23-2.39,1.81-1.16,2.97-2.46,.58-2.39,1.16-2.39,1.88h-2.39l-1.81-2.39-1.81-2.46v-2.39l-1.74-2.39-.65-2.39v-2.97l-.58-3.04-.65-2.39-1.16-2.39v-2.46l-.58-2.39-4.27-4.78-4.13-1.88-1.88-2.39-2.32-1.74-1.81-2.39-1.81-2.39-1.81-2.46-1.74-2.39-1.23-2.39-2.39-2.39-1.23-2.39-2.39-1.88-2.39-1.74-2.39-1.74-3.04-1.88-1.23-2.39-2.39-2.39-1.88-2.39-2.39-2.46-2.39-1.74-1.23-2.39-2.97-2.39-.58-2.39-1.23-2.46-2.39-.58-2.39-1.81v-2.39l.58-2.39-2.39-1.23-.65,2.39v7.24l-1.74,2.39-2.39-1.81-.65-2.39-.58-2.46,.58-2.39,1.81-2.39v-2.39l-.58-2.39,2.39-2.46,1.81-2.39,1.81-2.39v-4.78l.58-2.39,2.46-1.88-.65-2.39,.65-2.39,.51-2.39,1.23-2.46v-2.39l-1.23-2.39v-2.39l-.51-2.39-1.23-2.39-.65-2.46-1.74-2.39-1.88-2.39-2.39-1.74-2.97-.65-2.39-.58-2.39-1.81-2.39-2.46-2.46-1.74-1.16-2.39-1.88-2.39-1.74-2.39-3.04-3.04-1.23-2.46-1.16-2.39v-2.39l1.81-2.39,1.23-2.39,.58-2.46-2.46,.65-1.16,2.39-1.81,2.46-2.39,.51-2.39-1.74-.65-2.39-.58-2.39-2.39,.51,.58,2.46v2.39l-1.23,2.39-2.39,.65-2.39-.65-2.39-2.39-.58-2.39-.65-2.46-1.16-2.39-2.32-1.74-2.46-.65-2.39-1.16-.65-2.46-1.74-2.39-3.04-1.74-2.39-.65-2.39-1.23-2.46-2.39-.58-2.39,1.16-2.39-1.74-2.39-1.88-2.46-2.39-1.74-2.39-2.39-1.74-2.39-2.46-2.39-2.39-2.46-1.81-2.39,.65-2.39,6.51,.58,2.46,1.81,2.39,.58h10.21l2.46-1.23,2.39-1.16,2.39-1.81,2.39-2.39,43.35,4.92,.43,3.47" fill="#87a4af" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M157.99,289.5l-2.39,1.23-2.39,1.16-1.23,2.46,.65,2.39,2.39,1.16,1.23-2.39,1.74-2.39,1.23-2.39-1.23-1.23" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M167.62,329.24l-.65,2.39v2.39l1.23,2.39,2.39,2.39,1.88-2.39-.65-2.39-1.81-2.39-.58-2.39h-1.81" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M176.59,350.81v4.85l2.39,1.74,.65-2.39-.65-2.39-2.39-1.81" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                    <path d="M192.88,361.01l-.65,2.39,.65,2.39,1.16,2.39,1.81,2.46,1.16-2.46-.58-2.39-.58-2.39-1.81-2.39h-1.16" fill="#abbec6" stroke="#eaeef1" stroke-width="2.45" />
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "CUERNAVACA")) {
                                                                            echo "CUERNAVACA Riesgo: " . $dato = $r->CUERNAVACA->TEXTO;
                                                                          } else {
                                                                            echo "Cuernavaca Riesgo: Sin Dato";
                                                                          } ?>" id="CVA_TOOLTIP" style="cursor:pointer">
                    <path id="CVA" d="M561.56,580.33c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "CUERNAVACA")) {
                                                                                                                                                                                                                                                      echo $dato = $r->CUERNAVACA->COLOR;
                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                      echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                    } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="563.46" cy="589.37" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="563.42" cy="589.36" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="563.38" cy="589.35" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="563.34" cy="589.35" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="563.3" cy="589.34" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="563.27" cy="589.33" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="563.23" cy="589.33" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="563.19" cy="589.32" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="563.15" cy="589.32" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="563.11" cy="589.31" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="563.07" cy="589.3" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="563.03" cy="589.3" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="563" cy="589.29" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="562.96" cy="589.28" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="562.92" cy="589.28" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="562.88" cy="589.27" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="562.84" cy="589.26" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="562.8" cy="589.26" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="562.76" cy="589.25" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="562.73" cy="589.25" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="562.69" cy="589.24" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="562.65" cy="589.23" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="562.61" cy="589.23" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="562.57" cy="589.22" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="562.53" cy="589.21" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="562.49" cy="589.21" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="562.46" cy="589.2" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="562.42" cy="589.2" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="562.38" cy="589.19" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="562.34" cy="589.18" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="562.3" cy="589.18" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="562.26" cy="589.17" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="562.22" cy="589.16" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="562.19" cy="589.16" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="562.15" cy="589.15" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="562.11" cy="589.15" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="562.07" cy="589.14" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="562.03" cy="589.13" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="561.99" cy="589.13" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="561.95" cy="589.12" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="561.92" cy="589.11" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="561.88" cy="589.11" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="561.84" cy="589.1" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="561.8" cy="589.1" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="561.76" cy="589.09" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="561.72" cy="589.08" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="561.68" cy="589.08" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="561.64" cy="589.07" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="561.61" cy="589.06" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="561.57" cy="589.06" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="561.53" cy="589.05" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="561.49" cy="589.04" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="561.34" cy="589.04" r="6.61" fill="#fff" />
                        <circle cx="561.74" cy="589.04" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="popover" data-html="true" data-placement="right" data-sanitize="false" title='Resultados CDMX' data-content='<?php echo $CDMX; ?>' id="CDMX_TOOLTIP" style="cursor:pointer">
                    <path id="CDMX" d="M559.98,551.1c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "CDMX")) {
                                                                                                                                                                                                                                                      echo $dato = $r->CDMX->COLOR;
                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                      echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                    } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="561.88" cy="560.14" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="561.84" cy="560.13" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="561.8" cy="560.12" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="561.77" cy="560.12" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="561.73" cy="560.11" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="561.69" cy="560.1" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="561.65" cy="560.1" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="561.61" cy="560.09" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="561.57" cy="560.09" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="561.53" cy="560.08" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="561.5" cy="560.07" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="561.46" cy="560.07" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="561.42" cy="560.06" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="561.38" cy="560.05" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="561.34" cy="560.05" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="561.3" cy="560.04" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="561.26" cy="560.03" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="561.23" cy="560.03" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="561.19" cy="560.02" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="561.15" cy="560.02" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="561.11" cy="560.01" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="561.07" cy="560" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="561.03" cy="560" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="560.99" cy="559.99" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="560.96" cy="559.98" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="560.92" cy="559.98" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="560.88" cy="559.97" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="560.84" cy="559.97" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="560.8" cy="559.96" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="560.76" cy="559.95" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="560.72" cy="559.95" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="560.69" cy="559.94" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="560.65" cy="559.93" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="560.61" cy="559.93" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="560.57" cy="559.92" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="560.53" cy="559.92" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="560.49" cy="559.91" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="560.45" cy="559.9" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="560.42" cy="559.9" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="560.38" cy="559.89" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="560.34" cy="559.88" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="560.3" cy="559.88" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="560.26" cy="559.87" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="560.22" cy="559.87" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="560.18" cy="559.86" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="560.14" cy="559.85" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="560.11" cy="559.85" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="560.07" cy="559.84" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="560.03" cy="559.83" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="559.99" cy="559.83" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="559.95" cy="559.82" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="559.91" cy="559.81" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="559.76" cy="559.81" r="6.61" fill="#fff" />
                        <circle cx="560.16" cy="559.81" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-2)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "CANCUN")) {
                                                                            echo "CANCUN Riesgo: " . $dato = $r->CANCUN->TEXTO;
                                                                          } else {
                                                                            echo "CANCUN Riesgo: Sin Dato";
                                                                          } ?>" id="CANCUN_TOOLTIP" style="cursor:pointer">
                    <path id="CANCUN" d="M982.1,446.58c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "CANCUN")) {
                                                                                                                                                                                                                                                        echo $dato = $r->CANCUN->COLOR;
                                                                                                                                                                                                                                                      } else {
                                                                                                                                                                                                                                                        echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                      } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="984" cy="455.62" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="983.96" cy="455.61" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="983.92" cy="455.61" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="983.88" cy="455.6" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="983.85" cy="455.6" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="983.81" cy="455.59" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="983.77" cy="455.58" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="983.73" cy="455.58" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="983.69" cy="455.57" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="983.65" cy="455.56" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="983.61" cy="455.56" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="983.58" cy="455.55" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="983.54" cy="455.55" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="983.5" cy="455.54" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="983.46" cy="455.53" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="983.42" cy="455.53" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="983.38" cy="455.52" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="983.34" cy="455.51" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="983.31" cy="455.51" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="983.27" cy="455.5" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="983.23" cy="455.49" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="983.19" cy="455.49" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="983.15" cy="455.48" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="983.11" cy="455.48" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="983.07" cy="455.47" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="983.04" cy="455.46" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="983" cy="455.46" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="982.96" cy="455.45" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="982.92" cy="455.44" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="982.88" cy="455.44" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="982.84" cy="455.43" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="982.8" cy="455.43" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="982.77" cy="455.42" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="982.73" cy="455.41" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="982.69" cy="455.41" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="982.65" cy="455.4" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="982.61" cy="455.39" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="982.57" cy="455.39" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="982.53" cy="455.38" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="982.5" cy="455.38" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="982.46" cy="455.37" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="982.42" cy="455.36" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="982.38" cy="455.36" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="982.34" cy="455.35" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="982.3" cy="455.34" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="982.26" cy="455.34" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="982.23" cy="455.33" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="982.19" cy="455.33" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="982.15" cy="455.32" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="982.11" cy="455.31" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="982.07" cy="455.31" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="982.03" cy="455.3" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="981.88" cy="455.3" r="6.61" fill="#fff" />
                        <circle cx="982.28" cy="455.3" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-3)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "MERIDA")) {
                                                                            echo "MERIDA Riesgo: " . $dato = $r->MERIDA->TEXTO;
                                                                          } else {
                                                                            echo "MERIDA Riesgo: Sin Dato";
                                                                          } ?>" id="MERIDA_TOOLTIP" style="cursor:pointer">
                    <path id="MERIDA" d="M922.1,444.18c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "MERIDA")) {
                                                                                                                                                                                                                                                        echo $dato = $r->MERIDA->COLOR;
                                                                                                                                                                                                                                                      } else {
                                                                                                                                                                                                                                                        echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                      } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="924" cy="453.21" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="923.96" cy="453.21" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="923.92" cy="453.2" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="923.88" cy="453.2" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="923.85" cy="453.19" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="923.81" cy="453.18" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="923.77" cy="453.18" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="923.73" cy="453.17" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="923.69" cy="453.16" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="923.65" cy="453.16" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="923.61" cy="453.15" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="923.58" cy="453.15" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="923.54" cy="453.14" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="923.5" cy="453.13" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="923.46" cy="453.13" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="923.42" cy="453.12" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="923.38" cy="453.11" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="923.34" cy="453.11" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="923.31" cy="453.1" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="923.27" cy="453.1" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="923.23" cy="453.09" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="923.19" cy="453.08" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="923.15" cy="453.08" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="923.11" cy="453.07" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="923.07" cy="453.06" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="923.04" cy="453.06" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="923" cy="453.05" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="922.96" cy="453.04" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="922.92" cy="453.04" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="922.88" cy="453.03" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="922.84" cy="453.03" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="922.8" cy="453.02" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="922.77" cy="453.01" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="922.73" cy="453.01" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="922.69" cy="453" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="922.65" cy="452.99" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="922.61" cy="452.99" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="922.57" cy="452.98" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="922.53" cy="452.98" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="922.5" cy="452.97" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="922.46" cy="452.96" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="922.42" cy="452.96" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="922.38" cy="452.95" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="922.34" cy="452.94" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="922.3" cy="452.94" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="922.26" cy="452.93" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="922.23" cy="452.93" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="922.19" cy="452.92" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="922.15" cy="452.91" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="922.11" cy="452.91" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="922.07" cy="452.9" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="922.03" cy="452.89" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="921.88" cy="452.89" r="6.61" fill="#fff" />
                        <circle cx="922.28" cy="452.89" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-4)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "VILLAHERMOSA")) {
                                                                            echo "VILLAHERMOSA Riesgo: " . $dato = $r->VILLAHERMOSA->TEXTO;
                                                                          } else {
                                                                            echo "VILLAHERMOSA Riesgo: Sin Dato";
                                                                          } ?>" id="VILLAHERMOSA_TOOLTIP" style="cursor:pointer">
                    <path id="VILLAHERMOSA" d="M785.04,585.1c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "MERIDA")) {
                                                                                                                                                                                                                                                              echo $dato = $r->VILLAHERMOSA->COLOR;
                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                              echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                            } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="786.94" cy="594.14" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="786.9" cy="594.13" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="786.86" cy="594.12" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="786.83" cy="594.12" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="786.79" cy="594.11" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="786.75" cy="594.1" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="786.71" cy="594.1" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="786.67" cy="594.09" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="786.63" cy="594.09" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="786.59" cy="594.08" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="786.55" cy="594.07" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="786.52" cy="594.07" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="786.48" cy="594.06" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="786.44" cy="594.05" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="786.4" cy="594.05" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="786.36" cy="594.04" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="786.32" cy="594.03" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="786.28" cy="594.03" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="786.25" cy="594.02" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="786.21" cy="594.02" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="786.17" cy="594.01" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="786.13" cy="594" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="786.09" cy="594" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="786.05" cy="593.99" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="786.01" cy="593.98" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="785.98" cy="593.98" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="785.94" cy="593.97" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="785.9" cy="593.97" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="785.86" cy="593.96" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="785.82" cy="593.95" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="785.78" cy="593.95" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="785.74" cy="593.94" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="785.71" cy="593.93" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="785.67" cy="593.93" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="785.63" cy="593.92" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="785.59" cy="593.92" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="785.55" cy="593.91" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="785.51" cy="593.9" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="785.47" cy="593.9" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="785.44" cy="593.89" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="785.4" cy="593.88" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="785.36" cy="593.88" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="785.32" cy="593.87" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="785.28" cy="593.87" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="785.24" cy="593.86" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="785.2" cy="593.85" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="785.17" cy="593.85" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="785.13" cy="593.84" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="785.09" cy="593.83" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="785.05" cy="593.83" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="785.01" cy="593.82" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="784.97" cy="593.81" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="784.82" cy="593.81" r="6.61" fill="#fff" />
                        <circle cx="785.22" cy="593.81" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-5)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "VERACRUZ")) {
                                                                            echo "VERACRUZ Riesgo: " . $dato = $r->VERACRUZ->TEXTO;
                                                                          } else {
                                                                            echo "VERACRUZ Riesgo: Sin Dato";
                                                                          } ?>" id="VERACRUZ_TOOLTIP" style="cursor:pointer">
                    <path id="VERACRUZ" d="M707.04,583.1c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "VERACRUZ")) {
                                                                                                                                                                                                                                                          echo $dato = $r->VERACRUZ->COLOR;
                                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                                          echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                        } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="708.94" cy="592.14" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="708.9" cy="592.13" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="708.86" cy="592.12" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="708.83" cy="592.12" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="708.79" cy="592.11" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="708.75" cy="592.1" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="708.71" cy="592.1" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="708.67" cy="592.09" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="708.63" cy="592.09" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="708.59" cy="592.08" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="708.55" cy="592.07" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="708.52" cy="592.07" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="708.48" cy="592.06" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="708.44" cy="592.05" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="708.4" cy="592.05" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="708.36" cy="592.04" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="708.32" cy="592.03" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="708.28" cy="592.03" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="708.25" cy="592.02" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="708.21" cy="592.02" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="708.17" cy="592.01" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="708.13" cy="592" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="708.09" cy="592" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="708.05" cy="591.99" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="708.01" cy="591.98" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="707.98" cy="591.98" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="707.94" cy="591.97" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="707.9" cy="591.97" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="707.86" cy="591.96" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="707.82" cy="591.95" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="707.78" cy="591.95" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="707.74" cy="591.94" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="707.71" cy="591.93" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="707.67" cy="591.93" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="707.63" cy="591.92" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="707.59" cy="591.92" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="707.55" cy="591.91" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="707.51" cy="591.9" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="707.47" cy="591.9" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="707.44" cy="591.89" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="707.4" cy="591.88" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="707.36" cy="591.88" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="707.32" cy="591.87" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="707.28" cy="591.87" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="707.24" cy="591.86" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="707.2" cy="591.85" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="707.17" cy="591.85" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="707.13" cy="591.84" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="707.09" cy="591.83" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="707.05" cy="591.83" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="707.01" cy="591.82" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="706.97" cy="591.81" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="706.82" cy="591.81" r="6.61" fill="#fff" />
                        <circle cx="707.22" cy="591.81" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-6)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "XALAPA")) {
                                                                            echo "XALAPA Riesgo: " . $dato = $r->XALAPA->TEXTO;
                                                                          } else {
                                                                            echo "XALAPA Riesgo: Sin Dato";
                                                                          } ?>" id="XALAPA_TOOLTIP" style="cursor:pointer">
                    <path id="XALAPA" d="M661.65,554.1c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "XALAPA")) {
                                                                                                                                                                                                                                                        echo $dato = $r->XALAPA->COLOR;
                                                                                                                                                                                                                                                      } else {
                                                                                                                                                                                                                                                        echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                      } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="663.55" cy="563.14" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="663.52" cy="563.13" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="663.48" cy="563.12" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="663.44" cy="563.12" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="663.4" cy="563.11" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="663.36" cy="563.1" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="663.32" cy="563.1" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="663.28" cy="563.09" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="663.25" cy="563.09" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="663.21" cy="563.08" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="663.17" cy="563.07" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="663.13" cy="563.07" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="663.09" cy="563.06" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="663.05" cy="563.05" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="663.01" cy="563.05" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="662.98" cy="563.04" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="662.94" cy="563.03" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="662.9" cy="563.03" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="662.86" cy="563.02" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="662.82" cy="563.02" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="662.78" cy="563.01" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="662.74" cy="563" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="662.71" cy="563" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="662.67" cy="562.99" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="662.63" cy="562.98" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="662.59" cy="562.98" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="662.55" cy="562.97" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="662.51" cy="562.97" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="662.47" cy="562.96" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="662.44" cy="562.95" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="662.4" cy="562.95" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="662.36" cy="562.94" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="662.32" cy="562.93" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="662.28" cy="562.93" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="662.24" cy="562.92" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="662.2" cy="562.92" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="662.17" cy="562.91" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="662.13" cy="562.9" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="662.09" cy="562.9" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="662.05" cy="562.89" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="662.01" cy="562.88" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="661.97" cy="562.88" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="661.93" cy="562.87" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="661.9" cy="562.87" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="661.86" cy="562.86" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="661.82" cy="562.85" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="661.78" cy="562.85" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="661.74" cy="562.84" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="661.7" cy="562.83" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="661.66" cy="562.83" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="661.63" cy="562.82" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="661.59" cy="562.81" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="661.43" cy="562.81" r="6.61" fill="#fff" />
                        <circle cx="661.84" cy="562.81" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-7)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "PUEBLA")) {
                                                                            echo "PUEBLA Riesgo: " . $dato = $r->PUEBLA->TEXTO;
                                                                          } else {
                                                                            echo "PUEBLA Riesgo: Sin Dato";
                                                                          } ?>" id="PUEBLA_TOOLTIP" style="cursor:pointer">
                    <path id="PUEBLA" d="M598.65,562.1c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "PUEBLA")) {
                                                                                                                                                                                                                                                        echo $dato = $r->PUEBLA->COLOR;
                                                                                                                                                                                                                                                      } else {
                                                                                                                                                                                                                                                        echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                      } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="600.55" cy="571.14" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="600.52" cy="571.13" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="600.48" cy="571.12" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="600.44" cy="571.12" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="600.4" cy="571.11" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="600.36" cy="571.1" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="600.32" cy="571.1" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="600.28" cy="571.09" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="600.25" cy="571.09" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="600.21" cy="571.08" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="600.17" cy="571.07" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="600.13" cy="571.07" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="600.09" cy="571.06" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="600.05" cy="571.05" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="600.01" cy="571.05" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="599.98" cy="571.04" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="599.94" cy="571.03" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="599.9" cy="571.03" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="599.86" cy="571.02" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="599.82" cy="571.02" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="599.78" cy="571.01" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="599.74" cy="571" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="599.71" cy="571" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="599.67" cy="570.99" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="599.63" cy="570.98" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="599.59" cy="570.98" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="599.55" cy="570.97" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="599.51" cy="570.97" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="599.47" cy="570.96" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="599.44" cy="570.95" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="599.4" cy="570.95" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="599.36" cy="570.94" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="599.32" cy="570.93" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="599.28" cy="570.93" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="599.24" cy="570.92" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="599.2" cy="570.92" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="599.17" cy="570.91" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="599.13" cy="570.9" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="599.09" cy="570.9" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="599.05" cy="570.89" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="599.01" cy="570.88" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="598.97" cy="570.88" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="598.93" cy="570.87" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="598.9" cy="570.87" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="598.86" cy="570.86" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="598.82" cy="570.85" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="598.78" cy="570.85" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="598.74" cy="570.84" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="598.7" cy="570.83" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="598.66" cy="570.83" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="598.63" cy="570.82" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="598.59" cy="570.81" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="598.43" cy="570.81" r="6.61" fill="#fff" />
                        <circle cx="598.84" cy="570.81" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-8)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "MORELIA")) {
                                                                            echo "CaMORELIAncún Riesgo: " . $dato = $r->MORELIA->TEXTO;
                                                                          } else {
                                                                            echo "MORELIA Riesgo: Sin Dato";
                                                                          } ?>" id="MORELIA_TOOLTIP" style="cursor:pointer">
                    <path id="MORELIA" d="M481.51,538.27c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "MORELIA")) {
                                                                                                                                                                                                                                                          echo $dato = $r->MORELIA->COLOR;
                                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                                          echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                        } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="483.42" cy="547.3" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="483.38" cy="547.3" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="483.34" cy="547.29" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="483.3" cy="547.28" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="483.26" cy="547.28" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="483.22" cy="547.27" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="483.18" cy="547.27" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="483.15" cy="547.26" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="483.11" cy="547.25" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="483.07" cy="547.25" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="483.03" cy="547.24" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="482.99" cy="547.23" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="482.95" cy="547.23" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="482.91" cy="547.22" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="482.88" cy="547.22" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="482.84" cy="547.21" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="482.8" cy="547.2" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="482.76" cy="547.2" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="482.72" cy="547.19" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="482.68" cy="547.18" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="482.64" cy="547.18" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="482.61" cy="547.17" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="482.57" cy="547.17" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="482.53" cy="547.16" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="482.49" cy="547.15" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="482.45" cy="547.15" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="482.41" cy="547.14" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="482.37" cy="547.13" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="482.34" cy="547.13" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="482.3" cy="547.12" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="482.26" cy="547.12" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="482.22" cy="547.11" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="482.18" cy="547.1" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="482.14" cy="547.1" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="482.1" cy="547.09" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="482.07" cy="547.08" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="482.03" cy="547.08" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="481.99" cy="547.07" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="481.95" cy="547.06" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="481.91" cy="547.06" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="481.87" cy="547.05" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="481.83" cy="547.05" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="481.8" cy="547.04" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="481.76" cy="547.03" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="481.72" cy="547.03" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="481.68" cy="547.02" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="481.64" cy="547.01" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="481.6" cy="547.01" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="481.56" cy="547" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="481.53" cy="547" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="481.49" cy="546.99" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="481.45" cy="546.98" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="481.3" cy="546.98" r="6.61" fill="#fff" />
                        <circle cx="481.7" cy="546.98" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-9)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "GUADALAJARA_I")) {
                                                                            echo "GUADALAJARA I Riesgo: " . $dato = $r->GUADALAJARA_I->TEXTO;
                                                                          } else {
                                                                            echo "GUADALAJARA I Riesgo: Sin Dato";
                                                                          } ?>" id="GUADALAJARAI_TOOLTIP" style="cursor:pointer">
                    <path id="GUADALAJARA1" d="M435.51,476.27c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "GUADALAJARA_I")) {
                                                                                                                                                                                                                                                                echo $dato = $r->GUADALAJARA_I->COLOR;
                                                                                                                                                                                                                                                              } else {
                                                                                                                                                                                                                                                                echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                              } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="437.42" cy="485.3" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="437.38" cy="485.3" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="437.34" cy="485.29" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="437.3" cy="485.28" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="437.26" cy="485.28" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="437.22" cy="485.27" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="437.18" cy="485.27" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="437.15" cy="485.26" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="437.11" cy="485.25" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="437.07" cy="485.25" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="437.03" cy="485.24" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="436.99" cy="485.23" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="436.95" cy="485.23" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="436.91" cy="485.22" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="436.88" cy="485.22" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="436.84" cy="485.21" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="436.8" cy="485.2" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="436.76" cy="485.2" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="436.72" cy="485.19" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="436.68" cy="485.18" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="436.64" cy="485.18" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="436.61" cy="485.17" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="436.57" cy="485.17" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="436.53" cy="485.16" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="436.49" cy="485.15" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="436.45" cy="485.15" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="436.41" cy="485.14" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="436.37" cy="485.13" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="436.34" cy="485.13" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="436.3" cy="485.12" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="436.26" cy="485.12" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="436.22" cy="485.11" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="436.18" cy="485.1" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="436.14" cy="485.1" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="436.1" cy="485.09" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="436.07" cy="485.08" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="436.03" cy="485.08" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="435.99" cy="485.07" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="435.95" cy="485.06" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="435.91" cy="485.06" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="435.87" cy="485.05" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="435.83" cy="485.05" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="435.8" cy="485.04" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="435.76" cy="485.03" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="435.72" cy="485.03" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="435.68" cy="485.02" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="435.64" cy="485.01" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="435.6" cy="485.01" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="435.56" cy="485" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="435.53" cy="485" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="435.49" cy="484.99" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="435.45" cy="484.98" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="435.3" cy="484.98" r="6.61" fill="#fff" />
                        <circle cx="435.7" cy="484.98" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-10)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "GUADALAJARA_II")) {
                                                                            echo "GUADALAJARA II Riesgo: " . $dato = $r->GUADALAJARA_II->TEXTO;
                                                                          } else {
                                                                            echo "GUADALAJARA II Riesgo: Sin Dato";
                                                                          } ?>" id="GUADALAJARAII_TOOLTIP" style="cursor:pointer">
                    <path id="GUADALAJARA2" d="M414.51,495.27c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "GUADALAJARA_II")) {
                                                                                                                                                                                                                                                                echo $dato = $r->GUADALAJARA_II->COLOR;
                                                                                                                                                                                                                                                              } else {
                                                                                                                                                                                                                                                                echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                              } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="416.42" cy="504.3" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="416.38" cy="504.3" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="416.34" cy="504.29" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="416.3" cy="504.28" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="416.26" cy="504.28" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="416.22" cy="504.27" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="416.18" cy="504.27" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="416.15" cy="504.26" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="416.11" cy="504.25" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="416.07" cy="504.25" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="416.03" cy="504.24" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="415.99" cy="504.23" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="415.95" cy="504.23" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="415.91" cy="504.22" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="415.88" cy="504.22" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="415.84" cy="504.21" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="415.8" cy="504.2" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="415.76" cy="504.2" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="415.72" cy="504.19" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="415.68" cy="504.18" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="415.64" cy="504.18" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="415.61" cy="504.17" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="415.57" cy="504.17" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="415.53" cy="504.16" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="415.49" cy="504.15" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="415.45" cy="504.15" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="415.41" cy="504.14" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="415.37" cy="504.13" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="415.34" cy="504.13" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="415.3" cy="504.12" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="415.26" cy="504.12" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="415.22" cy="504.11" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="415.18" cy="504.1" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="415.14" cy="504.1" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="415.1" cy="504.09" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="415.07" cy="504.08" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="415.03" cy="504.08" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="414.99" cy="504.07" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="414.95" cy="504.06" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="414.91" cy="504.06" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="414.87" cy="504.05" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="414.83" cy="504.05" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="414.8" cy="504.04" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="414.76" cy="504.03" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="414.72" cy="504.03" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="414.68" cy="504.02" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="414.64" cy="504.01" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="414.6" cy="504.01" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="414.56" cy="504" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="414.53" cy="504" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="414.49" cy="503.99" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="414.45" cy="503.98" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="414.3" cy="503.98" r="6.61" fill="#fff" />
                        <circle cx="414.7" cy="503.98" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-11)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "VALLARTA")) {
                                                                            echo "VALLARTA Riesgo: " . $dato = $r->VALLARTA->TEXTO;
                                                                          } else {
                                                                            echo "VALLARTA Riesgo: Sin Dato";
                                                                          } ?>" id="PUERTOVALLARTA_TOOLTIP" style="cursor:pointer">
                    <path id="PUERTOVALLARTA" d="M337.51,525.27c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "VALLARTA")) {
                                                                                                                                                                                                                                                                  echo $dato = $r->VALLARTA->COLOR;
                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                  echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                                } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="339.42" cy="534.3" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="339.38" cy="534.3" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="339.34" cy="534.29" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="339.3" cy="534.28" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="339.26" cy="534.28" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="339.22" cy="534.27" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="339.18" cy="534.27" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="339.15" cy="534.26" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="339.11" cy="534.25" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="339.07" cy="534.25" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="339.03" cy="534.24" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="338.99" cy="534.23" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="338.95" cy="534.23" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="338.91" cy="534.22" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="338.88" cy="534.22" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="338.84" cy="534.21" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="338.8" cy="534.2" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="338.76" cy="534.2" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="338.72" cy="534.19" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="338.68" cy="534.18" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="338.64" cy="534.18" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="338.61" cy="534.17" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="338.57" cy="534.17" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="338.53" cy="534.16" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="338.49" cy="534.15" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="338.45" cy="534.15" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="338.41" cy="534.14" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="338.37" cy="534.13" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="338.34" cy="534.13" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="338.3" cy="534.12" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="338.26" cy="534.12" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="338.22" cy="534.11" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="338.18" cy="534.1" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="338.14" cy="534.1" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="338.1" cy="534.09" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="338.07" cy="534.08" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="338.03" cy="534.08" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="337.99" cy="534.07" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="337.95" cy="534.06" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="337.91" cy="534.06" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="337.87" cy="534.05" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="337.83" cy="534.05" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="337.8" cy="534.04" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="337.76" cy="534.03" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="337.72" cy="534.03" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="337.68" cy="534.02" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="337.64" cy="534.01" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="337.6" cy="534.01" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="337.56" cy="534" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="337.53" cy="534" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="337.49" cy="533.99" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="337.45" cy="533.98" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="337.3" cy="533.98" r="6.61" fill="#fff" />
                        <circle cx="337.7" cy="533.98" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-12)" />
                      </g>
                    </g>
                  </g>
                  <path d="M454.85,468.45l-1.81,.8-1.66,1.21-1.26,2.11-1.66,1.71-1.66,.8-1.66,.4h-3.37l-1.66-.4-1.66-.8-1.66-.45h-1.66l-1.71,.45-1.66,.35-1.66,.45-1.66-1.26-1.31-1.66-.35-1.71-.45-1.66v-1.66l.45-1.66,1.21-1.66,1.66-.4,1.66-.45h1.71l1.66-1.21,1.66-1.31,1.66-1.21,1.66-1.25,1.66-.86,1.71-.85,1.66,.45,1.66,.4,1.31,1.66,1.66,1.66,1.21,1.71,1.31,1.66,.8,3.32,2.21,1.31" fill="none" stroke="#fff" stroke-width="2" />
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "AGUASCALIENTES")) {
                                                                            echo "AGUASCALIENTES Riesgo: " . $dato = $r->AGUASCALIENTES->TEXTO;
                                                                          } else {
                                                                            echo "AGUASCALIENTES Riesgo: Sin Dato";
                                                                          } ?>" id="AGUASCALIENTES_TOOLTIP" style="cursor:pointer">
                    <path id="AGUASCALIENTES" d="M442.51,441.64c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "AGUASCALIENTES")) {
                                                                                                                                                                                                                                                                  echo $dato = $r->AGUASCALIENTES->COLOR;
                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                  echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                                } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="444.42" cy="450.68" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="444.38" cy="450.67" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="444.34" cy="450.67" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="444.3" cy="450.66" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="444.26" cy="450.65" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="444.22" cy="450.65" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="444.18" cy="450.64" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="444.15" cy="450.64" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="444.11" cy="450.63" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="444.07" cy="450.62" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="444.03" cy="450.62" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="443.99" cy="450.61" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="443.95" cy="450.6" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="443.91" cy="450.6" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="443.88" cy="450.59" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="443.84" cy="450.59" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="443.8" cy="450.58" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="443.76" cy="450.57" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="443.72" cy="450.57" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="443.68" cy="450.56" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="443.64" cy="450.55" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="443.61" cy="450.55" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="443.57" cy="450.54" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="443.53" cy="450.54" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="443.49" cy="450.53" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="443.45" cy="450.52" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="443.41" cy="450.52" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="443.37" cy="450.51" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="443.34" cy="450.5" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="443.3" cy="450.5" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="443.26" cy="450.49" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="443.22" cy="450.49" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="443.18" cy="450.48" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="443.14" cy="450.47" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="443.1" cy="450.47" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="443.07" cy="450.46" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="443.03" cy="450.45" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="442.99" cy="450.45" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="442.95" cy="450.44" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="442.91" cy="450.43" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="442.87" cy="450.43" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="442.83" cy="450.42" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="442.8" cy="450.42" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="442.76" cy="450.41" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="442.72" cy="450.4" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="442.68" cy="450.4" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="442.64" cy="450.39" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="442.6" cy="450.38" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="442.56" cy="450.38" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="442.53" cy="450.37" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="442.49" cy="450.37" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="442.45" cy="450.36" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="442.3" cy="450.36" r="6.61" fill="#fff" />
                        <circle cx="442.7" cy="450.36" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-13)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "LEON_II")) {
                                                                            echo "LEON II Riesgo: " . $dato = $r->LEON_II->TEXTO;
                                                                          } else {
                                                                            echo "LEON II Riesgo: Sin Dato";
                                                                          } ?>" id="LEON2_TOOLTIP" style="cursor:pointer">
                    <path id="LEON2" d="M478.51,500.64c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "LEON_II")) {
                                                                                                                                                                                                                                                        echo $dato = $r->LEON_II->COLOR;
                                                                                                                                                                                                                                                      } else {
                                                                                                                                                                                                                                                        echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                      } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="480.42" cy="509.68" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="480.38" cy="509.67" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="480.34" cy="509.67" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="480.3" cy="509.66" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="480.26" cy="509.65" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="480.22" cy="509.65" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="480.18" cy="509.64" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="480.15" cy="509.64" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="480.11" cy="509.63" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="480.07" cy="509.62" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="480.03" cy="509.62" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="479.99" cy="509.61" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="479.95" cy="509.6" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="479.91" cy="509.6" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="479.88" cy="509.59" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="479.84" cy="509.59" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="479.8" cy="509.58" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="479.76" cy="509.57" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="479.72" cy="509.57" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="479.68" cy="509.56" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="479.64" cy="509.55" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="479.61" cy="509.55" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="479.57" cy="509.54" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="479.53" cy="509.54" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="479.49" cy="509.53" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="479.45" cy="509.52" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="479.41" cy="509.52" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="479.37" cy="509.51" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="479.34" cy="509.5" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="479.3" cy="509.5" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="479.26" cy="509.49" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="479.22" cy="509.49" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="479.18" cy="509.48" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="479.14" cy="509.47" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="479.1" cy="509.47" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="479.07" cy="509.46" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="479.03" cy="509.45" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="478.99" cy="509.45" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="478.95" cy="509.44" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="478.91" cy="509.43" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="478.87" cy="509.43" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="478.83" cy="509.42" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="478.8" cy="509.42" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="478.76" cy="509.41" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="478.72" cy="509.4" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="478.68" cy="509.4" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="478.64" cy="509.39" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="478.6" cy="509.38" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="478.56" cy="509.38" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="478.53" cy="509.37" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="478.49" cy="509.37" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="478.45" cy="509.36" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="478.3" cy="509.36" r="6.61" fill="#fff" />
                        <circle cx="478.7" cy="509.36" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-14)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "LEON_I")) {
                                                                            echo "LEON I Riesgo: " . $dato = $r->LEON_I->TEXTO;
                                                                          } else {
                                                                            echo "LEON I Riesgo: Sin Dato";
                                                                          } ?>" id="LEON1_TOOLTIP" style="cursor:pointer">
                    <path id="LEON1" d="M483.51,470.64c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "LEON_I")) {
                                                                                                                                                                                                                                                        echo $dato = $r->LEON_I->COLOR;
                                                                                                                                                                                                                                                      } else {
                                                                                                                                                                                                                                                        echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                      } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="485.42" cy="479.43" rx="6.76" ry="6.37" fill="#fff" />
                        <ellipse cx="485.38" cy="479.42" rx="6.76" ry="6.37" fill="#fafafa" />
                        <ellipse cx="485.34" cy="479.42" rx="6.76" ry="6.37" fill="#f5f5f5" />
                        <ellipse cx="485.3" cy="479.41" rx="6.76" ry="6.37" fill="#f0f0f0" />
                        <ellipse cx="485.26" cy="479.4" rx="6.76" ry="6.37" fill="#ebebeb" />
                        <ellipse cx="485.22" cy="479.4" rx="6.76" ry="6.37" fill="#e6e6e6" />
                        <ellipse cx="485.18" cy="479.39" rx="6.76" ry="6.37" fill="#e1e1e1" />
                        <ellipse cx="485.15" cy="479.39" rx="6.76" ry="6.37" fill="#dcdcdc" />
                        <ellipse cx="485.11" cy="479.38" rx="6.76" ry="6.37" fill="#d7d7d7" />
                        <ellipse cx="485.07" cy="479.37" rx="6.76" ry="6.37" fill="#d2d2d2" />
                        <ellipse cx="485.03" cy="479.37" rx="6.76" ry="6.37" fill="#cdcdcd" />
                        <ellipse cx="484.99" cy="479.36" rx="6.76" ry="6.37" fill="#c8c8c8" />
                        <ellipse cx="484.95" cy="479.36" rx="6.76" ry="6.37" fill="#c3c3c3" />
                        <ellipse cx="484.91" cy="479.35" rx="6.76" ry="6.37" fill="#bebebe" />
                        <ellipse cx="484.88" cy="479.34" rx="6.76" ry="6.37" fill="#b9b9b9" />
                        <ellipse cx="484.84" cy="479.34" rx="6.76" ry="6.37" fill="#b4b4b4" />
                        <ellipse cx="484.8" cy="479.33" rx="6.76" ry="6.37" fill="#afafaf" />
                        <ellipse cx="484.76" cy="479.32" rx="6.76" ry="6.37" fill="#aaa" />
                        <ellipse cx="484.72" cy="479.32" rx="6.76" ry="6.37" fill="#a5a5a5" />
                        <ellipse cx="484.68" cy="479.31" rx="6.76" ry="6.37" fill="#a0a0a0" />
                        <ellipse cx="484.64" cy="479.31" rx="6.76" ry="6.37" fill="#9b9b9b" />
                        <ellipse cx="484.61" cy="479.3" rx="6.76" ry="6.37" fill="#969696" />
                        <ellipse cx="484.57" cy="479.29" rx="6.76" ry="6.37" fill="#919191" />
                        <ellipse cx="484.53" cy="479.29" rx="6.76" ry="6.37" fill="#8c8c8c" />
                        <ellipse cx="484.49" cy="479.28" rx="6.76" ry="6.37" fill="#878787" />
                        <ellipse cx="484.45" cy="479.28" rx="6.76" ry="6.37" fill="#828282" />
                        <ellipse cx="484.41" cy="479.27" rx="6.76" ry="6.37" fill="#7d7d7d" />
                        <ellipse cx="484.37" cy="479.26" rx="6.76" ry="6.37" fill="#787878" />
                        <ellipse cx="484.34" cy="479.26" rx="6.76" ry="6.37" fill="#737373" />
                        <ellipse cx="484.3" cy="479.25" rx="6.76" ry="6.37" fill="#6e6e6e" />
                        <ellipse cx="484.26" cy="479.25" rx="6.76" ry="6.37" fill="#696969" />
                        <ellipse cx="484.22" cy="479.24" rx="6.76" ry="6.37" fill="#646464" />
                        <ellipse cx="484.18" cy="479.23" rx="6.76" ry="6.37" fill="#5f5f5f" />
                        <ellipse cx="484.14" cy="479.23" rx="6.76" ry="6.37" fill="#5a5a5a" />
                        <ellipse cx="484.1" cy="479.22" rx="6.76" ry="6.37" fill="#555" />
                        <ellipse cx="484.07" cy="479.22" rx="6.76" ry="6.37" fill="#505050" />
                        <ellipse cx="484.03" cy="479.21" rx="6.76" ry="6.37" fill="#4b4b4b" />
                        <ellipse cx="483.99" cy="479.2" rx="6.76" ry="6.37" fill="#464646" />
                        <ellipse cx="483.95" cy="479.2" rx="6.76" ry="6.37" fill="#414141" />
                        <ellipse cx="483.91" cy="479.19" rx="6.76" ry="6.37" fill="#3c3c3c" />
                        <ellipse cx="483.87" cy="479.19" rx="6.76" ry="6.37" fill="#373737" />
                        <ellipse cx="483.83" cy="479.18" rx="6.76" ry="6.37" fill="#323232" />
                        <ellipse cx="483.8" cy="479.17" rx="6.76" ry="6.37" fill="#2d2d2d" />
                        <ellipse cx="483.76" cy="479.17" rx="6.76" ry="6.37" fill="#282828" />
                        <ellipse cx="483.72" cy="479.16" rx="6.76" ry="6.37" fill="#232323" />
                        <ellipse cx="483.68" cy="479.16" rx="6.76" ry="6.37" fill="#1e1e1e" />
                        <ellipse cx="483.64" cy="479.15" rx="6.76" ry="6.37" fill="#191919" />
                        <ellipse cx="483.6" cy="479.14" rx="6.76" ry="6.37" fill="#141414" />
                        <ellipse cx="483.56" cy="479.14" rx="6.76" ry="6.37" fill="#0f0f0f" />
                        <ellipse cx="483.53" cy="479.13" rx="6.76" ry="6.37" fill="#0a0a0a" />
                        <ellipse cx="483.49" cy="479.12" rx="6.76" ry="6.37" fill="#050505" />
                        <ellipse cx="483.45" cy="479.12" rx="6.76" ry="6.37" />
                      </g>
                      <g>
                        <ellipse cx="483.3" cy="479.12" rx="6.61" ry="6.37" fill="#fff" />
                        <ellipse cx="483.7" cy="479.12" rx="6.61" ry="6.37" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-15)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "CELAYA")) {
                                                                            echo "CELAYA Riesgo: " . $dato = $r->CELAYA->TEXTO;
                                                                          } else {
                                                                            echo "CELAYA Riesgo: Sin Dato";
                                                                          } ?>" id="CELAYA_TOOLTIP" style="cursor:pointer">
                    <path id="CELAYA" d="M508.51,478.64c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "CELAYA")) {
                                                                                                                                                                                                                                                          echo $dato = $r->CELAYA->COLOR;
                                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                                          echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                        } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="510.42" cy="487.68" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="510.38" cy="487.67" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="510.34" cy="487.67" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="510.3" cy="487.66" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="510.26" cy="487.65" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="510.22" cy="487.65" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="510.18" cy="487.64" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="510.15" cy="487.64" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="510.11" cy="487.63" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="510.07" cy="487.62" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="510.03" cy="487.62" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="509.99" cy="487.61" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="509.95" cy="487.6" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="509.91" cy="487.6" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="509.88" cy="487.59" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="509.84" cy="487.59" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="509.8" cy="487.58" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="509.76" cy="487.57" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="509.72" cy="487.57" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="509.68" cy="487.56" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="509.64" cy="487.55" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="509.61" cy="487.55" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="509.57" cy="487.54" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="509.53" cy="487.54" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="509.49" cy="487.53" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="509.45" cy="487.52" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="509.41" cy="487.52" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="509.37" cy="487.51" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="509.34" cy="487.5" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="509.3" cy="487.5" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="509.26" cy="487.49" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="509.22" cy="487.49" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="509.18" cy="487.48" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="509.14" cy="487.47" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="509.1" cy="487.47" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="509.07" cy="487.46" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="509.03" cy="487.45" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="508.99" cy="487.45" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="508.95" cy="487.44" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="508.91" cy="487.43" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="508.87" cy="487.43" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="508.83" cy="487.42" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="508.8" cy="487.42" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="508.76" cy="487.41" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="508.72" cy="487.4" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="508.68" cy="487.4" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="508.64" cy="487.39" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="508.6" cy="487.38" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="508.56" cy="487.38" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="508.53" cy="487.37" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="508.49" cy="487.37" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="508.45" cy="487.36" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="508.3" cy="487.36" r="6.61" fill="#fff" />
                        <circle cx="508.7" cy="487.36" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-16)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "SAN_LUIS_POTOSI")) {
                                                                            echo "SAN LUIS POTOSI Riesgo: " . $dato = $r->SAN_LUIS_POTOSI->TEXTO;
                                                                          } else {
                                                                            echo "SAN LUIS POTOSI Riesgo: Sin Dato";
                                                                          } ?>" id="SANLUIS_TOOLTIP" style="cursor:pointer">
                    <path id="SANLUIS" d="M508.51,436.09c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "SAN_LUIS_POTOSI")) {
                                                                                                                                                                                                                                                          echo $dato = $r->SAN_LUIS_POTOSI->COLOR;
                                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                                          echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                        } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="510.42" cy="445.13" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="510.38" cy="445.12" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="510.34" cy="445.11" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="510.3" cy="445.11" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="510.26" cy="445.1" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="510.22" cy="445.09" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="510.18" cy="445.09" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="510.15" cy="445.08" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="510.11" cy="445.08" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="510.07" cy="445.07" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="510.03" cy="445.06" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="509.99" cy="445.06" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="509.95" cy="445.05" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="509.91" cy="445.04" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="509.88" cy="445.04" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="509.84" cy="445.03" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="509.8" cy="445.02" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="509.76" cy="445.02" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="509.72" cy="445.01" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="509.68" cy="445.01" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="509.64" cy="445" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="509.61" cy="444.99" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="509.57" cy="444.99" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="509.53" cy="444.98" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="509.49" cy="444.97" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="509.45" cy="444.97" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="509.41" cy="444.96" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="509.37" cy="444.96" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="509.34" cy="444.95" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="509.3" cy="444.94" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="509.26" cy="444.94" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="509.22" cy="444.93" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="509.18" cy="444.92" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="509.14" cy="444.92" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="509.1" cy="444.91" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="509.07" cy="444.91" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="509.03" cy="444.9" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="508.99" cy="444.89" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="508.95" cy="444.89" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="508.91" cy="444.88" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="508.87" cy="444.87" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="508.83" cy="444.87" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="508.8" cy="444.86" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="508.76" cy="444.86" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="508.72" cy="444.85" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="508.68" cy="444.84" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="508.64" cy="444.84" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="508.6" cy="444.83" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="508.56" cy="444.82" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="508.53" cy="444.82" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="508.49" cy="444.81" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="508.45" cy="444.8" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="508.3" cy="444.8" r="6.61" fill="#fff" />
                        <circle cx="508.7" cy="444.8" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-17)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "CULIACAN")) {
                                                                            echo "CULIACAN Riesgo: " . $dato = $r->CULIACAN->TEXTO;
                                                                          } else {
                                                                            echo "CULIACAN Riesgo: Sin Dato";
                                                                          } ?>" id="CULIACAN_TOOLTIP" style="cursor:pointer">
                    <path id="CULIACAN" d="M247.69,288.44c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "CULIACAN")) {
                                                                                                                                                                                                                                                            echo $dato = $r->CULIACAN->COLOR;
                                                                                                                                                                                                                                                          } else {
                                                                                                                                                                                                                                                            echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                          } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="249.59" cy="297.47" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="249.56" cy="297.47" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="249.52" cy="297.46" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="249.48" cy="297.45" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="249.44" cy="297.45" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="249.4" cy="297.44" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="249.36" cy="297.43" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="249.32" cy="297.43" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="249.29" cy="297.42" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="249.25" cy="297.42" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="249.21" cy="297.41" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="249.17" cy="297.4" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="249.13" cy="297.4" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="249.09" cy="297.39" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="249.05" cy="297.38" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="249.02" cy="297.38" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="248.98" cy="297.37" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="248.94" cy="297.37" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="248.9" cy="297.36" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="248.86" cy="297.35" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="248.82" cy="297.35" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="248.78" cy="297.34" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="248.75" cy="297.33" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="248.71" cy="297.33" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="248.67" cy="297.32" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="248.63" cy="297.31" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="248.59" cy="297.31" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="248.55" cy="297.3" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="248.51" cy="297.3" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="248.48" cy="297.29" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="248.44" cy="297.28" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="248.4" cy="297.28" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="248.36" cy="297.27" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="248.32" cy="297.26" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="248.28" cy="297.26" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="248.24" cy="297.25" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="248.21" cy="297.25" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="248.17" cy="297.24" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="248.13" cy="297.23" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="248.09" cy="297.23" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="248.05" cy="297.22" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="248.01" cy="297.21" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="247.97" cy="297.21" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="247.94" cy="297.2" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="247.9" cy="297.2" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="247.86" cy="297.19" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="247.82" cy="297.18" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="247.78" cy="297.18" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="247.74" cy="297.17" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="247.7" cy="297.16" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="247.66" cy="297.16" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="247.63" cy="297.15" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="247.47" cy="297.15" r="6.61" fill="#fff" />
                        <circle cx="247.87" cy="297.15" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-18)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "CHIHUAHUA")) {
                                                                            echo "CHIHUAHUA Riesgo: " . $dato = $r->CHIHUAHUA->TEXTO;
                                                                          } else {
                                                                            echo "CHIHUAHUA Riesgo: Sin Dato";
                                                                          } ?>" id="CHUHUAHUA_TOOLTIP" style="cursor:pointer">
                    <path id="CHUHUAHUA" d="M326.69,192.44c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "CHIHUAHUA")) {
                                                                                                                                                                                                                                                            echo $dato = $r->CHIHUAHUA->COLOR;
                                                                                                                                                                                                                                                          } else {
                                                                                                                                                                                                                                                            echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                          } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="328.59" cy="201.47" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="328.56" cy="201.47" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="328.52" cy="201.46" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="328.48" cy="201.45" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="328.44" cy="201.45" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="328.4" cy="201.44" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="328.36" cy="201.43" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="328.32" cy="201.43" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="328.29" cy="201.42" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="328.25" cy="201.42" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="328.21" cy="201.41" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="328.17" cy="201.4" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="328.13" cy="201.4" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="328.09" cy="201.39" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="328.05" cy="201.38" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="328.02" cy="201.38" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="327.98" cy="201.37" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="327.94" cy="201.37" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="327.9" cy="201.36" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="327.86" cy="201.35" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="327.82" cy="201.35" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="327.78" cy="201.34" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="327.75" cy="201.33" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="327.71" cy="201.33" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="327.67" cy="201.32" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="327.63" cy="201.31" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="327.59" cy="201.31" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="327.55" cy="201.3" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="327.51" cy="201.3" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="327.48" cy="201.29" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="327.44" cy="201.28" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="327.4" cy="201.28" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="327.36" cy="201.27" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="327.32" cy="201.26" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="327.28" cy="201.26" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="327.24" cy="201.25" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="327.21" cy="201.25" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="327.17" cy="201.24" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="327.13" cy="201.23" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="327.09" cy="201.23" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="327.05" cy="201.22" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="327.01" cy="201.21" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="326.97" cy="201.21" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="326.94" cy="201.2" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="326.9" cy="201.2" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="326.86" cy="201.19" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="326.82" cy="201.18" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="326.78" cy="201.18" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="326.74" cy="201.17" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="326.7" cy="201.16" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="326.66" cy="201.16" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="326.63" cy="201.15" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="326.47" cy="201.15" r="6.61" fill="#fff" />
                        <circle cx="326.87" cy="201.15" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-19)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "CIUDAD_JUAREZ")) {
                                                                            echo "CIUDAD JUAREZ Riesgo: " . $dato = $r->CIUDAD_JUAREZ->TEXTO;
                                                                          } else {
                                                                            echo "CIUDAD JUAREZ Riesgo: Sin Dato";
                                                                          } ?>" id="CIUDADJUAREZ_TOOLTIP" style="cursor:pointer">
                    <path id="CIUDADJUAREZ" d="M292.69,82.44c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "CIUDAD_JUAREZ")) {
                                                                                                                                                                                                                                                              echo $dato = $r->CIUDAD_JUAREZ->COLOR;
                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                              echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                            } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="294.59" cy="91.47" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="294.56" cy="91.47" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="294.52" cy="91.46" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="294.48" cy="91.45" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="294.44" cy="91.45" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="294.4" cy="91.44" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="294.36" cy="91.43" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="294.32" cy="91.43" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="294.29" cy="91.42" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="294.25" cy="91.42" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="294.21" cy="91.41" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="294.17" cy="91.4" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="294.13" cy="91.4" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="294.09" cy="91.39" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="294.05" cy="91.38" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="294.02" cy="91.38" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="293.98" cy="91.37" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="293.94" cy="91.37" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="293.9" cy="91.36" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="293.86" cy="91.35" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="293.82" cy="91.35" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="293.78" cy="91.34" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="293.75" cy="91.33" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="293.71" cy="91.33" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="293.67" cy="91.32" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="293.63" cy="91.31" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="293.59" cy="91.31" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="293.55" cy="91.3" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="293.51" cy="91.3" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="293.48" cy="91.29" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="293.44" cy="91.28" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="293.4" cy="91.28" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="293.36" cy="91.27" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="293.32" cy="91.26" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="293.28" cy="91.26" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="293.24" cy="91.25" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="293.21" cy="91.25" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="293.17" cy="91.24" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="293.13" cy="91.23" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="293.09" cy="91.23" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="293.05" cy="91.22" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="293.01" cy="91.21" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="292.97" cy="91.21" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="292.94" cy="91.2" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="292.9" cy="91.2" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="292.86" cy="91.19" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="292.82" cy="91.18" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="292.78" cy="91.18" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="292.74" cy="91.17" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="292.7" cy="91.16" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="292.66" cy="91.16" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="292.63" cy="91.15" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="292.47" cy="91.15" r="6.61" fill="#fff" />
                        <circle cx="292.87" cy="91.15" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-20)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "ENSENADA")) {
                                                                            echo "ENSENADA Riesgo: " . $dato = $r->ENSENADA->TEXTO;
                                                                          } else {
                                                                            echo "ENSENADA Riesgo: Sin Dato";
                                                                          } ?>" id="ENSENADA_TOOLTIP" style="cursor:pointer">
                    <path id="ENSENADA" d="M37.69,64.44c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "ENSENADA")) {
                                                                                                                                                                                                                                                          echo $dato = $r->ENSENADA->COLOR;
                                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                                          echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                        } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="39.59" cy="73.47" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="39.56" cy="73.47" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="39.52" cy="73.46" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="39.48" cy="73.45" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="39.44" cy="73.45" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="39.4" cy="73.44" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="39.36" cy="73.43" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="39.32" cy="73.43" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="39.29" cy="73.42" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="39.25" cy="73.42" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="39.21" cy="73.41" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="39.17" cy="73.4" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="39.13" cy="73.4" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="39.09" cy="73.39" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="39.05" cy="73.38" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="39.02" cy="73.38" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="38.98" cy="73.37" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="38.94" cy="73.37" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="38.9" cy="73.36" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="38.86" cy="73.35" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="38.82" cy="73.35" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="38.78" cy="73.34" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="38.75" cy="73.33" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="38.71" cy="73.33" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="38.67" cy="73.32" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="38.63" cy="73.31" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="38.59" cy="73.31" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="38.55" cy="73.3" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="38.51" cy="73.3" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="38.48" cy="73.29" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="38.44" cy="73.28" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="38.4" cy="73.28" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="38.36" cy="73.27" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="38.32" cy="73.26" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="38.28" cy="73.26" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="38.24" cy="73.25" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="38.21" cy="73.25" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="38.17" cy="73.24" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="38.13" cy="73.23" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="38.09" cy="73.23" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="38.05" cy="73.22" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="38.01" cy="73.21" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="37.97" cy="73.21" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="37.94" cy="73.2" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="37.9" cy="73.2" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="37.86" cy="73.19" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="37.82" cy="73.18" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="37.78" cy="73.18" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="37.74" cy="73.17" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="37.7" cy="73.16" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="37.66" cy="73.16" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="37.63" cy="73.15" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="37.47" cy="73.15" r="6.61" fill="#fff" />
                        <circle cx="37.87" cy="73.15" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-21)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "TIJUANA_I")) {
                                                                            echo "TIJUANA I Riesgo: " . $dato = $r->TIJUANA_I->TEXTO;
                                                                          } else {
                                                                            echo "TIJUANA I Riesgo: Sin Dato";
                                                                          } ?>" id="TIJUANAI_TOOLTIP" style="cursor:pointer">
                    <path id="TIJUANA1" d="M34.69,2c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "TIJUANA_I")) {
                                                                                                                                                                                                                                                      echo $dato = $r->TIJUANA_I->COLOR;
                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                      echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                    } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="36.59" cy="11.04" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="36.56" cy="11.03" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="36.52" cy="11.02" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="36.48" cy="11.02" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="36.44" cy="11.01" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="36.4" cy="11" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="36.36" cy="11" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="36.32" cy="10.99" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="36.29" cy="10.99" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="36.25" cy="10.98" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="36.21" cy="10.97" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="36.17" cy="10.97" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="36.13" cy="10.96" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="36.09" cy="10.95" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="36.05" cy="10.95" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="36.02" cy="10.94" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="35.98" cy="10.94" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="35.94" cy="10.93" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="35.9" cy="10.92" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="35.86" cy="10.92" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="35.82" cy="10.91" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="35.78" cy="10.9" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="35.75" cy="10.9" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="35.71" cy="10.89" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="35.67" cy="10.89" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="35.63" cy="10.88" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="35.59" cy="10.87" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="35.55" cy="10.87" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="35.51" cy="10.86" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="35.48" cy="10.85" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="35.44" cy="10.85" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="35.4" cy="10.84" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="35.36" cy="10.84" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="35.32" cy="10.83" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="35.28" cy="10.82" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="35.24" cy="10.82" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="35.21" cy="10.81" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="35.17" cy="10.8" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="35.13" cy="10.8" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="35.09" cy="10.79" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="35.05" cy="10.78" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="35.01" cy="10.78" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="34.97" cy="10.77" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="34.94" cy="10.77" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="34.9" cy="10.76" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="34.86" cy="10.75" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="34.82" cy="10.75" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="34.78" cy="10.74" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="34.74" cy="10.73" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="34.7" cy="10.73" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="34.66" cy="10.72" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="34.63" cy="10.72" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="34.47" cy="10.72" r="6.61" fill="#fff" />
                        <circle cx="34.87" cy="10.72" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-22)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "TIJUANA_II")) {
                                                                            echo "TIJUANA II Riesgo: " . $dato = $r->TIJUANA_II->TEXTO;
                                                                          } else {
                                                                            echo "TIJUANA II Riesgo: Sin Dato";
                                                                          } ?>" id="TIJUANAII_TOOLTIP" style="cursor:pointer">
                    <path id="TIJUANA2" d="M14.69,13c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "TIJUANA_II")) {
                                                                                                                                                                                                                                                      echo $dato = $r->TIJUANA_II->COLOR;
                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                      echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                    } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="16.59" cy="22.04" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="16.56" cy="22.03" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="16.52" cy="22.02" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="16.48" cy="22.02" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="16.44" cy="22.01" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="16.4" cy="22" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="16.36" cy="22" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="16.32" cy="21.99" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="16.29" cy="21.99" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="16.25" cy="21.98" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="16.21" cy="21.97" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="16.17" cy="21.97" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="16.13" cy="21.96" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="16.09" cy="21.95" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="16.05" cy="21.95" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="16.02" cy="21.94" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="15.98" cy="21.94" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="15.94" cy="21.93" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="15.9" cy="21.92" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="15.86" cy="21.92" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="15.82" cy="21.91" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="15.78" cy="21.9" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="15.75" cy="21.9" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="15.71" cy="21.89" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="15.67" cy="21.89" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="15.63" cy="21.88" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="15.59" cy="21.87" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="15.55" cy="21.87" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="15.51" cy="21.86" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="15.48" cy="21.85" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="15.44" cy="21.85" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="15.4" cy="21.84" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="15.36" cy="21.84" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="15.32" cy="21.83" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="15.28" cy="21.82" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="15.24" cy="21.82" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="15.21" cy="21.81" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="15.17" cy="21.8" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="15.13" cy="21.8" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="15.09" cy="21.79" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="15.05" cy="21.78" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="15.01" cy="21.78" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="14.97" cy="21.77" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="14.94" cy="21.77" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="14.9" cy="21.76" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="14.86" cy="21.75" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="14.82" cy="21.75" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="14.78" cy="21.74" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="14.74" cy="21.73" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="14.7" cy="21.73" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="14.66" cy="21.72" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="14.63" cy="21.72" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="14.47" cy="21.72" r="6.61" fill="#fff" />
                        <circle cx="14.87" cy="21.72" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-23)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "HERMOSILLO")) {
                                                                            echo "HERMOSILLO Riesgo: " . $dato = $r->HERMOSILLO->TEXTO;
                                                                          } else {
                                                                            echo "HERMOSILLO Riesgo: Sin Dato";
                                                                          } ?>" id="HERMOSILLO_TOOLTIP" style="cursor:pointer">
                    <path id="HERMOSILLO" d="M203.69,179c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "HERMOSILLO")) {
                                                                                                                                                                                                                                                          echo $dato = $r->HERMOSILLO->COLOR;
                                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                                          echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                        } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="205.59" cy="188.04" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="205.56" cy="188.03" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="205.52" cy="188.02" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="205.48" cy="188.02" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="205.44" cy="188.01" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="205.4" cy="188" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="205.36" cy="188" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="205.32" cy="187.99" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="205.29" cy="187.99" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="205.25" cy="187.98" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="205.21" cy="187.97" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="205.17" cy="187.97" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="205.13" cy="187.96" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="205.09" cy="187.95" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="205.05" cy="187.95" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="205.02" cy="187.94" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="204.98" cy="187.94" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="204.94" cy="187.93" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="204.9" cy="187.92" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="204.86" cy="187.92" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="204.82" cy="187.91" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="204.78" cy="187.9" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="204.75" cy="187.9" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="204.71" cy="187.89" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="204.67" cy="187.89" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="204.63" cy="187.88" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="204.59" cy="187.87" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="204.55" cy="187.87" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="204.51" cy="187.86" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="204.48" cy="187.85" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="204.44" cy="187.85" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="204.4" cy="187.84" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="204.36" cy="187.84" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="204.32" cy="187.83" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="204.28" cy="187.82" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="204.24" cy="187.82" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="204.21" cy="187.81" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="204.17" cy="187.8" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="204.13" cy="187.8" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="204.09" cy="187.79" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="204.05" cy="187.78" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="204.01" cy="187.78" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="203.97" cy="187.77" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="203.94" cy="187.77" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="203.9" cy="187.76" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="203.86" cy="187.75" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="203.82" cy="187.75" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="203.78" cy="187.74" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="203.74" cy="187.73" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="203.7" cy="187.73" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="203.66" cy="187.72" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="203.63" cy="187.72" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="203.47" cy="187.72" r="6.61" fill="#fff" />
                        <circle cx="203.87" cy="187.72" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-24)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "LOS_CABOS")) {
                                                                            echo "LOS CABOS Riesgo: " . $dato = $r->LOS_CABOS->TEXTO;
                                                                          } else {
                                                                            echo "LOS CABOS Riesgo: Sin Dato";
                                                                          } ?>" id="LOSCABOS_TOOLTIP" style="cursor:pointer">
                    <path id="LOSCABOS" d="M188.69,380c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "LOS_CABOS")) {
                                                                                                                                                                                                                                                        echo $dato = $r->LOS_CABOS->COLOR;
                                                                                                                                                                                                                                                      } else {
                                                                                                                                                                                                                                                        echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                      } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="190.59" cy="389.04" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="190.56" cy="389.03" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="190.52" cy="389.02" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="190.48" cy="389.02" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="190.44" cy="389.01" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="190.4" cy="389" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="190.36" cy="389" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="190.32" cy="388.99" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="190.29" cy="388.99" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="190.25" cy="388.98" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="190.21" cy="388.97" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="190.17" cy="388.97" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="190.13" cy="388.96" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="190.09" cy="388.95" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="190.05" cy="388.95" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="190.02" cy="388.94" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="189.98" cy="388.94" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="189.94" cy="388.93" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="189.9" cy="388.92" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="189.86" cy="388.92" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="189.82" cy="388.91" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="189.78" cy="388.9" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="189.75" cy="388.9" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="189.71" cy="388.89" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="189.67" cy="388.89" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="189.63" cy="388.88" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="189.59" cy="388.87" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="189.55" cy="388.87" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="189.51" cy="388.86" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="189.48" cy="388.85" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="189.44" cy="388.85" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="189.4" cy="388.84" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="189.36" cy="388.84" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="189.32" cy="388.83" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="189.28" cy="388.82" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="189.24" cy="388.82" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="189.21" cy="388.81" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="189.17" cy="388.8" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="189.13" cy="388.8" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="189.09" cy="388.79" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="189.05" cy="388.78" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="189.01" cy="388.78" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="188.97" cy="388.77" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="188.94" cy="388.77" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="188.9" cy="388.76" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="188.86" cy="388.75" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="188.82" cy="388.75" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="188.78" cy="388.74" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="188.74" cy="388.73" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="188.7" cy="388.73" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="188.66" cy="388.72" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="188.63" cy="388.72" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="188.47" cy="388.72" r="6.61" fill="#fff" />
                        <circle cx="188.87" cy="388.72" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-25)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "MEXICALI")) {
                                                                            echo "MEXICALI Riesgo: " . $dato = $r->MEXICALI->TEXTO;
                                                                          } else {
                                                                            echo "MEXICALI Riesgo: Sin Dato";
                                                                          } ?>" id="MEXICALI_TOOLTIP" style="cursor:pointer">
                    <path id="MEXICALI" d="M56.69,0c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61C67.26,6.14,62.57,.01,56.69,0Z" fill="<?php if (property_exists($r, "MEXICALI")) {
                                                                                                                                                                                                                                                  echo $dato = $r->MEXICALI->COLOR;
                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                  echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="58.59" cy="9.04" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="58.56" cy="9.03" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="58.52" cy="9.02" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="58.48" cy="9.02" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="58.44" cy="9.01" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="58.4" cy="9" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="58.36" cy="9" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="58.32" cy="8.99" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="58.29" cy="8.99" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="58.25" cy="8.98" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="58.21" cy="8.97" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="58.17" cy="8.97" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="58.13" cy="8.96" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="58.09" cy="8.95" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="58.05" cy="8.95" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="58.02" cy="8.94" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="57.98" cy="8.94" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="57.94" cy="8.93" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="57.9" cy="8.92" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="57.86" cy="8.92" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="57.82" cy="8.91" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="57.78" cy="8.9" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="57.75" cy="8.9" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="57.71" cy="8.89" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="57.67" cy="8.89" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="57.63" cy="8.88" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="57.59" cy="8.87" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="57.55" cy="8.87" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="57.51" cy="8.86" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="57.48" cy="8.85" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="57.44" cy="8.85" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="57.4" cy="8.84" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="57.36" cy="8.84" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="57.32" cy="8.83" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="57.28" cy="8.82" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="57.24" cy="8.82" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="57.21" cy="8.81" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="57.17" cy="8.8" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="57.13" cy="8.8" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="57.09" cy="8.79" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="57.05" cy="8.78" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="57.01" cy="8.78" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="56.97" cy="8.77" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="56.94" cy="8.77" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="56.9" cy="8.76" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="56.86" cy="8.75" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="56.82" cy="8.75" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="56.78" cy="8.74" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="56.74" cy="8.73" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="56.7" cy="8.73" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="56.66" cy="8.72" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="56.63" cy="8.72" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="56.47" cy="8.72" r="6.61" fill="#fff" />
                        <circle cx="56.87" cy="8.72" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-26)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "QUERETARO")) {
                                                                            echo "QUERETARO Riesgo: " . $dato = $r->QUERETARO->TEXTO;
                                                                          } else {
                                                                            echo "QUERETARO Riesgo: Sin Dato";
                                                                          } ?>" id="QUERETARO_TOOLTIP" style="cursor:pointer">
                    <path id="QUERETARO" d="M534.69,481.76c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "QUERETARO")) {
                                                                                                                                                                                                                                                            echo $dato = $r->QUERETARO->COLOR;
                                                                                                                                                                                                                                                          } else {
                                                                                                                                                                                                                                                            echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                          } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="536.59" cy="490.8" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="536.56" cy="490.79" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="536.52" cy="490.79" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="536.48" cy="490.78" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="536.44" cy="490.77" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="536.4" cy="490.77" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="536.36" cy="490.76" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="536.32" cy="490.75" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="536.29" cy="490.75" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="536.25" cy="490.74" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="536.21" cy="490.74" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="536.17" cy="490.73" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="536.13" cy="490.72" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="536.09" cy="490.72" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="536.05" cy="490.71" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="536.02" cy="490.7" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="535.98" cy="490.7" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="535.94" cy="490.69" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="535.9" cy="490.69" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="535.86" cy="490.68" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="535.82" cy="490.67" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="535.78" cy="490.67" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="535.75" cy="490.66" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="535.71" cy="490.65" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="535.67" cy="490.65" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="535.63" cy="490.64" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="535.59" cy="490.64" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="535.55" cy="490.63" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="535.51" cy="490.62" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="535.48" cy="490.62" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="535.44" cy="490.61" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="535.4" cy="490.6" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="535.36" cy="490.6" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="535.32" cy="490.59" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="535.28" cy="490.59" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="535.24" cy="490.58" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="535.21" cy="490.57" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="535.17" cy="490.57" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="535.13" cy="490.56" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="535.09" cy="490.55" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="535.05" cy="490.55" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="535.01" cy="490.54" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="534.97" cy="490.53" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="534.94" cy="490.53" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="534.9" cy="490.52" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="534.86" cy="490.52" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="534.82" cy="490.51" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="534.78" cy="490.5" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="534.74" cy="490.5" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="534.7" cy="490.49" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="534.66" cy="490.48" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="534.63" cy="490.48" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="534.47" cy="490.48" r="6.61" fill="#fff" />
                        <circle cx="534.87" cy="490.48" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-27)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "SALTILLO")) {
                                                                            echo "SALTILLO Riesgo: " . $dato = $r->SALTILLO->TEXTO;
                                                                          } else {
                                                                            echo "SALTILLO Riesgo: Sin Dato";
                                                                          } ?>" id="SALTILLO_TOOLTIP" style="cursor:pointer">
                    <path id="SALTILLO" d="M463.69,266.76c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "SALTILLO")) {
                                                                                                                                                                                                                                                            echo $dato = $r->SALTILLO->COLOR;
                                                                                                                                                                                                                                                          } else {
                                                                                                                                                                                                                                                            echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                          } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="465.59" cy="275.8" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="465.56" cy="275.79" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="465.52" cy="275.79" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="465.48" cy="275.78" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="465.44" cy="275.77" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="465.4" cy="275.77" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="465.36" cy="275.76" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="465.32" cy="275.75" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="465.29" cy="275.75" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="465.25" cy="275.74" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="465.21" cy="275.74" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="465.17" cy="275.73" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="465.13" cy="275.72" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="465.09" cy="275.72" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="465.05" cy="275.71" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="465.02" cy="275.7" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="464.98" cy="275.7" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="464.94" cy="275.69" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="464.9" cy="275.69" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="464.86" cy="275.68" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="464.82" cy="275.67" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="464.78" cy="275.67" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="464.75" cy="275.66" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="464.71" cy="275.65" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="464.67" cy="275.65" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="464.63" cy="275.64" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="464.59" cy="275.64" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="464.55" cy="275.63" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="464.51" cy="275.62" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="464.48" cy="275.62" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="464.44" cy="275.61" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="464.4" cy="275.6" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="464.36" cy="275.6" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="464.32" cy="275.59" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="464.28" cy="275.59" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="464.24" cy="275.58" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="464.21" cy="275.57" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="464.17" cy="275.57" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="464.13" cy="275.56" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="464.09" cy="275.55" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="464.05" cy="275.55" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="464.01" cy="275.54" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="463.97" cy="275.53" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="463.94" cy="275.53" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="463.9" cy="275.52" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="463.86" cy="275.52" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="463.82" cy="275.51" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="463.78" cy="275.5" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="463.74" cy="275.5" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="463.7" cy="275.49" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="463.66" cy="275.48" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="463.63" cy="275.48" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="463.47" cy="275.48" r="6.61" fill="#fff" />
                        <circle cx="463.87" cy="275.48" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-28)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "MONTERREY_III")) {
                                                                            echo "MONTERREY III Riesgo: " . $dato = $r->MONTERREY_III->TEXTO;
                                                                          } else {
                                                                            echo "MONTERREY III Riesgo: Sin Dato";
                                                                          } ?>" id="MONTERREYIII_TOOLTIP" style="cursor:pointer">
                    <path id="MONTERREY3" d="M517.69,288.76c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "MONTERREY_III")) {
                                                                                                                                                                                                                                                              echo $dato = $r->MONTERREY_III->COLOR;
                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                              echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                            } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="519.59" cy="297.8" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="519.56" cy="297.79" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="519.52" cy="297.79" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="519.48" cy="297.78" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="519.44" cy="297.77" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="519.4" cy="297.77" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="519.36" cy="297.76" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="519.32" cy="297.75" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="519.29" cy="297.75" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="519.25" cy="297.74" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="519.21" cy="297.74" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="519.17" cy="297.73" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="519.13" cy="297.72" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="519.09" cy="297.72" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="519.05" cy="297.71" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="519.02" cy="297.7" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="518.98" cy="297.7" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="518.94" cy="297.69" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="518.9" cy="297.69" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="518.86" cy="297.68" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="518.82" cy="297.67" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="518.78" cy="297.67" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="518.75" cy="297.66" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="518.71" cy="297.65" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="518.67" cy="297.65" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="518.63" cy="297.64" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="518.59" cy="297.64" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="518.55" cy="297.63" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="518.51" cy="297.62" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="518.48" cy="297.62" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="518.44" cy="297.61" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="518.4" cy="297.6" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="518.36" cy="297.6" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="518.32" cy="297.59" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="518.28" cy="297.59" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="518.24" cy="297.58" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="518.21" cy="297.57" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="518.17" cy="297.57" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="518.13" cy="297.56" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="518.09" cy="297.55" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="518.05" cy="297.55" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="518.01" cy="297.54" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="517.97" cy="297.53" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="517.94" cy="297.53" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="517.9" cy="297.52" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="517.86" cy="297.52" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="517.82" cy="297.51" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="517.78" cy="297.5" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="517.74" cy="297.5" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="517.7" cy="297.49" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="517.66" cy="297.48" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="517.63" cy="297.48" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="517.47" cy="297.48" r="6.61" fill="#fff" />
                        <circle cx="517.87" cy="297.48" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-29)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "MONTERREY_II")) {
                                                                            echo "MONTERREY II Riesgo: " . $dato = $r->MONTERREY_II->TEXTO;
                                                                          } else {
                                                                            echo "MONTERREY II Riesgo: Sin Dato";
                                                                          } ?>" id="MONTERREYII_TOOLTIP" style="cursor:pointer">
                    <path id="MONTERREY2" d="M508.69,320.76c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "MONTERREY_II")) {
                                                                                                                                                                                                                                                              echo $dato = $r->MONTERREY_II->COLOR;
                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                              echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                            } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="510.59" cy="329.8" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="510.56" cy="329.79" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="510.52" cy="329.79" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="510.48" cy="329.78" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="510.44" cy="329.77" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="510.4" cy="329.77" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="510.36" cy="329.76" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="510.32" cy="329.75" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="510.29" cy="329.75" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="510.25" cy="329.74" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="510.21" cy="329.74" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="510.17" cy="329.73" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="510.13" cy="329.72" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="510.09" cy="329.72" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="510.05" cy="329.71" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="510.02" cy="329.7" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="509.98" cy="329.7" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="509.94" cy="329.69" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="509.9" cy="329.69" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="509.86" cy="329.68" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="509.82" cy="329.67" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="509.78" cy="329.67" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="509.75" cy="329.66" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="509.71" cy="329.65" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="509.67" cy="329.65" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="509.63" cy="329.64" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="509.59" cy="329.64" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="509.55" cy="329.63" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="509.51" cy="329.62" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="509.48" cy="329.62" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="509.44" cy="329.61" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="509.4" cy="329.6" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="509.36" cy="329.6" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="509.32" cy="329.59" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="509.28" cy="329.59" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="509.24" cy="329.58" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="509.21" cy="329.57" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="509.17" cy="329.57" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="509.13" cy="329.56" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="509.09" cy="329.55" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="509.05" cy="329.55" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="509.01" cy="329.54" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="508.97" cy="329.53" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="508.94" cy="329.53" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="508.9" cy="329.52" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="508.86" cy="329.52" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="508.82" cy="329.51" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="508.78" cy="329.5" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="508.74" cy="329.5" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="508.7" cy="329.49" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="508.66" cy="329.48" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="508.63" cy="329.48" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="508.47" cy="329.48" r="6.61" fill="#fff" />
                        <circle cx="508.87" cy="329.48" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-30)" />
                      </g>
                    </g>
                  </g>
                  <g data-toggle="tooltip" data-placement="right" title="<?php if (property_exists($r, "MONTERREY_I")) {
                                                                            echo "MONTERREY I Riesgo: " . $dato = $r->MONTERREY_I->TEXTO;
                                                                          } else {
                                                                            echo "MONTERREY I Riesgo: Sin Dato";
                                                                          } ?>" id="MONTERREYI_TOOLTIP" style="cursor:pointer">
                    <path id="MONTERREY1" d="M537.04,307.66c-5.88,.01-10.57,6.14-8.42,11.79,.49,1.28,1.22,2.45,1.94,3.61,2.25,3.64,4.34,7.37,6.48,11.07,2.14-3.7,4.23-7.43,6.48-11.07,.72-1.16,1.45-2.33,1.94-3.61,2.15-5.65-2.54-11.78-8.42-11.79Z" fill="<?php if (property_exists($r, "MONTERREY_I")) {
                                                                                                                                                                                                                                                              echo $dato = $r->MONTERREY_I->COLOR;
                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                              echo "rgb(255, 255, 255)";
                                                                                                                                                                                                                                                            } ?>" />
                    <g>
                      <g mix-blend-mode="multiply" opacity=".4">
                        <ellipse cx="538.94" cy="316.7" rx="6.76" ry="6.61" fill="#fff" />
                        <ellipse cx="538.9" cy="316.69" rx="6.76" ry="6.61" fill="#fafafa" />
                        <ellipse cx="538.86" cy="316.69" rx="6.76" ry="6.61" fill="#f5f5f5" />
                        <ellipse cx="538.83" cy="316.68" rx="6.76" ry="6.61" fill="#f0f0f0" />
                        <ellipse cx="538.79" cy="316.67" rx="6.76" ry="6.61" fill="#ebebeb" />
                        <ellipse cx="538.75" cy="316.67" rx="6.76" ry="6.61" fill="#e6e6e6" />
                        <ellipse cx="538.71" cy="316.66" rx="6.76" ry="6.61" fill="#e1e1e1" />
                        <ellipse cx="538.67" cy="316.66" rx="6.76" ry="6.61" fill="#dcdcdc" />
                        <ellipse cx="538.63" cy="316.65" rx="6.76" ry="6.61" fill="#d7d7d7" />
                        <ellipse cx="538.59" cy="316.64" rx="6.76" ry="6.61" fill="#d2d2d2" />
                        <ellipse cx="538.55" cy="316.64" rx="6.76" ry="6.61" fill="#cdcdcd" />
                        <ellipse cx="538.52" cy="316.63" rx="6.76" ry="6.61" fill="#c8c8c8" />
                        <ellipse cx="538.48" cy="316.62" rx="6.76" ry="6.61" fill="#c3c3c3" />
                        <ellipse cx="538.44" cy="316.62" rx="6.76" ry="6.61" fill="#bebebe" />
                        <ellipse cx="538.4" cy="316.61" rx="6.76" ry="6.61" fill="#b9b9b9" />
                        <ellipse cx="538.36" cy="316.61" rx="6.76" ry="6.61" fill="#b4b4b4" />
                        <ellipse cx="538.32" cy="316.6" rx="6.76" ry="6.61" fill="#afafaf" />
                        <ellipse cx="538.28" cy="316.59" rx="6.76" ry="6.61" fill="#aaa" />
                        <ellipse cx="538.25" cy="316.59" rx="6.76" ry="6.61" fill="#a5a5a5" />
                        <ellipse cx="538.21" cy="316.58" rx="6.76" ry="6.61" fill="#a0a0a0" />
                        <ellipse cx="538.17" cy="316.57" rx="6.76" ry="6.61" fill="#9b9b9b" />
                        <ellipse cx="538.13" cy="316.57" rx="6.76" ry="6.61" fill="#969696" />
                        <ellipse cx="538.09" cy="316.56" rx="6.76" ry="6.61" fill="#919191" />
                        <ellipse cx="538.05" cy="316.56" rx="6.76" ry="6.61" fill="#8c8c8c" />
                        <ellipse cx="538.01" cy="316.55" rx="6.76" ry="6.61" fill="#878787" />
                        <ellipse cx="537.98" cy="316.54" rx="6.76" ry="6.61" fill="#828282" />
                        <ellipse cx="537.94" cy="316.54" rx="6.76" ry="6.61" fill="#7d7d7d" />
                        <ellipse cx="537.9" cy="316.53" rx="6.76" ry="6.61" fill="#787878" />
                        <ellipse cx="537.86" cy="316.52" rx="6.76" ry="6.61" fill="#737373" />
                        <ellipse cx="537.82" cy="316.52" rx="6.76" ry="6.61" fill="#6e6e6e" />
                        <ellipse cx="537.78" cy="316.51" rx="6.76" ry="6.61" fill="#696969" />
                        <ellipse cx="537.74" cy="316.5" rx="6.76" ry="6.61" fill="#646464" />
                        <ellipse cx="537.71" cy="316.5" rx="6.76" ry="6.61" fill="#5f5f5f" />
                        <ellipse cx="537.67" cy="316.49" rx="6.76" ry="6.61" fill="#5a5a5a" />
                        <ellipse cx="537.63" cy="316.49" rx="6.76" ry="6.61" fill="#555" />
                        <ellipse cx="537.59" cy="316.48" rx="6.76" ry="6.61" fill="#505050" />
                        <ellipse cx="537.55" cy="316.47" rx="6.76" ry="6.61" fill="#4b4b4b" />
                        <ellipse cx="537.51" cy="316.47" rx="6.76" ry="6.61" fill="#464646" />
                        <ellipse cx="537.47" cy="316.46" rx="6.76" ry="6.61" fill="#414141" />
                        <ellipse cx="537.44" cy="316.45" rx="6.76" ry="6.61" fill="#3c3c3c" />
                        <ellipse cx="537.4" cy="316.45" rx="6.76" ry="6.61" fill="#373737" />
                        <ellipse cx="537.36" cy="316.44" rx="6.76" ry="6.61" fill="#323232" />
                        <ellipse cx="537.32" cy="316.44" rx="6.76" ry="6.61" fill="#2d2d2d" />
                        <ellipse cx="537.28" cy="316.43" rx="6.76" ry="6.61" fill="#282828" />
                        <ellipse cx="537.24" cy="316.42" rx="6.76" ry="6.61" fill="#232323" />
                        <ellipse cx="537.2" cy="316.42" rx="6.76" ry="6.61" fill="#1e1e1e" />
                        <ellipse cx="537.17" cy="316.41" rx="6.76" ry="6.61" fill="#191919" />
                        <ellipse cx="537.13" cy="316.4" rx="6.76" ry="6.61" fill="#141414" />
                        <ellipse cx="537.09" cy="316.4" rx="6.76" ry="6.61" fill="#0f0f0f" />
                        <ellipse cx="537.05" cy="316.39" rx="6.76" ry="6.61" fill="#0a0a0a" />
                        <ellipse cx="537.01" cy="316.39" rx="6.76" ry="6.61" fill="#050505" />
                        <ellipse cx="536.97" cy="316.38" rx="6.76" ry="6.61" />
                      </g>
                      <g>
                        <circle cx="536.82" cy="316.38" r="6.61" fill="#fff" />
                        <circle cx="537.22" cy="316.38" r="6.61" fill="url(#_îâûé_îáðàçåö_ãðàäèåíòà_1-31)" />
                      </g>
                    </g>
                  </g>
                </g>
              </g>
            </g>
          </svg>
        </div>
      </div>
    </div><?php endif; ?>
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
              <td style="background-color: #9be5f7; color:#000000; width:20px;" class="text-center">Nulo</td>
              <td style="background-color: #6bf56e; color:#000000; width:20px;" class="text-center">Bajo</td>
              <td style="background-color: #ffff00; color:#000000; width:20px;" class="text-center">Medio</td>
              <td style="background-color: #ffc000; color:#000000; width:20px;" class="text-center">Alto</td>
              <td style="background-color: #ff0000; color:#ffffff; width:20px;" class="text-center">Muy Alto</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
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
  <script src="../assets/js/bs-init.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    vcomp = "<?php echo $comp; ?>";
    vgrupo = "<?php echo $js_var_grupo; ?>";
    vdistrito = "<?php echo $js_var_distrito; ?>";
    vlocalidad = "<?php echo $js_var_localidad; ?>"
    vdepartamento = "<?php echo $js_var_departamento; ?>"
  </script>
  <!--<script src="../assets/js/resultados/cargar_filtros_funciones.js"></script>-->

  <script src="../assets/js/bold-and-bright.js"></script>
  <script src="../assets/js/svgactions.js"></script>
  <script src="../assets/js/swal/sweetalert2.all.min.js"></script>
  <script src="../assets/js/form_validator/jquery.form-validator.min.js"></script>
  <script>
    $.validate({
      form: '#resultados_mapa',
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
  <script>
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })
    $(function () {
  $('[data-toggle="popover"]').popover({
    sanitize: false
  })
})    
  </script>
</body>

</html>