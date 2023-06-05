<?php
session_start();
include("db_connect.php");
$login = $_POST['login'];
$password = $_POST['password'];
$md5_password = md5($password);
$query = mysqli_query($db, "SELECT * FROM `users` WHERE `login`='{$login}'");
var_dump($query);
$query_fetch = mysqli_fetch_assoc($query);
var_dump($query_fetch);
$id = $query_fetch['id'] + 1;
var_dump($id);
if (mysqli_num_rows($query) == 0) {
    $_SESSION['user'] = ['nick' => $login];
     $_SESSION['user'] = ['id' => $id];
    mysqli_query($db, "INSERT INTO `users` (`login`, `password`) VALUES ('{$login}', '{$md5_password}')");
    header("Location: user.php");
} else {
    echo("Ошибка: Данный логин занят другим пользователем.");
    header("Location: user.php");
}