<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "burger";

try {
    $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $act = $_POST['act'];
    
    if ($act == "adduser"){
        //Получение данных из формы
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $login = $_POST['login'];
        $pass = $_POST['password']."hello";
    
        $sql = "INSERT INTO user (fName, lName, login, password, status) VALUES (:firstname, :lastname, :login, :password, '1')";
    
        // Подготовка и выполнение запроса
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', md5($pass));
        $stmt->execute();
    }

    echo "Данные успешно отправлено!!!.";
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}

$conn = null;