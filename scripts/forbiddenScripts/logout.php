<?php
session_start();

// Destrua a sessão
session_destroy();

// Redirecione o usuário para a página de login ou qualquer outra página apropriada após o logout
header("Location: ../../index.html");
exit(); // Importante para interromper a execução do código após o redirecionamento
?>