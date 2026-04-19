<?php
include("../../php/config/db.php");
$comp=$_POST['comp'];
$grupo="";
if(isset($_POST['grupo'])){
    $grupo=$_POST['grupo'];
}
if(is_int($comp)){    
    echo '<option disabled="disabled">Seleccione un grupo1</option>';
}elseif(!is_int($comp)){
    if($comp=="TODOS"){
        $where = "";
    }else{
        $where = "WHERE empleados_comp = '".$comp."'";
    }
    $grupo=str_replace("+"," ",$grupo);
    $sql = sprintf("SELECT empleados_gurpo FROM nom035_empleados $where GROUP BY empleados_gurpo;");
    if ($sql_stmt = $conn->prepare($sql)) {
        $sql_status = $sql_stmt->execute();
        if ($sql_status === true) {
            $sql_stmt->store_result();
            if ($sql_stmt->num_rows > 0) {
                $sql_stmt->bind_result($valor_campo);
                if ($comp == "TODOS") {
                    echo '<option value="" disabled="disabled" selected="selected">Seleccione los grupos</option>'; 
                    echo '<option value="TODOS">Todos los grupos</option>';  
                }else{
                    echo '<option value="" disabled="disabled" selected="selected">Seleccione los grupos</option>'; 
                    echo '<option value="TODOS">Todos los grupos</option>';  
                }                            
                while ($sql_stmt->fetch()) {                    
                    if($grupo!=""){
                        if ($grupo==$valor_campo) {
                            echo '<option value="' . $valor_campo . '" selected="selected">Grupo: ' . $valor_campo . '</option>';
                        }else{
                            echo '<option value="' . $valor_campo . '"> Grupo: ' . $valor_campo . '</option>';
                        }
                    }else{
                        echo '<option value="' . $valor_campo . '">Grupo: ' . $valor_campo . '</option>';
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