<?php
require_once 'class_pessoa.php';
$p = new Pessoa("cadastro", "localhost", "cleidson", "C@santos123");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="estilo.css">
    <title>Cadastro de Pessoa</title>
</head>

<body>
    <section id="esquerda">
        <form action="">
            <h2>CADASTRAR PESSOA</h2>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">

            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone">

            <label for="email">Email</label>
            <input type="text" name="email" id="email">

            <input type="submit" name="" id="" value="Cadastrar">
        </form>
    </section>

    <section id="direita">
        <table>
            <tr id="titulo">
                <td>NOME</td>
                <td>TELEFONE</td>
                <td colspan="2">EMAIL</td>
            </tr>
            <?php
            $dados = $p->buscarDados();
            if (count($dados) > 0) {
                for ($i = 0; $i < count($dados); $i++) {
                    echo "<tr>";
                    foreach ($dados[$i] as $k => $v) {
                        if ($k != "id_pessoa") {
                            echo "<td>" . $v . "</td>";
                        }
                    }
                    ?>
                    <td><a href="">Editar</a><a href="">Excluir</a></td>
                    <?PHP
                    echo "</tr>";
                }
            ?>

                
            <?php
            }
            ?>

        </table>

    </section>

</body>

</html>