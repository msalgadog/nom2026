<?php
if (isset($_POST['campo'])) {
    $valor_campo_hijo="";
    $campo = $_POST['campo'];
    $tipo = $_POST['tipo'];   
    if (isset($_POST['valor_campo'])) {
        $valor_campo_hijo = $_POST['valor_campo'];  
    }    
    $campo_hijo =""; 
    if (isset($_POST['campo_hijo'])) {
        $campo_hijo = $_POST['campo_hijo'];
    }
    $p =""; 
    if (isset($_POST['p'])) {
        $p = $_POST['p'];
    }   
    $seleccionado =""; 
    if (isset($_POST['seleccionado'])) {
        $seleccionado = $_POST['seleccionado'];
    }       
    $inicial = $_POST['inicial'];
    include "filtros.php";
    filtro($campo,$tipo,$campo_hijo,$valor_campo_hijo,$inicial,$p,$seleccionado);
}else{
    exit("SIn filtro");
}

?>