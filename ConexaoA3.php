<?php
class Conexao
{
    private $host = 'localhost:3306';
    private $BD_name = 'gestaoatendimentos';
    private $username = 'root';
    private $password = '';
    public $connection;

    function fazConexao()
    {
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->BD_name}", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erro de Conexão: " . $e->getMessage();
        }
        return $this->connection;
    }
}