<?php
namespace Models;

class ClassConexao
{
    public $server = "127.0.0.1";
    public $db = "login";
    public $user = "root";
    public $pass = "";
    public $pdo;

    public function conectaDB()
    {
        try {
            $pdo = new \PDO("mysql:host=$this->server;dbname=$this->db", $this->user, $this->pass);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            //echo "Conectado com sucesso";
        } catch (\PDOException $th) {
            echo "Erro de conexão";
            return $th->getMessage();
        }
        return $pdo;
    }

}
$pdo = new ClassConexao();
$pdo->conectaDB("127.0.0.1", "login", "root", "");
?>