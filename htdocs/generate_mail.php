<?php

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;

use Mpdf\Mpdf;

$mpdf = new \Mpdf\Mpdf();
//Договор (образец)
/*
$html=file_get_contents("contract.html");   
$mpdf->WriteHTML($html); 
$contract = $mpdf->Output("Договор.pdf",'S');

unset($mpdf);
$mpdf = new \Mpdf\Mpdf();
//Согласие на обработку персональынх данных
$html=file_get_contents("consent.html");   
$mpdf->WriteHTML($html); 
$consent = $mpdf->Output("Согласие.pdf",'S');
*/

$email="elmira.sharapova@yandex.ru"; 
echo ' ' . $email . '<br>';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->SMTPDebug = 4;
$mail->Host = 'smtp.yandex.ru';
$mail->SMTPAuth = true;
$mail->Username = 'fbftest.strbsu'; // Ваш логин в Яндексе. Именно логин, без @yandex.ru
$mail->Password = 'fbftest2019'; // Ваш пароль
$mail->CharSet = 'UTF-8';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;


//Set the encryption mechanism to use - STARTTLS or SMTPS

//Custom connection options
//Note that these settings are INSECURE

$mail->SMTPOptions = [
  'ssl' => [
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
  ]
];
$mail->SMTPKeepAlive = true;
$mail->Mailer = "smtp"; // don't change the quotes!

$mail->setFrom('fbftest.strbsu@yandex.ru'); // Ваш Email

$mail->addAddress($email); // Email получателя

$header = 'Республиканская интернет-олимпиала. Регистрация.';
$text = '<p><em><strong>Поздравляем! Регистрация успешно завершена!</strong></em></p>
<p>Участник Иванов И.И.</p>
<p>Логин: Ivanov </p>
<p>Пароль: Ivanov </p>
<p>Руководитель: Савельева Е.К.</p>
<p>Спасибо за проявленный интерес к изучению башкирского языка. Напоминаем, что олимпиада будет проходить с 1 по 15 апреля.</p>
<p><strong>Всего Вам доброго!</strong></p>
<br>
<p>Дополнительная информация у организаторов олимпиады по телефону <b>8-917-857-44-33!</b></p>
<br><br><br>------------<br>С уважением, организаторы Республиканской интернет-олимпиады!';

//Письмо
    $mail->isHTML(true);
    $mail->Subject = $header; // Заголовок письма
    $mail->Body = $text;//Текст письма
$mail->msgHTML($text);
/*
$mail->addStringAttachment($contract,'Договор.pdf','base64', 'application/pdf');//,'attachment'
$mail->addStringAttachment($consent,'Согласие.pdf','base64', 'application/pdf');//,'attachment'

$mail->send();
*/
//Результат

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'ok';
    }

    echo "<br><br><br>";
?>