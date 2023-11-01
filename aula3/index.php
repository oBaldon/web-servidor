<?php
$palavras = ["gato", "cachorro", "elefante", "leao", "tigre", "girafa"];

$palavraEscolhida = $palavras[array_rand($palavras)];
$tamanhoPalavra = strlen($palavraEscolhida);

$letrasCorretas = array_fill(0, $tamanhoPalavra, false);
$erros = 0;
$maxErros = 6;

echo "Bem-vindo ao Jogo da Forca!\n";

while ($erros < $maxErros) {
    echo "\nPalavra: ";
    for ($i = 0; $i < $tamanhoPalavra; $i++) {
        if ($letrasCorretas[$i]) {
            echo $palavraEscolhida[$i];
        } else {
            echo "_";
        }
    }

    echo "\nTentativas restantes: " . ($maxErros - $erros) . "\n";

    $letra = readline("Digite uma letra: ");

    if (strlen($letra) !== 1) {
        echo "Por favor, digite apenas uma letra.\n";
        continue;
    }

    $letra = strtolower($letra);

    if (in_array($letra, str_split($palavraEscolhida))) {
        for ($i = 0; $i < $tamanhoPalavra; $i++) {
            if ($palavraEscolhida[$i] === $letra) {
                $letrasCorretas[$i] = true;
            }
        }

        if (!in_array(false, $letrasCorretas)) {
            echo "Parabéns! Você adivinhou a palavra: $palavraEscolhida\n";
            break;
        }
    } else {
        echo "Letra incorreta!\n";
        $erros++;
    }
}

if ($erros === $maxErros) {
    echo "Você perdeu! A palavra era: $palavraEscolhida\n";
}
?>
