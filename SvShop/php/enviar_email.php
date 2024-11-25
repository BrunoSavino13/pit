<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];

    // Configuração do e-mail
    $to = "vinibragassis@gmail.com";
    $subject = $assunto;
    $message = "Nome: " . $nome . "\nEmail: " . $email . "\n\nMensagem: " . $mensagem;
    $headers = "From: " . $email . "\r\n" . 
               "Reply-To: " . $email . "\r\n" . 
               "X-Mailer: PHP/" . phpversion();

    // Enviar o e-mail
    if (mail($to, $subject, $message, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Falha ao enviar a mensagem.";
    }
}
?>
