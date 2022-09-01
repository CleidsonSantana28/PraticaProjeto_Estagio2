<?php
/*
$conexao = new mysqli($dbHost='127.0.0.1',$dbUsername='cleidson',$dbPassword='C@santos123',$dbName='cadastrosimples');

if($conexao->connect_errno){
    echo "Erro de conexão";
}
else{
    echo "Conexão efetuada com sucesso";
}
*/
try
{
    $conexao = new PDO("mysql:dbname=cadastrosimples;host=localhost","cleidson","C@santos123");
}catch (PDOException $e){
    echo "Erro com banco de dados: ".$e->getMessage();
}
catch(Exception $e)
{
    echo "Erro generico: ".$e->getMessage();
}
?>
