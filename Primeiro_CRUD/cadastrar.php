<?php

include_once "conexao.php";

try {
    $nome = filter_var($_POST['nome']);
    $senha = filter_var($_POST['senha']);

    $insert = $conectar->prepare("INSERT INTO login(nome,senha) VALUES(:nome,:senha)");
    $insert->bindParam(':nome', $nome);
    $insert->bindParam(':senha', $senha);
    $insert->execute();

    header("location: index.php");
} catch (PDOException $e) {
    echo "erro" . $e->getMessage();
}
