<?php

class UsuarioDTO{
    private $nome;
    private $email;
    private $senha;
    private $id_user;

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setIdUsuario($id_user){
        $this->id_user = $id_user;
    }
    public function getIdUsuario(){
        return $this->id_user;
    }
    public function setSenha($senha){
        $this->senha=$senha;
    }
    public function getSenha(){
        return $this->senha;
    }
}