<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require'PHPMailer/src/Exception.php';
require'PHPMailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('pl', 'PHPMailer/language/');
$mail->isHTML(true);

// ot kogo rezewacja
$mail->setForm('badzega@gmail.com', 'Serhii');
// komu wysylamy
$mail->addAddress('katerynasukhovetska@gmail.com');
// tema wiadomosci
$mail->Subject = 'Kochanie ktos cos chce';

// glowna cesc lista
$body = '<h1>Zamowienie uslugi</h1>';

if(trim(!empty($_POST['name']))){
    $body.='<p><strong>Imie:</strong> '.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['telefon']))){
    $body.='<p><strong>Imie:</strong> '.$_POST['telefon'].'</p>';
}
if(trim(!empty($_POST['email']))){
    $body.='<p><strong>Imie:</strong> '.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['message']))){
    $body.='<p><strong>Imie:</strong> '.$_POST['message'].'</p>';
}

// dodac selecty i kalendarz

// wysylamy forme