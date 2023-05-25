<?php

try {
    $conexao = new PDO("mysql:host=localhost;port=3306;dbname=link;charset=utf8",'cleidson','Mysql@123');
    //echo "Conectado!";
} catch (PDOException $e) {
    echo "Mensagem: " . $e->getMessage() . "<br>";
    echo "Linha: " . $e->getLine() . "<br>";
    echo "Arquivo: " . $e->getFile() . "<br>";
}