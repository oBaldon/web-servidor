<?php
require_once 'conexao.php';

$ra = $_GET['ra'];

try {
    $pdo->beginTransaction();

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
            $pdo->commit();
            $status = "Aluno excluído com sucesso.";
        } else {
            $pdo->rollBack();
            $status = "Erro ao excluir o aluno: " . implode(' ', $stmt->errorInfo());
        }
    }
} catch (PDOException $e) {
    $pdo->rollBack();
    $status = "Erro ao excluir o aluno: " . $e->getMessage();
}

$pdo = null;
header("Location: index.php?status=" . urlencode($status));
exit;
?>
