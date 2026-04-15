<?php
// O Controller precisa de conhecer a Base de Dados e o Modelo
require_once '../config/database.php';
require_once '../models/Selecao.php';

class SelecaoController {
    private $db;
    private $selecao;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->selecao = new Selecao($this->db);
    }

    // Ação 1: Mostrar o ecrã principal com a tabela (Read)
    public function index() {
        $stmt = $this->selecao->read();
        // A View index.php vai usar esta variável $stmt para desenhar as linhas da tabela!
        require_once '../views/index.php';
    }

    // Ação 2: Mostrar o ecrã de criar e guardar na base de dados (Create)
    public function create() {
        // Se o utilizador enviou o formulário (Método POST)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->selecao->nome = $_POST['nome'];
            $this->selecao->grupo = $_POST['grupo'];
            $this->selecao->titulos = $_POST['titulos'];
            $this->selecao->criado_em = $_POST['criado_em'];

            // Tenta guardar. Se der certo, volta para a página inicial!
            if ($this->selecao->create()) {
                header("Location: index.php");
                exit;
            } else {
                echo "Erro ao criar a seleção.";
            }
        } else {
            // Se não enviou formulário (Método GET), apenas mostra o ecrã de cadastro
            require_once '../views/create.php';
        }
    }

    // Ação 3: Mostrar o ecrã de editar e atualizar (Update)
    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->selecao->id = $_POST['id'];
            $this->selecao->nome = $_POST['nome'];
            $this->selecao->grupo = $_POST['grupo'];
            $this->selecao->titulos = $_POST['titulos'];
            $this->selecao->criado_em = $_POST['criado_em'];

            if ($this->selecao->update()) {
                header("Location: index.php");
                exit;
            } else {
                echo "Erro ao atualizar a seleção.";
            }
        } else {
            // Prepara os dados para preencher o formulário de edição
            $this->selecao->id = isset($_GET['id']) ? $_GET['id'] : die('ERRO: ID não encontrado.');
            $this->selecao->readOne();
            
            // Variável $dados que usámos lá no ficheiro views/edit.php
            $dados = [
                'id' => $this->selecao->id,
                'nome' => $this->selecao->nome,
                'grupo' => $this->selecao->grupo,
                'titulos' => $this->selecao->titulos,
                'criado_em' => $this->selecao->criado_em
            ];
            
            require_once '../views/edit.php';
        }
    }

    // Ação 4: Excluir uma seleção (Delete)
    public function delete() {
        $this->selecao->id = isset($_GET['id']) ? $_GET['id'] : die('ERRO: ID não encontrado.');
        
        if ($this->selecao->delete()) {
            header("Location: index.php");
            exit;
        } else {
            echo "Erro ao apagar a seleção.";
        }
    }
}
?>