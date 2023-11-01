<?php
include 'dados.php';
include 'funcoes.php';

$tamanhoDados = sizeof($dados);
$j = 1;


for ($i = 0; $i < $tamanhoDados; $i++) {
    $novosDados[$i] = $dados[$i];
    if ($i == 4 * $j - 2) {
        $novosDados[$i] = calculaAno($dados[$i]);
    }

    if ($i == 4 * $j - 1) {
        $j++;

        if ($dados[$i] == 1) {
            $novosDados[$i] = 'Sim';
        } else {
            $novosDados[$i] = 'Não';
        }
    }

}
$j = 1;
for ($i = 0; $i < $tamanhoDados; $i++) {
    echo $novosDados[$i] . " ";
    if ($i == 4 * $j - 1) {
        $j++;
        echo "\n";
    }
}


?>