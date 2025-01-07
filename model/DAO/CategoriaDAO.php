<?php

require_once 'C:\xampp\htdocs\projeto\Disbusines\model\DAO\Conexao.php';
require_once 'C:\xampp\htdocs\projeto\Disbusines\model\DTO\CategoriaDTO.php'; // Incluindo a classe CategoriaDTO

class CategoriaDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    // Método para salvar uma categoria na tabela categoriaempresa
    public function salvarCategoria(CategoriaDTO $categoriaDTO) {
        try {
            // Verifica se o valor da categoria está correto
            var_dump($categoriaDTO->getTipoCategoria());  // Depuração para garantir que está sendo recebido corretamente
            
            // Inserção da categoria na tabela 'categoriaempresa'
            $sql = "INSERT INTO categoriaempresa (tipocategoria) VALUES (?)";
            $stmt = $this->pdo->prepare($sql);
    
            // Verifica se a preparação do SQL foi bem-sucedida
            if (!$stmt) {
                echo "Erro ao preparar SQL: " . implode(", ", $this->pdo->errorInfo());
                return null;
            }
    
            // Bind do valor da categoria
            $stmt->bindValue(1, $categoriaDTO->getTipoCategoria()); // Tipo da categoria
    
            // Executa a consulta
            $stmt->execute();
    
            // Retorna o ID da categoria inserida
            $lastInsertId = $this->pdo->lastInsertId();
            
            // Verifica se o ID foi retornado corretamente
            if (!$lastInsertId) {
                echo "Erro: Não foi possível recuperar o ID da categoria inserida.";
                return null;
            }
    
            // Retorna o ID da categoria inserida
            return (int)$lastInsertId;
        } catch (PDOException $e) {
            echo "Erro ao salvar categoria: " . $e->getMessage();
            return null;
        }
    }

    public function listarCategorias() {
        try {
            $sql = "SELECT * FROM categoriasempresa";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $todas = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $todas;
        } catch (PDOException $e) {
            echo "Erro ao listar categorias da empresa: " . $e->getMessage();
            return [];
        }
    }
    
    

    // Método para listar todas as categorias de uma empresa específica
    public function listarCategoriasPorEmpresa($idCategoriaempresa) {
        try {
            $sql = "SELECT * FROM categoriasempresa WHERE idCategoriaempresa = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $idCategoriaempresa);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar categorias da empresa: " . $e->getMessage();
            return [];
        }
    }    
    
}
?>
