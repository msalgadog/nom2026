<hr class="mt-3">

<div class="alert alert-dark" role="alert">
  <strong><h5><?php echo "Acción: " . $a['seg_planes_accion_consecutivo'] ?></h5></strong>
</div>
<div class="border rounded-0" id="ancla_plan_id_<?php echo $a['seg_planes_accion_consecutivo'] ?>">
    <table class="table table-striped table-bordered table-sm">
        <caption>
            <?php
            $par = $a['idseg_planes_accion'];
            $actividades = sprintf("SELECT * FROM seg_planes_accion_actividad WHERE seg_actividades_plan_accion_id = '$par';");
            if ($actividades_exe = mysqli_query($conn, $actividades)) {
                $actividades_cnt = mysqli_num_rows($actividades_exe);
            } else {
                echo $conn->error;
            }

            ?>
            <?php
            if ($actividades_cnt == 0) {
                $acc_nums = 1;
            } else {
                $acc_nums = $actividades_cnt + 1;
            }

            /*
            contador sin canceladas
            */
            $actividades_sin_canceladas = sprintf("SELECT * FROM seg_planes_accion_actividad WHERE seg_actividades_plan_accion_id = '$par' AND seg_actividades_estatus NOT IN (4);");
            if ($actividades_sin_canceladas_exe = mysqli_query($conn, $actividades_sin_canceladas)) {
                $actividades_sin_canceladas_cnt = mysqli_num_rows($actividades_sin_canceladas_exe);
            } else {
                echo $conn->error;
            }
            #echo "Hay :".$actividades_sin_canceladas_cnt;
            ?>

            <?php if ($acc_nums < 6 || $actividades_sin_canceladas_cnt < 5) : ?>
                <form id="add_id_<?php echo $a['seg_planes_accion_consecutivo']; ?>" method="GET" action="planes.php">
                    <input type="hidden" name="action" value="addact">
                    <input type="hidden" name="seg_planes_id" value="<?php echo $_GET['seg_planes_id'] ?>">
                    <input type="hidden" name="seg_consecutivo" value="<?php echo $_GET['seg_consecutivo'] ?>">
                    <input type="hidden" name="seg_localidad" value="<?php echo $_GET['seg_localidad'] ?>">
                    <input type="hidden" name="seg_nempleado" value="<?php echo $_GET['seg_nempleado'] ?>">
                    <input type="hidden" name="seg_planes_accion_consecutivo" value="<?php echo $a['seg_planes_accion_consecutivo']; ?>">
                    <button class="btn btn-success btn-sm" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-square-fill">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"></path>
                        </svg>&nbsp;Agregar actividades
                    </button>
                </form>
            <?php endif; ?>
            <?php
            if (isset($_GET['action']) && $_GET['action'] == "addact") {
                if ($_GET['seg_planes_accion_consecutivo'] == $a['seg_planes_accion_consecutivo']) {
                    include "form_agrega_actividad.php";
                }
            } else {
            }
            ?>

        </caption>
        <thead>
            <tr>

                <th style="width:33%;">Categoría</th>
                <th style="width:33%;">Dominio</th>
                <th style="width:33%;">Acción NOM-035</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <h6><?php echo $a['seg_planes_accion_cat']; ?></h6>
                </td>
                <td>
                    <h6><?php echo $a['seg_planes_accion_dom']; ?></h6>
                </td>
                <td>
                    <h6><?php echo $a['seg_planes_accion_acc']; ?></h6>
                </td>
            </tr>
            <tr></tr>
        </tbody>
    </table>
</div>
<table class="table table-striped table-hover table-bordered table-sm">
    <thead>
        <tr>

            <?php if ($admin == "planes_admin") : ?>
                <th style="width:5%;">#</th>
                <th style="width:25%;">Actividad</th>
                <th style="width:25%;">Evidencia</th>
                <th style="width:10%;">Programación</th>
                <th style="width:10%;">Fecha</th>
                <th style="width:10%;">Estatus</th>
                <th style="width:15%;">Seguimiento</th>
            <?php else : ?>
                <th style="width:5%;">#</th>
                <th style="width:25%;">Actividad</th>
                <th style="width:25%;">Evidencia</th>
                <th style="width:15%;">Programación</th>
                <th style="width:15%;">Fecha</th>
                <th style="width:15%;">Estatus</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php

        if ($actividades_cnt > 0) {
            $acnt = 1;
            while ($b = mysqli_fetch_assoc($actividades_exe)) {
                include "listado_actividades.php";
                $acnt++;
            }
        } else {
            echo '<div class="alert alert-warning" role="alert"><strong>Sin actividades</strong></div>';
        }
        ?>
    </tbody>
</table>