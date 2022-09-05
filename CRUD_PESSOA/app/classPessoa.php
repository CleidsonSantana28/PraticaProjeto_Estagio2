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
}
