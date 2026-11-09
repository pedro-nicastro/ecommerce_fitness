<?php
require_once __DIR__ . '/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method not allowed.');
}

$name = trim($_POST['name'] ?? '');
$username = trim($_POST['username'] ?? '');
$email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$taxId = trim($_POST['tax_id'] ?? '');
$password = $_POST['password'] ?? '';

if ($name === '' || $username === '' || !$email || $taxId === '' || $password === '') {
    http_response_code(400);
    exit('Please complete all required fields with valid information.');
}

try {
    $connection = connectDatabase();
    $check = $connection->prepare('SELECT id FROM users WHERE email = ?');
    $check->bind_param('s', $email);
    $check->execute();

    if ($check->get_result()->num_rows > 0) {
        http_response_code(409);
        exit('This email address is already in use.');
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $insert = $connection->prepare(
        'INSERT INTO users (name, username, email, password_hash, tax_id) VALUES (?, ?, ?, ?, ?)'
    );
    $insert->bind_param('sssss', $name, $username, $email, $passwordHash, $taxId);
    $insert->execute();

    header('Location: ../../sign-in.html');
    exit();
} catch (mysqli_sql_exception $error) {
    error_log($error->getMessage());
    http_response_code(500);
    exit('We could not complete your registration. Please try again.');
}
