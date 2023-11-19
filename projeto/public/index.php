<?php
// Carrega os arquivos necessários e inicia a sessão (se necessário)
require_once 'autoload.php'; // Arquivo que carrega suas classes ou configurações
session_start(); // Inicia a sessão (se for utilizar)

// Verifica se o usuário está logado ou não
$usuarioLogado = false; // Supondo que você tenha uma lógica para verificar isso

// Se o usuário estiver logado, redireciona para uma página interna, por exemplo:
if ($usuarioLogado) {
    header("Location: dashboard.php");
    exit();
}

// Se não estiver logado, exibe a página de login
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sua Aplicação</title>
    <!-- Seus estilos CSS aqui -->
</head>
<body>
    <h1>Bem-vindo à Sua Aplicação</h1>
    <p>Por favor, faça <a href="login.php">login</a> para continuar.</p>
    <!-- Seus scripts JavaScript aqui -->
</body>
</html>
