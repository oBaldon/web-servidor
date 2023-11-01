<?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: index.html');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bem-Vindo</title>
</head>
<body>
    <h2>Bem-vindo!</h2>
    <p><a href="sair.php">Sair</a></p>
</body>
</html>
