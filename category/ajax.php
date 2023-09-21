<?php
// Подключение к базе данных с использованием PDO
try {
    include_once "../conn.php";
    $conn = getconn();
    $query = "SELECT * FROM `category` where status = 1";

    // Подготовка запроса
    $stmt = $conn->prepare($query);
    // Выполнение запроса
    $stmt->execute();
    // Получение результатов запроса
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if ($result !== null) {
        // Вывод результатов или их обработка
        foreach ($results as $row) {
            echo    "<tr>
        <th scope='col'>" . $row['id'] . "</th>
        <th scope='col'>" . $row['name'] . "</th>
        <th scope='col'>" . $row['status'] . "</th>
        <th scope='col'><a href='updatecategory.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a></th>
        <th scope='col'><button class='delete-record btn btn-primary' data-record-id= href='deletecategory.php?id=" . $row['id'] . "' class='btn btn-primary'>Delete</button></th>
        </tr>";
        }
    } else {
        throw new Exception("Данные отсутствуют!");
    }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    } finally {
}
