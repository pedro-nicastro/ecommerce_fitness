<?php
require_once __DIR__ . '/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Método não permitido.');
}

$nome = trim($_POST['Nome'] ?? '');
$username = trim($_POST['UserName'] ?? '');
$email = filter_var(trim($_POST['Email'] ?? ''), FILTER_VALIDATE_EMAIL);
$cpf = trim($_POST['CPF'] ?? '');
$senha = $_POST['Senha'] ?? '';

if ($nome === '' || $username === '' || !$email || $cpf === '' || $senha === '') {
    http_response_code(400);
    exit('Preencha todos os campos obrigatórios com valores válidos.');
}

try {
    $conn = conectarBanco();
    $check = $conn->prepare('SELECT ID FROM usuarios WHERE mail = ?');
    $check->bind_param('s', $email);
    $check->execute();

    if ($check->get_result()->num_rows > 0) {
        http_response_code(409);
        exit('Este endereço de e-mail já está em uso.');
    }

    $hash = password_hash($senha, PASSWORD_DEFAULT);
    $insert = $conn->prepare(
        'INSERT INTO usuarios (nome, username, mail, pass, cpf) VALUES (?, ?, ?, ?, ?)'
    );
    $insert->bind_param('sssss', $nome, $username, $email, $hash, $cpf);
    $insert->execute();

    header('Location: ../../login.html');
    exit();
} catch (mysqli_sql_exception $error) {
    error_log($error->getMessage());
    http_response_code(500);
    exit('Não foi possível concluir o cadastro agora. Tente novamente.');
}
