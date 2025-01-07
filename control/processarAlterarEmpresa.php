<?php
session_start();
require_once '../model/DAO/EmpresaDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cnpj = $_POST['id_cnpj'];
    $nome_empresa = $_POST['nome_empresa'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    // Adicione uma validação para checar se os dados estão chegando corretamente
    error_log("ID: $id_cnpj, Nome: $nome_empresa, Email: $email, Telefone: $telefone"); // Log de depuração

    // Validação dos dados recebidos
    if (!empty($id_cnpj) && !empty($nome_empresa) && !empty($email) && !empty($telefone)) {
        $empresaDAO = new EmpresaDAO();
        $result = $empresaDAO->atualizarEmpresa($id_cnpj, $nome_empresa, null, $email, $telefone, null, null, null);

        // Retorna uma resposta JSON com o status e a mensagem
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Empresa atualizada com sucesso!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Erro ao atualizar a empresa.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Preencha todos os campos obrigatórios.']);
    }
}
