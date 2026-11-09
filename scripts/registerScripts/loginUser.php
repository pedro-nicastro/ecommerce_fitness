<?php
session_start();
require_once __DIR__ . '/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Método não permitido.');
}

$email = filter_var(trim($_POST['Email'] ?? ''), FILTER_VALIDATE_EMAIL);
$senha = $_POST['Senha'] ?? '';

if (!$email || $senha === '') {
    header('Location: ../../login.html');
    exit();
}

try {
    $conn = conectarBanco();
    $query = $conn->prepare('SELECT nome, username, mail, pass, cpf FROM usuarios WHERE mail = ?');
    $query->bind_param('s', $email);
    $query->execute();
    $user = $query->get_result()->fetch_assoc();

    if (!$user || !password_verify($senha, $user['pass'])) {
        header('Location: ../../login.html');
        exit();
    }

    session_regenerate_id(true);
    $_SESSION['Email'] = $user['mail'];
    $_SESSION['Nome'] = $user['nome'];
    $_SESSION['UserName'] = $user['username'];
    $_SESSION['Cpf'] = $user['cpf'];

    header('Location: ../../index.html');
    exit();
} catch (mysqli_sql_exception $error) {
    error_log($error->getMessage());
    http_response_code(500);
    exit('Não foi possível entrar agora. Tente novamente.');
}
