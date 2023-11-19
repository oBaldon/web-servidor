<!DOCTYPE html>
<html>
<head>
    <title>Lista de Itens</title>
    <!-- Seus estilos CSS aqui -->
</head>
<body>
    <h1>Lista de Itens</h1>
    <ul>
        <?php foreach ($itens as $item) : ?>
            <li>
                <?= $item['nome']; ?> -
                Quantidade: <?= $item['quantidade']; ?> -
                Valor: <?= $item['valor'] ? $item['valor'] : 'Não especificado'; ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <!-- Seus scripts JavaScript aqui -->
</body>
</html>
