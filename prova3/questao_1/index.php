<?php

if (isset($_COOKIE['nome'])) {
    $nome_cookie = htmlspecialchars($_COOKIE['nome']);
} else {
    $nome_cookie = '';
}
if (isset($_COOKIE['idade'])) {
    $idade_cookie = htmlspecialchars($_COOKIE['idade']);
} else {
    $idade_cookie = '';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulário</title>
</head>
<body>
    <h2>Login</h2>
    <form action="processar_login.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $nome_cookie; ?>" required><br><br>
        
        <label for="idade">Idade:</label>
        <input type="number" name="idade" id="idade" value="<?php echo $idade_cookie; ?>"required><br><br>
        
        <button formaction="salvar.php">Salvar</button>
        <button formaction="enviar.php">Enviar</button>
    </form>
</body>
</html>
