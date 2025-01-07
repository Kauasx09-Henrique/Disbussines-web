<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Premium</title>
    <link rel="stylesheet" href="../css/stylepainel.css">
</head>
<body>
    <!-- Container Principal -->
    <div class="premium-panel">
        <!-- Título Principal -->
        <h1>PAINEL PREMIUM</h1>

        <!-- Cards de Funcionalidades -->
        <div class="section" id="banners">
            <h3>Banners de Exposição</h3>
            <p>Exposição em múltiplas seções do site (banners grandes e/ou rotativos).</p>
            <button onclick="exibirBanner()">Ver Banners</button>
            <div id="bannerSection" style="display:none;">
                <img src="https://via.placeholder.com/300x150?text=Banner+Exemplo" alt="Banner Exemplo">
                <p>Este é um banner de exemplo de exposição. Ele aparece em várias partes do site.</p>
            </div>
        </div>

        <div class="section" id="artigo">
            <h3>Artigo Dedicado</h3>
            <p>Artigo ou post de blog dedicado sobre o cliente.</p>
            <button onclick="exibirArtigo()">Ver Artigo</button>
            <div id="artigoSection" style="display:none;">
                <h4>Artigo sobre o Cliente Premium</h4>
                <p>Este é um artigo dedicado ao cliente, detalhando seus produtos e serviços.</p>
            </div>
        </div>

        <div class="section" id="cadastro">
            <h3>Cadastro de Produtos</h3>
            <p>Cadastro de produtos para o cliente.</p>
            <button onclick="abrirCadastro()">Cadastrar Produto</button>
            <div id="cadastroSection" style="display:none;">
                <input type="text" placeholder="Nome do Produto" id="produtoNome">
                <input type="number" placeholder="Preço" id="produtoPreco">
                <a href="../view/cadastrarproduto.php"><button>Cadastrar</button></a>
                <p id="cadastroFeedback" style="color:green; display:none;">Produto cadastrado com sucesso!</p>
            </div>
        </div>

        <div class="section" id="relatorios">
            <h3>Relatórios de Desempenho</h3>
            <p>Relatórios detalhados de desempenho (análise de tráfego e engajamento).</p>
            <button onclick="gerarRelatorio()">Gerar Relatório</button>
            <div id="relatorioSection" style="display:none;">
                <h4>Relatório de Desempenho</h4>
                <p>Tráfego: 1200 visitantes</p>
                <p>Engajamento: 45% de interação</p>
            </div>
        </div>

        <div class="section" id="suporte">
            <h3>Suporte</h3>
            <p>Suporte por e-mail e telefone.</p>
            <button onclick="abrirSuporte()">Abrir Suporte</button>
            <div id="suporteSection" style="display:none;">
                <p>Contato por E-mail: suporte@empresa.com</p>
                <p>Contato por Telefone: +55 11 1234-5678</p>
            </div>
        </div>
        <br>
        <a href="../view/paguserpremium.php"><BUtton>Voltar</BUtton></a>
    </div>
   
    <script src="../js/script2.js"></script>
</body>
</html>
