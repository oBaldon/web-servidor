<?php
$dsn = "mysql:host=localhost;dbname=web-servidor";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}

$query = "SELECT * FROM aluno";
$stmt = $pdo->prepare($query);
$stmt->execute();

$status = @$_GET['status'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alunos</title>
</head>
<body>
    <h1>Lista de Alunos</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>RA</th>
            <th>Ações</th>
        </tr>

        <?php
        if ($stmt) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['ra'] . "</td>";
                echo "<td>";
                echo "<a href='editar.php?ra=" . $row['ra'] . "'>Editar</a> ";
                echo "<a href='excluir.php?ra=" . $row['ra'] . "'>Excluir</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum aluno encontrado.</td></tr>";
        }
        $pdo = null;
        ?>
    </table>
    <br>
    <a href="inserir.php">Adicionar Novo Aluno</a>
</body>
</html>
