<?php

include_once "conexao.php";

try{
    $id = filter_var($_GET['idcriancas'], FILTER_SANITIZE_NUMBER_INT);
   
    $delete = $conectar->prepare("DELETE FROM criancas WHERE idcriancas = :id");
    $delete->bindParam(':id',$id);
    $delete->execute();
    
    header("location: index.php");

}catch(PDOException $e){
    echo "erro".$e->getMessage();
}
?>