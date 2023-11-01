<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 1</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>
            Arquivo: <input type="file" name="arquivo">
        </label>
        <button type="submit">Enviar</button>
    </form>

    <table>
        <?php foreach ($conteudo as $linha): ?>
            <tr>
                <?php foreach ($linha as $coluna): ?>
                    <td><?= $coluna ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>