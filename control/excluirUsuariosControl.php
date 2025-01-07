<?php
include_once '../model/DTO/UsuarioDTO.php';
include_once '../model/DAO/UsuarioDAO.php';
$id_user =$_GET['id_user'];

//var_dump($id_user);

$usuarioDAO = new UsuarioDAO();

$sucesso = $usuarioDAO->excluirUsuario($id_user);

if($sucesso){
    header('Location:../view/listarUsuarios.php');
}





?>