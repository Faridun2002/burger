<?php

try {
    include_once "../conn.php";

    $conn = getconn();
    // Путь к XML-файлу
    $xmlFile = "spisok.xml";

    // Загрузка XML-файла
    $xml = simplexml_load_file($xmlFile);

    if ($xml) {
        $sql = "INSERT INTO burgers (name, description, price, image_url, status) VALUES (:name, :description, :price, :image_url, '1')";
        
        // Перебор данных из XML и вставка их в таблицу
        foreach ($xml->burger as $burger) {
                // Подготовка и выполнение запроса
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':name', $burger->name);
                $stmt->bindParam(':description', $burger->description);
                $stmt->bindParam(':price', $burger->price);
                $stmt->bindParam(':image_url', $burger->unique_filename);
                $stmt->execute();
        }
    }
    

    echo "Данные успешно импортированы в базу данных.";
} catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
?>