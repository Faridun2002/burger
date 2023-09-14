<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "burger";

try {
    $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Получение данных из формы
    $id = $_GET['id'];

    $sql = "delete from category where id = '" . $id . "';";
    // Подготовка и выполнение запроса
    $stmt = $conn->prepare($sql);

    $stmt->execute();


    echo "Данные успешно удалены!!!.";
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}

$conn = null;