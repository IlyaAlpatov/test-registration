<?php
    require_once 'connection.php';

    // Создание переменных и фильтры для полей ввода
    $name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);
    $login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);

    // Добавление строки для усложнения пароля и хэширование его в БД
    $pass = md5($pass."qwerty");

    // Подключение к БД
    $mysql = new mysqli($host, $user, $password, $database);
    
    // Добавление в таблицу
    $query = "INSERT INTO `users` (`name`, `login`, `pass`) VALUES ('$name', '$login', '$pass')";
    $mysql->query($query);

    // Отключение от БД
    $mysql->close();

    // Переход на главную страницу
    header('Location: /');
?>