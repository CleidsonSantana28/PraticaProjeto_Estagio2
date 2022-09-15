<?php

// try...catch > é um objeto que descreve um erro ou comportamento inesperado de um script PHP
//faz conexão com o banco de dados no mysql pela instância PDO
class Conexao
{
private $cnx; 
public function __construct($dbname, $host, $user, $senha)
{

try 
{
    $cnx = new PDO("mysql:dbname=cadastrosimples;host=127.0.0.1", "cleidson", "C@santos123");
    //echo "Conectado com sucesso!";
} 
catch (PDOException $e) 
{
    echo "Erro com banco de dados: " . $e->getMessage(); //caso ocorra erro na conexão com o banco.
    //exit();// caso ocorro erro pare a execução.

} 
catch (PDOException $e) 
{
    echo "Erro generico: " . $e->getMessage(); //caso ocorra um erro generico.
    //exit();
}
}
}
?>