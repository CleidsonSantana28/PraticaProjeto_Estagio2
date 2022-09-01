<?php
class Pessoa
{
    private $cnx;
    public function __construct($dbname, $host, $user, $senha)
    {

        try {
            $this->cnx = new PDO("mysql:dbname=cadastrosimples;host=localhost", "cleidson", "C@santos123");
        } catch (PDOException $e) {
            echo "Erro com banco de dados: " . $e->getMessage();
            exit();
        } catch (Exception $e) {
            echo "Erro generico: " . $e->getMessage();
            exit();
        }
    }

    public function buscarDados()
    {
        $res = array();
        $cmd = $this->cnx->query("SELECT * FROM cadastro_contato ORDER BY nomeContato");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
}
?>
