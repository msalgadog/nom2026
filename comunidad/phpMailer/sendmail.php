<?php
include_once "phpMailer/class.phpmailer.php";
include_once "phpMailer/class.smtp.php";
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 4;
/*
$mail->SMTPAuth   = true;
$mail->SMTPSecure = 'tls';
$mail->CharSet    = 'utf-8';
$mail->Host       = "smtp.ionos.mx";
$mail->Port       = 587;
$mail->Username   = 'mauricio.salgado@systiconsulting.net';
$mail->Password   = 'M$mstergt262*123';
$mail->From       = "mauricio.salgado@systiconsulting.net"; //
$mail->FromName   = "Humanpro Nom"; //
 */
$mail->SMTPAuth   = true;
$mail->SMTPSecure = 'ssl';
$mail->CharSet    = 'utf-8';
$mail->Host       = "smtp.gmail.com";
$mail->Port       = 465;
$mail->Username   = 'humannom035@gmail.com';
$mail->Password   = '*.*SAGM851105at5';
$mail->From       = "humannom035@gmail.com"; //
$mail->FromName   = "Humanpro Nom"; //
$mail->addAddress($alu_correo, $alu_nom);
$mail->Subject = $subject;

$mail->msgHTML($text); // remove if you do not want to send HTML email
$mail->AltBody = 'HTML not supported';
$envio         = 0;

if (!$mail->send()) {
    $envio = 0;
} else {
    $envio = 1;
}

if (($tipo == "1") && ($envio == 1)) {
    header("location:../recupass.php?msj=20&cr=" . $alu_correo);
}if (($tipo == "1") && ($envio == 0)) {
    header("location:../recupass.php?msj=21&cr=" . $alu_correo);
}
