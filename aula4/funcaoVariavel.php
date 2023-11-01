<?php
$calcularDelta = function($a, $b, $c) {
    return ($b * $b) - (4 * $a * $c);
};

$calcularRaizes = function($a, $b, $c) use ($calcularDelta) {
    $delta = $calcularDelta($a, $b, $c);

    if ($delta < 0) {
        return "Não há raízes reais.";
    } else {
        $x1 = (-$b + sqrt($delta)) / (2 * $a);
        $x2 = (-$b - sqrt($delta)) / (2 * $a);
        return "x1 = $x1, x2 = $x2";
    }
};
?>
