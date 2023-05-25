<?php
include_once("templates/header.php");
include_once("templates/footer.php");
?>

<!-- PRINCIPAL CADASTRAR -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Cadastro do Técnico</title>
</head>

<body>

  <h1>Cadastro de Técnico</h1><br>
  <?php
  include_once './data/conexao.php';
  //upcase  caixa alta antes de salvar no banco

  //RECEBER OS DADOS DO FORMULÁRIO
  $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
  //verifica se o usuário clicou no botão
  if (!empty($dados['btn-salvar'])) {
    //validação no formulario pelo php
    //trim, elimina os espaços em brancos

    $empty_input = false; //enquanto essa variavel for false, não realizar o cadastro.
    $dados = array_map('trim', $dados);
    //verifica se todos os dados estão preenchidos, caso algum esteja vazio irá mostrar mensagem de erro
    if (in_array("", $dados)) {
      $empty_input = true;
      echo "<p style='color:#f00'>Erro: Necessário preencher todos os campos!</p><br>";
    } elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
      //verificar e solicita que seja um endereço de e-mail válido e com estrutura de e-mail correta.
      $empty_input = true;
      echo "<p style='color:#f00'>Erro: Necessário preencher com e-mail valido!</p><br>";
    }
    //Converte para muiscula a variável $nome e nesse formato sera salvo no banco
    $nome = mb_strtoupper($dados['nome']);

    //Verificar se e-mail foi cadastrado...
    /* A consulta SQL agora é preparada utilizando placeholders ':email'
     para evitar possíveis problemas de segurança (SQL injection). 
     Em seguida, usamos o método 'bindParam()' 
     para vincular o valor do arrray "$dados['email']" ao placeholder ":email".*/

    if (!$empty_input) {
      $query = "SELECT * FROM tecnicos WHERE email = :email";
      $stmt = $conexao->prepare($query);
      $stmt->bindParam(':email', $dados['email'], PDO::PARAM_STR);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
        echo "<p style='color:#f00; text-align: center;'>Atenção! O e-mail: {$dados['email']} ja estar cadastrado.</p><br>";
      } else {

        //INSERIR DADOS NO BANCO, se variável $empty_input = FALSE
        $insert = "INSERT INTO tecnicos (nome, email, telefone) VALUES (:nome,:email,:telefone)";
        $cad_usuario = $conexao->prepare($insert);
        $cad_usuario->bindparam(':nome', $nome, pdo::PARAM_STR);
        $cad_usuario->bindparam(':email', $dados['email'], pdo::PARAM_STR);
        $cad_usuario->bindparam(':telefone', $dados['telefone'], pdo::PARAM_STR);
        $cad_usuario->execute();

        /* Depois, executamos a consulta utilizando o método 'execute()' 
        e verificamos o número de linhas retornadas pelo método 'rowCount()'.*/
        if ($cad_usuario->rowCount()) {
          //Informar ao usuario se foi cadastrado
          echo "<p style='color:green'>Usuário cadastrado com sucesso!</p><br>";
           //apaga os dados quando for cadastrado no banco
          unset($dados);
        } else {
          echo "<p style='color:#f00'>Erro: Usuário não cadastrado com sucesso!</p><br>";
        }
      }
    }
  }
  ?>

  <form name="Cad-tec" method="POST" action="">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="<?php
                                                    if (isset($dados['nome'])) { //manter os dados no formulario
                                                      echo $dados['nome'];
                                                    }
                                                    ?>"><br>
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" value="<?php
                                                        if (isset($dados['email'])) { //manter os dados no formulario
                                                          echo $dados['email'];
                                                        }
                                                        ?>"><br>
    <label for="telefone">Telefone:</label>
    <input type="tel" id="telefone" name="telefone" value="<?php
                                                            if (isset($dados['telefone'])) { //manter os dados no formulario
                                                              echo $dados['telefone'];
                                                            }
                                                            ?>"><br>
    <input type="submit" value="Salvar" name="btn-salvar">
    <input type="submit" value="Voltar" name="btn-voltar">
    <?php
    if (isset($_POST['btn-voltar'])) {
      header("location:index.php");
    }
    ?>

  </form>

</body>

</html>