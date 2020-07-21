<?php
class Database {
    // Connection variables
    private $host = "mysql669.umbler.com:41890";
    private $dbName = "testesnx";
    private $username = "isa75jf";
    private $password = "Isa32257721";

    public $conn;

    // Retorna a conexão com o banco
    public function dbConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->username, $this->password, array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ));
        } catch (PDOException $exception) {
            echo "Erro na conexão: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

?>