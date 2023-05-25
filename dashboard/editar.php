<!-- PRINCIPAL EDITAR-->
<?php
require_once './data/conexao.php';
include_once("templates/header.php");
include_once("templates/footer.php");

// Função para buscar os dados de um registro específico
function buscarRegistro($id) {
    global $conexao;

    try {
        $consulta = "SELECT id, nome, email, telefone FROM tecnicos WHERE id = :id";
        $stmt = $conexao->prepare($consulta);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erro ao buscar o registro: " . $e->getMessage());
    }
}

    // Verifica se uma ação foi enviada (exclusão, edição, atualização)
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $nome = mb_strtoupper($_POST['nome']);//Salva o nome em letras maiúsculas
        $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $telefone = $_POST['telefone'];

        // Atualiza o registro no banco de dados
        try {
            $atualizar = "UPDATE tecnicos SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id";
            $stmt = $conexao->prepare($atualizar);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            // Redireciona de volta para a dashboard após a edição
            header("Location: dashboard.php");
            exit();
        } catch (PDOException $e) {
            die("Erro ao atualizar o registro: " . $e->getMessage());
        }
    }
    
    // Busca os dados do registro para preencher o formulário
    $registro = buscarRegistro($id);

    if ($registro) {
?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Editar Registro</title>
        </head>
        <body>
            <h1 style="text-align: center;">Editar Registro</h1><br>

            <form method="POST" action="editar.php?id=<?php echo $id; ?>">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $registro['nome']; ?>" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $registro['email']; ?>"><br> <!--Verificação feito no script PHP -->

                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" value="<?php echo $registro['telefone']; ?>" required><br>

                <input type="submit" value="Salvar" name="Btn-salvar">
                <input type="submit" value="Cancelar" name="Btn-cancelar">
                <!-- <button type="submit">Salvar</button> -->
            </form>
        </body>
        </html>
<?php
    } else {
        echo "Registro não encontrado.";
    }
} else {
    echo "ID do registro não fornecido.";
}

