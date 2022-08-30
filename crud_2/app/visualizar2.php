<?php

include_once "conexao2.php";

try{
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_var($_POST['nome']);
    $pai = filter_var($_POST['pai']);
    $mae = filter_var($_POST['mae']);

    $consulta = $conectar->prepare("SELECT pai_criancas = :pai, mae_criancas = :mae FROM criancas WHERE idcriancas = :id");
    //VALUES > :NOME, :LOGIN > PQ OS DOIS PONTOS
    $consulta->bindParam(':id',$id);
    $consulta->bindParam(':nome',$nome);
    $consulta->bindParam(':pai',$pai);
    $consulta->bindParam(':mae',$mae);
    $consulta->execute();
    // BINDPARAM > FILTRA A VARIAVEL

    
    header("location: index2.php");

}catch(PDOException $e){
    echo "erro".$e->getMessage();
}
?>