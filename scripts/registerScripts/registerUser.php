<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$username = "root";
$password = "0000";
$database = "clients";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

$email = $_POST["Email"];
$checkQuery = "SELECT * FROM usuarios WHERE mail = '$email'";
$result = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($result) > 0) {
    echo "Este endereço de e-mail já está em uso.";
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["Nome"];
        $username = $_POST["UserName"];
        $email = $_POST["Email"];
        $cpf = $_POST["CPF"];
        $raw_pass = $_POST["Senha"]; // Senha não criptografada
        // Criptografa a senha usando password_hash()
        $pass = password_hash($raw_pass, PASSWORD_DEFAULT);
    
        
    
        $sql = "INSERT INTO usuarios (nome, username, mail, pass, cpf) VALUES ('$nome', '$username', '$email', '$pass', '$cpf')";
       
        if (mysqli_query($conn, $sql)) {
            header("Location: ../../login.html");
            mysqli_close($conn);
            exit();
        } else {
            header("Location: ../../register.html");
            echo "Erro ao cadastrar o cliente: " . mysqli_error($conn);
            mysqli_close($conn);
            exit();
        }
    }
}
?>
