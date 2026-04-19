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
$requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$rp = trim((string) ($_GET['rp'] ?? ''));
$compParam = trim((string) ($_GET['comp'] ?? ''));
$grupoParam = trim((string) ($_GET['grupo'] ?? ''));
$distritoParam = trim((string) ($_GET['distrito'] ?? ''));
$localidadParam = trim((string) ($_GET['localidad'] ?? ''));
$dptoParam = trim((string) ($_GET['dpto'] ?? ''));
$edadParam = trim((string) ($_GET['edad'] ?? ''));
$generoParam = trim((string) ($_GET['genero'] ?? ''));
$r = [];

if ($compParam !== '') {
  $comp = $compParam;
  $c1   = 'Compañia: '  . nom035_h($compParam) . '';
}
if ($grupoParam !== '') {
  $js_var_grupo = $grupoParam;
  $c2   = 'Grupo: '  . nom035_h($grupoParam) . '';
}
if ($distritoParam !== '') {
  $js_var_distrito = $distritoParam;
  $c3   = 'Distrito: '  . nom035_h($distritoParam) . '';
}
if ($localidadParam !== '') {
  $js_var_localidad = $localidadParam;
  $c4  = 'Localidad: '  . nom035_h($localidadParam) . '';
}
if ($dptoParam !== '') {
  $js_var_departamento = $dptoParam;
  $c5   = 'Departamento: '  . nom035_h($dptoParam) . '';
}
if ($edadParam !== '') {
  $edad = $edadParam;
  $c51  = explode(",", $edadParam);
    $c6   = "Edad: " . $c51[0] . "-" . $c51[1];
}
if ($generoParam !== '') {
  $gen = $generoParam;
  $c7  = "Género: " . nom035_h($generoParam);
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
<body style="width: 1004px;font-size: 10px;">
    <section id="print">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div><canvas id="myChart"></canvas></div>
                </div>
                <div class="col-12"><button type="button" name="" id="downloadPdf" class="btn btn-primary">Descargar PDF</button></div>
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
    <script src="../assets/js/chart.min.js"></script>
    <script>
        vcomp = "<?php echo $comp; ?>";
        vgrupo = "<?php echo $js_var_grupo; ?>";
        vdistrito = "<?php echo $js_var_distrito; ?>";
        vlocalidad = "<?php echo $js_var_localidad; ?>"
        vdepartamento = "<?php echo $js_var_departamento; ?>"
    </script>
    <script src="../assets/js/resultados/cargar_filtros_funciones.js"></script>
    <script src="../assets/js/svgactions.js"></script>
    <script src="../assets/js/swal/sweetalert2.all.min.js"></script>
    <script src="../assets/js/videomodal_visto.js"></script>
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        var opciones = {
            title:{
                display:true,
                text:['REPORTE CALIFICACIÓN FINAL POR LOCALIDAD','<?php echo $c1 . " " . $c2 . " " . $c3 . " " . $c4 . " " . $c5; ?>']
            },
              scales: {
                yAxes: [{
                  barPercentage: 0.5,
                  gridLines: {
                    display: true
                  },
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
        var MyChart = new Chart(ctx,{
            type: 'horizontalBar',
            options: opciones,
            data:{
                labels:[<?php foreach ($r as $key => $value) {echo "'".$key."',";}?>],
            datasets:[{
                label:"Calificación Final",
                data:[<?php foreach ($r as $key => $value) {echo "'".$value->TOTAL."',";}?>],
                <?php echo "backgroundColor: ["; foreach ($r as $key => $value) {echo "'".$value->COLOR."',";}echo "],";?>}],
        },
        })
    </script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.debug.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>


$('#downloadPdf').click(function(event) {
  // get size of report page
  var reportPageHeight = $('#print').innerHeight();
  var reportPageWidth = $('#print').innerWidth();
  
  // create a new canvas object that we will populate with all other canvas objects
  var pdfCanvas = $('<canvas />').attr({
    id: "canvaspdf",
    width: reportPageWidth,
    height: reportPageHeight
  });
  
  // keep track canvas position
  var pdfctx = $(pdfCanvas)[0].getContext('2d');
  var pdfctxX = 0;
  var pdfctxY = 0;
  var buffer = 100;
  
  // for each chart.js chart
  $("canvas").each(function(index) {
    // get the chart height/width
    var canvasHeight = $(this).innerHeight();
    var canvasWidth = $(this).innerWidth();
    
    // draw the chart into the new canvas
    pdfctx.drawImage($(this)[0], pdfctxX, pdfctxY, canvasWidth, canvasHeight);
    pdfctxX += canvasWidth + buffer;
    
    // our report page is in a grid pattern so replicate that in the new canvas
    if (index % 2 === 1) {
      pdfctxX = 0;
      pdfctxY += canvasHeight + buffer;
    }
  });
  
  // create new pdf and add our new canvas as an image
  var pdf = new jsPDF('l', 'pt', 'letter');
  pdf.addImage($(pdfCanvas)[0], 'PNG', 0, 0);
  
  // download the pdf
  pdf.save('REPORTE CALIFICACIÓN FINAL POR LOCALIDAD.pdf');
});

    </script>        
</body>

</html>