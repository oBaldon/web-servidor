<?php
require_once 'conexao.php';

$id = $_GET['id'];

try {
    $pdo->beginTransaction();

    $verificarSql = "SELECT * FROM noticia WHERE id = :id";
    $stmt = $pdo->prepare($verificarSql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        $status = "Notícia não encontrada.";
    } else {
        $excluirSql = "DELETE FROM noticia WHERE id = :id";
        $stmt = $pdo->prepare($excluirSql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $pdo->commit();
            $status = "Notícia excluída com sucesso.";
        } else {
            $pdo->rollBack();
            $status = "Erro ao excluir a notícia: " . implode(' ', $stmt->errorInfo());
        }
    }
} catch (PDOException $e) {
    $pdo->rollBack();
    $status = "Erro ao excluir a notícia: " . $e->getMessage();
}

$pdo = null;
header("Location: index.php?status=" . urlencode($status));
exit;
?>
