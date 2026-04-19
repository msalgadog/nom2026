<?php
$par = $a['idseg_planes_accion'];
$actividades = sprintf("SELECT * FROM seg_planes_accion_actividad WHERE seg_actividades_plan_accion_id = '$par';");
if ($actividades_exe = mysqli_query($conn, $actividades)) {
    $actividades_cnt = mysqli_num_rows($actividades_exe);
    if ($actividades_cnt > 0) {
        $acnt = 1;
        while ($b = mysqli_fetch_assoc($actividades_exe)) {
?>
            <tr>
                <td><?php echo $acnt; ?></td>
                <td><?php echo $b['seg_actividades_nombre']; ?></td>
                <td><?php echo $b['seg_actividades_evidencia']; ?></td>
                <td>
                    <?php
                    if ($b['seg_actividades_tipo_tiempo'] == 1) {
                        echo "Programada";
                    } else {
                        echo "Permanente";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    if ($b['seg_actividades_tipo_tiempo'] == 1) {
                        echo $b['seg_actividades_tipo_duedate'];
                    } else {
                        echo "N/A";
                    }
                    ?>
                </td>
                <td >
                    <?php
                    switch ($b['seg_actividades_estatus']) {
                        case '1':
                            echo '<span class="badge badge-primary" style="background: #B6D7A8;color: rgb(0,0,0);font-size: 15px;">Cumplidas</span>';
                            break;
                        case '2':
                            echo '<span class="badge badge-primary" style="font-size: 15px;background: #9FC5F8;color: #000000;">En Proceso</span>';
                            break;
                        case '3':
                            echo '<span class="badge badge-primary" style="font-size: 15px;background: #8E7CC3;">Programada</span>';
                            break;
                        case '4':
                            echo '<span class="badge badge-primary" style="font-size: 15px;background: #FF2626; cursor:pointer" data-container="body" data-toggle="popover" data-placement="right" data-content="' . $b['cancelado'] . '">Cancelada</span>';
                            break;
                        default:
                            # code...
                            break;
                    }
                    ?>
                </td>
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