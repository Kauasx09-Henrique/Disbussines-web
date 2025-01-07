<?php
session_start();
// Você pode adicionar lógica aqui para carregar configurações existentes do banco de dados, se necessário.
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Configurações</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="../css/styleadm.css">
    <style>
       
        .settings-form {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
        .settings-form label {
            display: block;
            margin: 10px 0 5px;
        }
        .settings-form input[type="text"],
        .settings-form input[type="email"],
        .settings-form input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .settings-form button {
            background-color: #1abc9c;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        .settings-form button:hover {
            background-color: #16a085;
        }
        .alert {
            background-color: #3498db;
            color: white;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
        }
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
        <h2>Painel Admin</h2>
        <a href="dashboard.php">Dashboard</a>
        <a href="usuarios.php">Usuários</a>
        <a href="empresas.php">Empresas</a>
        <a href="configuracoes.php" class="active">Configurações</a>
        <a href="relatorios.php">Relatórios</a>
        <a href="suporte.php">Suporte</a>
        <a href="adm.php">Sair</a>
    </div>

    <!-- Conteúdo Principal -->
    <div class="main-content">
        <!-- Cabeçalho -->
        <div class="header">
            <h1>Configurações</h1>
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

        <!-- Formulário de Configurações -->
        <div class="settings-form">
            <h2>Alterar Configurações do Sistema</h2>
            <form action="../control/processarConfiguracoes.php" method="post">
                <label for="sistemaNome">Nome do Sistema:</label>
                <input type="text" name="sistemaNome" id="sistemaNome" value="<?php echo isset($config['sistemaNome']) ? htmlspecialchars($config['sistemaNome']) : ''; ?>" required>

                <label for="emailAdmin">Email do Administrador:</label>
                <input type="email" name="emailAdmin" id="emailAdmin" value="<?php echo isset($config['emailAdmin']) ? htmlspecialchars($config['emailAdmin']) : ''; ?>" required>

                <label for="senhaAdmin">Senha do Administrador:</label>
                <input type="password" name="senhaAdmin" id="senhaAdmin" required>

                <button type="submit">Salvar Configurações</button>
            </form>
        </div>
    </div>
</body>
</html>
