<?php
//criado uma classe, um construtor e também um metodo para buscar as informações do banco de dados
//uma Classe é um conjunto de variáveis e funções relacionadas a essas variáveis.
class Pessoa
{
    private $cnx; //armazema todas as informações dessa conexão com o banco
    // PRIVATE > QUANDO E RELACIONADO A ORIENTAÇÃO A OBJETO
    // 6 funções
    // conexão dom o banco de dados
    public function __construct($dbname, $host, $user, $senha)
    {
        try {
            $this->cnx = new PDO("mysql:dbname=cadastrosimples;host=127.0.0.1", "cleidson", "C@santos123");
        } catch (PDOException $e) {
            echo "Erro com banco de dados: " . $e->getMessage(); //caso ocorra erro na conexão com o banco.
            //exit();// caso ocorro erro pare a execução.

        } catch (PDOException $e) {
            echo "Erro generico: " . $e->getMessage(); //caso ocorra um erro generico.
            //exit();
        }
    }
    // função para buscar dados e colocar no canto direito
    public function buscarDados()
    {
        $res = array(); //caso $res retorne vazio
        $cmd = $this->cnx->query("SELECT * FROM cadastro_contato");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC); //array
        return $res;
    }
    //FUNÇÃO DE CADASTRAR PESSOAS NO BANCO DE DADOS
    public function cadastrarPessoas($nome, $email, $telefone)
    {
        //ANTES DE CADASTRAR VERIFICAR SE JA TEM O EMAIL CADASTRADO
        $cmd = $this->cnx->prepare("SELECT idContato FROM cadastro_contato WHERE emailContato = :e");
        $cmd->bindValue(":e", $email);
        $cmd->execute();
        if ($cmd->rowCount() > 0) {
            return false;
        } else //não foi encontrado o email
        {
            $cmd = $this->cnx->prepare("INSERT INTO cadastro_contato(nomeContato, emailContato, telContato) VALUES(:n, :e, :t)");
            $cmd->bindValue(":n", $nome);
            $cmd->bindValue(":e", $email);
            $cmd->bindValue(":t", $telefone);
            $cmd->execute();
            return true;
        }
    }

    public function excluirPessoa($id)
    {
        $cmd = $this->cnx->prepare("DELETE FROM cadastro_contato WHERE idContato = :id");
        $cmd->bindValue(":id", $id);
        $cmd->execute();
    }
    //BUSCAR DADOS DE UMA PESSOA
    public function buscarDadosPessoa($id)
    {
        $cmd = $this->cnx->prepare("SELECT * FROM cadastro_contato WHERE idContato = :id");
        $cmd->bindValue(":id",$id);
        $cmd->execute();
        $res=$cmd->fetch(PDO::FETCH_ASSOC);
        //como a consulta é para uma pessoa usa o fetch(), se fosse para mais de uma recomenda-se o fecthAll
        //(PDO::FETCH_ASSOC) > PARA ECONOMIZAR NO USO DA MEMORIA
        return $res;
    }
    public function atualizarDados($id, $nome, $email, $telefone)
    {
        $cmd = $this->cnx->prepare("UPDATE cadastro_contato SET nomeContato = :n, emailContato = :e, telContato = :t WHERE idContato = :id");
        $cmd->bindValue(":n",$nome);
        $cmd->bindValue(":e",$email);
        $cmd->bindValue(":t",$telefone);
        $cmd->bindValue(":id",$id);
        $cmd->execute();
    }
}
