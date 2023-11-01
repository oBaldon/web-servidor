<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $biografia = $_POST["biografia"];

    $modelo_curriculo = file_get_contents("modelo_curriculo.html");

    $modelo_curriculo = str_replace("NOME_USUARIO", $nome, $modelo_curriculo);
    $modelo_curriculo = str_replace("EMAIL", $email, $modelo_curriculo);
    $modelo_curriculo = str_replace("TELEFONE", $telefone, $modelo_curriculo);
    $modelo_curriculo = str_replace("BIOGRAFIA", $biografia, $modelo_curriculo);

    $nome_arquivo = "curriculo_$nome.html";
    file_put_contents($nome_arquivo, $modelo_curriculo);

    echo "<a href='$nome_arquivo' download>Baixar Currículo</a>";
} else {
    echo "ERRO";
}
?>
