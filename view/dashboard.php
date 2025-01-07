<?php
session_start();
require_once '../model/DAO/EmpresaDAO.php';
require_once '../model/DAO/UsuarioDAO.php';

// Aqui você pode obter os dados que deseja exibir
$empresaDAO = new EmpresaDAO();
$totalEmpresas = $empresaDAO->contarEmpresas(); // Método para contar total de empresas

$usuarioDAO = new UsuarioDAO();
$totalUsuarios = $usuarioDAO->contarUsuarios(); // Método para contar total de usuários
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <link rel="stylesheet" href="../css/styleadm.css">
    <link rel="icon" href="../icon/logo minimalista.png" type="image/x-icon">
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
        
        /* Dashboard Cards */
        .content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .dashboard-card {
            text-decoration: none;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            padding: 25px;
            text-align: center;
            flex: 1 1 300px;
            max-width: 300px;
            transition: transform 0.3s;
        }
        .dashboard-card:hover {
            transform: scale(1.05);
        }
        .dashboard-card h2 {
            color: #2c3e50;
            font-size: 20px;
            margin-bottom: 10px;
        }
        .dashboard-card a {
         text-decoration: none;
        }
        .dashboard-card p {
            font-size: 26px;
            font-weight: bold;
            color: #1cdf56;
        }
        .dashboard-card a h2 {
            color: #0c6d29;
            text-decoration: none;
            
        }
        .dashboard-card a h2:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Menu Lateral -->
    <div class="sidebar">
        <h2>Painel Admin</h2>
        <a href="index.php">Dashboard</a>
        <a href="usuarios.php">Usuários</a>
        <a href="empresas.php">Empresas</a>
        <a href="configuracoes.php">Configurações</a>
        <a href="relatorios.php">Relatórios</a>
        <a href="suporte.php">Suporte</a>
        <a href="adm.php">Sair</a>
    </div>

    <!-- Conteúdo Principal -->
    <div class="main-content">
        <!-- Cabeçalho -->
        <div class="header">
            <h1>Dashboard</h1>
        </div>

        <!-- Área de Conteúdo -->
        <div class="content">
            <div class="dashboard-card">
                <h2>Total de Empresas</h2>
                <p><?php echo $totalEmpresas; ?></p>
            </div>
            <div class="dashboard-card">
                <h2>Total de Usuários</h2>
                <p><?php echo $totalUsuarios; ?></p>
            </div>
            <div class="dashboard-card">
                <a href="../view/empresas_aprovadas.php"><h2>EMPRESAS APROVADAS</h2></a>
            </div>
            <div class="dashboard-card">
                <a href="../view/empresas_rejeitadas.php"><h2>EMPRESAS REPROVADAS</h2></a>
            </div>
            <div class="dashboard-card">
                <a href="../view/pagina_aprovacao.php"><h2>EMPRESAS PENDENTES</h2></a>
            </div>
        </div>
    </div>
</body>
</html>
