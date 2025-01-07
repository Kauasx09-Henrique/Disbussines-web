
<?php

class CategoriaDTO {
    private $idCategoriaempresa;
    private $tipocategoria;

    // Setter para id_categoria
    public function setIdCategoria($idCategoriaempresa) {
        $this->$idCategoriaempresa = $idCategoriaempresa;
    }

    // Getter para id_categoria
    public function getIdCategoria() {
        return $this->$idCategoriaempresa;
    }

    // Setter para tipo_categoria
    public function setTipoCategoria($tipocategoria) {
        $this->tipo_categoria = $tipocategoria;
    }

    // Getter para tipo_categoria
    public function getTipoCategoria() {
        return $this->tipocategoria;
    }
}

?>
