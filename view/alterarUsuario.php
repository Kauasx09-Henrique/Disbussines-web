<?php
// Inicie a sessão, se ainda não tiver feito isso
session_start();

// Inclua o arquivo do DAO
require_once '../model/DAO/UsuarioDAO.php';

// Crie uma instância do UsuarioDAO
$usuarioDAO = new UsuarioDAO(); // Certifique-se de que está usando o nome correto

// Verifique se o ID do usuário foi fornecido
if (isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    // Pesquisar usuário pelo ID
    $usuario = $usuarioDAO->pesquisarUsuarioPorId($id_user);

    // Verifique se o usuário foi encontrado
    if (!$usuario) {
        echo "Usuário não encontrado.";
        exit();
    }
} else {
    echo "ID do usuário não foi fornecido.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Alterar Usuário</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>Alterar Usuário</h1>
    <form action="../control/processarAlteracao.php" method="post">
        <input type="hidden" name="id_user" value="<?php echo $usuario['id_user']; ?>">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>

        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>
