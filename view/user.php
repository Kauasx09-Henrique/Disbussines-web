<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Usuários</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="../css/styleadm.css">
    <link rel="icon" href="../icon/Users.png" type="image/x-icon">
    <style>
        /* Estilo geral */
        body {
            display: flex;
            background-color: #f4f6f8;
            font-family: 'Roboto', sans-serif;
            margin: 0;
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
        
        /* Ícones do menu */
        .sidebar a::before {
            content: "🡆 ";
            margin-right: 10px;
            font-size: 14px;
            color: #a7a7da;
        }

        /* Conteúdo principal */
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

        /* Área de Conteúdo */
        .content {
            padding: 20px;
        }
        
        /* Estilos para a tabela de usuários */
        .user-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .user-table th, .user-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .user-table th {
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

        /* Estilos do Pop-up */
        .popup {
            display: none; 
            position: fixed; 
            left: 50%; 
            top: 50%; 
            transform: translate(-50%, -50%);
            background-color: white; 
            border: 1px solid #42409e; 
            padding: 20px; 
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
        }
        .overlay {
            display: none; 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            background-color: rgba(0, 0, 0, 0.5); 
            z-index: 500; 
        }
    </style>
</head>
<body>
    <!-- Menu Lateral -->
    <div class="sidebar">
        <a href="adm.php">Sair</a>
    </div>

    <!-- Conteúdo Principal -->
    <div class="main-content">
        <!-- Cabeçalho -->
        <div class="header">
            <h1>Usuários Cadastrados</h1>
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

        <!-- Área de Listagem de Usuários -->
        <div class="content">
            <table class="user-table">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
                <?php
                require_once '../model/DAO/UsuarioDAO.php';
                $usuarioDAO = new UsuarioDAO();
                $usuarios = $usuarioDAO->listarUsuarios();
                
                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    echo "<td>{$usuario['id_user']}</td>";
                    echo "<td>{$usuario['nome']}</td>";
                    echo "<td>{$usuario['email']}</td>";
                    echo "<td>";
                    echo "<button onclick='showPopup({$usuario['id_user']}, \"".htmlspecialchars($usuario['nome'])."\", \"".htmlspecialchars($usuario['email'])."\")' class='action-btn edit-btn'>Alterar</button>";
                    echo "<a href='../control/processarExcluir.php?id_user={$usuario['id_user']}' class='action-btn delete-btn' onclick='return confirm(\"Deseja excluir este usuário?\")'>Excluir</a>";
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
        <h2>Alterar Usuário</h2>
        <form id="editForm" method="post">
            <input type="hidden" name="id_user" id="userId">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="userName" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="userEmail" required>

            <button type="submit">Salvar Alterações</button>
            <button type="button" onclick="closePopup()">Cancelar</button>
        </form>
    </div>

    <script>
        function showPopup(id, nome, email) {
            document.getElementById('userId').value = id;
            document.getElementById('userName').value = nome;
            document.getElementById('userEmail').value = email;
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('popup').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('popup').style.display = 'none';
        }

        document.getElementById('editForm').onsubmit = function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            fetch('../control/processarAlteracao.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.text())
            .then(responseText => {
                if (responseText.trim() === 'success') {
                    alert('Alterado com sucesso!');
                    closePopup();
                    location.reload();
                } else {
                    alert('Erro ao atualizar usuário.');
                }
            })
            .catch(error => {
                alert('Erro ao atualizar usuário.');
            });
        };
    </script>
</body>
</html>
