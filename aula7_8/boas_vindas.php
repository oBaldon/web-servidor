<?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bem-Vindo</title>
</head>
<body>
    <h2>Seja bem-vindo!</h2>
    <p><a href="logout.php">Sair</a></p>
</body>
</html>
