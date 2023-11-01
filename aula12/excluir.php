<?php
$dsn = "mysql:host=localhost;dbname=web-servidor";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

$ra = $_GET['ra'];
$verificarSql = "SELECT nome FROM aluno WHERE ra = :ra";
$stmt = $pdo->prepare($verificarSql);
$stmt->bindParam(':ra', $ra, PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount() === 0) {
    $status = "Aluno não encontrado.";
} else {
    $excluirSql = "DELETE FROM aluno WHERE ra = :ra";
    $stmt = $pdo->prepare($excluirSql);
    $stmt->bindParam(':ra', $ra, PDO::PARAM_STR);
    
    if ($stmt->execute()) {
        $status = "Aluno excluído com sucesso.";
    } else {
        $status = "Erro ao excluir o aluno: " . implode(' ', $stmt->errorInfo());
    }
}

$pdo = null;
header("Location: index.php?status=" . urlencode($status));
exit;
