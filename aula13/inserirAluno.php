<?php
require_once 'conexao.php';

$ra = $_GET['ra'] ?? false;
$nome = $_GET['nome'] ?? false;

if($ra && $nome){
    $pdoStatement = $pdo->prepare("INSERT INTO aluno(ra, nome) VALUES(:ra, :nome)");

    $pdoStatement->bindValue('ra', $ra, PDO::PARAM_INT);
    $pdoStatement->bindValue('nome', $nome, PDO::PARAM_STR);

    try {
        $pdo->beginTransaction();

        $pdoStatement->execute();

        if($pdoStatement->rowCount() > 0){
            $pdo->commit();
            //$pdo->rollBack();
            echo 'Aluno inserido com sucesso!';
        }else{
            $pdo->rollBack();
            echo 'Erro ao inserir aluno!';
        }
    } catch (Throwable $th) {
        $pdo->rollBack();
        echo 'Erro de SQL';
    }

    $pdoStatement->closeCursor();
}else{
    echo 'RA e Nome devem ser informados!';
}