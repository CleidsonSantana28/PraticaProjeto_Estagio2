<?php

include_once "conexao2.php";

$id = filter_var($_GET['idcriancas'], FILTER_SANITIZE_NUMBER_INT);
$consulta = $conectar->query("SELECT * FROM criancas WHERE idcriancas = '$id'");
$linha = $consulta->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="visualizar2.php" method="POST">
    <h2>VISUALIZAR CADASTRO</h2>
    <div>
        <label for="nome">Nome da Criança</label><br>
        <input type="text" name="nome" value="<?php echo $linha['nome_criancas'] ?> " id="nome"><br>

        <label for="telefone">Nome do Pai</label><br>
        <input type="text" name="pai" value="<?php echo $linha['pai_criancas'] ?>" id="pai"><br>

        <label for="email">Nome da Mãe</label><br>
        <input type="text" name="mae" value="<?php echo $linha['mae_criancas'] ?>" id="mae"><br>

        <input type="hidden" name="id" value="<?php echo $linha['idcriancas'] ?>" id="id">
    </div>

    <input type="submit" value="VOLTAR" onclick="" name="" id="">
    <!--<button onclick="index2.php" id="btVoltar">VOLTAR</button>-->
</form>
</body>
</html>

