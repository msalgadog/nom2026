
<?php
$para      = 'msalgadog@live.com';
$titulo    = 'Encuesta NOM035';
$mensaje   = 'Preba 1';
$cabeceras = 'From: nom035@humanpro.page' . "\r\n" .
    'Reply-To: nom035@humanpro.page' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($para, $titulo, $mensaje, $cabeceras);
?>
