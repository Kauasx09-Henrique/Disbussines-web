<?php
session_start();
require_once '../model/DAO/UsuarioDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioDAO = new UsuarioDAO();
    $id_user = $_POST['id_user'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Captura o resultado da atualização
    $resultado = $usuarioDAO->atualizarUsuario($id_user, $nome, $email);

    // Verifica se é um sucesso (true) ou uma string de erro
    if ($usuarioDAO->atualizarUsuario($id_user, $nome, $email)) {
        $_SESSION['message'] = "Usuário atualizado com sucesso!";
        echo "success"; // Certifique-se de que está retornando "success"
    } else {
        echo "error";
        error_log("Erro ao atualizar o usuário no banco de dados.");
    }
    
}

?>