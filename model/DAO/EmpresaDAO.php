<?php

require_once 'C:\xampp\htdocs\projeto\Disbusines\model\DAO\Conexao.php';
require_once 'C:\xampp\htdocs\projeto\Disbusines\model\DTO\CadastroEmpresaDTO.php'; // Certifique-se de usar o DTO correto

class EmpresaDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getInstance();
    }


    // Método para salvar uma empresa no banco
    public function salvarEmpresa(CadastroEmpresaDTO $empresaDTO, $logo) {
        try {
            $sql = "INSERT INTO empresa (id_cnpj, nome_empresa, descricao_empresa, email, telefone, nome_fantasia, data_abertura, natureza_juridica, usuario_id_user, endereco_id_endereco, status, logo, categoriasempresa_idCategoriaempresa) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
    
            $stmt = $this->pdo->prepare($sql);
    
            // Atribuindo valores dos métodos GET do DTO
            $stmt->bindValue(1, $empresaDTO->getIdCnpj());
            $stmt->bindValue(2, $empresaDTO->getNomeEmpresa());
            $stmt->bindValue(3, $empresaDTO->getDescricaoEmpresa());
            $stmt->bindValue(4, $empresaDTO->getEmail());
            $stmt->bindValue(5, $empresaDTO->getTelefone());
            $stmt->bindValue(6, $empresaDTO->getNomeFantasia());
            $stmt->bindValue(7, $empresaDTO->getDataAbertura());
            $stmt->bindValue(8, $empresaDTO->getNaturezaJuridica());
            $stmt->bindValue(9, $empresaDTO->getUsuarioId());
            $stmt->bindValue(10, $empresaDTO->getIdEndereco()); // ID do endereço
            $stmt->bindValue(11, 'pendente'); // Status inicial
            $stmt->bindValue(12, $logo); // Logo da empresa
            $stmt->bindValue(13, $empresaDTO->getIdCategoria()); // ID da categoria
    
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao salvar empresa: " . $e->getMessage();
            return false;
        }
    }
    

    // Método para listar todas as empresas
    public function listarEmpresas() {
        try {
            $sql = "SELECT * FROM empresa";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar empresas: " . $e->getMessage();
            return [];
        }
    }

    // Método para listar empresas pendentes
    public function listarEmpresasPendentes() {
        try {
            $sql = "SELECT * FROM empresa WHERE status = 'pendente'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar empresas pendentes: " . $e->getMessage();
            return [];
        }
    }

    // Método para alterar o status da empresa
    public function alterarStatus($id_cnpj, $status) {
        try {
            $sql = "UPDATE empresa SET status = ? WHERE id_cnpj = ?"; // Certifique-se que a tabela e os campos estão corretos
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $status);
            $stmt->bindValue(2, $id_cnpj);
            return $stmt->execute(); // Retorna true se a execução for bem-sucedida
        } catch (PDOException $e) {
            echo "Erro ao alterar status da empresa: " . $e->getMessage();
            return false;
        }
    }
    
    
    // Método para listar empresas de um usuário específico

public function listarEmpresasDoUsuario($usuarioId) {
    try {
        $sql = "SELECT * FROM empresa WHERE usuario_id_user = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $usuarioId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao listar empresas: " . $e->getMessage();
        return [];
    }
}


    // Método para listar empresas por status
    public function listarEmpresasPorStatus($status) {
        try {
            $sql = "SELECT * FROM empresa WHERE status = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(1, $status);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erro ao listar empresas: " . $e->getMessage();
            return [];
        }
        if ($empresaDAO->alterarStatus($id_cnpj, $status)) {
            // A alteração foi bem-sucedida, mas podemos verificar se o status mudou no banco
            $empresaAtualizada = $empresaDAO->pesquisarEmpresaPorId($id_cnpj);
            if ($empresaAtualizada['status'] === $status) {
                $mensagem = "Empresa " . ($acao === 'aprovar' ? "aprovada" : "rejeitada") . " com sucesso!";
            } else {
                $mensagem = "Erro: Status não foi alterado no banco de dados.";
            }
        } else {
            $mensagem = "Erro ao alterar status da empresa.";
        }
    }

    //buscar empresas aprovadas
    public function buscarEmpresasAprovadas() {
        $sql = "SELECT * FROM empresas WHERE status = 'aprovada'"; // Seleciona apenas as empresas aprovadas
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna os dados como um array associativo
    }
    

    // Método para excluir uma empresa pelo ID
 
    public function excluirEmpresa($id_cnpj) {
        try {
            // Prepare a consulta SQL para excluir a empresa
            $stmt = $this->pdo->prepare("DELETE FROM empresa WHERE id_cnpj = :id_cnpj");
            $stmt->bindParam(':id_cnpj', $id_cnpj, PDO::PARAM_STR);

            // Execute a consulta e retorna o resultado
            return $stmt->execute();
        } catch (PDOException $e) {
            // Tratamento de erro, se necessário
            return false;
        }
    }

    // Método para pesquisar uma empresa por ID
    public function pesquisarEmpresaPorId($id) {
        try {
            // Define o SQL para buscar a empresa com base no ID
            $sql = "SELECT * FROM empresa WHERE id_cnpj = :id";
            
            // Prepara a consulta
            $stmt = $this->pdo->prepare($sql);
            
            // Vincula o valor do ID ao parâmetro nomeado
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            
            // Executa a consulta
            $stmt->execute();
            
            // Retorna o resultado como um array associativo
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Exibe uma mensagem de erro para debug
            // Em produção, logue o erro em vez de exibi-lo diretamente
            error_log("Erro ao buscar empresa por ID: " . $e->getMessage());
            
            // Retorna null em caso de erro
            return null;
        }
    }

    public function listarEmpresasPorCategoria($categoria) {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT * FROM empresa WHERE categoriaempresa LIKE ? ORDER BY categoriaempresa DESC");
        $stmt->execute(['%' . $categoria . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //contar empresa
    public function contarEmpresas() {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM empresa");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    // Método para alterar dados de uma empresa
    public function atualizarEmpresa($id_cnpj, $nome_empresa, $descricao_empresa, $email, $telefone, $nome_fantasia, $data_abertura, $natureza_juridica) {
        // Verifique se a conexão está correta
        if ($this->pdo == null) {
            echo "Conexão com o banco de dados não está funcionando.";
            return false;
        }
        try {
            $sql = "UPDATE empresa SET nome_empresa = :nome_empresa, descricao_empresa = :descricao_empresa, 
                    email = :email, telefone = :telefone, nome_fantasia = :nome_fantasia, 
                    data_abertura = :data_abertura, natureza_juridica = :natureza_juridica 
                    WHERE id_cnpj = :id_cnpj";
            $stmt = $this->pdo->prepare($sql);
    
            // Bind dos parâmetros
            $stmt->bindParam(':nome_empresa', $nome_empresa);
            $stmt->bindParam(':descricao_empresa', $descricao_empresa);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':nome_fantasia', $nome_fantasia);
            $stmt->bindParam(':data_abertura', $data_abertura);
            $stmt->bindParam(':natureza_juridica', $natureza_juridica);
            $stmt->bindParam(':id_cnpj', $id_cnpj);
    
            // Executa a query
            if ($stmt->execute()) {
                return true; // Se a atualização foi bem-sucedida
            } else {
                // Adicione um var_dump para ver a execução
                var_dump($stmt->errorInfo());
                return false; // Se não foi, retorne falso
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }
}     
?>