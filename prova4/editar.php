<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $novotitulo = $_POST['novo_titulo'];
    $novoconteudo = $_POST['novo_conteudo'];
    $novastags = $_POST['novas_tags'];
    
    try {
        $pdo->beginTransaction();

        $updateSql = "UPDATE noticia SET titulo = :novo_titulo, conteudo = :novo_conteudo, tags = :novas_tags WHERE id = :id";
        $stmt = $pdo->prepare($updateSql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':novo_titulo', $novotitulo, PDO::PARAM_STR);
        $stmt->bindParam(':novo_conteudo', $novoconteudo, PDO::PARAM_STR);
        $stmt->bindParam(':novas_tags', $novastags, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            $pdo->commit();
            $status = "Registro atualizado com sucesso.";
        } else {
            $pdo->rollBack();
            $status = "Erro ao atualizar o registro: " . implode(' ', $stmt->errorInfo());
        }

        header("Location: index.php?status=" . urlencode($status));
        exit;
    } catch (PDOException $e) {
        $pdo->rollBack();
        $status = "Erro ao atualizar o registro: " . $e->getMessage();
        header("Location: index.php?status=" . urlencode($status));
        exit;
    }
}

$id = $_GET['id'];

try {
    $pdo->beginTransaction();

    $selectSql = "SELECT * FROM noticia WHERE id = :id";
    $stmt = $pdo->prepare($selectSql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $titulo = $row['titulo'];
        $conteudo = $row['conteudo'];
        $tags = $row['tags'];
    } else {
        $status = "Notícia não encontrada.";
        $pdo->commit();
        header("Location: index.php?status=" . urlencode($status));
        exit;
    }
} catch (PDOException $e) {
    $pdo->rollBack();
    $status = "Erro ao buscar notícia: " . $e->getMessage();
    header("Location: index.php?status=" . urlencode($status));
    exit;
}
$pdo = null;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Notícia</title>
</head>
<body>
    <h1>Editar Notícia</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="novo_titulo">Título:</label>
        <input type="text" name="novo_titulo" id="novo_titulo" value="<?php echo $titulo; ?>" required><br>
        <label for="novo_conteudo">Conteúdo:</label>
        <textarea name="novo_conteudo" id="novo_conteudo" required><?php echo $conteudo; ?></textarea><br>
        <label for="novas_tags">Tags:</label>
        <input type="text" name="novas_tags" id="novas_tags" value="<?php echo $tags; ?>" required><br>

        <input type="submit" value="Atualizar">
    </form>
</body>
</html>

