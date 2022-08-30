<?php
$host = '127.0.0.1';
$dbName = 'toysdb_v2';
$userName = 'cleidson';
$password = 'C@santos123';

try{
    $conectar = new PDO("mysql:host=$host;dbname=$dbName", $userName,$password);
    //echo "Conectado com sucesso!";
}
catch(PDOException $e){
    //caso ocorra algum erro na conexão com o banco, exibe a mensagem
    echo 'Falha ao conectar com o banco de dados'.$e->getMessage();
}
?>