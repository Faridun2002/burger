<?php

try {
    include_once "../conn.php";

    $conn = getconn();
    $query = "SELECT * FROM `burgers`";

    // Подготовка запроса
    $stmt = $conn->prepare($query);

    // Выполнение запроса
    $stmt->execute();

    // Создание объекта SimpleXMLElement для создания XML
    $xml = new SimpleXMLElement('<burgers></burgers>');

    // Перебор результатов запроса и добавление их в XML
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $product = $xml->addChild('burger');
        $product->addChild('id', $row['id']);
        $product->addChild('name', $row['name']);
        $product->addChild('description', $row['description']);
        $product->addChild('price', $row['price']);
        $product->addChild('imageURL', $row['image_url']);
        $product->addChild('userId', $row['userId']);
        $product->addChild('createDate', $row['createDate']);
        $product->addChild('status', $row['status']);
    }

    // Устанавливаем заголовок для указания типа контента
    header('Content-Type: application/xml');

    // Вывод XML
    echo $xml->asXML();
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
