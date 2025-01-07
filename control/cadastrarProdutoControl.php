<?php
session_start();
require_once '../model/DAO/produtoDAO.php'; // Certifique-se de que o caminho esteja correto
require_once '../model/DTO/ProdutoDTO.php';

// Verifica se a requisição é do tipo POST para salvar o produto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $nome_produto = $_POST['nome_produto'] ?? '';
    $valor_produto = $_POST['valor_produto'] ?? '';
    $desc_produto = $_POST['desc_produto'] ?? '';

    // Validação de campos obrigatórios
    if (empty($nome_produto) || empty($valor_produto) || empty($desc_produto)) {
        echo "<script>
            alert('Campos obrigatórios não preenchidos.');
            window.location.href = '../view/cadastroproduto.php';
            </script>";
        exit;
    }

    // Instância do DTO do produto
    $produtoDTO = new ProdutoDTO();
    $produtoDTO->setNomeProduto($nome_produto);
    $produtoDTO->setValorProduto($valor_produto);
    $produtoDTO->setDescProduto($desc_produto);

    // Lógica para upload da imagem
    $uploadDir = '../uploads/produtos'; // Diretório onde as imagens dos produtos serão armazenadas
    $imagem_produto = ''; // Variável para armazenar o caminho da imagem

    if (isset($_FILES['imagem_produto']) && $_FILES['imagem_produto']['error'] === UPLOAD_ERR_OK) {
        // Cria um nome único para a imagem
        $imagemName = uniqid('produto_', true) . '.' . pathinfo($_FILES['imagem_produto']['name'], PATHINFO_EXTENSION);
        // Define o caminho completo da imagem
        $imagemPath = $uploadDir . '/' . $imagemName;

        // Verifica se o diretório existe, caso contrário, tenta criá-lo
        if (!file_exists($uploadDir) && !mkdir($uploadDir, 0777, true)) {
            die("Erro ao criar diretório para upload.");
        }

        // Verifica se o arquivo enviado é realmente uma imagem
        $check = getimagesize($_FILES['imagem_produto']['tmp_name']);
        if ($check === false) {
            die("O arquivo não é uma imagem válida.");
        }

        // Move o arquivo da pasta temporária para o diretório de upload
        if (move_uploaded_file($_FILES['imagem_produto']['tmp_name'], $imagemPath)) {
            // Atribui o caminho da imagem ao DTO
            $imagem_produto = $imagemPath;
            $produtoDTO->setImagemProduto($imagem_produto); // Define a imagem no DTO
        } else {
            die("Erro ao fazer upload da imagem do produto.");
        }
    } else {
        die("Erro ao enviar a imagem.");
    }

    // Instância do DAO do produto
    $produtoDAO = new ProdutoDAO();

    // Chama o método para salvar o produto no banco de dados
    $result = $produtoDAO->salvarProduto($produtoDTO, $imagem_produto);

    if ($result) {
        echo "<script>
            alert('Produto cadastrado com sucesso!');
            window.location.href = '../view/paguserpremium.php';
            </script>";
    } else {
        echo "<script>
            alert('Erro ao cadastrar produto.');
            
            </script>";
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Instância do DAO para listar os produtos
    $produtoDAO = new ProdutoDAO();
    $produtos = $produtoDAO->listarProdutos();

    // Exibe os produtos (por exemplo, em uma página de listagem)
    if (!empty($produtos)) {
        foreach ($produtos as $produto) {
            echo "Produto: " . $produto['nome_produto'] . "<br>";
            echo "Valor: " . $produto['valor_produto'] . "<br>";
            echo "Descrição: " . $produto['desc_produto'] . "<br>";
            echo "<img src='" . $produto['Imagem_produto'] . "' alt='" . $produto['nome_produto'] . "'><br><br>";
        }
    } else {
        echo "Nenhum produto encontrado.";
    }
}
?>
