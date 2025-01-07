<?php
class EnderecoDTO{
    private $id_endereco;
    private $cep;
    private $endereco;
    private $pais;
    private $UF;
    private $Complemento;
    private $bairro;
    private $num_empresa;

    public function setIdEndereco($id_endereco){
        $this->id_endereco = $id_endereco;
    }
    public function getIdEndereco(){
        return $this->id_endereco;
    }
    public function setCep($cep){
        $this->cep = $cep;
    }
    public function getCep(){
        return $this->cep;
    }
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function setPais($pais){
        $this->pais = $pais;
    }
    public function getPais(){
        return $this->pais;
    }
    public function setUf($UF){
        $this->UF = $UF;
    }
    public function getUf(){
        return $this->UF;
    }
    public function setComplemento($Complemento){
        $this->Complemento = $Complemento;
    }
    public function getComplemento(){
        return $this->Complemento;
    }
    public function setBairro($bairro){
        $this->bairro = $bairro;
    }
    public function getBairro(){
        return $this->bairro;
    }
    public function setNumEmpresa($num_empresa){
        $this->num_empresa = $num_empresa;
    }
    public function getNumEmpresa(){
        return $this->num_empresa;
    }

}
?>