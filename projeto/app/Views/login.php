<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- Seus estilos CSS aqui -->
</head>
<body>
    <h1>Faça login</h1>
    <form action="processar_login.php" method="POST">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <input type="submit" value="Entrar">
    </form>
    <!-- Seus scripts JavaScript aqui -->
</body>
</html>
