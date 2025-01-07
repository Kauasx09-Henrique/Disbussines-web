<?php
session_start(); // Inicia a sessão
session_destroy(); // Destroi a sessão
header("Location: ../index.php"); // Redireciona o usuário para a página inicial ou login
exit();
?>