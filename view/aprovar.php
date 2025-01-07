<?php
session_start();
require_once '../model/DAO/EmpresaDAO.php';

if (isset($_GET['id_cnpj']) && isset($_GET['status'])) {
    $id_cnpj = $_GET['id_cnpj'];
    $status = $_GET['status'];

    $empresaDAO = new EmpresaDAO();
    if ($empresaDAO->alterarStatus($id_cnpj, $status)) {
        header("Location: pagina_aprovacao.php?msg=Status da empresa atualizado com sucesso.");
        exit();
    } else {
        header("Location: pagina_aprovacao.php?msg=Erro ao atualizar o status da empresa.");
        exit();
    }
}
?>

