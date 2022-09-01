<?php include_once('conexao.php'); ?>
<?php

//-------------------delete update------------------------------------
// 1° FORMA
/*
$cmd = $conexao->prepare("DELETE FROM pessoa WHERE id_pessoa = :id");
$id = 4;
$cmd->bindValue(":id",$id);
$cmd->execute();
*/

// OU
// 2° FORMA
//$conexao->query("DELETE FROM pessoa WHERE id_pessoa = '3'");

// update
// 1° FORMA
/*
$cmd = $conexao->prepare("UPDATE pessoa SET email_pessoa = :e WHERE id_pessoa = :id");
$cmd->bindValue(":e", "maria555@email.com.br");
$cmd->bindValue(":id",1);
$cmd->execute();
*/

// 2° FORMA
//$conexao->query("UPDATE pessoa SET email_pessoa = 'roberta222@email.com.br' WHERE id_pessoa = '2'");
?>