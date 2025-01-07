<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Suporte</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="../css/styleadm.css">
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

        /* Formulário de Criação de Ticket */
        .ticket-form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .ticket-form label {
            display: block;
            margin-bottom: 8px;
        }
        .ticket-form input[type="text"],
        .ticket-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .ticket-form button {
            background-color: #1abc9c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .ticket-form button:hover {
            background-color: #16a085;
        }

        /* Tabela de Tickets */
        .ticket-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .ticket-table th, .ticket-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .ticket-table th {
            background-color: #1cdf56;
            color: white;
        }
        .ticket-table td.status-open {
            background-color: #f39c12;
            color: white;
        }
        .ticket-table td.status-closed {
            background-color: #e74c3c;
            color: white;
        }

        /* Botões de Ação */
        .action-btn {
            padding: 8px 15px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }
        .action-btn:hover {
            background-color: #2980b9;
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
        <a href="configuracoes.php">Configurações</a>
        <a href="relatorios.php">Relatórios</a>
        <a href="suporte.php" class="active">Suporte</a>
        <a href="adm.php">Sair</a>
    </div>

    <!-- Conteúdo Principal -->
    <div class="main-content">
        <div class="header">
            <h1>Suporte</h1>
        </div>

        <!-- Formulário para Criar Novo Ticket -->
        <div class="ticket-form">
            <h2>Criar Novo Ticket</h2>
            <form action="criar_ticket.php" method="post">
                <label for="ticket-assunto">Assunto:</label>
                <input type="text" id="ticket-assunto" name="assunto" required>

                <label for="ticket-descricao">Descrição:</label>
                <textarea id="ticket-descricao" name="descricao" rows="4" required></textarea>

                <button type="submit">Enviar Ticket</button>
            </form>
        </div>

        <!-- Tabela de Tickets de Suporte -->
        <div class="ticket-table">
            <h2>Tickets de Suporte</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Assunto</th>
                        <th>Data de Abertura</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#001</td>
                        <td>Problema no sistema de login</td>
                        <td>03/11/2024</td>
                        <td class="status-open">Aberto</td>
                        <td><a href="detalhes_ticket.php?id=001" class="action-btn">Ver Detalhes</a></td>
                    </tr>
                    <tr>
                        <td>#002</td>
                        <td>Erro ao cadastrar novo usuário</td>
                        <td>02/11/2024</td>
                        <td class="status-closed">Fechado</td>
                        <td><a href="detalhes_ticket.php?id=002" class="action-btn">Ver Detalhes</a></td>
                    </tr>
                    <tr>
                        <td>#003</td>
                        <td>Não consigo acessar os relatórios</td>
                        <td>01/11/2024</td>
                        <td class="status-open">Aberto</td>
                        <td><a href="detalhes_ticket.php?id=003" class="action-btn">Ver Detalhes</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
