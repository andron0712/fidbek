<?php
session_start();

// 1. Очищення та знищення сесії
$_SESSION = array();
if (ini_get("session_use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();

// 2. Видалення кукі email (встановлюємо час у минулому)
setcookie('saved_email', '', time() - 3600, "/");

// 3. Повернення на index.php
header("Location: index.php");
exit();
?>
