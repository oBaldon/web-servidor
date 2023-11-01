<?php
session_start();

if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    if ($usuario === 'admin' && $senha === 'admin') {
        $_SESSION['logado'] = true;

        header('Location: admin.php');
        exit();
    } else {
        echo 'Usuário ou senha incorretos.';
    }
}
?>
