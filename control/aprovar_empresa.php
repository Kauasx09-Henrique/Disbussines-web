<?php
session_start();
require_once '../model/DAO/EmpresaDAO.php';

$empresaDAO = new EmpresaDAO();
$id_cnpj = $_POST['id_cnpj'] ?? null;

// Verificando se a ação é válida
if (isset($_POST['acao_aprovar'])) {
    $acao = 'aprovar';
} elseif (isset($_POST['acao_reprovar'])) {
    $acao = 'reprovar';
} else {
    header("Location: pagina_aprovacao.php?mensagem=" . urlencode("Ação inválida."));
    exit;
}

// Definindo o novo status
$status = ($acao === 'aprovar') ? 'aprovada' : 'reprovada';

// Atualizando o status da empresa
if ($empresaDAO->alterarStatus($id_cnpj, $status)) {
    $mensagem = "Empresa " . ($acao === 'aprovar' ? "aprovada" : "reprovada") . " com sucesso!";
} else {
    $mensagem = "Erro ao alterar status da empresa.";
}

// Redireciona de volta para a página de aprovação com mensagem
header("Location: pagina_aprovacao.php?mensagem=" . urlencode($mensagem));
exit;



?>
