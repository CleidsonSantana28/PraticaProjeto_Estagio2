<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Principal</title>
</head>
<body>
    <section id="esquerda">
        <form action="">
            <h2>CADASTRAR PESSOA</h2>
            
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">

            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone">

            <label for="email">Email</label>
            <input type="text" name="email" id="email">

            <input type="submit" value="Cadastrar">
        </form>

    </section>
    
    <section id="direita">
        <table>
            <tr id="titulo">
                <td>Nome</td>
                <td>Telefone</td>
                <td colspan="2">Email</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><a href="">Editar</a><a href="">Excluir</a></td>
            </tr>
        </table>

    </section>
    
</body>
</html>