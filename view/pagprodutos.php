<?php
require_once '../model/DAO/produtoDAO.php';

// Instanciar o DAO e buscar os produtos
$produtoDAO = new ProdutoDAO();
$produtos = $produtoDAO->listarProdutos();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/listarProdutos.css">
    <title>Lista de Produtos</title>
</head>
<body>
    <div class="container">
        <h1>Lista de Produtos</h1>
        <?php if (count($produtos) > 0): ?>
            <div class="product-grid">
                <?php foreach ($produtos as $produto): ?>
                    <div class="product-card">
                        <img src="<?php echo htmlspecialchars($produto['Imagem_produto']); ?>" alt="Imagem do Produto">
                        <h2><?php echo htmlspecialchars($produto['nome_produto']); ?></h2>
                        <p><?php echo htmlspecialchars($produto['desc_produto']); ?></p>
                        <span>R$ <?php echo number_format($produto['valor_produto'], 2, ',', '.'); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>Nenhum produto encontrado.</p>
        <?php endif; ?>
    </div>
</body>
</html>
