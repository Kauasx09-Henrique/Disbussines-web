<?php
session_start();

// Verifica se o ID da empresa foi passado na URL
if (isset($_GET['id_cnpj'])) {
    require_once '../model/DAO/EmpresaDAO.php';

    $empresaDAO = new EmpresaDAO();
    $id_cnpj = $_GET['id_cnpj'];

    // Chama o método para excluir a empresa
    if ($empresaDAO->excluirEmpresa($id_cnpj)) {
        $_SESSION['message'] = "Empresa excluída com sucesso!";
    } else {
        $_SESSION['message'] = "Erro ao excluir a empresa. Tente novamente.";
    }
} else {
    $_SESSION['message'] = "ID da empresa não fornecido.";
}

// Redireciona de volta para a página de empresas
header("Location: ../view/empresas.php");
exit();
?>
