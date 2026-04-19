<?php
header("Access-Control-Allow-Origin: *");
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');
if (isset($_POST['tipo_contacto'])&&isset($_POST['mensaje_contacto'])) {
    function decrypt($string, $key)
    {
        $result = '';
        $string = base64_decode($string);
        for ($i = 0; $i < strlen($string); $i++) {
            $char    = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char    = chr(ord($char) - ord($keychar));
            $result .= $char;
        }
        return $result;
    }
    $key              = "topotomachupichu";
    $usuario_contacto = $_POST['tipo_contacto'];
    $mensaje_contacto = $_POST['mensaje_contacto'];
    $usuario_nom      = decrypt($_POST['token2'], $key);
    $usuario_ap       = decrypt($_POST['token3'], $key);
    $usuario_apm      = decrypt($_POST['token4'], $key);
    $usuario_nombre   = $usuario_nom . " " . $usuario_ap . " " . $usuario_apm;
    switch ($usuario_contacto) {
        case '1':
            $tcontact = "Queja";
            $to       = "nom035@humanpro.com.mx";
            #$to       = "nom035@humanpro.com.mx";
            $toname   = "NOM-035";
            break;
        case '2':
            $tcontact = "Felicitación";
            $to       = "nom035@humanpro.com.mx";
            #$to       = "nom035@humanpro.com.mx";
            $toname   = "NOM-035";
            break;
        case '3':
            $tcontact = "Denuncia";
            $to     = "tulinea@costco.com.mx";
            #$to     = "tulinea@costco.com.mx";
            $toname = "Tu Línea Costco";
            break;
        default:
            # code...
            break;
    }
    $subject = "Contacto desde el buzón por motivo de: " . $tcontact;
    $f1      = date('Y-m-d h:i:s');
    $f11     = date_create($f1);
    $fecha   = date_format($f11, 'd-m-Y H:i:s');
    $text    = '<!doctype html>
    <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buzón de quejas y sugerencias</title>
    <style type="text/css">
    body {
      margin: 0;
    }
    body, table, td, p, a, li, blockquote {
      -webkit-text-size-adjust: none!important;
      font-family: sans-serif;
      font-style: normal;
      font-weight: 400;
    }
    button {
      width: 90%;
    }
#mensaje {

  }
  .txt1 {

  }
#footer {

}

@media screen and (max-width:600px) {
  body, table, td, p, a, li, blockquote {
    -webkit-text-size-adjust: none!important;
    font-family: sans-serif;
  }
  table {
    width: 100%;
  }
  .footer {
    height: auto !important;
    max-width: 48% !important;
    width: 48% !important;
  }
  table.responsiveImage {
    height: auto !important;
    max-width: 30% !important;
    width: 30% !important;
  }
  table.responsiveContent {
    height: auto !important;
    max-width: 66% !important;
    width: 66% !important;
  }
  .top {
    height: auto !important;
    max-width: 48% !important;
    width: 48% !important;
  }
  .catalog {
    margin-left: 0%!important;
  }
}

@media screen and (max-width:480px) {
  body, table, td, p, a, li, blockquote {
    -webkit-text-size-adjust: none!important;
    font-family: sans-serif;
  }
  table {
    width: 100% !important;
    border-style: none !important;
  }
  .footer {
    height: auto !important;
    max-width: 96% !important;
    width: 96% !important;
  }
  .table.responsiveImage {
    height: auto !important;
    max-width: 96% !important;
    width: 96% !important;
  }
  .table.responsiveContent {
    height: auto !important;
    max-width: 96% !important;
    width: 96% !important;
  }
  .top {
    height: auto !important;
    max-width: 100% !important;
    width: 100% !important;
  }
  .catalog {
    margin-left: 0%!important;
  }
  button {
    width: 90%!important;
  }
}
</style>
</head>
<body yahoo="yahoo">
<table width="100%"  cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td><table width="600"  align="center" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td><table class="top" width="48%"  align="left" cellpadding="0" cellspacing="0" style="padding:10px 10px 10px 10px;">
<tbody>
<tr>
<td style="font-size: 12px; text-align:center; font-family: sans-serif;"><img src="http://humanpro.com.mx/nom035/home/img/logo1.png" alt=""></td>
</tr>
</tbody>
</table>
<table class="top" width="48%"  align="left" cellpadding="0" cellspacing="0" style="padding:10px 10px 10px 10px; text-align:center">
<tbody>
<tr>
<td ><h3>Contacto por ' . $tcontact . '</h3><h3>' . $fecha . '</h3></td>
</tr>
</tbody>
</table></td>
</tr>
<tr>
<td style="font-size: 0; line-height: 0;" height="20"><table width="96%" align="left"  cellpadding="0" cellspacing="0">
<tr>
<td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td>
</tr>
</table></td>
</tr>
<tr>
<td style="font-size: 0; line-height: 0;" height="20"><table align="left"  cellpadding="0" cellspacing="0" >
<tr>
<td ><img src="http://humanpro.com.mx/nom035/home/img/correobanner.png"  alt="" height="" width="100%" class=""></td>
</tr>
</table></td>
</tr>
<tr>
<td style="font-size: 0; line-height: 0;" height="20"><table width="96%" align="left"  cellpadding="0" cellspacing="0">
<tr>
<td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td>
</tr>
</table></td>
</tr>
<tr>
<td><table width="100%"  align="left" cellpadding="0" cellspacing="0">
<tr>
<td align="center" style="font-size: 32px; font-weight: 300; line-height: 2.5em; color: #929292; font-family: sans-serif;">Buzón de quejas y Sugerencias</td>
</tr>
<tr>
<td align="center" style="font-size: 16px; font-weight:300; color: #929292; font-family: sans-serif;">Contacto del usuario: <strong>' . $usuario_nombre . '</strong> </td>
</tr>
<tr>
<td align="center" style="font-size: 16px; font-weight:300; color: #929292; font-family: sans-serif;">Correo</td>
</tr>
<tr>
<td style="font-size: 0; line-height: 0;" height="20"><table width="100%" align="left"  cellpadding="0" cellspacing="0">
<tr>
<td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td>
</tr>
</table></td>
</tr>
<tr>
<td align="left" style="font-size: 15px;font-style: normal;font-weight: 100;color: #046B8A;line-height: 1.8;text-align: justify;padding-top: 3px;padding-right: 20px;padding-left: 20px;padding-bottom: 9px;font-family: sans-serif;">El usuario se ha contactado para dejar un mensaje de:<br></td>
</tr>
<tr>
<td align="left" style="font-size: 15px;font-style: normal;font-weight: 100;color: #046B8A;line-height: 1.8;text-align: justify;padding-top: 3px;padding-right: 20px;padding-left: 20px;padding-bottom: 9px;font-family: sans-serif;">El mensaje es el siguiente:<br></td>
</tr>
<tr>
<td align="left" id="mensaje" style="font-size: 15px;font-style: normal;font-weight: 100;color: #000000;line-height: 1.8;text-align: justify;padding-top: 13px;padding-right: 13px;padding-left: 13px;padding-bottom: 13px;font-family: sans-serif;background-color: #DCDCDC;border-color: #7A7A7A;-webkit-box-shadow: 0px 0px;box-shadow: 0px 0px;height: 238px;">' . $mensaje_contacto . '</td>
</tr>
</table></td>
</tr>
<tr>
<td style="font-size: 0; line-height: 0;" height="10"><table width="96%" align="left"  cellpadding="0" cellspacing="0">
<tr>
<td style="font-size: 0; line-height: 0;" height="20">&nbsp;</td>
</tr>
</table></td>
</tr>
<tr>
<td><table class="footer" id="footer" width="100%"  align="left" cellpadding="0" cellspacing="0" style=" font-size: 12px; font-style: normal;font-weight: bold;color: #FFFFFF;line-height: 1.8;text-align: center;padding-top: 11px;font-family: sans-serif; background-color: #D77E11;padding-right: 11px; padding-bottom: 11px;padding-left: 11px;">
<tr>
<td><p >Este correo ha sido generado por una cuenta que no recibe correos, sólo permite el envío, favor de contactar al usuario a su correo o por los medios que se consideren pertientes. </p></td>
</tr>
</table></td>
</tr>
</tbody>
</table></td>
</tr>
</tbody>
</table>
</body>
</html>
';    
include_once "phpMailer/phpMailer/class.phpmailer.php";
include_once "phpMailer/phpMailer/class.smtp.php";
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug  = 0;
$mail->SMTPAuth   = true;
$mail->SMTPSecure = 'ssl';
$mail->CharSet    = 'utf-8';
$mail->Host       = "smtpout.secureserver.net";
$mail->Port       = 465 ;
$mail->Username   = 'amurphy@humanpro.com.mx';
$mail->Password   = 'amurphy';
$mail->From       = "amurphy@humanpro.com.mx"; //
$mail->FromName   = "Buzón de quejas y sugerencias"; //
$mail->addAddress($to, $toname);
$mail->addBCC('nom035.buzon@gmail.com');
$mail->Subject = $subject;
$mail->msgHTML($text); // remove if you do not want to send HTML email
$mail->AltBody = 'HTML not supported';
if (!$mail->send()) {
    echo '<div class="alert alert-danger" role="alert">El correo no pudo ser envíado</div>';
} else {
    echo '<div class="alert alert-success" role="alert">El mensaje que se ha enviado con éxito</div>';
}

}else{
    echo '<div class="alert alert-danger" role="alert">Formulario mal recibido.</div>';
}
