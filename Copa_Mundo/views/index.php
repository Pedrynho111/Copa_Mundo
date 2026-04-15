<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🏆 Lista de Seleções</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-fifa-green { background-color: #006b3f; }
        .text-fifa-green { color: #006b3f; }
        .bg-verde-escuro { background-color: #013220; }
    </style>
</head>
<body class="bg-verde-escuro font-sans text-gray-800">

    <div class="container mx-auto p-6 max-w-5xl mt-10">
        
        <header class="mb-8 text-center bg-white p-6 rounded-lg shadow-md border-t-8 border-yellow-400">
            <h1 class="text-4xl font-bold text-fifa-green mb-2">🏆 FIFA World Cup</h1>
            <p class="text-gray-600">Sistema de Gerenciamento de Seleções</p>
        </header>

        <div class="mb-6 flex justify-end">
            <a href="index.php?action=create" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-4 rounded shadow-md transition">
                ➕ Cadastrar Nova Seleção
            </a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
            <h2 class="text-xl font-bold mb-4 border-b pb-2 text-fifa-green">Seleções Cadastradas</h2>
            
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="p-3 border-b">ID</th>
                        <th class="p-3 border-b">Nome</th>
                        <th class="p-3 border-b">Grupo</th>
                        <th class="p-3 border-b">Títulos</th>
                        <th class="p-3 border-b">Criado em</th>
                        <th class="p-3 border-b text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Aqui o PHP vai preencher a tabela usando os dados que o Controller mandou
                    if (isset($stmt) && $stmt->rowCount() > 0) {
                        // Enquanto houver linhas no banco de dados, ele cria um <tr>
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr class='border-b hover:bg-gray-50 transition'>";
                            echo "<td class='p-3'>{$row['id']}</td>";
                            echo "<td class='p-3 font-semibold'>{$row['nome']}</td>";
                            echo "<td class='p-3 font-bold text-blue-800 uppercase'>{$row['grupo']}</td>";
                            echo "<td class='p-3'>{$row['titulos']}</td>";
                            echo "<td class='p-3'>" . date('d/m/Y', strtotime($row['criado_em'])) . "</td>";
                            echo "<td class='p-3 text-center space-x-2 flex justify-center'>";
                                // Botões com o ID da seleção na URL!
                                echo "<a href='index.php?action=edit&id={$row['id']}' class='bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded text-sm transition shadow'>✏️ Editar</a>";
                                echo "<a href='index.php?action=delete&id={$row['id']}' onclick='return confirm(\"Tem certeza que deseja apagar a seleção de {$row['nome']}?\");' class='bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded text-sm transition shadow'>🗑️ Apagar</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        // Se o banco estiver vazio, mostra isso:
                        echo "<tr>";
                        echo "<td colspan='6' class='p-6 text-center text-gray-500 font-semibold'>Nenhuma seleção cadastrada ainda. Clique no botão acima para adicionar!</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
    </div>

</body>
</html>