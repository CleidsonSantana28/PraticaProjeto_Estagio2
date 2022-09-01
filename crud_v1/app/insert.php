<?php include_once('conexao.php'); ?>
<?php
//-------------------INSERT------------------------------------
// 1 FORMA prepare
/*
$res = $conexao->prepare("INSERT INTO pessoa(nome_pessoa, tel_pessoa, email_pessoa) VALUES(:n, :t, :e)");
$res->bindValue(":n","Roberta");
$res->bindValue(":t","99999998");
$res->bindValue(":e","roberta@email.com.br");
$res->execute();
*/

// 2° FORMA query
//$conexao->query("INSERT INTO pessoa(nome_pessoa, tel_pessoa, email_pessoa) VALUES('Paulo', '22222222', 'paulo@email.com.br')");
?>