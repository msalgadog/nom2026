<?php
if (!function_exists('nom035_h')) {
    function nom035_h($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

#####
# seg_planes_id = id auto incremental de planes, este se debe ligar con el resto de atributos
# seg_consecutivo = id consecutivo de planes
$seg_planes_idParam = trim((string) ($_GET['seg_planes_id'] ?? ''));
$seg_consecutivoParam = trim((string) ($_GET['seg_consecutivo'] ?? ''));
$seg_localidadParam = trim((string) ($_GET['seg_localidad'] ?? ''));
$seg_nempleadoParam = trim((string) ($_GET['seg_nempleado'] ?? ''));

$plan_row = mysqli_fetch_assoc($plan_exe);
$seg_planes_id = $plan_row['seg_planes_id'];
$seg_consecutivo = $plan_row['seg_consecutivo'];
$plaa = sprintf("SELECT idseg_planes_accion,
seg_planes_id,
seg_planes_consecutivo,
seg_planes_localidad,
seg_planes_nempleado,
seg_planes_accion_consecutivo,
seg_planes_accion_cat,
seg_planes_accion_dom,
seg_planes_accion_acc FROM seg_planes_accion WHERE seg_planes_id='$seg_planes_id' ORDER BY seg_planes_consecutivo DESC;");
if ($plaa_exe = mysqli_query($conn, $plaa)) {
    $plaa_cnt = mysqli_num_rows($plaa_exe);
    if ($plaa_cnt == 0) {
        $planes_accion_conteo = 1;
    } else {
        $planes_accion_conteo = $plaa_cnt + 1;
    }
    if ($plaa_cnt == 0) {
        $but = 1;
    } else {
        $but = $plaa_cnt + 1;
    }
?>
    <div class="card-header">
        <div class="row d-xl-flex align-items-center justify-content-xl-center align-items-xl-center">
            <div class="col-12 col-sm-12 align-self-center justify-content-xl-start align-items-xl-center mb-xl-0 pb-xl-0">
                <h3 class="pb-0 mb-0"><?php echo $plan_row['seg_nom_plan']; ?></h3>
                <div class="card">
                    <div class="card-body d-xl-flex align-items-xl-center pb-2 pt-2">
                        <h6 class="text-muted card-subtitle pb-0 mb-0 mt-0"><?php echo $plan_row['seg_fech_plan']; ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 text-left">
                <!--formulario_agrega_nuevo_plan-->
                <?php if ($but<4&&$plaa_cnt>0): ?>
                    <form action="planes.php" method="GET">
                        <input type="hidden" name="action" value="new">
                        <input type="hidden" name="seg_planes_accion_consecutivo" value="<?php echo $planes_accion_conteo;?>">
                        <input type="hidden" name="seg_planes_id" value="<?php echo nom035_h($seg_planes_idParam) ?>">
                        <input type="hidden" name="seg_consecutivo" value="<?php echo nom035_h($seg_consecutivoParam) ?>">
                        <input type="hidden" name="seg_localidad" value="<?php echo nom035_h($seg_localidadParam) ?>">
                        <input type="hidden" name="seg_nempleado" value="<?php echo nom035_h($seg_nempleadoParam) ?>">
                        <button class="btn btn-primary btn-sm" type="send">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-square-fill">
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"></path>
                            </svg>&nbsp;Agregar acción NOM 035
                        </button>
                    </form>
                <?php endif; ?>
                <!--formulario_agrega_nuevo_plan-->
                <?php if (isset($_GET['action'])&&$_GET['action']=="new"): ?>
                    <?php include "form_agrega_planes.php"; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <div class="card-body">
        <?php
        if ($plaa_cnt > 0) {
            while ($a = mysqli_fetch_assoc($plaa_exe)) {
                include "detalle_planes_accion.php";
            }
            
        } else {
            echo '<div class="alert alert-warning" role="alert"><strong>Sin planes de acción registrados</strong></div>';
            include "form_agrega_planes.php";
        }
        ?>
    </div>
<?php



} else {
    echo $conn->error;
}
