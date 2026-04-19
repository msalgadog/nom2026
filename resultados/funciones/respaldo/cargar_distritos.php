<?php
include("../../php/config/db.php");
$comp="";
$grupo="";
$y="";
$where="";
if(isset($_POST['comp'])){
    $comp=$_POST['comp'];
    if($comp!=""){
        $where .= "WHERE empleados_comp = '".$comp."'";
    }
}
if(isset($_POST['grupo'])){
    $grupo=$_POST['grupo'];
    if($comp==""&&$grupo!=""){
        $where .= "WHERE empleados_gurpo = '".$grupo."'";
    }else{
        "WHERE empleados_comp = '".$comp."' AND empleados_gurpo = '".$grupo."'";
    }    
}
if(isset($_POST['distrito'])){
    $y=$_POST['distrito'];
}
if(is_int($grupo)){    
    echo '<option disabled="disabled">Seleccione un distrito</option>';
}elseif(!is_int($grupo)){
    $sql = sprintf("SELECT empleados_distrito FROM nom035_empleados $where GROUP BY empleados_distrito;");
    if ($sql_stmt = $conn->prepare($sql)) {
        $sql_status = $sql_stmt->execute();
        if ($sql_status === true) {
            $sql_stmt->store_result();
            if ($sql_stmt->num_rows > 0) {
                $sql_stmt->bind_result($valor_campo);
                echo '<option disabled="disabled" selected="selected">Seleccione un distrito</option>';
                if ($grupo==""&&$y==""&&!isset($_POST['distrito'])) {
                    echo '<option value="">TODOS</option>';
                }elseif($grupo==""&&$y==""&&isset($_POST['distrito'])){
                    echo '<option value="" selected="selected">TODOS</option>';
                }else{
                    echo '<option value="">TODOS</option>';
                }
                
                while ($sql_stmt->fetch()) {
                    $y=str_replace("+"," ",$y);
                    if($y!=""){
                        if ($y==$valor_campo) {
                            echo '<option value="' . $valor_campo . '" selected="selected">Distrito: ' . $valor_campo . '</option>';
                        }else{
                            echo '<option value="' . $valor_campo . '">Distrito: ' . $valor_campo . '</option>';
                        }
                    }else{
                        echo '<option value="' . $valor_campo . '">Distrito: ' . $valor_campo . '</option>';
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