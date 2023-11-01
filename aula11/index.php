<?php
$mysqli = new mysqli("localhost", "root", "", "web-servidor");

$result = $mysqli->query("SELECT * FROM aluno");

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
        if ($result) {
            while ($row = $result->fetch_assoc()) {
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
        $mysqli->close();
        ?>
    </table>
    <br>
    <a href="inserir.php">Adicionar Novo Aluno</a>
</body>
</html>
