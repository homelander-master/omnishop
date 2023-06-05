<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Формы авторизации и регистрации</title>
    <link rel="stylesheet" href="css/log.css">
    <link rel="stylesheet" href="css/user.css">
</head>
<body>
<!-- Форма авторизации -->
<div class="form">
<form style="display: inline-grid;" action="vendor/components/login.php" method="post">
    <h1>Авторизация</h1>
    Логин: <input name="login" type="text">
    Пароль: <input name="password" type="password">
    <input type="submit" value="Войти">
    У вас нет аккаунта? - <a class="signup__btn" href="reg.php">Зарегистрироваться</a>
</form>
</div>

<!-- Форма регистрации -->


</body>
</html>