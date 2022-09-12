<?php

include_once "conexao.php";

$id = filter_var($_GET['idcriancas'], FILTER_SANITIZE_NUMBER_INT);
$consulta = $conectar->query("SELECT * FROM criancas WHERE idcriancas = '$id'");
$linha = $consulta->fetch(PDO::FETCH_ASSOC);

?>

<form action="editar.php" method="POST">
    Crianças: <input type="text" name="nome" value="<?php echo $linha['nome_criancas'] ?>" id="nome"><br>
    Pai <input type="text" name="pai" value="<?php echo $linha['pai_criancas'] ?>" id="pai"><br>
    Mae: <input type="text" name="mae" value="<?php echo $linha['mae_criancas'] ?>" id="mae"><br>

    <input type="hidden" name="id" value="<?php echo $linha['idcriancas'] ?>">
    <input type="submit" value="Editar" id="">
</form>