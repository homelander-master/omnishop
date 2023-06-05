<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Формы авторизации и регистрации</title>
    <link rel="stylesheet" href="css/log.css">
    <link rel="stylesheet" href="css/user.css">
</head>
<body>

<!-- Форма регистрации -->
<div class="form">
<form style="display: inline-grid;" action="registration.php" method="post">
    <h1>Регистрация</h1>
    Логин: <input name="login" type="text">
    Пароль: <input name="password" type="password">
    <input type="submit" value="Регистрация">
    У вас уже есть аккаунт? - <a class="signup__btn" href="login.php">Войти</a>
</form>
</div>
</body>
</html>