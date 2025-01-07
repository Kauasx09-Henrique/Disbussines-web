<?php

require_once '../model/DAO/Conexao.php';
include_once '../model/DTO/EnderecoDTO.php';

class EnderecoDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }

    public function salvarEndereco(EnderecoDTO $enderecoDTO): ?int { 
        try {
            // Validações
            if (!$this->validarCep($enderecoDTO->getCep())) {
                throw new InvalidArgumentException("CEP inválido.");
            }

            if (!$this->validarUf($enderecoDTO->getUf())) {
                throw new InvalidArgumentException("UF inválida.");
            }

            $sql = "INSERT INTO endereco (cep, endereco, pais, UF, complemento, bairro, num_empresa) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);

            // Bind dos parâmetros
            $stmt->bindValue(1, $enderecoDTO->getCep());
            $stmt->bindValue(2, $enderecoDTO->getEndereco());
            $stmt->bindValue(3, $enderecoDTO->getPais());
            $stmt->bindValue(4, $enderecoDTO->getUf());
            $stmt->bindValue(5, $enderecoDTO->getComplemento());
            $stmt->bindValue(6, $enderecoDTO->getBairro());
            $stmt->bindValue(7, $enderecoDTO->getNumEmpresa());

            // Executa a consulta
            $stmt->execute();
            return (int)$this->pdo->lastInsertId(); // Retorna o ID do endereço inserido
        } catch (PDOException $e) {
            echo "Erro ao salvar endereço: " . $e->getMessage();
            return null; // Retorna null em caso de erro
        }
    }

    // Valida se o CEP tem 8 dígitos (considerando o formato sem pontos e traços)
    private function validarCep(string $cep): bool {
        return preg_match('/^\d{5}-?\d{3}$/', $cep);
    }

    // Valida se a UF está no formato correto (2 letras maiúsculas)
    private function validarUf(string $uf): bool {
        return preg_match('/^[A-Z]{2}$/', $uf);
    }

    //pesquisar usuario
    public function pesquisarEnderecoPorId($id) {
        try {
            $sql = "SELECT * FROM endereco WHERE id_endereco = ? ";
            $stmt = $this->pdo->prepare($sql);
            
            // Bind do ID ao placeholder
            $stmt->bindValue(1, $id);
            
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            
            return $retorno;

        } catch (PDOException $exe) {
            // Lidar com erro sem expor detalhes sensíveis
            error_log($exe->getMessage()); // Loga o erro em um arquivo
            return null; // Retorna null ou pode optar por lançar uma exceção
        }
    }
}
?>
