<!DOCTYPE html>
<html>
<head>
    <title>Listas de Compras</title>
    <!-- Seus estilos CSS aqui -->
</head>
<body>
    <h1>Listas de Compras</h1>
    <ul>
        <?php foreach ($listas as $lista) : ?>
            <li>
                <strong>Título:</strong> <?= $lista['titulo']; ?> -
                <strong>Data:</strong> <?= $lista['data']; ?>
                <!-- Aqui você pode adicionar links para visualizar os itens da lista ou realizar outras ações -->
            </li>
        <?php endforeach; ?>
    </ul>
    <!-- Seus scripts JavaScript aqui -->
</body>
</html>
