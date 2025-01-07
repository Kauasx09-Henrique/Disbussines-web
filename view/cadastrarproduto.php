<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastroproduto.css">
    <title>Cadastro de Produtos</title>
</head>
<body>
<div class="container">
    <header>Cadastre alguns de seus produtos</header>
    <form action="../control/cadastrarProdutocontrol.php" method="POST" enctype="multipart/form-data">
        <div class="form first">
            <div class="details personal">
                <!-- Campo oculto para o ID (se necessário) -->
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="fields">
                    <!-- Nome do Produto -->
                    <div class="input-field">
                        <label for="nome_produto">Nome do produto</label>
                        <input type="text" name="nome_produto" id="nome_produto" required>
                    </div>

                    <!-- Valor do Produto -->
                    <div class="input-field">
                        <label for="valor_produto">Valor</label>
                        <input type="text" name="valor_produto" id="valor_produto" required>
                    </div>

                    <!-- Descrição do Produto -->
                    <div class="input-field">
                        <label for="desc_produto">Descrição</label>
                        <input type="text" name="desc_produto" id="desc_produto" required>
                    </div>

                    <!-- Imagem do Produto -->
                    <div class="input-field">
                        <input type="file" id="imagem_produto" name="imagem_produto" required>
                        <label for="imagem_produto" class="upload-label">Imagem do seu produto</label>
                    </div> 

                    <!-- Botão para Enviar -->
                    <button class="nextBtn" type="submit">
                        Enviar
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>
