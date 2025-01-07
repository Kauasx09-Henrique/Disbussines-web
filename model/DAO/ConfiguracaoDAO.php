<?php
require_once 'Database.php'; // Certifique-se de ter uma classe Database para gerenciar a conexão

class ConfiguracaoDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::getConnection(); // Método para obter a conexão do banco de dados
    }

    // Método para buscar as configurações
    public function obterConfiguracoes() {
        $query = "SELECT * FROM configuracoes"; // Ajuste conforme a estrutura do seu banco de dados

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para atualizar as configurações
    public function atualizarConfiguracoes($sistemaNome, $emailAdmin, $senhaAdmin) {
        $query = "UPDATE configuracoes SET sistema_nome = :sistema_nome, email_admin = :email_admin, senha_admin = :senha_admin WHERE id = 1"; // Ajuste conforme a sua tabela

        $stmt = $this->pdo->prepare($query);

        // Hash da senha
        $senhaHash = password_hash($senhaAdmin, PASSWORD_DEFAULT);

        $stmt->bindParam(':sistema_nome', $sistemaNome);
        $stmt->bindParam(':email_admin', $emailAdmin);
        $stmt->bindParam(':senha_admin', $senhaHash);

        return $stmt->execute();
    }
}
