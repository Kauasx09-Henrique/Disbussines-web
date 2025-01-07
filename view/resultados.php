<?php
// Conectando ao banco de dados
include_once('../model/DAO/Conexao.php');

// Verificando se a categoria foi passada na URL
if (isset($_GET['categoria'])) {
    $categoria = $_GET['categoria'];

    // Obtendo a conexão
    $conn = Conexao::getInstance();

    // Ajustando a consulta SQL com JOIN
    $query = "SELECT e.id_cnpj, e.nome_empresa, e.descricao_empresa, e.email, e.telefone, e.nome_fantasia, e.data_abertura, e.natureza_juridica, e.status, e.logo, c.tipocategoria 
              FROM empresa e
              JOIN categoriasempresa c ON e.categoriasempresa_idCategoriaempresa = c.idCategoriaempresa
              WHERE c.tipocategoria = :categoria";
    
    // Certifique-se de que a variável $conn está correta
    if ($conn) {
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
        $stmt->execute();
    
        // Exibindo os resultados
        $empresas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} else {
    echo "Categoria não especificada.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <title>Resultado da Pesquisa</title>

    <!-- Adicionando o CSS diretamente no arquivo -->
    
</head>
<body>
    <h1 class="titu2">Resultados<b class="ponto2"> encontrados: <a href="../index.php"><button>Voltar</button></a></b></h1> 
   

    <!-- Container onde as empresas aprovadas serão exibidas -->
    <div class="modern-tour-container">
        <?php if (isset($empresas) && $empresas): ?>
            <?php foreach ($empresas as $empresa): ?>
                <div class="modern-tour-item">
                    <!-- Verifica se há logo, caso contrário, usa uma imagem padrão -->
                    <img src="<?php echo !empty($empresa['logo']) ? $empresa['logo'] : '../img/pets-3715734.jpg'; ?>" alt="Imagem da empresa">


                    <div class="tour-info">
                        <!-- Exibe o nome da empresa -->
                        <h4><?php echo htmlspecialchars($empresa['nome_empresa']); ?></h4>

                        <!-- Exibe a descrição da empresa -->
                      
                        <!-- Botão com redirecionamento por JavaScript -->
                        <button onclick="window.location.href='../view/detalhesEmpresa.php?id=<?php echo $empresa['id_cnpj']; ?>'">
                            Ver mais
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhuma empresa encontrada para a categoria selecionada.</p>
        <?php endif; ?>
    </div>
</body>
</html>
