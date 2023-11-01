<?php
$mysqli = new mysqli("localhost", "root", "", "web-servidor");

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ra = $_POST['ra'];
    $novoNome = $_POST['novo_nome'];
    
    $updateSql = "UPDATE aluno SET nome = '$novoNome' WHERE ra = '$ra'";
    if ($mysqli->query($updateSql) === TRUE) {
        $status = "Registro atualizado com sucesso.";
    } else {
        $status = "Erro ao atualizar o registro: " . $mysqli->error;
    }
    header("Location: index.php?status=" . urlencode($status));
    exit;
}

$ra = $_GET['ra'];
$selectSql = "SELECT nome FROM aluno WHERE ra = '$ra'";
$result = $mysqli->query($selectSql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nome = $row['nome'];
} else {
    $status = "Aluno não encontrado.";
    header("Location: index.php?status=" . urlencode($status));
    exit;
}

$mysqli->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Aluno</title>
</head>
<body>
    <h1>Editar Aluno</h1>
    <form method="post">
        <input type="hidden" name="ra" value="<?php echo $ra; ?>">
        Nome: <input type="text" name="novo_nome" value="<?php echo $nome; ?>"><br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
