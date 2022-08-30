<?php

include_once "conexao2.php";

try{
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_var($_POST['nome']);
    $pai = filter_var($_POST['pai']);
    $mae = filter_var($_POST['mae']);

    $update = $conectar->prepare("UPDATE criancas SET nome_criancas = :nome, pai_criancas = :pai, mae_criancas = :mae WHERE idcriancas = :id");
    //VALUES > :NOME, :LOGIN > PQ OS DOIS PONTOS
    $update->bindParam(':id',$id);
    $update->bindParam(':nome',$nome);
    $update->bindParam(':pai',$pai);
    $update->bindParam(':mae',$mae);
    $update->execute();
    // BINDPARAM > FILTRA A VARIAVEL

    
    header("location: index2.php");

}catch(PDOException $e){
    echo "erro".$e->getMessage();
}
?>