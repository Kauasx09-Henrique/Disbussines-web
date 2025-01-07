<?php
// Inclua o arquivo de conexão com o banco de dados
require_once 'C:\xampp\htdocs\projeto\Disbusines\model\DAO\Conexao.php';

// Conecta ao banco de dados
function obterEmpresas($categoriaSelecionada = null) {
    try {
        $pdo = Conexao::getInstance();

        if ($categoriaSelecionada) {
            // Consulta com filtro de categoria
            $sql = "SELECT * FROM empresa WHERE idCategoria = :categoria AND status = 'aprovada'";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':categoria', $categoriaSelecionada, PDO::PARAM_INT); // Usando bindValue
        } else {
            // Consulta sem filtro de categoria
            $sql = "SELECT * FROM empresa WHERE status = 'aprovada'";
            $stmt = $pdo->prepare($sql); // Usando prepare para consistência
        }

        // Executa a consulta
        $stmt->execute();

        // Retorna todos os resultados como um array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erro ao buscar empresas: " . $e->getMessage();
        return [];
    }
}
?>
