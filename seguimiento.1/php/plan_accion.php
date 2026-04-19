<?php
$plan = $pl_row['seg_planes_id'];
$pla = sprintf("SELECT * FROM seg_planes_accion WHERE seg_planes_id = '$plan'");
if ($pla_exe = mysqli_query($conn, $pla)) {
    $pla_cnt = mysqli_num_rows($pla_exe);
    if ($pla_cnt > 0) {
        $planes = true;
        while ($pla_row = mysqli_fetch_assoc($pla_exe)) {     
?>
            <tr>
                <td><?php echo $pla_row['seg_planes_accion_cat'] ?></td>
                <td><?php echo $pla_row['seg_planes_accion_dom'] ?></td>
                <td><?php echo $pla_row['seg_planes_accion_acc'] ?></td>
            </tr>
<?php
        }
    } else {
        $planes = false;
        echo '<tr>';
        echo '<td colspan="3">';
        echo '<div class="alert alert-warning" role="alert"><strong>Sin planes de acción registrados</strong></div>';
        echo '</td>';
        echo '</tr>';
        
    }
} else {
    echo $conn->error;
    exit();
}

?>