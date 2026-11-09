<?php
session_start();
if (!isset($_SESSION['Email'])) {
    // Usuário não está logado, redireciona para a página de registro
    header("Location: ../../login.html");
    exit(); // Importante para interromper a execução do código após o redirecionamento
} else {
    // O usuário está logado, permita o acesso ao perfil
    header("Location: ../../profile.php");
    exit();

}
?>
