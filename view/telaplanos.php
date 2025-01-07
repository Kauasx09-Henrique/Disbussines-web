<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleplanos.css">
    <title>Tela de preços</title>
</head>

<body>
<script>
        function exibirAlerta() {
            alert("Contratado com sucesso");
            window.location.href = "../view/paguser.php"; // Redireciona para a página
        }
        
    </script>

    <div class="container">
   
        <header>
       
            <h1>Nossos preços</h1>
            <div class="toggle">
                <label>Mensal</label>
                <div class="toggle-btn">
                    <input type="checkbox" id="checkbox" class="checkbox" />
                    <label for="checkbox" class="sub" id="suv">
                        <div class="circle"></div>
                    </label>
                </div>
                <label>Anual</label>
            </div>
        </header>
        <div class="cards">
            
           
            <div class="card-right">
                <h2>Anual</h2>
                <h3 class="mensal">R$34.99</h3>
                <h4 class="anual">R$330.00</h4>
                <hr>
                <p>Exposição em múltiplas seções do site (banners grandes e/ou rotativos).</p>
                <hr>
                <p> Artigo ou post de blog dedicado sobre o cliente.</p>
                <hr>
                <p>Cadastro de produtos.</p>
                <hr>
                <p>Relatórios detalhados de desempenho (análise de tráfego e engajamento).</p>
                <hr>
                <p>Suporte por e-mail e telefone.</p>
                <hr>
                <button><a href="../view/pagamento.php" class="btn">Contrate agora</a></button>
            </div>

        </div>
    </div>

    <script src="../js/java.js"></script>

</body>

</html>