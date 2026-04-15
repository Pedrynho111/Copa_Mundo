<?php
class Selecao {
    // Conexão com a base de dados e o nome da tabela
    private $conn;
    private $table_name = "selecoes";

    // Propriedades da seleção (as colunas do MySQL)
    public $id;
    public $nome;
    public $grupo;
    public $titulos;
    public $criado_em;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Função para Ler Todas as Seleções (Read)
    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Função para Criar uma Seleção (Create)
    public function create() {
        // O PDO usa os ":" antes do nome como medida de segurança (Prepared Statements)
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, grupo=:grupo, titulos=:titulos, criado_em=:criado_em";
        $stmt = $this->conn->prepare($query);

        // Fazemos a ligação dos dados recebidos com a query de forma segura
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":grupo", $this->grupo);
        $stmt->bindParam(":titulos", $this->titulos);
        $stmt->bindParam(":criado_em", $this->criado_em);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Função para Ler Apenas Uma Seleção (Read One - para a edição)
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $this->nome = $row['nome'];
            $this->grupo = $row['grupo'];
            $this->titulos = $row['titulos'];
            $this->criado_em = $row['criado_em'];
        }
    }

    // Função para Atualizar (Update)
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nome=:nome, grupo=:grupo, titulos=:titulos, criado_em=:criado_em WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":grupo", $this->grupo);
        $stmt->bindParam(":titulos", $this->titulos);
        $stmt->bindParam(":criado_em", $this->criado_em);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Função para Deletar (Delete)
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>