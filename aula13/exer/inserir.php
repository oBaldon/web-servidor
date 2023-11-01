<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novoNome = $_POST['novo_nome'];
    $novoRA = $_POST['novo_ra'];

    try {
        $pdo->beginTransaction();

        $verificarSql = "SELECT ra FROM aluno WHERE ra = :novoRA";
        $stmt = $pdo->prepare($verificarSql);
        $stmt->bindParam(':novoRA', $novoRA, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $status = "RA já cadastrado.";
        } else {
            $inserirSql = "INSERT INTO aluno (ra, nome) VALUES (:novoRA, :novoNome)";
            $stmt = $pdo->prepare($inserirSql);
            $stmt->bindParam(':novoRA', $novoRA, PDO::PARAM_STR);
            $stmt->bindParam(':novoNome', $novoNome, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $pdo->commit();
                $status = "Aluno inserido com sucesso.";
            } else {
                $pdo->rollBack();
                $status = "Erro ao inserir o aluno: " . implode(' ', $stmt->errorInfo());
            }
        }
    } catch (PDOException $e) {
        $pdo->rollBack();
        $status = "Erro ao inserir o aluno: " . $e->getMessage();
    }

    header("Location: index.php?status=" . urlencode($status));
    exit;
}

$pdo = null;
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
