<?php
$origem = $_FILES['arquivo']['tmp_name'];
if(is_file($origem)) {
    $fd = fopen($origem, 'r');
    $i = 0;

    while(!feof($fd)) {
        $conteudo[$i] = explode(";", fgets($fd));
        $i += 1;
    }
    fclose($fd);
}
?>