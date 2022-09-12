<?php

include_once "conexao.php";

try {
    $nome = filter_var($_POST['nome']);
    $pai = filter_var($_POST['pai']);
    $mae = filter_var($_POST['mae']);

    $insert = $conectar->prepare("INSERT INTO criancas(nome_criancas,pai_criancas,mae_criancas) VALUES(:nome,:pai,:mae)");
    $insert->bindParam(':nome', $nome);
    $insert->bindParam(':pai', $pai);
    $insert->bindParam(':mae', $mae);
    $insert->execute();

    header("location: index.php");

} catch (PDOException $e) {
    echo "erro" . $e->getMessage();
}
