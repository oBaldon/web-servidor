<?php
// Config/database.php
namespace Config;

class Database {
    private $host = 'localhost';
    private $dbname = 'projeto';
    private $username = 'seu_usuario';
    private $password = 'sua_senha';
    private $conn;

    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";

        try {
            $this->conn = new \PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }
    }

    public function query($query, $params = []) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $stmt;
        } catch (\PDOException $e) {
            echo "Erro na query: " . $e->getMessage();
            return null;
        }
    }
}
