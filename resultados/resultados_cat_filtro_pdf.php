<?php include("../php/config/db.php"); ?>
<?php
if (isset($_GET['rcomp']) && $_GET['rcomp'] != "") {
    switch ($_GET['rcomp']) {
        case 'DISTRITO':
            $tabla = 'empleados_distrito';
            $title="DISTRITOS";
            $gpo="";
            break;
        case 'LOCALIDAD':
            $tabla = 'empleados_t_localidad';
            $title="LOCALIDADES";
            $gpo="GRUPO: ".$_GET['grupo'];
            break;
        default:
            # code...
            break;
    }
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
<body style="width: 164mm;font-size: 10px;">
<section id="print">
        <div class="container">
            <div class="row">
                <div class="col-12 pt-0 pb-0">
                    <h6 class="pt-2 pb-0 text-center"><strong>REPORTE POR CATEGORÍAS - COMPARATIVO DE TRES <?php echo $title; ?></strong></h6>
                </div>
            </div>
            <div class="row pt-0 pb-0" style="margin-top: 23px;">
            <?php if ((isset($_GET['rcomp']) && $_GET['rcomp'] != "") && (isset($_GET['f1']) && $_GET['f1'] != "") && (isset($_GET['f2']) && $_GET['f2'] != "") && (isset($_GET['f3']) && $_GET['f3'] != "")) : ?>
                    <div class="col-12"><h6><?php echo $gpo;?></h6></div>
                    <?php $filtro = $_GET['f1']; ?>
                    <?php include("funciones/extrae_respuestas.php"); ?>
                    <?php include "cat_filtros_panel1_pdf.php"; ?>
                    <?php $filtro = $_GET['f2']; ?>
                    <?php include("funciones/extrae_respuestas.php"); ?>
                    <?php include "cat_filtros_panel2_pdf.php"; ?>
                    <?php $filtro = $_GET['f3']; ?>
                    <?php include("funciones/extrae_respuestas.php"); ?>
                    <?php include "cat_filtros_panel3_pdf.php"; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="../assets/js/bold-and-bright.js"></script>
    <script src="../assets/js/svgactions.js"></script>
    <script src="../assets/js/swal/sweetalert2.all.min.js"></script>
    <script src="../assets/js/videomodal_visto.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script>
        window.jsPDF = window.jspdf.jsPDF;
        let pdf = new jsPDF('p', 'pt', 'letter')
        pdf.html(document.getElementById('print'), {
            callback: function() {
                pdf.save('REPORTE POR CATEGORÍAS - COMPARATIVO DE TRES <?php echo $title; ?>');
                //window.open(pdf.output('bloburl')); // to debug
            }
        });
    </script>         
</body>

</html>