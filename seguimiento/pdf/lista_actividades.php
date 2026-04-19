<?php
$par = $a['idseg_planes_accion'];
$actividades = sprintf("SELECT * FROM seg_planes_accion_actividad WHERE seg_actividades_plan_accion_id = '$par' AND seg_actividades_estatus NOT IN (4);");
if ($actividades_exe = mysqli_query($conn, $actividades)) {
    $actividades_cnt = mysqli_num_rows($actividades_exe);
    if ($actividades_cnt > 0) {
        $acnt = 1;
        while ($b = mysqli_fetch_assoc($actividades_exe)) {
?>
            <tr>
                <td style=" text-align: center;"><?php echo $acnt; ?></td>
                <td style=" text-align: left;"><?php echo $b['seg_actividades_nombre']; ?></td>
                <td style=" text-align: left;"><?php echo $b['seg_actividades_evidencia']; ?></td>
                <td style=" text-align: center;">
                    <?php
                    if ($b['seg_actividades_tipo_tiempo'] == 1) {
                        echo "Programada";
                    } else {
                        echo "Permanente";
                    }
                    ?>
                </td>
                <td style=" text-align: center;">
                    <?php
                    if ($b['seg_actividades_tipo_tiempo'] == 1) {
                        echo $b['seg_actividades_tipo_duedate'];
                    } else {
                        echo "N/A";
                    }
                    ?>
                </td>
                <?php
                switch ($b['seg_actividades_estatus']) {
                    case '1':
                        echo '<td style="background: #B6D7A8;color: rgb(0,0,0);  text-align: center;">Cumplidas</td>';
                        break;
                    case '2':
                        echo '<td style="background: #9FC5F8;color: rgb(0,0,0);  text-align: center;">En Proceso</td>';
                        break;
                    case '3':
                        echo '<td style="background: #8E7CC3;color: rgb(0,0,0);  text-align: center;">Programada</td>';
                        break;
                    case '4':
                        echo '<td style="background: #FF2626;color: rgb(0,0,0);  text-align: center;">Cancelada</td>';
                        break;
                    default:
                        # code...
                        break;
                }
                ?>
            </tr>
<?php
            $acnt++;
        }
    } else {
        echo '<div class="alert alert-warning" role="alert"><strong>Sin actividades</strong></div>';
    }
} else {
    echo $conn->error;
}
?>