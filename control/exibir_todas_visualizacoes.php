<?php
require_once '../model/DAO/Conexao.php';

header('Content-Type: application/json');

try {
    $conn = Conexao::getConexao();

    // Consulta para obter as visualizações de todas as empresas
    $query = "SELECT v.empresa_id_cnpj, e.nome_empresa, SUM(v.num_visualizacoes) AS total_visualizacoes
              FROM visualizacoes v
              JOIN empresas e ON v.empresa_id_cnpj = e.id_cnpj
              GROUP BY v.empresa_id_cnpj, e.nome_empresa
              ORDER BY total_visualizacoes DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    $visualizacoes = [];
    while ($row = $result->fetch_assoc()) {
        $visualizacoes[] = $row;
    }

    echo json_encode(['success' => true, 'visualizacoes' => $visualizacoes]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>
