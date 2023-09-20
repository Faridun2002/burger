<?php
// Подключение к базе данных с использованием PDO
try {
    include_once "../conn.php";

    $conn = getconn();
    $query = "SELECT * FROM `burgers`";

    // Подготовка запроса
    $stmt = $conn->prepare($query);

    // Выполнение запроса
    $stmt->execute();
    
    // Получение результатов запроса
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $output = '';
    // Формируем HTML для отображения остальных записей
    foreach ($results as $row) {
        $output .= "<tr>
                <th scope='col'>" . $row['id'] . "</th>
                <th scope='col'>" . $row['name'] . "</th>
                <th scope='col'>" . $row['description'] . "</th>
                <th scope='col'>" . $row['price'] . "</th>
                <th scope='col'>" . $row['status'] . "</th>
                <th scope='col'><a href='updateburgers.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a></th>
                <th scope='col'><button class='delete-record btn btn-primary' data-record-id='" . $row['id'] . "'>Delete</button></th>
                </tr>";
    }
    // Возвращаем HTML с остальными записями
    echo $output;
} catch (PDOException $e) {
    // Возвращаем ошибку, если что-то пошло не так
    echo "Ошибка: " . $e->getMessage();
}
