<?php
// Chama o nosso Controller (o gerente)
require_once '../controllers/SelecaoController.php';

// Cria o Controller para começar a trabalhar
$controller = new SelecaoController();

// Verifica na morada (URL) qual é a ação que o utilizador quer fazer.
// Se não houver nada, a ação padrão é 'index' (mostrar a tabela inicial).
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Se a ação existir no Controller, ele executa. Se não, dá erro.
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "Página não encontrada!";
}
?>