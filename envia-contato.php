<?php

session_start();

$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

require_once("vendors/PHPMailer/PHPMailerAutoload.php");

$mail = new PHPMailer();

// Configuracao.
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
// $mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "alura.php.e.mysql@gmail.com";
$mail->Password = "123456";

// Quem esta enviando o email.
$mail->setFrom("alura.php.e.mysql@gmail.com", "Alura Curso PHP e MySQL");

// Quem vai resceber o email.
$mail->addAddress("alura.php.e.mysql@gmail.com");

// Titulo do email.
$mail->Subject = "Email de contato da loja";

// Corpo da mensagem.
$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");

// Exibe como texto.
$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";

// Envia email.
if ($mail->send()) {
    $_SESSION["success"] = "Mensagem enviada com sucesso";
    header("Location: index.php");
} else {
    $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
    header("Location: contato.php");
}

die();
