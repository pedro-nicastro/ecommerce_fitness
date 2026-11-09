<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Certifique-se de chamar session_start() no início do código.
session_start();

$host = "localhost";
$username = "root";
$password = "0000";
$database = "Clients";

$conn = mysqli_connect($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
};

$email = mysqli_real_escape_string($conn, $_POST['Email']);
$senha = $_POST['Senha'];

$sql = "SELECT * FROM usuarios WHERE mail = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashed_password = $row['pass'];

    if (password_verify($senha, $hashed_password)) { 
        // Armazene o email na sessão
        $_SESSION['Email'] = $email;
        $_SESSION['Nome'] = $name;
        $_SESSION['UserName'] = $username;
        $_SESSION['Cpf'] = $cpf;
        header("Location:../../index.html");
        exit(); // Importante para evitar que o código continue executando após o redirecionamento.
    } else {
        header("Location:../../login.html");
        echo "Senha incorreta.";
    }
}

$conn->close();
?>