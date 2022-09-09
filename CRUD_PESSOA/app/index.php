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
    //CLICOU NO BOTÃO CADASTRAR OU EDITAR
    if (isset($_POST['nome'])) {
        //-----------------editar-----------------
        if(isset($_GET['id_up']) && !empty($_GET['id_up']))
        {
            $id_upd =  addslashes($_POST['id_up']);
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $telefone = addslashes($_POST['telefone']);
                if(!empty($nome) && !empty($email) && !empty($telefone))
                {
            //editar
                 $p->atualizarDados($id_upd, $nome, $email, $telefone);
                    header("location: index.php");
                 }
            else   
             {
                
                ?>
                <div class="aviso">
                    <img src="aviso.png" alt="">
                    <h4>Preencha todos os campos</h4>
                </div>
                
                <?php
            }
        }
        }
        //------------cadastra-----------
        else
        {
            $nome = addslashes($_POST['nome']);
            $email = addslashes($_POST['email']);
            $telefone = addslashes($_POST['telefone']);
                if (!empty($nome) && !empty($email) && !empty($telefone))
            //cadastrar
                 if (!$p->cadastrarPessoas($nome, $email, $telefone)) {
                    ?>
                    <div class="aviso">
                        <img src="aviso.png" alt="">
                        <h4>Email ja esta cadastrado!</h4>
                    </div>
                    
                    <?php
            }   
            else 
            {
                ?>
                <div class="aviso">
                    <img src="aviso.png" alt="">
                    <h4>Preencha todos os campos</h4>
                </div>
                
                <?php
            }
        }
        //addslashes - um proteção contra codigo malicosos
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $telefone = addslashes($_POST['telefone']);
        if (!empty($nome) && !empty($email) && !empty($telefone))
            //cadastrar
            if (!$p->cadastrarPessoas($nome, $email, $telefone)) {
                ?>
                <div class="aviso">
                    <img src="aviso.png" alt="">
                    <h4>Email ja esta cadastrado!</h4>
                </div>
                
                <?php
            }
             else 
            {
                ?>
                <div>
                    <img src="aviso.jpg" alt="">
                    <h4>Preencha todos os campos</h4>
                </div>
                
                <?php
            }
    ?>
        <?php
            if(isset($_GET['id_up']))// SE A PESSOA CLICOU EM EDITAR
            {
                $id_update = addslashes($_GET['id_up']);
                $res = $p->buscarDadosPessoa($id_update);

            }
        ?>


    <section id="esquerda">
        <form method="POST">
            <h2>CADASTRAR PESSOA</h2>

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?php if(isset($res)){echo $res['nomeContato'];}?>">

            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php if(isset($res)){echo $res['emailContato'];}?>">

            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" value="<?php if(isset($res)){echo $res['telContato'];}?>">

            <input type="submit" value="<?php if(isset($res)){echo "Atualizar";}else{echo "Cadastrar";} ?>">
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
            //se tem pessoas no banco de dados
            if (count($dados) > 0)             {
                for ($i = 0; $i < count($dados); $i++) {
                    echo "<tr>";
                    foreach ($dados[$i] as $key => $value) {
                        if ($key != "idContato") {
                            echo "<td>" . $value . "</td>";
                        }
                    }
            ?>
                    <td>                    
                        <a href="index.php?id_up=<?php echo $dados[$i]['idContato'];?>">Editar</a>
                        <a href="index.php?id=<?php echo $dados[$i]['idContato'];?>">Excluir</a>
                    </td>
                <?php
                    echo "</tr>";
                }
                ?>
            <?php
            } 
            else //o banco de dados esta vazio
        {
            ?>
        </table>
        ?>
                <div class="aviso">
                    <h4>Ainda não há pessoas cadastradas</h4>
                </div>
                
                <?php
                }
                ?>
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