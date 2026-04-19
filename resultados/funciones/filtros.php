<?php
/**
 * @param string $campo 
 * @param string $campo_padre 
 * @param string $valor_campo_padre 
 * @return void 
 */
include("../../php/config/db.php");
function filtro(string $campo,string $tipo,string $campo_hijo="",string $valor_campo_hijo,int $inicial,string $p="", string $seleccionado=""){
    
    if ($inicial == 2&&$tipo=="padre") {
        echo '<option value="" disabled="disabled" selected="selected">Seleccione un filtro principal para cargar sub filtros</option>';
        exit();
    }else{
        global $conn;
        $where = "";
        if ($campo=="") {
            $resultado = "No se recibieron los campos del filtro";
            echo $resultado;
            exit();
        }
        function camposwitch($campo){
            switch ($campo) {
                case 'comp':
                    $campo = 'empleados_comp';
                    break;
                case 'gurpo':
                    $campo = 'empleados_gurpo';
                    break;
                case 'distrito':
                    $campo = 'empleados_distrito';
                    break;           
                case 'grupo':
                    $campo = 'empleados_gurpo';
                    break;  
                case 'localidad':
                    $campo = 'empleados_t_localidad';
                    break;    
                case 'dpto':
                    $campo = 'empleados_dpto';
                    break;                                                                
                default:
                    # code...
                    break;
            }   
            return $campo;         
        }

        if($tipo=="padre"&&$inicial==1){
            $campo_nombre =  camposwitch($campo);    
            $campo_grupo  = camposwitch($campo); 
        }
        if($tipo=="padre"&&$inicial==0){
            $padre = camposwitch($campo);
            $campo_nombre =  camposwitch($campo_hijo);        
            $campo_grupo  = camposwitch($campo_nombre); 
            if ($valor_campo_hijo!="") {
                $where .= ' WHERE '. $padre .'="'.$valor_campo_hijo.'"';
            }else{
                $p=str_replace("+"," ",$p);
                $campo_nombre =  camposwitch($campo);   
                $campo_grupo  = camposwitch($campo); 
                #$where .= ' WHERE '. $padre .'="'.$p.'"';
            }
        }        
        $sql = sprintf("SELECT $campo_nombre FROM nom035_empleados $where GROUP BY $campo_grupo;");
        echo $sql;
        if ($sql_stmt = $conn->prepare($sql)) {
            $sql_status = $sql_stmt->execute();
            if ($sql_status === true) {
                $sql_stmt->store_result();
                if ($sql_stmt->num_rows > 0) {
                    $sql_stmt->bind_result($valor_campo);
                    while ($sql_stmt->fetch()) {
                        $p=str_replace("+"," ",$p);
                        if($p!=""){
                            if ($p==$valor_campo) {
                                echo '<option value="' . $valor_campo . '" selected="selected">' . $valor_campo . '</option>';
                            }else{
                                echo '<option value="' . $valor_campo . '">' . $valor_campo . '</option>';
                            }
                        }else{
                            echo '<option value="' . $valor_campo . '">' . $valor_campo . '</option>';
                        }
                    }
                } else {
                    echo '<option>No existen datos para filtrar</option>';
                }
            } else {
                echo $conn->error;
            }
        } else {
            exit($conn->error);
        }
    }
}
?>