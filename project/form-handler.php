<?php

ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", "587");
ini_set("sendmail_from", "aldiyarmuratkhanov700@gmail.com");

$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$email_from = "contestworld@gmail.com";

$email_subject = "New form submission";

$email_body = "User Name: $name.\n".
                "User Email: $visitor_email.\n".
                 "Subject: $subject.\n".
                 "User Message: $m\essage.\n";


$to = "aldiyarmuratkhanov700@gmail.com";

$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";

if (mail($to, $email_subject, $email_body, $headers)) {
    echo "Сообщение успешно отправлено.";
} else {
    echo "Ошибка при отправке сообщения.";
}

header("Location: contact.html");
?>
