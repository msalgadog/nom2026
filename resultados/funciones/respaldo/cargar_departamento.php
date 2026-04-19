<?php
include("../../php/config/db.php");
$comp="";
$grupo="";
$distrito="";
$localidad="";
$departamento="";
$where="";
if(isset($_POST['comp'])){
    $comp=$_POST['comp'];

}
if (isset($_POST['grupo'])) {
    $grupo=$_POST['grupo'];

}
if (isset($_POST['distrito'])) {
    $distrito=$_POST['distrito'];
}

if(isset($_POST['localidad'])){
    $localidad=$_POST['localidad'];
}

if(isset($_POST['departamento'])){
    $departamento=$_POST['departamento'];
}
if($comp==""&&$grupo==""&&$distrito==""&&$localidad==""){
    $where="";
}elseif($comp!=""&&$grupo==""&&$distrito==""&&$localidad==""){
    $where=" WHERE empleados_comp = '$comp'";
}elseif($comp==""&&$grupo!=""&&$distrito==""&&$localidad==""){
    $where=" WHERE empleados_gurpo = '$grupo'";
}elseif($comp==""&&$grupo==""&&$distrito!=""&&$localidad==""){
    $where=" WHERE empleados_distrito = '$distrito'";
}elseif($comp==""&&$grupo==""&&$distrito==""&&$localidad!=""){
    $where=" WHERE empleados_t_localidad = '$localidad'";
}elseif($comp!=""&&$grupo!=""&&$distrito==""&&$localidad==""){
    $where=" WHERE empleados_comp = '$comp' AND empleados_gurpo = '$grupo'";
}elseif($comp!=""&&$grupo==""&&$distrito!=""&&$localidad==""){
    $where=" WHERE empleados_comp = '$comp' AND empleados_distrito = '$distrito'";
}elseif($comp!=""&&$grupo==""&&$distrito==""&&$localidad!=""){
    $where=" WHERE empleados_comp = '$comp' AND empleados_t_localidad = '$localidad'";
}elseif($comp==""&&$grupo!=""&&$distrito!=""&&$localidad==""){
    $where=" WHERE empleados_gurpo = '$grupo' AND empleados_distrito = '$distrito'";
}elseif($comp==""&&$grupo!=""&&$distrito==""&&$localidad!=""){
    $where=" WHERE empleados_gurpo = '$grupo' AND empleados_t_localidad = '$localidad'";
}elseif($comp==""&&$grupo==""&&$distrito!=""&&$localidad!=""){
    $where=" WHERE empleados_distrito = '$distrito' AND empleados_t_localidad = '$localidad'";
}elseif($comp==""&&$grupo!=""&&$distrito!=""&&$localidad!=""){
    $where=" WHERE empleados_gurpo = '$grupo' AND empleados_distrito = '$distrito' AND empleados_t_localidad = '$localidad'";
}else{
    $where=" WHERE empleados_comp = '$comp' AND empleados_gurpo = '$grupo' AND empleados_distrito = '$distrito' AND empleados_t_localidad = '$localidad'";
}
if(is_int($departamento)){    
    echo '<option disabled="disabled" selected="selected">Seleccione una localidad</option>';
}elseif(!is_int($departamento)){
    $sql = sprintf("SELECT empleados_dpto FROM nom035_empleados $where GROUP BY empleados_dpto;");
    if ($sql_stmt = $conn->prepare($sql)) {
        $sql_status = $sql_stmt->execute();
        if ($sql_status === true) {
            $sql_stmt->store_result();
            if ($sql_stmt->num_rows > 0) {
                $sql_stmt->bind_result($valor_campo);
                echo '<option Value="">Todos los departamentos</option>';
                while ($sql_stmt->fetch()) {
                    $departamento=str_replace("+"," ",$departamento);
                    if($departamento!=""){
                        if ($departamento==$valor_campo) {
                            echo '<option value="' . $valor_campo . '" selected="selected">' . $valor_campo . '</option>';
                        }else{
                            echo '<option value="' . $valor_campo . '">' . $valor_campo . '</option>';
                        }
                    }else{
                        echo '<option value="' . $valor_campo . '">' . $valor_campo . '</option>';
                    }
                }
            } else {
                echo '<option value="" selected="" disabled="">No existen datos para filtrar</option>';
            }
        } else {
            echo $conn->error;
        }
    } else {
        exit($conn->error);
    }
}else{
    echo "Error ";
}