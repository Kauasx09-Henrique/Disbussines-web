<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Relatórios</title>
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

        /* Gráfico de Barras */
        .charts {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 20px;
        }

        .chart {
            width: 48%;
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .chart h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #42409e;
        }

        .bar-chart {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            height: 200px;
            gap: 10px;
        }

        .bar {
            width: 20%;
            background-color: #1abc9c;
            border-radius: 5px;
        }

        .bar-1 { height: 70%; }
        .bar-2 { height: 60%; }
        .bar-3 { height: 85%; }
        .bar-4 { height: 40%; }
        .bar-5 { height: 50%; }

        /* Tabela de Relatórios */
        .report-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .report-table th, .report-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .report-table th {
            background-color: #1cdf56;
            color: white;
        }

        /* Botão de ação */
        .action-btn {
            padding: 8px 15px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
            cursor: pointer;
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
        <a href="relatorios.php" class="active">Relatórios</a>
        <a href="suporte.php">Suporte</a>
        <a href="adm.php">Sair</a>
    </div>

    <!-- Conteúdo Principal -->
    <div class="main-content">
        <div class="header">
            <h1>Relatórios</h1>
        </div>

        <!-- Relatórios Gráficos -->
        <div class="charts">
            <div class="chart">
                <h3>Gráfico de Vendas de Planos</h3>
                <div class="bar-chart">
                    <div class="bar bar-1"></div>
                    <div class="bar bar-2"></div>
                    <div class="bar bar-3"></div>
                    <div class="bar bar-4"></div>
                    <div class="bar bar-5"></div>
                </div>
            </div>

            <div class="chart">
                <h3>Gráfico de Usuários Ativos</h3>
                <div class="bar-chart">
                    <div class="bar bar-3"></div>
                    <div class="bar bar-1"></div>
                    <div class="bar bar-5"></div>
                    <div class="bar bar-4"></div>
                    <div class="bar bar-2"></div>
                </div>
            </div>
        </div>

        <!-- Relatório de Dados -->
        <div class="report-table">
            <table>
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Empresas</th>
                        <th>Usuários Ativos</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01/11/2024</td>
                        <td>120</td>
                        <td>45</td>
                        <td><a href="#" class="action-btn">Visualizar</a></td>
                    </tr>
                    <tr>
                        <td>02/11/2024</td>
                        <td>98</td>
                        <td>60</td>
                        <td><a href="#" class="action-btn">Visualizar</a></td>
                    </tr>
                    <tr>
                        <td>03/11/2024</td>
                        <td>75</td>
                        <td>50</td>
                        <td><a href="#" class="action-btn">Visualizar</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
