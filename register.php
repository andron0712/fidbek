<?php
session_start();

// Якщо користувач уже авторизований, одразу відправляємо його в профіль
if (isset($_SESSION['user_name'])) {
    header("Location: profile.php");
    exit();
}

// Обробка форми після відправки
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password']; // Пароль отримуємо, але за ТЗ ніде не зберігаємо

    if (!empty($name) && !empty($email) && !empty($password)) {
        // 1. Зберігаємо ім'я та email у сесію
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;

        // 2. Зберігаємо email у кукі на 7 днів (7 * 24 * 60 * 60 секунд)
        setcookie('saved_email', $email, time() + (7 * 24 * 60 * 60), "/");

        // 3. Перенаправляємо на профіль
        header("Location: profile.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Реєстрація</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .form-container { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); width: 300px; }
        .group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { width: 100%; padding: 10px; background: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #218838; }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Реєстрація</h2>
    <form action="register.php" method="POST">
        <div class="group">
            <label for="name">Ім'я:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="group">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Зареєструватися</button>
    </form>
</div>

</body>
</html>
