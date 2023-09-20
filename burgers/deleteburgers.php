<?php

try {
    include_once "../conn.php";

    $conn = getconn();
    //Получение данных из формы
    $id = $_GET['record_id'];

    $sql = "delete from burgers where id = '" . $id . "';";
    // Подготовка и выполнение запроса
    $stmt = $conn->prepare($sql);

    $stmt->execute();


    echo "Данные успешно удалены!!!.";
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}

$conn = null;
