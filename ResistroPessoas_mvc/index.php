<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CadastroSimples_FormPHP-master/view/style.css">
    <title>Cadastro | CL</title>
</head>


<body>
    <div class="box">
        <form action="./model/cadastroDB.php" method="POST">
            <!-- "./model/cadastroDB.php" (./) refere-se a pasta atual do arquivo-->
            <!--"/CadastroSimples_FormPHP-master/model/cadastroDB.php" (/)refere-se ao enderço raiz do projeto-->
            <fieldset>
                <legend><b>Cadastro</b></legend>
                <br>
                <div class="inputBox">
                    <label for="nome" class="labelInput">Nome:</label><br>
                    <input type="text" name="nome" id="nome" class="inputUser" required>


                </div>
                <br>
                <div class="inputBox">
                    <label for="telefone" class="labelInput">Telefone:</label><br>
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>


                </div>
                <br>
                <div class="inputBox">
                    <label for="email" class="labelInput">E-mail:</label><br>
                    <input type="text" name="email" id="email" class="inputUser" required>


                </div>
                <br>
                <input type="reset" name="reset" value="Limpar" id="reset">
                <input type="submit" name="submit" value="Salvar" id="submit">
            </fieldset>
        </form>
    </div>

</body>

</html>