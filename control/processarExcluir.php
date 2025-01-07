<?php
session_start();

// Inclua o arquivo do DAO
require_once '../model/DAO/UsuarioDAO.php';

// Crie uma instância do UsuarioDAO
$usuarioDAO = new UsuarioDAO();

// Verifique se o ID do usuário foi fornecido
if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    // Tente excluir o usuário
    $resultado = $usuarioDAO->excluirUsuario($id_user);

    // Verifique se a exclusão foi bem-sucedida
    if ($resultado) {
        $_SESSION['message'] = "Usuário excluído com sucesso!";
    } else {
        $_SESSION['message'] = "Erro ao excluir o usuário. Tente novamente.";
    }
} else {
    $_SESSION['message'] = "ID do usuário não foi fornecido.";
}

// Redirecione de volta para a página de administração
header('Location: ../view/usuarios.php');
exit();
?>
