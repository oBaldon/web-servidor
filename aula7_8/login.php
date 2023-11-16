<?php

if (isset($_COOKIE['usuario'])) {
    $usuario_cookie = htmlspecialchars($_COOKIE['usuario']);
} else {
    $usuario_cookie = '';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="processar_login.php" method="post">
        <label for="usuario">Usuário:</label>
        <input type="text" name="usuario" id="usuario" value="<?php echo $usuario_cookie; ?>" required><br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br><br>
        
        <input type="checkbox" name="manter_conectado" id="manter_conectado">
        <label for="manter_conectado">Manter Conectado</label><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>
