// Função para exibir os banners
function exibirBanner() {
    document.getElementById('bannerSection').style.display = 'block';
}

// Função para exibir o artigo dedicado
function exibirArtigo() {
    document.getElementById('artigoSection').style.display = 'block';
}

// Função para abrir o formulário de cadastro de produtos
function abrirCadastro() {
    document.getElementById('cadastroSection').style.display = 'block';
}

// Função para cadastrar um produto (simulação)
function cadastrarProduto() {
    var nomeProduto = document.getElementById('produtoNome').value;
    var precoProduto = document.getElementById('produtoPreco').value;
    
    if(nomeProduto && precoProduto) {
        document.getElementById('cadastroFeedback').style.display = 'block';
    } else {
        alert("Por favor, preencha todos os campos!");
    }
}

// Função para gerar relatórios de desempenho
function gerarRelatorio() {
    document.getElementById('relatorioSection').style.display = 'block';
}

// Função para exibir o suporte
function abrirSuporte() {
    document.getElementById('suporteSection').style.display = 'block';
}
