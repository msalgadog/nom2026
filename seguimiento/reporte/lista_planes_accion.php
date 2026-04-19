<?php
$plaa = sprintf("SELECT idseg_planes_accion,
seg_planes_id,
seg_planes_consecutivo,
seg_planes_localidad,
seg_planes_nempleado,
seg_planes_accion_consecutivo,
seg_planes_accion_cat,
seg_planes_accion_dom,
seg_planes_accion_acc FROM seg_planes_accion WHERE seg_planes_id='$seg_planes_id' ORDER BY seg_planes_consecutivo DESC;");
if($plaa_exe = mysqli_query($conn, $plaa)){
    $plaa_cnt = mysqli_num_rows($plaa_exe);
        if ($plaa_cnt > 0) {
            while ($a = mysqli_fetch_assoc($plaa_exe)) {
?>
<tr>
<td colspan="2">
    <h4><?php echo "Acción: " . $a['seg_planes_accion_consecutivo'] ?></h4>
    <div>
        <table class="table table-bordered table-sm">
            <thead class="thead-light">
                <tr>
                    <th style="width: 33%;">Categoría</th>
                    <th style="width: 33%;">Dominio</th>
                    <th style="width: 33%;">Acción NOM-035</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $a['seg_planes_accion_cat']; ?></td>
                    <td><?php echo $a['seg_planes_accion_dom']; ?></td>
                    <td><?php echo $a['seg_planes_accion_acc']; ?></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <h5>Actividades</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th style="width: 25%;">Actividad</th>
                                        <th style="width: 25%;">Evidencia</th>
                                        <th style="width: 15%;">Programación</th>
                                        <th style="width: 15%;">Fecha</th>
                                        <th style="width: 15%;">Estatus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php include "lista_actividades.php";?>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr>
</td>
</tr>
<!--ADD_PAGE-->
<?php
            }            
        } else {
            echo "sin planes";
        }
}else{
    echo $conn->error;
}
?>


