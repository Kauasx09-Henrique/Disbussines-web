<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (!isset($_SESSION['idUsu'])) {
    header("Location: login.php"); // Redireciona para a página de login se o usuário não estiver logado
    exit();
}

require_once '../model/DAO/UsuarioDAO.php';

$id_user = $_SESSION['idUsu']; // Captura o ID do usuário da sessão
$nome_usuario = $_SESSION['nome']; // Captura o nome do usuário da sessão
$usuarioDAO = new UsuarioDAO(); // Instancia o DAO para manipulação de dados
$mensagem = ""; // Inicializa a variável de mensagem

// Busca os dados atuais do usuário
$usuario = $usuarioDAO->pesquisarUsuarioPorId($id_user);
if (!$usuario) {
    die("Usuário não encontrado no sistema."); // Caso o usuário não exista
}

// Verifica se o formulário foi enviado (método POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Atualiza os dados do usuário
    $resultado = $usuarioDAO->atualizarUsuario($id_user, $nome, $email);

    if ($resultado === true) {
        // Atualiza os dados exibidos na tela
        $usuario = $usuarioDAO->pesquisarUsuarioPorId($id_user);

        // Atualiza o nome na sessão
        $_SESSION['nome'] = $nome;

        // Define a mensagem de sucesso
        $mensagem = "sucesso";
    } else {
        // Define a mensagem de erro
        $mensagem = "erro";
    }
}

// Evita cache no navegador
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Perfil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        p {
            text-align: center;
            font-size: 16px;
            color: #555;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #4CAF50;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
    <script>
        // Exibe mensagens de alerta com base no PHP
        window.onload = function() {
            const mensagem = "<?php echo $mensagem; ?>";

            if (mensagem === "sucesso") {
                alert("Perfil atualizado com sucesso!");
            } else if (mensagem === "erro") {
                alert("Erro ao atualizar o perfil. Tente novamente.");
            }
        };
    </script>
</head>
<body>
    <div class="container">
        <h1>Alterar Informações do Perfil</h1>

        <!-- Exibe o nome do usuário logado -->
        <p>Bem-vindo, <strong><?php echo htmlspecialchars($nome_usuario); ?></strong>!</p>

        <!-- Formulário para edição -->
        <form method="POST" action="">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>

            <button type="submit">Salvar Alterações</button>
        </form>

        <a href="../view/paguser.php" class="back-link">Voltar ao Inicio</a>
    </div>
</body>
</html>
