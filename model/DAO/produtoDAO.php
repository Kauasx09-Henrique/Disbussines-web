<?php
require_once '../model/DAO/Conexao.php';// Certifique-se de ajustar o caminho conforme necessário
require_once '../model/DTO/ProdutoDTO.php';

class ProdutoDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance(); // Conexão com o banco de dados
    }

    // Método para salvar produto no banco de dados
    public function salvarProduto(ProdutoDTO $produtoDTO, $imagem_produto) {
        try {
            // SQL para inserção do produto na tabela 'produtos'
            $sql = "INSERT INTO produtos (nome_produto, valor_produto, desc_produto, Imagem_produto) 
        VALUES (?, ?, ?, ?)";
            
            // Preparando a consulta
            $stmt = $this->pdo->prepare($sql);
            
            // Atribuindo valores dos métodos GET do DTO
            $stmt->bindValue(1, $produtoDTO->getNomeProduto());
            $stmt->bindValue(2, $produtoDTO->getValorProduto());
            $stmt->bindValue(3, $produtoDTO->getDescProduto());
            $stmt->bindValue(4, $imagem_produto); // Caminho da imagem do produto
            
            // Executando a consulta
            $stmt->execute();
            return true; // Retorna true se a inserção for bem-sucedida
        } catch (PDOException $e) {
            // Caso ocorra um erro, exibe a mensagem de erro
            echo "Erro ao salvar produto: " . $e->getMessage();
            return false; // Retorna false em caso de falha
        }
    }
    

    // Método para buscar todos os produtos
    public function listarProdutos(): array {
        try {
            $sql = "SELECT * FROM produtos";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna todos os produtos em um array
        } catch (PDOException $e) {
            error_log("Erro ao listar produtos: " . $e->getMessage());
            return [];
        }
    }

    // Método para buscar produto por ID
    public function buscarProdutoPorId(int $id): ?array {
        try {
            $sql = "SELECT * FROM produtos WHERE id_produto = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna o produto encontrado ou null
        } catch (PDOException $e) {
            error_log("Erro ao buscar produto: " . $e->getMessage());
            return null;
        }
    }

    // Método para deletar produto
    public function deletarProduto(int $id): bool {
        try {
            $sql = "DELETE FROM produtos WHERE id_produto = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $id);
            return $stmt->execute(); // Retorna true se a exclusão for bem-sucedida
        } catch (PDOException $e) {
            error_log("Erro ao deletar produto: " . $e->getMessage());
            return false;
        }
    }
}
?>
