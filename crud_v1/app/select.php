<?php include_once('conexao.php'); ?>
<?php

//----------------------------SELECT----------------------------------------------
$cmd = $conexao->prepare("SELECT * FROM pessoa WHERE id_pessoa = :id");
$cmd->bindValue(":id",2);
$cmd->execute();
$resultado = $cmd->fetch(PDO::FETCH_ASSOC);//pega a informação que veio do banco de dados e transformar em um array($resultado)

foreach($resultado as $key => $value){
    echo $key.": ". $value. "<br>";
}
//print_r($resultado);//uso do programador para realizar teste quando estiver programando
?>