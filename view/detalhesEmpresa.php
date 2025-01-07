<?php
session_start();

$id_cnpj = $_GET['id'];
require_once '../model/DAO/EmpresaDAO.php';
$empresaDAO = new EmpresaDAO();
$detalheEmpresa = $empresaDAO->pesquisarEmpresaPorId($id_cnpj);

require_once '../model/DAO/enderecoDAO.php';
$enderecoDAO = new EnderecoDAO();
$endereco = $enderecoDAO->pesquisarEnderecoPorId($detalheEmpresa['endereco_id_endereco']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vermais.css">
    <title>Detalhes da Empresa</title>
</head>
<body>
    <h1>Detalhes da Empresa</h1>
    
    <div class="empresa-container">
        <div class="empresa-header">
            <!-- Logo da empresa, imagem centralizada e maior -->
            <img src="<?php echo !empty($detalheEmpresa['logo']) ? $detalheEmpresa['logo'] : '../img/pets-3715734.jpg'; ?>" alt="Imagem da empresa">
            <!-- Nome da empresa logo abaixo da imagem -->
            <h2 class="nome-empresa"><?php echo $detalheEmpresa['nome_empresa']; ?></h2>
        </div>

        <!-- Detalhes gerais da empresa -->
        <div class="empresa-details">
            <h3 class="section-title">Detalhes Gerais da Empresa</h3>
            <p><span>Telefone:</span> <?php echo $detalheEmpresa['telefone']; ?></p>
            <p><span>Descrição:</span> <?php echo $detalheEmpresa['descricao_empresa']; ?></p>
            <p><span>Desde:</span> <?php echo $detalheEmpresa['data_abertura']; ?></p>
        </div>

        <!-- Detalhes do endereço -->
        <div class="endereco-details">
            <h3 class="section-title">Detalhes do Endereço</h3>
            <p><span>CEP:</span> <?php echo $endereco['cep']; ?></p>
            <p><span>Endereço:</span> <?php echo $endereco['endereco']; ?></p>
            <p><span>Bairro:</span> <?php echo $endereco['bairro']; ?></p>
            <p><span>Complemento:</span> <?php echo $endereco['Complemento']; ?></p>
            <p><span>UF:</span> <?php echo $endereco['UF']; ?></p>
            <p><span>País:</span> <?php echo $endereco['pais']; ?></p>
        </div>

        <!-- Seção de comentários -->
        <div class="comentarios">
            <h3>Comentários</h3>
            <form action="comentario.php" method="post">
                <textarea name="comentario" placeholder="Deixe seu comentário aqui..."></textarea>
                <button type="submit">Enviar Comentário</button>
            </form>
        </div>

        <!-- Botões para voltar à lista de empresas e redirecionar para a página de produtos -->
        <div class="buttons">
            <?php  
                if(isset($_SESSION['idUsu'])) {
                    // Caso o usuário esteja logado, volta à página do usuário
                    echo '<a href="./paguser.php" class="button">Voltar à lista</a>';
                } else {
                    // Caso o usuário não esteja logado, volta à página inicial
                    echo '<a href="../index.php" class="back-btn">Voltar à lista</a>';
                }
            ?>

            <!-- Botão para redirecionar para a página de produtos -->
            <a href="pagprodutos.php" class="button">Ver Produtos</a>
        </div>
    </div>
</body>
</html>
