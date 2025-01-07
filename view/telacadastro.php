
<?php
 include_once '../control/listarCategoriasControl.php';
session_start();

$id = $_SESSION['idUsu'];
$nome = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../icon/empresa.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/cadastroempresa.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Tela Cadastro empresa</title>
</head>

<style>
    select {
              outline: none;
              font-size: 14px;
              font-weight: 400;
              color: #333;
              border-radius: 5px;
              border: 1px solid #aaa;
              padding: 0 15px;
              height: 42px;
              margin: 8px 0;
    }
</style>
<body>
    <div class="container">
        <header>Cadastre-se</header>
        
        <form action="../control/CadastroEmpresa.php" method="POST" enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Informações da Empresa</span>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <div class="fields">
                        <div class="input-field">
                            <label>CNPJ</label>
                            <input type="text" name="id_cnpj"  placeholder="xx.xxx.xxx/xxxx-xx">
                        </div>

                        <div class="input-field">
                            <label>Nome da Empresa</label>
                            <input type="text" name="nome_empresa"  placeholder="Digite o nome da empresa">
                        </div>

                        <div class="input-field">
                            <label>Descriçao</label>
                            <input type="text" name="descricao_empresa" placeholder="Digite a descrição da empresa">
                        </div>

                        <div class="input-field">
                            <label>Data de abertura</label>
                            <input type="date" name="data_abertura">
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="email" name="email"  placeholder="Digite um email valido">
                        </div>

                        <div class="input-field">
                            <label>Nome Fantasia</label>
                            <input type="text" name="nome_fantasia" placeholder="Nome fantasia da empresa">
                        </div>
                        
                        <div class="input-field">
                            <label>Telefone</label>
                            <input type="text" name="telefone"  placeholder="(xx) xxxxx-xxxx">
                        </div>

                        <div class="input-field">
                            <label>Natureza Judírica</label>
                            <input type="text" name="natureza_juridica"  placeholder="EI,LTDA, S.A.,SS, MEI">
                        </div>
                        
                        <div class="input-field">
                            <label>Categoria da Empresa</label>
                                <select name="categoria">
                                    <?php foreach($todos as $c){?>
                                        <option value="<?php echo $c['idCategoriaempresa']?>"><?php echo $c['tipocategoria']?></option>

                                    <?php } ?>
                                 </select>
                         </div> 

                        
                        <div class="input-field">
                            <input type="file" id="logo-upload" name="logo" >
                            <label for="logo-upload" class="upload-label">Carregar Logo</label>
                        </div> 
                        
                        <button class="nextBtn">
                            <span class="btnText">Avançar</span>
                            <i class="uil uil-navigator"></i>
                        </button>
        
                   
                </div>
            </div>
         </div>

            <!--Segundo formulario  -->

            <div class="form second">
                <div class="details address">
                    <span class="title">Informações de Endereço</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>CEP</label>
                            <input type="text" name="cep" placeholder="xx.xxx-xxx" id="cep" required onblur="buscarEndereco()">
                        </div>

                        <div class="input-field">
                            <label>Endereço</label>
                            <input type="text" name="endereco"  placeholder="Digite o endereço da empresa"  id="endereco" readonly>
                        </div>

                        <div class="input-field">
                            <label>Complemento</label>
                            <input type="text" name="complemento" placeholder="Digite a digite o complemento se houver">
                        </div>

                        <div class="input-field">
                            <label>Bairro</label>
                            <input type="text" name="bairro" placeholder="Bairro" id="bairro" readonly>
                        </div>

                        <div class="input-field">
                            <label>UF</label>
                            <input type="text" name="uf" placeholder="Digite UF" id="uf" readonly>
                        </div>

                        <div class="input-field">
                            <label>Pais</label>
                            <input type="text" name="pais" placeholder="Digite o pais" value="Brasil" readonly >
                        </div>
                        
                        <div class="input-field">
                            <label>Numero da empresa</label>
                            <input type="text" name="numero_empresa" placeholder="Numero da empresa">
                        </div>
                    </div>
                    <div class="buttons">
                    <div class="backBtn">
                        <span class="btnText">Voltar</span>
                        <i class="uil uil-navigator"></i>
                    </div>

                    <button class="nextBtn" type="submit">
                        <span class="btnText">Enviar</span>
                        <i class="uil uil-navigator"></i>
                    </button>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <script src="../js/script_cad_empresa.js"></script>
    <script src="../js/buscar_endereco.js"></script>
</body>
</html>
              