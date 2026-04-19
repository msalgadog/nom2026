<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');
header("Content-Type: text/html;charset=utf-8");
$empleados_nombres = $_SESSION['nombres'];
$empleados_apaterno = $_SESSION['apaterno'];
$empleados_amaterno = $_SESSION['amaterno'];
$usuarios_perfil= $_SESSION['perfil'];
$usuarios_nempleado= $_SESSION['usuarios_nempleado'];
?>