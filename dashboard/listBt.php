<?php
include_once("templates/header.php");
include_once("templates/footer.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Menu Suspenso com Botão de Confirmação</title>
  <link rel="stylesheet" href="./css/listBt.css">
</head>
<body>
  <form>
    <label for="menu">Selecione um nome:</label>
    <select id="menu">
    <?php
            include_once './data/conexao.php';

            // Consulta ao banco de dados para obter os nomes
            $consulta = "SELECT nome FROM tecnicos";
            $resultado = $conexao->query($consulta);

            // Verifica se a consulta retornou resultados
            if ($resultado->rowCount() > 0) {
                // Loop para exibir cada nome como uma opção do menu
                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='" . $row["nome"] . "'>" . $row["nome"] . "</option>";
                }
            } else {
                echo "<option value=''>Nenhum nome encontrado</option>";
            }
            ?>
  </select>
  <button id="botao-confirmar">Confirmar</button>
<script src="./js/confirmarListBt.js"></script>

  </form>
</body>
</html>
