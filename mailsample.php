<?php
$to      = 'jorgeluis.zevallos@gmail.com';
$subject = 'Prueba desde mail de PHP';
$message = 'Prueba desde mail de PHP';
$headers = 'From: remitente@dominio.com' . "\r\n" .
    'Reply-To: remitente@dominio.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if( mail($to, $subject, $message, $headers)){
    echo "mensaje enviado";
}
?>

