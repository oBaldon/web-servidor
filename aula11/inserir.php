<?php
$mysqli = new mysqli("localhost", "root", "", "web-servidor");

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novoNome = $_POST['novo_nome'];
    $novoRA = $_POST['novo_ra'];
    
    // Verificar se o RA já existe no banco de dados
    $verificarSql = "SELECT ra FROM aluno WHERE ra = '$novoRA'";
    $result = $mysqli->query($verificarSql);
    
    if ($result->num_rows > 0) {
        $status = "RA já cadastrado.";
    } else {
        // Inserir o novo aluno no banco de dados
        $inserirSql = "INSERT INTO aluno (ra, nome) VALUES ('$novoRA', '$novoNome')";
        
        if ($mysqli->query($inserirSql) === TRUE) {
            $status = "Aluno inserido com sucesso.";
        } else {
            $status = "Erro ao inserir o aluno: " . $mysqli->error;
        }
    }
    header("Location: index.php?status=" . urlencode($status));
    exit;
}

$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inserir Aluno</title>
</head>
<body>
    <h1>Inserir Aluno</h1>
    <form method="post">
        
        <label for="novo_nome">Nome:</label>
        <input type="text" name="novo_nome" id="novo_nome" required><br>
        <label for="novo_ra">RA:</label>
        <input type="text" name="novo_ra" id="novo_ra" required><br>

        <input type="submit" value="Inserir Aluno">
    </form>
</body>
</html>
