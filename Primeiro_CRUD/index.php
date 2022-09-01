<?php

include_once "conexao.php";

try{

    $consulta = $conectar->query("SELECT * FROM login");
    // query e somente consultar, não enviar dados

    echo "<a href='formCadastro.php'>Novo Cadastro</a><br><br>Listagem de Usúarios:";
    echo "<table border='1'><tr><td>Nome</td><td>Senha</td><td>Acões</td></tr>";

    while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){

        echo "<td>$linha[nome]</td><td>$linha[senha]</td><td><a href='formEditar.php?id=$linha[id]'>Editar</a> - <a href='excluir.php?id=$linha[id]'>Excluir</a></td></tr>";
        
    }
    echo "</table>";
    echo $consulta->rowCount() . "Registro Exibidos";

}catch(PDOException $e){
    echo $e->getMessage();

}
?>