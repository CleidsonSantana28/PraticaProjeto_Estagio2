<?php

include_once "conexao.php";

$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$consulta = $conectar->query("SELECT * FROM login WHERE id = '$id'");
$linha = $consulta->fetch(PDO::FETCH_ASSOC);

/*
FILTER_SANITIZE_NUMBER_INT > GARANTIR QUE A VARIAVEL SEJA SOMENTE INTEIRO
> post > encapsulado > não mostra no documento, execulta internamente
Encapsulamento é o processo de esconder todos os detalhes de um objeto que não contribuem para as suas características essenciais.

> get > vai pelos links na urls > pode ser visto na barra de endereço do navegador

> fetch(): Retorna uma unica row da consulta, ideal para poder utilizar em consultas como login, 
que retorna somente um resultado. fetchAll(): Retorna um array com todas as linhas da consulta, 
ideal para uma busca por nome ou por endereço.
*/
?>

<form action="editar.php" method="POST">
    Nome: <input type="text" name="nome" value="<?php echo $linha['nome'] ?>" id="nome"><br>

    Login: <input type="text" name="senha" value="<?php echo $linha['senha'] ?>" id="senha"><br>

    <input type="hidden" name="id" value="<?php echo $linha['id'] ?>">
    <input type="submit" value="Editar" id="">
</form>