<?php
header("Access-Control-Allow-Origin: *"); // Permite acesso de qualquer origem
header("Content-Type: application/json"); 
require_once '../model/DAO/EmpresaDAO.php';
$empresaDAO = new EmpresaDAO();

// Filtra as empresas aprovadas
if (isset($_GET['status_aprovacao']) && $_GET['status_aprovacao'] === 'aprovada'){
    $empresas = $empresaDAO->buscarEmpresasAprovadas();
    echo json_encode($empresas); // Converte o array para JSON e o exibe
}
?>