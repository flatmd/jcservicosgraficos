<?php

date_default_timezone_set('Etc/UTC');

// Edit this path if PHPMailer is in a different location.
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP();

/*
 * Server Configuration
 */

$mail->Host = 'smtp.gmail.com'; // Which SMTP server to use.
$mail->Port = 587; // Which port to use, 587 is the default port for TLS security.
$mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
$mail->SMTPAuth = true; // Whether you need to login. This is almost always required.
$mail->Username = "dexter.gamer.killer@gmail.com"; // Your Gmail address.
$mail->Password = "residenthomem3112"; // Your Gmail login password or App Specific Password.

/*
 * Message Configuration
 */

$mail->setFrom('isaac-1258@hotmail.com'); // Set the sender of the message.
$mail->addAddress('dexter.gamer.killer@gmail.com', 'Isaac dos Santos'); // Set the recipient of the message.
$mail->Subject = 'Contato pelo Site'; // The subject of the message.

//Choose to send either a simple text email...
$mail->Body = 'Mensagem enviada pelo site'; // Set a plain text body.

// Assunto do e-mail
$assunto = "Contato do através do site ...";

// Campos do formulário de contato
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['conteudo'];

// Monta o corpo da mensagem com os campos

$corpo .= "Nome: $nome ";
$corpo .= "Email: $email Mensagem: $mensagem";


// Cabeçalho do e-mail
$email_headers = implode("\n", array("From: $nome", "Reply-To: $email", "Subject: $assunto", "Return-Path: $email", "MIME-Version: 1.0", "X-Priority: 3", "Content-Type: text/html; charset=UTF-8"));

//Verifica se os campos estão preenchidos para enviar então o email
if ($mail->send()) {
    echo "Mensagem enviada com sucesso!";
} else {
    echo "Erro ao enviar a mensagem: " . $mail->ErrorInfo;
}
?>