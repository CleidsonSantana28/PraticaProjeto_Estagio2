<?php

include_once "conexao.php";

try{
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $nome = filter_var($_POST['nome']);
    $senha = filter_var($_POST['senha']);

    $update = $conectar->prepare("UPDATE login SET nome = :nome, senha = :senha WHERE id = :id");
    //VALUES > :NOME, :LOGIN > PQ OS DOIS PONTOS
    $update->bindParam(':id',$id);
    $update->bindParam(':nome',$nome);
    $update->bindParam(':senha',$senha);
    $update->execute();
    // BINDPARAM > FILTRA A VARIAVEL
    
    header("location: index.php");

}catch(PDOException $e){
    echo "erro".$e->getMessage();
}
?>