<?php

        require_once '../model/DAO/Conexao.php';
     include_once '../model/DTO/UsuarioDTO.php';

class UsuarioDAO{
    public $pdo = null;
    public function __construct(){
        $this->pdo = Conexao::getInstance();
    }
    public function salvarUsuario(UsuarioDTO $usuarioDTO){
        try {
            // Adiciona o campo 'senha' na consulta
            $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
    
            $nome = $usuarioDTO->getNome();
            $email = $usuarioDTO->getEmail();
            $senha = $usuarioDTO->getSenha();
  // Obtém a senha do objeto DTO
    
            // Faz o bind dos parâmetros
            $stmt->bindValue(1, $nome);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $senha);
    
            // Executa a consulta
            $retorno = $stmt->execute();
    
            return $retorno;
        } catch (PDOException $exe) {
            echo $exe->getMessage();
        }
    }
    

    public function listarUsuarios(){
    try{
    $sql = "SELECT * FROM USUARIO";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();

    $retorno = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $retorno;

    }catch(PDOException $exe){
        echo $exe->getMessage();
    }
}

public function excluirUsuario($id_user) {
    // Exclui as empresas associadas ao usuário
    $queryDeleteEmpresas = "DELETE FROM empresa WHERE usuario_id_user = :id_user";
    $stmt = $this->pdo->prepare($queryDeleteEmpresas);
    $stmt->bindParam(':id_user', $id_user);
    $stmt->execute();

    // Agora exclui o usuário
    $query = "DELETE FROM usuario WHERE id_user = :id_user";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':id_user', $id_user);
    return $stmt->execute();
}


//pesquisar usuario
public function pesquisarUsuarioPorId($id) {
    try {
        $sql = "SELECT * FROM usuario WHERE id_user = :id_user";
        $stmt = $this->pdo->prepare($sql);
        
        // Bind do ID ao placeholder
        $stmt->bindParam(':id_user', $id, PDO::PARAM_INT);
        
        $stmt->execute();
        $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $retorno;

    } catch (PDOException $exe) {
        // Lidar com erro sem expor detalhes sensíveis
        error_log($exe->getMessage()); // Loga o erro em um arquivo
        return null; // Retorna null ou pode optar por lançar uma exceção
    }
}

public function atualizarUsuario($id_user, $nome, $email) {
    try {
        $sql = "UPDATE usuario SET nome = :nome, email = :email WHERE id_user = :id_user";
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        
        $stmt->execute();
        return true;
    } catch (PDOException $exe) {
        error_log($exe->getMessage()); // Log do erro completo
        return "Erro ao atualizar usuário: " . $exe->getMessage(); // Retorna a mensagem completa
    }
}


//contar usuarios
public function contarUsuarios() {
    $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM usuario");
    $stmt->execute();
    return $stmt->fetchColumn();
}

//validar login
    public function validarLogin($email, $senha) {
        try {
            // Usando uma consulta preparada para evitar injeção SQL
            $sql = "SELECT * FROM usuario WHERE email = ? AND senha = ?";
            $stmt = $this->pdo->prepare($sql);
    
            // Associando os valores
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $senha);
    
            // Executando a consulta
            $stmt->execute();
    
            // Obtendo o resultado
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        } catch (PDOException $exc) {
            echo $exc->getMessage(); // Exibe o erro em caso de exceção
        }
    }
    
}



?>