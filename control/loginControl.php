<?php
session_start();
require_once '../model/DTO/usuarioDTO.php';
require_once '../model/DAO/usuarioDAO.php';

     $email = $_POST['email'];
     $senha = $_POST['senha'];

     //var_dump($email,$senha);

     $usuarioDAO = new UsuarioDAO();

     $sucesso = $usuarioDAO->validarLogin($email,$senha);
    //  var_dump($sucesso);
    if ($email === 'adm@gmail.com') {
        echo "<script>alert('Logado como administrador com sucesso!'); 
        window.location.href = '../view/adm.php';</script>";
    } else if(!empty($sucesso)){
         $_SESSION['idUsu'] = $sucesso['id_user'];
         $_SESSION['nome'] = $sucesso['nome'];

        echo "<script> alert('logado com sucesso');
        window.location.href = '../view/paguser.php';</script>";
     }else{
        echo "<script> alert ('usuario não existe')
         window.location.href = '../view/cadastroUsuario.php';</script>";
     }
    

     

?>