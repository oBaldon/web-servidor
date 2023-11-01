<?php
include 'variavelMedia.php';
function calcularMedia($numeros, $funcaoMedia)
{
    return $funcaoMedia($numeros);
}
$valores = [1, 3, 7, 9, 11, 13];
$resultado = calcularMedia($valores, $media);
echo "A média é: " . $resultado;

?>