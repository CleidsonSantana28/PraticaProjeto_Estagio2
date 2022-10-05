<?php


$conexao = new mysqli($dbHost = 'localhost', $dbUsername = 'cleidson', $dbPassword = 'C@santos123', $dbName = 'registroPessoas');

if (isset($_POST['submit'])) {

  //print_r($_POST['nome']);
  //print_r('<br>');
  //print_r($_POST['email']);
  //print_r('<br>');
  //print_r($_POST['telefone']);

  $nome = $_POST['nome'];
  $telefone = $_POST['telefone'];
  $email = $_POST['email'];

  $inserir = mysqli_query($conexao, "INSERT INTO contatos(nome,telefone,email)VALUES('$nome','$telefone','$email')");
  header("location: /CadastroSimples_FormPHP-master/index.php");
}
?>