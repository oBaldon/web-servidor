<?php
    session_start();

    if (isset($_POST['nome']) || isset($_POST['idade']))
    {
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];

        $tempo_cookie = time() + 86400;
        setcookie('nome', $nome, $tempo_cookie, '/');
        setcookie('idade', $idade, $tempo_cookie, '/');
        header('Location: index.php');
        exit();
    } else {
        echo 'Campos inválidos.';
    }
?>