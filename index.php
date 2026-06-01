<?php
session_start();

// Якщо сесія існує — перенаправляємо на профіль, якщо ні — на реєстрацію
if (isset($_SESSION['user_name']) && isset($_SESSION['user_email'])) {
    header("Location: profile.php");
    exit();
} else {
    header("Location: register.php");
    exit();
}
?>
