<?php
include_once "conexao2.php";


try {
    $consulta = $conectar->query("SELECT * FROM criancas");

    echo "<a href='formCadastro2.php'>Novo Cadastro</a><br><br>Listagem das Crianças:";
    echo "<table border='1'><tr><td>Crianca</td><td>Acões</td></tr>";

    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {

        echo "<td>$linha[nome_criancas]</td><td><a href='formEditar2.php?idcriancas=$linha[idcriancas]'>Editar</a> - <a href='formVisualizar2.php?idcriancas=$linha[idcriancas]'>Visualizar</a> - <a href='excluir2.php?idcriancas=$linha[idcriancas]'>Excluir</a></td></tr>";
    }//td>$linha[pai_criancas]</td><td>$linha[mae_criancas]</td> <td>Pai</td><td>Mãe</td>
    echo "</table>";
    echo $consulta->rowCount() . " Registro Exibidos";
} catch (PDOException $e) {
    echo $e->getMessage();
}
