<?php
session_start();
require_once __DIR__ . '/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method not allowed.');
}

$email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
$password = $_POST['password'] ?? '';

if (!$email || $password === '') {
    header('Location: ../../sign-in.html');
    exit();
}

try {
    $connection = connectDatabase();
    $query = $connection->prepare(
        'SELECT name, username, email, password_hash, tax_id FROM users WHERE email = ?'
    );
    $query->bind_param('s', $email);
    $query->execute();
    $user = $query->get_result()->fetch_assoc();

    if (!$user || !password_verify($password, $user['password_hash'])) {
        header('Location: ../../sign-in.html');
        exit();
    }

    session_regenerate_id(true);
    $_SESSION['email'] = $user['email'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['tax_id'] = $user['tax_id'];

    header('Location: ../../index.html');
    exit();
} catch (mysqli_sql_exception $error) {
    error_log($error->getMessage());
    http_response_code(500);
    exit('We could not sign you in. Please try again.');
}
