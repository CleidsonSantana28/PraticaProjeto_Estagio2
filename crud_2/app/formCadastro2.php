<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="">
    <title>Cadastro</title>
</head>

<body>
    <div class="cadastro" id="">
<!--id sobrepoem class e div....class sobrepoem div... para estilizar no css -->
        <form action="cadastrar2.php" method="POST">
            <h3>CRIANÇAS CADASTRO</h3>
            <div>
                <label for="nome">Nome da Criança</label><br>
                <input type="text" name="nome" id="nome" required><br>

                <label for="telefone">Nome do Pai</label><br>
                <input type="text" name="pai" id="pai" required><br>

                <label for="email">Nome da Mãe</label><br>
                <input type="text" name="mae" id="mae" required><br>
            </div>
            <input type="submit" value="CADASTRAR" name=""  id="">
        </form>
    </div>


</html>