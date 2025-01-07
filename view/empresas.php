<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="../css/styleadm.css">
    <link rel="icon" href="../icon/empresa.png" type="image/x-icon">
    <style>
        /* Estilos gerais */
        body {
            display: flex;
            background-color: #f4f6f8;
            font-family: 'Roboto', sans-serif;
            margin: 0;
        }

        .content {
            padding: 20px;
        }

        .card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        /* Estilos para a tabela de empresas */
        .empresa-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .empresa-table th, .empresa-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .empresa-table th {
            background-color: #1cdf56;
            color: white;
        }

        /* Botões de ação */
        .action-btn {
            padding: 5px 10px;
            margin-right: 5px;
            text-decoration: none;
            color: white;
            border-radius: 4px;
            font-size: 14px;
        }

        .edit-btn { background-color: #3498db; }
        .delete-btn { background-color: #e74c3c; }

        /* Pop-up */
        /* Pop-up */
.popup {
    display: none; /* Inicialmente escondido */
    position: fixed; 
    left: 50%; 
    top: 50%; 
    transform: translate(-50%, -50%);
    background-color: white;
    border: 1px solid #ccc;
    padding: 20px;
    z-index: 1000;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
}

.overlay {
    display: none; /* Inicialmente escondido */
    position: fixed; 
    top: 0;
    left: 0;
    width: 100%; 
    height: 100%; 
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 500;
}


        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #42409e;
            color: white;
            padding: 20px;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.2);
        }

        .sidebar h2 {
            text-align: center;
            color: white;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
            font-weight: 500;
            margin: 8px 0;
            transition: background 0.3s, color 0.3s;
        }

        .sidebar a:hover {
            background-color: #a7a7da;
            color: #ffffff;
        }

        .main-content {
            flex-grow: 1;
            padding: 30px;
        }

        .header h1 {
            font-size: 32px;
            color: #1cdf56;
            margin-bottom: 20px;
        }

        /* Alerta */
        .alert {
            background-color: #3498db;
            color: white;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- Menu Lateral -->
    <div class="sidebar">
        <h2>Painel Admin</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="usuarios.php">Usuários</a>
        <a href="empresas.php" class="active">Empresas</a>
        <a href="configuracoes.php">Configurações</a>
        <a href="relatorios.php">Relatórios</a>
        <a href="suporte.php">Suporte</a>
        <a href="adm.php">Sair</a>
    </div>

    <!-- Conteúdo Principal -->
    <div class="main-content">
        <!-- Cabeçalho -->
        <div class="header">
            <h1>Empresas Cadastradas</h1>
        </div>

        <!-- Exibir Mensagem -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert">
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']); // Limpa a mensagem após exibir
                ?>
            </div>
        <?php endif; ?>

        <!-- Área de Listagem de Empresas -->
        <div class="content">
            <table class="empresa-table">
                <tr>
                    <th>ID</th>
                    <th>Nome da Empresa</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>

                <?php
                // Inclua o DAO e liste as empresas
                require_once '../model/DAO/EmpresaDAO.php';
                $empresaDAO = new EmpresaDAO();
                $empresas = $empresaDAO->listarEmpresas();
                
                foreach ($empresas as $empresa) {
                    echo "<tr>";
                    echo "<td>{$empresa['id_cnpj']}</td>";
                    echo "<td>{$empresa['nome_empresa']}</td>";
                    echo "<td>{$empresa['email']}</td>";
                    echo "<td>{$empresa['telefone']}</td>";
                    echo "<td>{$empresa['status']}</td>";
                
                    echo "<td>";
                    echo "<button onclick='showPopup({$empresa['id_cnpj']}, \"".htmlspecialchars($empresa['nome_empresa'])."\", \"".htmlspecialchars($empresa['email'])."\", \"".htmlspecialchars($empresa['telefone'])."\")' class='action-btn edit-btn'>Alterar</button>";

                    echo "<a href='../control/processarExcluirEmpresa.php?id_cnpj={$empresa['id_cnpj']}' class='action-btn delete-btn' onclick='return confirm(\"Deseja excluir esta empresa?\")'>Excluir</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <!-- Pop-up e Overlay -->
    <div class="overlay" id="overlay" onclick="closePopup()"></div>
<div class="popup" id="popup">
    <h2>Alterar Empresa</h2>
    <form id="editForm" method="post">
        <input type="hidden" name="id_cnpj" id="empresaId">
        <label for="nome">Nome da Empresa:</label>
        <input type="text" name="nome_empresa" id="empresaNome" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="empresaEmail" required>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="empresaTelefone" required>

        <button type="submit">Salvar Alterações</button>
        <button type="button" onclick="closePopup()">Cancelar</button>
    </form>
</div>

<script>
    function showPopup(id, nome, email, telefone) {
        console.log('showPopup chamada', id, nome, email, telefone); // Verifique se está sendo impresso no console
        document.getElementById('empresaId').value = id;
        document.getElementById('empresaNome').value = nome;
        document.getElementById('empresaEmail').value = email;
        document.getElementById('empresaTelefone').value = telefone;
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('popup').style.display = 'block';
    }

    function closePopup() {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('popup').style.display = 'none';
    }

    // Processar a alteração via AJAX
    document.getElementById('editForm').onsubmit = function(e) {
        e.preventDefault(); // Evita o envio normal do formulário
        const formData = new FormData(this);

        fetch('../control/processarAlterarEmpresa.php', {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json()) // Espera a resposta como JSON
        .then(data => {
            alert(data.message); // Exibe a mensagem diretamente do JSON
            if (data.status === 'success') {
                closePopup(); // Fecha o pop-up após sucesso
                location.reload(); // Atualiza a página para refletir as mudanças
            }
        })
        .catch(error => {
            alert('Erro na requisição: ' + error); // Caso ocorra algum erro na requisição
        });
    };
</script>

</body>
</html>
