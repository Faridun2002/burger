<?php

try {
    include_once "../conn.php";

    $conn = getconn();
    $query = "SELECT * FROM `post`";

    // Подготовка запроса
    $stmt = $conn->prepare($query);

    // Выполнение запроса
    $stmt->execute();

    // Создание объекта SimpleXMLElement для создания XML
    $xml = new SimpleXMLElement('<posts></posts>');

    // Перебор результатов запроса и добавление их в XML
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $product = $xml->addChild('post');
        $product->addChild('id', $row['id']);
        $product->addChild('title', $row['title']);
        $product->addChild('text', $row['text']);
        $product->addChild('imageURL', $row['image_url']);
        $product->addChild('categoryId', $row['categoryId']);
        $product->addChild('userId', $row['userId']);
        $product->addChild('createDate', $row['createDate']);
        $product->addChild('updateDate', $row['updateDate']);
        $product->addChild('status', $row['status']);
    }

    // Устанавливаем заголовок для указания типа контента
    header('Content-Type: application/xml');

    // Вывод XML
    echo $xml->asXML();
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
