<?php
$dsn = "mysql:host=localhost;dbname=web-servidor";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ra = $_POST['ra'];
    $novoNome = $_POST['novo_nome'];
    
    $updateSql = "UPDATE aluno SET nome = :novoNome WHERE ra = :ra";
    $stmt = $pdo->prepare($updateSql);
    $stmt->bindParam(':novoNome', $novoNome, PDO::PARAM_STR);
    $stmt->bindParam(':ra', $ra, PDO::PARAM_STR);
    
    if ($stmt->execute()) {
        $status = "Registro atualizado com sucesso.";
    } else {
        $status = "Erro ao atualizar o registro: " . implode(' ', $stmt->errorInfo());
    }
    header("Location: index.php?status=" . urlencode($status));
    exit;
}

$ra = $_GET['ra'];
$selectSql = "SELECT nome FROM aluno WHERE ra = :ra";
$stmt = $pdo->prepare($selectSql);
$stmt->bindParam(':ra', $ra, PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $nome = $row['nome'];
} else {
    $status = "Aluno não encontrado.";
    header("Location: index.php?status=" . urlencode($status));
    exit;
}

$pdo = null;
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
