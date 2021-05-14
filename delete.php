<?php
    // Подключение к БД
    require_once 'connection.php';
    $mysql = new mysqli($host, $user, $password, $database);

    // Создание массива из id отмеченных элементов и объединение их в строку
    $ids_to_delete = array();
    foreach($_POST['delete_row'] as $selected){
        $ids_to_delete[] = $selected;
    }
    $ids = implode(',', $ids_to_delete);

    // Удаление отмеченных элементов
    $query = "DELETE FROM `users` WHERE `users`.`id` IN ($ids)";
    $mysql->query($query);

    // Отключение от БД
    $mysql->close();

    // Переход на главную страницу
    header('Location: /');
?>