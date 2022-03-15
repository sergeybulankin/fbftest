<?php

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
$email="elmira.sharapova@yandex.ru"; 
echo ' ' . $email . '<br>';

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->SMTPDebug = 1; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "ssl://smtp.mail.ru"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 465; // TLS only
$mail->SMTPSecure = 'SSL'; // ssl is depracated
$mail->SMTPAuth = true;
$mail->Username = 'fbftest.strbsu@mail.ru';
$mail->Password = 'IspAa1TO%iy1';
//$mail->setFrom('fbftest.strbsu@mail.ru',  'Интернет-олимпиада');
//$mail->addReplyTo('fbftest.strbsu@mail.ru', 'Интернет-олимпиада');
//$mail->addAddress($email);
//$mail->Subject = 'Заголовок письма';
//$mail->msgHTML("Привет!"); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
//$mail->AltBody = 'И тут текст';

$mail->setFrom('fbftest.strbsu@mail.ru'); // Ваш Email
  $mail->addAddress($email);//Email получателя 
  $mail->isHTML(true); 
  $mail->Subject = 'Заголовок письма'; // Заголовок письма
  $mail->Body = 'Заголовок письма';//Текст письма
  
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "Message sent!";
}
?>