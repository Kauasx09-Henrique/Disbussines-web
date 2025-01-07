<?php

class CadastroEmpresaDTO {
    private $id; // ID da empresa
    private $id_cnpj; // CNPJ da empresa
    private $nome_empresa; // Nome da empresa
    private $descricao_empresa; // Descrição da empresa
    private $email; // Email da empresa
    private $telefone; // Telefone da empresa
    private $nome_fantasia; // Nome fantasia da empresa
    private $data_abertura; // Data de abertura da empresa
    private $natureza_juridica; // Natureza jurídica da empresa
    private $usuario_id; // ID do usuário que cadastrou a empresa
    private $id_endereco; // ID do endereço
    private $idCategoriaempresa;// ID do categoria
    private $logo; // Logo da empresa

    // Métodos getters e setters para cada atributo
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdCnpj() {
        return $this->id_cnpj;
    }

    public function setIdCnpj($id_cnpj) {
        $this->id_cnpj = $id_cnpj;
    }

    public function getNomeEmpresa() {
        return $this->nome_empresa;
    }

    public function setNomeEmpresa($nome_empresa) {
        $this->nome_empresa = $nome_empresa;
    }

    public function getDescricaoEmpresa() {
        return $this->descricao_empresa;
    }

    public function setDescricaoEmpresa($descricao_empresa) {
        $this->descricao_empresa = $descricao_empresa;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function getNomeFantasia() {
        return $this->nome_fantasia;
    }

    public function setNomeFantasia($nome_fantasia) {
        $this->nome_fantasia = $nome_fantasia;
    }

    public function getDataAbertura() {
        return $this->data_abertura;
    }

    public function setDataAbertura($data_abertura) {
        $this->data_abertura = $data_abertura;
    }

    public function getNaturezaJuridica() {
        return $this->natureza_juridica;
    }

    public function setNaturezaJuridica($natureza_juridica) {
        $this->natureza_juridica = $natureza_juridica;
    }

    public function getUsuarioId() {
        return $this->usuario_id;
    }

    public function setUsuarioId($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    // Métodos para ID do endereço
    public function setIdEndereco($id_endereco) {
        $this->id_endereco = $id_endereco;
    }

    public function getIdEndereco() {
        return $this->id_endereco;
    }

    // Métodos para logo da empresa
    public function setLogo($logo) {
        $this->logo = $logo;
    }

    public function getLogo() {
        return $this->logo;
    }

     // Métodos para Id Categoria

     public function getIdCategoria() {
        return $this->idCategoriaempresa;
    }
    
    public function setIdCategoria($idCategoriaempresa) {
        $this->idCategoriaempresa =$idCategoriaempresa;
    }

}


?>
