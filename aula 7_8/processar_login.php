<?php
session_start();

if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    if ($usuario === 'usuario' && $senha === 'senha') {
        $_SESSION['logado'] = true;

        if (isset($_POST['manter_conectado'])) {
            $tempo_cookie = time() + 86400;
            setcookie('usuario', $usuario, $tempo_cookie, '/');
        }
        header('Location: boas_vindas.php');
        exit();
    } else {
        echo 'Usuário ou senha incorretos.';
    }
}
?>
