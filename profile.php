<?php
session_start();

// Захист сторінки: якщо сесії немає, не пускаємо в профіль
if (!isset($_SESSION['user_name']) || !isset($_SESSION['user_email'])) {
    header("Location: register.php");
    exit();
}

$name = $_SESSION['user_name'];
$email = $_SESSION['user_email'];

// Перевіряємо наявність кукі
$cookie_email = isset($_COOKIE['saved_email']) ? $_COOKIE['saved_email'] : 'не знайдено';
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Профіль користувача</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .profile-container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 350px; text-align: center; }
        .cookie-info { background: #e2e3e5; padding: 10px; margin: 15px 0; border-radius: 4px; font-size: 14px; color: #383d41; }
        .btn-logout { display: inline-block; padding: 10px 20px; background: #dc3545; color: white; text-decoration: none; border-radius: 4px; }
        .btn-logout:hover { background: #bd2130; }
    </style>
</head>
<body>

<div class="profile-container">
    <h2>Вітаємо, <?php echo htmlspecialchars($name); ?>!</h2>
    <p><strong>Ваш Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    
    <div class="cookie-info">
        Ваш email запам'ятали: <strong><?php echo htmlspecialchars($cookie_email); ?></strong>
    </div>
    
    <a href="logout.php" class="btn-logout">Вийти</a>
</div>

</body>
</html>
