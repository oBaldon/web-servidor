<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];

    $destinatario = "contato@aula.utfpr.br";
    $assuntoEmail = "Nova mensagem de contato: $assunto";

    $mensagemEmail = "Nome: $nome\n";
    $mensagemEmail .= "Email: $email\n";
    $mensagemEmail .= "Assunto: $assunto\n";
    $mensagemEmail .= "Mensagem:\n$mensagem";

    // Envie o email
    if (mail($destinatario, $assuntoEmail, $mensagemEmail)) {
        echo "Email enviado com sucesso!";
    } else {
        echo "Erro ao enviar o email. Por favor, tente novamente mais tarde.";
    }
}
?>
