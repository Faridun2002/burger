<?php
$servername = "localhost"; // Имя сервера базы данных
$username = "root"; // Ваше имя пользователя MySQL
$password = "root"; // Ваш пароль MySQL
$database = "burger"; // Ваш пароль MySQL

// Создайте соединение
$conn = new mysqli($servername, $username, $password, $database);

// Проверьте соединение на ошибки
if ($conn->connect_error) {
    die("Ошибка соединения: " . $conn->connect_error);
} else {
    echo "Соединение успешно установлено<br><br>";
}

$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Логин: " . $row["login"] . "<br>";
    }
} else {
    echo "Нет результатов";
}

// Закройте соединение
$conn->close();

?>
