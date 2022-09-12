<?php

include_once "conexao.php";

try{
    $consulta = $conectar->query("SELECT * FROM criancas");
    // query e somente consultar, não enviar dados

    echo "<a href='formCadastro.php'>Novo Cadastro</a><br><br>Listagem das Crianças:";
    
    echo "<table border='1'><tr><td>Crianças</td><td>Pai</td><td>Mãe</td><td>Acões</td></tr>";

    while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){

        echo "<td>$linha[nome_criancas]</td><td>$linha[pai_criancas]</td><td>$linha[mae_criancas]</td><td><a href='formEditar.php?idcriancas=$linha[idcriancas]'>Editar</a> - <a href='excluir.php?idcriancas=$linha[idcriancas]'>Excluir</a></td></tr>";
        
    }
    echo "</table>";
    echo $consulta->rowCount() . "Registro Exibidos";

}catch(PDOException $e){
    echo $e->getMessage();

}