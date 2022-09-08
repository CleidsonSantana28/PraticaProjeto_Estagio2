<?php
require_once 'classPessoa.php';
$p = new Pessoa("cadastrosimples", "127.0.0.1", "cleidson", "C@santos123");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Principal</title>
</head>

<body>
    <?php
    if (isset($_POST['nome'])) {
        //addslashes - um proteção contra codigo malicosos
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $telefone = addslashes($_POST['telefone']);
        if (!empty($nome) && !empty($email) && !empty($telefone))
            //cadastrar
            if (!$p->cadastrarPessoas($nome, $email, $telefone)) {
                echo "Email ja esta cadastrado!";
            }
    } else {
        echo "Preencha todos os campos";
    }
    ?>
    <section id="esquerda">
        <form method="POST">
            <h2>CADASTRAR PESSOA</h2>

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">

            <label for="email">Email</label>
            <input type="email" name="email" id="email">

            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone">

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
            if (count($dados) > 0) //se tem pessoas no banco de dados
            {
                for ($i = 0; $i < count($dados); $i++) {
                    echo "<tr>";
                    foreach ($dados[$i] as $key => $value) {
                        if ($key != "idContato") {
                            echo "<td>" . $value . "</td>";
                        }
                    }
            ?>
                    <td>                    
                        <a href="">Editar</a>
                        <a href="index.php?id=<?php echo $dados[$i]['idContato'];?>">Excluir</a>
                    </td>
                <?php
                    echo "</tr>";
                }
                ?>
            <?php
            } else //o banco de dados esta vazio
            {
                echo "Ainda não há pessoas cadastradas";
            }
            ?>
        </table>

    </section>
</body>

</html>

<?php

if(isset($_GET['id']))
{
    $id_pessoa = addslashes($_GET['id']);
    $p->excluirPessoa($id_pessoa);
    header("location: index.php");
}
?>