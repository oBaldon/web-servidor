<?php
$nomes = ['Fulano', 'Ciclano', 'Beltrano'];
$pos = json_decode(file_get_contents("php://input"));

echo json_encode($nomes[$pos]);
//header($_SERVER['SERVER_PROTOCOL'] . ' 200');