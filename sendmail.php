<?php
require'PHPMailer/src/Exception.php';
require'PHPMailer/src/PHPMailer.php';

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require 'vendor/autoload.php';



$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('pl', 'PHPMailer/language/');
$mail->isHTML(true);
// $mail->isSMTP();
// $mail->Host = 'localhost';
// $mail->Port = 25;
// ot kogo rezewacja
$mail->setFrom('strona@sergioslab.pl', 'Serhii');
// komu wysylamy
$mail->addAddress('badzega@gmail.com');
$mail->addAddress('katerynasukhovetska@gmail.com');
// tema wiadomosci
$mail->Subject = 'Kochanie ktos cos chce';

// glowna cesc lista
$body = '<h1>Zamowienie uslugi</h1>';

if(!empty(trim($_POST['name']))){
    $body.='<p><strong>Imie:</strong> '.trim($_POST['name']).'</p>';
}
if(trim(!empty($_POST['telefon']))){
    $body.='<p><strong>telefon:</strong> '.$_POST['telefon'].'</p>';
}
if(trim(!empty($_POST['email']))){
    $body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['message']))){
    $body.='<p><strong>Wiadomość:</strong> '.$_POST['message'].'</p>';
}
$selectedOption = $_POST['things_select'];

// $body.='<p><strong>Zabiegi naRzesy + multi usługi:</strong> '.$_POST['things_select'].'</p>'
$body .= '<p><strong>Zabiegi naRzesy + multi usługi:</strong> '.$selectedOption.'</p>';
$body.='<p><strong>Zabiegi na Brwi:</strong> '.$_POST['brews_select'].'</p>';

// $body.='<p><strong> Data:</strong> '.$_POST['calendar'].'</p>';

$mail->Body = $body;

// wysylamy forme
if(!$mail->send()) {
    $message = 'Blad1';
} else {
    $message = 'Wyslano';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>





