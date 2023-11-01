<?php
require_once 'conexao.php';

$pdoStatement = $pdo->prepare("SELECT * FROM aluno");

$pdoStatement->execute();

while($aluno = $pdoStatement->fetchObject()){
    echo "RA:{$aluno->ra} - Nome: {$aluno->nome}<br>";
}