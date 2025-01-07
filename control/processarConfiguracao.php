<?php
session_start();
require_once '../model/DAO/ConfiguracaoDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sistemaNome = $_POST['sistemaNome'];
    $emailAdmin = $_POST['emailAdmin'];
    $senhaAdmin = $_POST['senhaAdmin'];

    // Aqui você pode implementar a lógica para atualizar as configurações no banco de dados
    $configuracaoDAO = new ConfiguracaoDAO();
    if ($configuracaoDAO->atualizarConfiguracoes($sistemaNome, $emailAdmin, $senhaAdmin)) {
        $_SESSION['message'] = "Configurações atualizadas com sucesso!";
    } else {
        $_SESSION['message'] = "Erro ao atualizar configurações.";
    }

    header('Location: ../view/configuracoes.php');
    exit;
}
