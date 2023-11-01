<?php
$mysqli = new mysqli("localhost", "root", "", "web-servidor");

if ($mysqli->connect_error) {
    die("Erro na conexão com o banco de dados: " . $mysqli->connect_error);
}

$ra = $_GET['ra'];
$verificarSql = "SELECT nome FROM aluno WHERE ra = '$ra'";
$result = $mysqli->query($verificarSql);

if ($result->num_rows === 0) {
    $status = "Aluno não encontrado.";
} else {
    $excluirSql = "DELETE FROM aluno WHERE ra = '$ra'";
    if ($mysqli->query($excluirSql) === TRUE) {
        $status = "Aluno excluído com sucesso.";
    } else {
        $status = "Erro ao excluir o aluno: " . $mysqli->error;
    }
}

$mysqli->close();
header("Location: index.php?status=" . urlencode($status));
exit;
?>
