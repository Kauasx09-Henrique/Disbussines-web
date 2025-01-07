<?php
session_start();
require_once '../model/DAO/EmpresaDAO.php';
require_once '../model/DAO/EnderecoDAO.php';
require_once '../model/DAO/CategoriaDAO.php';
require_once '../model/DTO/CadastroEmpresaDTO.php';
require_once '../model/DTO/EnderecoDTO.php';
require_once '../model/DTO/CategoriaDTO.php';

// Captura os dados do formulário
$id_usuario = $_POST['id'];
$id_cnpj = $_POST['id_cnpj'];
$nome_empresa = $_POST['nome_empresa'];
$descricao_empresa = $_POST['descricao_empresa'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$nome_fantasia = $_POST['nome_fantasia'];
$data_abertura = $_POST['data_abertura'];
$natureza_juridica = $_POST['natureza_juridica'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$numero_empresa = $_POST['numero_empresa'];
$uf = $_POST['uf'];
$pais = $_POST['pais'];
$idcategoria = $_POST['categoria']; // Captura a categoria




// Validação de campos obrigatórios
if (empty($id_usuario) || empty($id_cnpj) || empty($nome_empresa) || empty($cep) || empty($endereco) || empty($bairro) || empty($numero_empresa)) {
    die("Campos obrigatórios não preenchidos.");
}

// Instancia os DTOs
$empresaDTO = new CadastroEmpresaDTO();
$enderecoDTO = new EnderecoDTO();
// $categoriaDTO = new CategoriaDTO();

// Define os valores do DTO da empresa
$empresaDTO->setUsuarioId($id_usuario);
$empresaDTO->setIdCnpj($id_cnpj);
$empresaDTO->setNomeEmpresa($nome_empresa);
$empresaDTO->setDescricaoEmpresa($descricao_empresa);
$empresaDTO->setEmail($email);
$empresaDTO->setTelefone($telefone);
$empresaDTO->setNomeFantasia($nome_fantasia);
$empresaDTO->setDataAbertura($data_abertura);
$empresaDTO->setNaturezaJuridica($natureza_juridica);

// Define o tipo da categoria no DTO
$empresaDTO->setIdCategoria($idcategoria);

// Define os valores do DTO do endereço
$enderecoDTO->setCep($cep);
$enderecoDTO->setEndereco($endereco);
$enderecoDTO->setComplemento($complemento);
$enderecoDTO->setBairro($bairro);
$enderecoDTO->setNumEmpresa($numero_empresa);
$enderecoDTO->setUf($uf);
$enderecoDTO->setPais($pais);

// Instâncias dos DAOs
$empresaDAO = new EmpresaDAO();
$enderecoDAO = new EnderecoDAO();
// $categoriaDAO = new CategoriaDAO();

// Lógica para upload do logo
$uploadDir = '../uploads/logos';
$logo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $logoName = uniqid('logo_', true) . '.' . pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
        $logoPath = $uploadDir . '/' . $logoName;

        if (!file_exists($uploadDir) && !mkdir($uploadDir, 0777, true)) {
            die("Erro ao criar diretório para upload.");
        }

        if (move_uploaded_file($_FILES['logo']['tmp_name'], $logoPath)) {
            $logo = $logoPath;
            $empresaDTO->setLogo($logo);
        } else {
            die("Erro ao fazer upload da imagem.");
        }
    }
}


// Salva o endereço e captura o ID
$id_endereco = $enderecoDAO->salvarEndereco($enderecoDTO);

if ($id_endereco) {
    // Define o ID do endereço no DTO da empresa
    $empresaDTO->setIdEndereco($id_endereco);

    // Salva a categoria e captura o ID
    // $idCategoriaempresa = $categoriaDAO->salvarCategoria($categoriaDTO);

    if ($idcategoria) {
        // Associa o ID da categoria ao DTO da empresa
        // $empresaDTO->setIdCategoria($idCategoriaempresa);

        // Salva a empresa e captura o ID
        $id_empresa = $empresaDAO->salvarEmpresa($empresaDTO, $logo);

        if ($id_empresa) {
            echo "<script>
                alert('Empresa cadastrada com sucesso! Enviada para validação.');
                window.location.href = '../view/paguser.php';
                </script>";
        } else {
            echo "<script>
                alert('Erro ao cadastrar empresa.');
                window.location.href = '../view/telacadastro.php';
                </script>";
        }
    } else {
        echo "<script>
            alert('Erro ao salvar categoria.');
            window.location.href = '../view/telacadastro.php';
            </script>";
    }
} else {
    echo "<script>
        alert('Erro ao salvar endereço.');
        window.location.href = '../view/telacadastro.php';
        </script>";
}

?>
