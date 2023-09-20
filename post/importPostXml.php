<?php

try {
    include_once "../conn.php";

    $conn = getconn();
    // Путь к XML-файлу
    $xmlFile = "post.xml";

    // Загрузка XML-файла
    $xml = simplexml_load_file($xmlFile);

    if ($xml) {
        $sql = "INSERT INTO post (title, text, image_url, categoryId, userId,createDate, status) VALUES (:title, :text, :image_url, :categoryId,:userId, :createDate, :status)";

        // Перебор данных из XML и вставка их в таблицу
        foreach ($xml->post as $post) {
            // Подготовка и выполнение запроса
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':title', $post->title);
            $stmt->bindParam(':text', $post->text);
            $stmt->bindParam(':image_url', $post->unique_filename);
            $stmt->bindParam(':categoryId', $post->categoryId);
            $stmt->bindParam(':userId', $post->userId);
            $stmt->bindParam(':createDate', $post->createDate);
            $stmt->bindParam(':status', $post->status);
            $stmt->execute();
        }
    }


    echo "Данные успешно импортированы в базу данных.";
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
