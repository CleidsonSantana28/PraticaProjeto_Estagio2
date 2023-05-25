<?php
include_once("templates/header.php");
include_once("templates/footer.php");
?>
 <!-- PRINCIPAL -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/dashBoardStyles.css">
</head>

<body>


<h1>Dashboard</h1><br>

<?php
// Incluir o arquivo de conexão com o banco de dados
require_once './data/conexao.php';

// Função para excluir um registro
function excluirRegistro($id)
{
    global $conexao;

    try {
        $excluir = "DELETE FROM tecnicos WHERE id = :id";
        $stmt = $conexao->prepare($excluir);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Erro ao excluir o registro: " . $e->getMessage());
    }
}

// Verifica se uma ação foi enviada (exclusão, edição, atualização)
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'excluir' && isset($_GET['id'])) {
        $id = $_GET['id'];
        excluirRegistro($id);
    }
}

// Consulta para recuperar os dados
$consulta = "SELECT id, nome, email, telefone FROM tecnicos ORDER BY nome";

// Executa a consulta
$resultado = $conexao->query($consulta);

// Exibe os resultados em uma tabela
if ($resultado->rowCount() > 0) {
    echo "<table>";
    echo "<tr><th>Nome</th><th>Email</th><th>Telefone</th><th>Ações</th></tr>";
    // Processar os resultados, se houver
    while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        /*echo "<td>" . $row["id"] . "</td>";*/
        echo "<td>" . $row["nome"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["telefone"] . "</td>";
        echo "<td>";
        echo "<a href='editar.php?action=editar&id=" . $row["id"] . "' class='btn'>Editar</a>";
        echo "<a href='dashboard.php?action=excluir&id=" . $row["id"] . "' class='btn btn-delete' onclick='confirmaExcluir(event)'>Excluir</a>";
        echo "</td>";
        echo "</tr>";

    }

    echo "</table><br>";
    echo $resultado->rowCount() . " Registros";

} else {
    echo "<p style='color:#f00'>Nenhum registro encontrado.</p><br>";
}

// Fechar a conexão, se necessário
$conexao = null;
?>

<!--Alerta e confirmação de exclusão -->
<script src="./js/dashboardCadExcluir.js"></script>
</body>
</html>