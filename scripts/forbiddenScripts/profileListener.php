<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ../../sign-in.html');
    exit();
} else {
    header('Location: ../../account.php');
    exit();
}
?>
