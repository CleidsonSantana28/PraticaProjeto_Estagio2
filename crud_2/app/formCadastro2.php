<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles_2.css">
    <title>Cadastro</title>
</head>

<body>
    <div class="cadastro" id="">
<!--id sobrepoem class e div....class sobrepoem div... para estilizar no css -->
        <form action="cadastrar2.php" method="POST">
            <h3>CRIANÇAS CADASTRO</h3>
            <div>
                <label for="nome">Nome da Criança</label>
                <input type="text" name="nome" id="nome" required>

                <label for="telefone">Nome do Pai</label>
                <input type="text" name="pai" id="pai" required>

                <label for="email">Nome da Mãe</label>
                <input type="text" name="mae" id="mae" required>
            </div>
            <input type="submit" value="CADASTRAR" name=""  id="">
        </form>
    </div>


</html>