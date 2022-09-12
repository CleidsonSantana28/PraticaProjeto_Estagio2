<?php

include_once "conexao.php";

try{
    $id = filter_var($_POST['idcriancas'], FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_var($_POST['nome_criancas']);  


    $update = $conectar->prepare("UPDATE criancas SET nome_criancas = :nome WHERE idcriancas = :id");
    $update->bindParam(':id',$id);
    $update->bindParam(':nome',$nome);
    $update->execute();
    // BINDPARAM > FILTRA A VARIAVEL
    
    header("location: index.php");

}catch(PDOException $e){
    echo "erro".$e->getMessage();
}
?>