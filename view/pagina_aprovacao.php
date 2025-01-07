<?php 
session_start();
require_once '../model/DAO/EmpresaDAO.php';

$empresaDAO = new EmpresaDAO();
$empresasPendentes = $empresaDAO->listarEmpresasPendentes();
?>  

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Aprovação de Empresas</title>
    <link rel="stylesheet" href="../css/styleaprovacao.css">
    <style>
        /* Estilo geral */
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f4f6f8;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #16a085;
            margin-top: 40px;
        }

        /* Botões */
        a {
            background-color: #1abc9c;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            margin: 10px;
            font-size: 16px;
            display: inline-block;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #16a085;
        }

        /* Alertas */
        .alert {
            background-color: #3498db;
            color: white;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 20px;
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
            background-color: #1abc9c;
            color: white;
        }

        /* Estilo de Links de Ações */
        td a {
            padding: 5px 15px;
            border-radius: 4px;
            color: white;
            text-decoration: none;
            font-size: 14px;
            margin: 0 5px;
        }

        .aprovar-btn {
            background-color: #3498db;
        }

        .reprovar-btn {
            background-color: #e74c3c;
        }

        td a:hover {
            opacity: 0.8;
        }

        /* Estilos adicionais */
        .action-buttons {
            display: flex;
            justify-content: space-around;
        }

    </style>
</head>
<body>

    <!-- Mensagem de alerta (se houver) -->
    <?php if (isset($_GET['msg'])): ?>
        <div class="alert"><?php echo htmlspecialchars($_GET['msg']); ?></div>
    <?php endif; ?>

    <h1>Aprovação de Empresas Pendentes</h1>

    <!-- Tabela de Empresas Pendentes -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome da Empresa</th>
                <th>CNPJ</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($empresasPendentes)): ?>
                <?php foreach ($empresasPendentes as $empresa): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($empresa['id_cnpj']); ?></td>
                        <td><?php echo htmlspecialchars($empresa['nome_empresa']); ?></td>
                        <td><?php echo htmlspecialchars($empresa['id_cnpj']); ?></td>
                        <td class="action-buttons">
                            <a href="aprovar.php?id_cnpj=<?php echo htmlspecialchars($empresa['id_cnpj']); ?>&status=aprovada" class="aprovar-btn">Aprovar</a>
                            <a href="aprovar.php?id_cnpj=<?php echo htmlspecialchars($empresa['id_cnpj']); ?>&status=reprovada" class="reprovar-btn">Reprovar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" style="text-align:center;">Nenhuma empresa pendente para aprovação.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Links para ver empresas aprovadas e rejeitadas -->
    <div class="action-buttons">
        <a href="../view/empresas_aprovadas.php">Ver Empresas Aprovadas</a>
        <a href="../view/empresas_rejeitadas.php">Ver Empresas Rejeitadas</a>
        <a href="dashboard.php">Voltar</a>
    </div>

</body>
</html>
