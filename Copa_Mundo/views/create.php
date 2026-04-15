<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🏆 Cadastrar Seleção</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-fifa-green { background-color: #006b3f; }
        .text-fifa-green { color: #006b3f; }
        .bg-verde-escuro { background-color: #013220; }
    </style>
</head>
<body class="bg-verde-escuro font-sans text-gray-800">

    <div class="container mx-auto p-6 max-w-2xl mt-10">
        
        <div class="bg-white p-6 rounded-lg shadow-md border-t-8 border-yellow-400">
            <h2 class="text-2xl font-bold mb-6 border-b pb-2 text-fifa-green">Cadastrar Nova Seleção</h2>
            
            <form action="index.php?action=create" method="POST" class="space-y-4">
                
                <div>
                    <label class="block text-sm font-semibold mb-1">Nome da Seleção</label>
                    <input type="text" name="nome" required placeholder="Ex: Brasil" 
                           class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-green-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Grupo</label>
                    <input type="text" name="grupo" required maxlength="4" placeholder="Ex: G" 
                           class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-green-500 uppercase">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Títulos (Quantidade/Anos)</label>
                    <input type="text" name="titulos" required placeholder="Ex: 5 (1958, 1962...)" 
                           class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-green-500">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">Criado em</label>
                    <input type="date" name="criado_em" required 
                           class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-green-500">
                </div>

                <div class="flex justify-between pt-4 mt-6 border-t border-gray-200">
                    <a href="index.php" class="bg-gray-400 text-white font-bold py-2 px-4 rounded hover:bg-gray-500 transition">
                        ⬅️ Voltar
                    </a>
                    
                    <button type="submit" class="bg-fifa-green text-white font-bold py-2 px-6 rounded hover:bg-green-800 transition">
                        💾 Guardar Seleção
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>