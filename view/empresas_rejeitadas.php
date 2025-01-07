<?php
session_start();
require_once '../model/DAO/EmpresaDAO.php';

$empresaDAO = new EmpresaDAO();
$empresasRejeitadas = $empresaDAO->listarEmpresasPorStatus('reprovada'); // Método para listar empresas rejeitadas
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Empresas Reprovadas</title>
    <link rel="stylesheet" href="../css/styleaprovacao.css">
    <style>
        /* Estilo geral */
        body {
            display: flex;
            background-color: #f4f6f8;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #e74c3c;
            margin-top: 40px;
        }

        /* Botão de Voltar */
        .back-btn {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            margin: 20px;
            font-size: 16px;
            display: inline-flex;
            align-items: center;
        }
        .back-btn:hover {
            background-color: #2980b9;
        }
        .back-btn svg {
            margin-right: 8px;
        }

        /* Tabela */
        table {
            width: 90%;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #e74c3c;
            color: white;
        }

        /* Estilo de Status */
        td {
            text-transform: capitalize;
        }
        .status-reprovada {
            color: #e74c3c;
        }
    </style>
</head>
<body>

    <!-- Botão Voltar -->
    <a href="dashboard.php" class="back-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path fill="currentColor" d="M11.207 3.293a1 1 0 0 1 0 1.414L6.414 9H16a1 1 0 0 1 0 2H6.414l4.793 4.793a1 1 0 1 1-1.414 1.414l-6-6a1 1 0 0 1 0-1.414l6-6a1 1 0 0 1 1.414 0z"/>
        </svg>
        Voltar
    </a>

    <h1>Empresas Reprovadas</h1>

    <!-- Tabela de Empresas Reprovadas -->
    <table>
        <tr>
            <th>ID CNPJ</th>
            <th>Nome da Empresa</th>
            <th>Status</th>
        </tr>
        <?php foreach ($empresasRejeitadas as $empresa): ?>
            <tr>
                <td><?php echo htmlspecialchars($empresa['id_cnpj']); ?></td>
                <td><?php echo htmlspecialchars($empresa['nome_empresa']); ?></td>
                <td class="status-reprovada"><?php echo htmlspecialchars($empresa['status']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
