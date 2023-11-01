<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novoTitulo = $_POST['novo_titulo'];
    $novoConteudo = $_POST['novo_conteudo'];
    $novasTags = $_POST['novas_tags'];

    try {
        $pdo->beginTransaction();

        $inserirSql = "INSERT INTO noticia (titulo, conteudo, tags) VALUES (:novo_titulo, :novo_conteudo, :novas_tags)";
        $stmt = $pdo->prepare($inserirSql);
        $stmt->bindParam(':novo_titulo', $novoTitulo, PDO::PARAM_STR);
        $stmt->bindParam(':novo_conteudo', $novoConteudo, PDO::PARAM_STR);
        $stmt->bindParam(':novas_tags', $novasTags, PDO::PARAM_STR);


        if ($stmt->execute()) {
            $pdo->commit();
            $status = "Notícia publicada com sucesso.";
        } else {
            $pdo->rollBack();
            $status = "Erro ao publicar Notícia: " . implode(' ', $stmt->errorInfo());
        }
    } catch (PDOException $e) {
        $pdo->rollBack();
        $status = "Erro ao publicar Notícia: " . $e->getMessage();
    }

    header("Location: index.php?status=" . urlencode($status));
    exit;
}

$pdo = null;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inserir Notícia</title>
</head>
<body>
    <h1>Inserir Notícia</h1>
    <form method="post">
        <label for="novo_titulo">Título:</label>
        <input type="text" name="novo_titulo" id="novo_titulo" required><br>
        <label for="novo_conteudo">Conteúdo:</label>
        <textarea name="novo_conteudo" id="novo_conteudo" required></textarea><br>
        <label for="novas_tags">Tags:</label>
        <input type="text" name="novas_tags" id="novas_tags" required><br>

        <input type="submit" value="Publicar Notícia">
    </form>
</body>
</html>
