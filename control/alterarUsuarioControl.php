<?php
require_once '../model/DTO/usuarioDTO.php';
require_once '../model/DAO/usuarioDAO.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$id = $_POST['id_user'];

$usuarioDTO = new UsuarioDTO();

$usuarioDTO->setIdUsuario($id);
$usuarioDTO->setNome($nome);
$usuarioDTO->setEmail($email);

var_dump($usuarioDTO);

$usuarioDAO = new UsuarioDAO();

$sucesso = $usuarioDAO->alterarUsuario($usuarioDTO);

if($sucesso){
    header('Location:../view/listarUsuarios.php');
}



?>