<?php
require_once 'conexao.php';

$ra = $_GET['ra'] ?? false;

if($ra){
    $pdoStatement = $pdo->prepare("SELECT * FROM aluno WHERE ra = :ra");

    $pdoStatement->bindValue('ra', $ra, PDO::PARAM_INT);

    $pdoStatement->execute();

    $aluno = $pdoStatement->fetchObject();
    echo "RA:{$aluno->ra} - Nome: {$aluno->nome}<br>";

    $pdoStatement->closeCursor();
}else{
    echo 'RA deve ser informado!';
}