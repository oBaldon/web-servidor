<?php
require_once 'conexao.php';

try {
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perPage = 5;

    $offset = ($page - 1) * $perPage;

    $pdo->beginTransaction();

    $query = "SELECT * FROM noticia LIMIT :per_page OFFSET :offset";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':per_page', $perPage, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    $status = @$_GET['status'];

    $pdo->commit();
} catch (PDOException $e) {
    $pdo->rollBack();
    die("Erro na consulta: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Notícias</title>
</head>
<body>
    <?php
    if ($stmt) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<h1>" . $row['titulo'] . "</h1>";
            echo "<p>" . $row['conteudo'] . "</p>";
            echo "<span>" . "TAGs: " . $row['tags'] . "</span>";
            echo "<br>";
            echo "<a href='editar.php?id=" . $row['id'] . "'>Editar </a> ";
            echo "<a href='excluir.php?id=" . $row['id'] . "'> Excluir</a>";
        }
    } else {
        echo "<tr><td colspan='3'>Nenhuma notícia encontrada.</td></tr>";
    }

    $pdo = null;
    ?>
    <br>
    <br>
    <a href="inserir.php">Adicionar Nova Notícia</a>
    <br>
    <?php
        $prevPage = $page - 1;
        $nextPage = $page + 1;
        echo "<br>";
        if ($prevPage > 0) {
            echo "<a href='?page=$prevPage'>Anterior</a> ";
        }
        if ($stmt->rowCount() == $perPage) {
            echo "<a href='?page=$nextPage'>Próxima</a>";
        }
    ?>    
</body>
</html>
