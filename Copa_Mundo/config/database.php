<?php
class Database {
    // Configurações do seu banco de dados
    private $host = "localhost";
    private $db_name = "copa_db"; // Nome do banco que o PDF pede
    private $username = "root";   // Usuário padrão do XAMPP
    private $password = "";       // Senha padrão geralmente é vazia
    public $conn;

    // Método para conectar ao banco
    public function getConnection() {
        $this->conn = null;

        try {
            // Tenta criar a conexão usando PDO
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            
            // Configura para mostrar os erros caso algo dê errado
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch(PDOException $exception) {
            // Se der erro, avisa aqui
            echo "Erro de Conexão: " . $exception->getMessage();
        }

        return $this->conn; // Retorna a conexão pronta para uso
    }
}
?>