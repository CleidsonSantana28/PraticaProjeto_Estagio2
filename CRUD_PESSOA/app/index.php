<?php
require_once 'classPessoa.php';
$p = new Pessoa("cadastrosimples", "127.0.0.1", "cleidson", "C@santos123");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Principal</title>
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

            <input type="submit" value="Cadastrar">
        </form>

    </section>

    <section id="direita">
        <table>
            <tr id="titulo">
                <td>Nome</td>
                <td>Email</td>
                <td colspan="2">Telefone</td>
            </tr>
            <?php
                $dados = $p->buscarDados();
                if (count($dados) > 0) {
                for ($i = 0; $i < count($dados); $i++) {
                    echo "<tr>";
                    foreach ($dados[$i] as $key => $value) {
                        if ($key != "idContato") {
                            echo "<td>" . $value . "</td>";
                        }
                    }
            ?>
                    <td><a href="">Editar</a><a href="">Excluir</a></td>
                <?php
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