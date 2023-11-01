<?php
$origem = $_FILES['arquivo']['tmp_name'];
$conteudo = '';
$qtd_palavras = 0;
$nome = $_FILES['arquivo']['name'];
$destino = __DIR__."/enviados/$nome";

if(is_file($origem)) {
    $fd = fopen($origem, 'r');

    while(!feof($fd)) {
        $conteudo .= fgets($fd).'<br>';
    }
    fclose($fd);
}
/*echo '<h1>Conteúdo do arquivo</h1>';
echo $conteudo;
echo '<br>';*/

$qtd_palavras = str_word_count($conteudo, 0);
/*echo '<h3>Quantidade de palavras:</h3>';
echo $qtd_palavras;
echo '<br>';*/

if($qtd_palavras < 250)
{
    echo 'Seu resumo tem menos de 250 palavras!';
}
elseif($qtd_palavras > 350)
{
    echo 'Seu resumo tem mais de 350 palavras!';
}
elseif(!move_uploaded_file($origem, $destino))
{
    echo 'Não foi possível enviar o arquivo';
}else {
    echo 'Resumo salvo no servidor com sucesso!';
}