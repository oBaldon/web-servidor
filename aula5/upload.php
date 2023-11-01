<?php
//error_reporting(0);
$origem = $_FILES['arquivo']['tmp_name'];
//$nome = $_FILES['arquivo']['name'];
//$destino = __DIR__."/enviados/$nome";
$conteudo = '';

/*if(!move_uploaded_file($origem, $destino)){
    echo 'Não doi possível enviar o arquivo';
}else {
    echo 'Arquivo enviado com sucesso!';
}*/

if(is_file($origem)) {
    $fd = fopen($origem, 'r');

    while(!feof($fd)) {
        $conteudo .= fgets($fd).'<br>';
    }
    fclose($fd);
}
echo '<h1>Conteúdo do arquivo</h1>';
echo $conteudo;

