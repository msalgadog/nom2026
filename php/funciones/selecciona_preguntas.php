<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['b'])&&($_GET['b']==1||$_GET['b']==2||$_GET['b']==3||$_GET['b']==4||$_GET['b']==5)) {
        $bloque = sqldata($_GET['b'],"int");
        $preguntas = sprintf("SELECT pregunta_id,pregunta_encuesta,pregunta_item,pregunta_bloque,pregunta_titutlo_bloque,pregunta_reactivo,pregunta_siempre,pregunta_casi_siempre,pregunta_algunas_veces,pregunta_casi_nunca,pregunta_nunca,pregunta_cat,pregunta_dom,pregunta_dim FROM nom035_preguntas WHERE pregunta_bloque = ?;");
        if($preg_stmt=$conn->prepare($preguntas)){
            $preg_stmt->bind_param("i",$bloque);
            $status_preg_stmt = $preg_stmt->execute();
            if($status_preg_stmt===false){
                exit($preg_stmt->error);
            }else{
                $preg_stmt->store_result();
                if($preg_stmt->num_rows>0){
                    $preg_stmt->bind_result($pregunta_id,$pregunta_encuesta,$pregunta_item,$pregunta_bloque,$pregunta_titutlo_bloque,$pregunta_reactivo,$pregunta_siempre,$pregunta_casi_siempre,$pregunta_algunas_veces,$pregunta_casi_nunca,$pregunta_nunca,$pregunta_cat,$pregunta_dom,$pregunta_dim);
                    $preguntas=true;
                    $bloque1_1 = array(1,2,3,4,5);
                    $bloque1_2 = array(6,7,8);
                    $bloque1_3 = array(9,10,11,12);
                    $bloque1_4 = array(13,14,15,16);  
                    $bloque2_1 = array(17,18,19,20,21,22); 
                    $bloque2_2 = array(23,24,25,26,27,28);   
                    $bloque2_3 = array(29,30);      
                    $bloque3_1 = array(31,32,33,34,35,36);  
                    $bloque3_2 = array(37,38,39,40,41); 
                    $bloque3_3 = array(42,43,44,45,46); 
                    $bloque4_1 = array(47,48,49,50,51,52,53,54,55,56); 
                    $bloque4_2 = array(57,58,59,60,61,62,63,64); 
                }else{
                    exit("No hay preguntas para el bloque seleccionado");
                }
            }
        }else{
            exit($conn->error);
        }
    }else{
        exit("No recibió el bloque correctamente.");
    }
}else{
    exit("No se puedede procesar el formulario");
}
