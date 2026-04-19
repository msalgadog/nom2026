<?php
$count_1 = sprintf("SELECT COUNT(*) AS  cumplidas FROM seg_planes_accion_actividad WHERE seg_actividades_estatus = 1 AND  seg_planes_id = '$seg_planes_id'");
$count_2 = sprintf("SELECT COUNT(*) AS proceso FROM seg_planes_accion_actividad WHERE seg_actividades_estatus = 2 AND  seg_planes_id = '$seg_planes_id'");
$count_3 = sprintf("SELECT COUNT(*) AS programada  FROM seg_planes_accion_actividad WHERE seg_actividades_estatus = 3 AND  seg_planes_id = '$seg_planes_id'");
$count_1_exe = $conn->query($count_1);
$count_2_exe = $conn->query($count_2);
$count_3_exe = $conn->query($count_3);
$count_1_cnt = mysqli_num_rows($count_1_exe);
$count_2_cnt = mysqli_num_rows($count_2_exe);
$count_3_cnt = mysqli_num_rows($count_3_exe);
if($count_1_cnt>0){$cumplidas = $count_1_exe->fetch_assoc();}else{$cumplidas="NA";}
if($count_2_cnt>0){$proceso = $count_2_exe->fetch_assoc();}else{$proceso="NA";}
if($count_3_cnt>0){$programada = $count_3_exe->fetch_assoc();}else{$programada="NA";}

if(!function_exists("ponecero")){
    function ponecero($valor){
        if (intval($valor)) {
            $valor;
        }else{
            $valor = 0;
        }
        return $valor;
    }
}
?>


<li class="list-group-item text-center"><span>Cumplidas<br></span><span class="badge badge-success text-center" style="background: #A5D5A4;color: rgb(0,0,0);font-size: 18px;"><?php echo ponecero($cumplidas['cumplidas']); ?></span></li>
<li class="list-group-item text-center"><span>En Proceso<br></span><span class="badge badge-success text-center" style="background: #8EC6FA;color: rgb(0,0,0);font-size: 18px;"><?php echo ponecero($proceso['proceso']); ?></span></li>
<li class="list-group-item text-center"><span>Programadas<br></span><span class="badge badge-success text-center" style="background: #967DC7;color: rgb(0,0,0);font-size: 18px;"><?php echo ponecero($programada['programada']); ?></span></li>


