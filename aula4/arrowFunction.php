<?php
$calcularDelta = fn($a, $b, $c) => ($b * $b) - (4 * $a * $c);

$calcularRaizes = fn($a, $b, $c) => ($delta = $calcularDelta($a, $b, $c)) < 0 ?
    "Não há raízes reais." :
    "x1 = " . (-$b + sqrt($delta)) / (2 * $a) . ", x2 = " . (-$b - sqrt($delta)) / (2 * $a);
?>