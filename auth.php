<?php

try {
    include_once "conn.php";
    $conn = getconn();

    session_start();

    if (isset($_POST['login'])) $login = $_POST['login'];
    if (isset($_POST['password'])) $pass = $_POST['password'] . "hello";

    // Пример SELECT-запроса
    $query = "SELECT * FROM `user` where login = :login and status = '1'";

    // Подготовка запроса
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':login', $login);

    // Выполнение запроса
    $stmt->execute();

    // Получение результатов запроса
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Вывод результатов или их обработка
    foreach ($results as $row) {
        if (md5($pass) == $row['password']) {
            $_SESSION["id"] = $row['id'];
            $_SESSION["login"] = $row['login'];
            $_SESSION["password"] = $row['password'];
            $_SESSION["lname"] = $row['lName'];
            header("Location: admin.php");
            exit;
        }
    }
    $_SESSION["error"] = "Логин или пароль введён неверно!";
    header("Location: login.php");
    exit;
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
