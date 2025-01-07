<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stylecaduser.css">
    <link rel="icon" href="../icon/person_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.png" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <span class="bg-animate"></span>
        <span class="bg-animate2"></span>
        
        <div class="form-box login">
            <h2 class="animation" style="--i:0;--j:21" id="h22">Login</h2>
            <form action="../control/loginControl.php" method="post">
                <div class="input-box animation " style="--i:1; --j:22">
                    <input type="text" name="email" required>
                    <label>Email</label>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box animation" style="--i:2;--j:23">
                    <input type="password" name="senha" required>
                    <label>Senha</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn animation" style="--i:3;--j:24">Logar</button>
                <div class="logreg-link animation" style="--i:4;--j:25">
                    <p>Não é Cadastrado? <a href="#" class="register-link">Cadastre-se</a></p>
                </div>
            </form>
        </div>
        <div class="info-text login">
            <h2 class="animation" style="--i:0; --j:20">Seja bem vindo!</h2>
            <p class="animation" style="--i:1; --j:21">Que bom ter você aqui de volta.</p>
        </div>
        
        <div class="form-box register">
    <h2 class="animation" style="--i:17; --j:0;" id="h22">Cadastre-se</h2>

    <form id="registerForm" method="post">
        <div class="input-box animation" style="--i:18;  --j:1;">
            <input type="text" name="nome" required>
            <label>Nome de Usuário</label>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box animation" style="--i:19; --j:2;">
            <input type="email" name="email" required>
            <label>E-mail</label>
            <i class='bx bxs-envelope'></i>
        </div>
        <div class="input-box animation" style="--i:20;  --j:3;">
            <input type="password" name="senha" required>
            <label>Senha</label>
            <i class='bx bxs-lock-alt'></i>
        </div>

        <button type="button" id="submitBtn" class="btn animation" style="--i:21; --j:4;">
            Cadastrar
        </button>

        <div class="logreg-link animation" style="--i:22; --j:5;">
            <p>Já tenho cadastro! <a href="#" class="login-link">Logar</a></p>
        </div>
    </form>

    <!-- Mensagem de sucesso -->
    <div id="successMessage" style="display: none; color: black; margin-top: 20px; text-align: center;">
        Cadastro realizado com sucesso!
    </div>
</div>

        
        <div class="info-text register">
            <h2 class="animation" style="--i:17; --j:0;">Faça parte da nossa equipe!</h2>
            <p class="animation" style="--i:18; --j:1">Que bom ter você aqui, ao acessar este site, você concorda com nossos termos e condições de uso.</p>
        </div>
    </div>
    
    <script src="../js/script.js"></script>
</body>
</html>