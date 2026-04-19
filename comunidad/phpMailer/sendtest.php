
<?php
error_reporting(E_ERROR);
// Varios destinatarios
$para = 'msalgadog@live.com' . ', '; // atención a la coma
$para .= 'mauriciosalgadogonzalez@gmail.com';

// título
$título = 'Recordatorio de cumpleaños para Agosto';

// mensaje
$mensaje = '
<html>
<head>
  <title>Recordatorio de cumpleaños para Agosto</title>
</head>
<body>
  <p>¡Estos son los cumpleaños para Agosto!</p>
  <table>
    <tr>
      <th>Quien</th><th>Día</th><th>Mes</th><th>Año</th>
    </tr>
    <tr>
      <td>Joe</td><td>3</td><td>Agosto</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17</td><td>Agosto</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: Mauricio Salgado <msalgadog@live.com>, Kelly <mauriciosalgadogonzalez@gmail.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <mauricio.salgado@systiconsulting.net>' . "\r\n";
$cabeceras .= 'Cc: pimpoyo@gmail.com' . "\r\n";
$cabeceras .= 'Bcc: baudicio@gmail.com' . "\r\n";

// Enviarlo

$success = mail($para, $título, $mensaje, $cabeceras);

if (!$success) {
    $errorMessage = error_get_last()['message'];
    echo $errorMessage;
}
?>
