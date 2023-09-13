<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "burger";

try {
    $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $act = $_POST['act'];

    if ($act == "adduser") {
        //Получение данных из формы
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $login = $_POST['login'];
        $pass = $_POST['password'] . "hello";

        $sql = "INSERT INTO user (fName, lName, login, password, status) VALUES (:firstname, :lastname, :login, :password, '1')";

        // Подготовка и выполнение запроса
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', md5($pass));
        $stmt->execute();
    } else if ($act == "addburger") {
        //Получение данных из формы
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $unique_filename = "";

        if (isset($_POST["submit"])) {
            $target_dir = "./uploads/"; // Директория, куда будут загружаться файлы
            $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));

            // Генерируем уникальное имя для файла
            $unique_filename = uniqid() . "." . $imageFileType;

            $target_file = $target_dir . $unique_filename;
            $uploadOk = 1;

            // Проверка, является ли файл изображением
            if (isset($_FILES["fileToUpload"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    echo "Файл является изображением - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "Файл не является изображением.";
                    $uploadOk = 0;
                }
            }

            // Проверка наличия файла
            if ($_FILES["fileToUpload"]["size"] == 0) {
                echo "Файл не был загружен.";
                $uploadOk = 0;
            }

            // Разрешенные форматы файлов
            $allowed_formats = ["jpg", "jpeg", "png"];
            if (!in_array($imageFileType, $allowed_formats)) {
                echo "Разрешены только JPG, JPEG и PNG файлы.";
                $uploadOk = 0;
            }

            // Проверка на ошибки при загрузке
            if ($uploadOk == 0) {
                echo "Файл не был загружен.";
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    // echo "Файл " . basename($_FILES["fileToUpload"]["name"]) . " успешно загружен.";
                } else {
                    echo "Произошла ошибка при загрузке файла.";
                }
            }
        }


        $sql = "INSERT INTO burgers (name, description, price, image_url, status) VALUES (:name, :description, :price, :image_url, '1')";

        // Подготовка и выполнение запроса
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':image_url', $unique_filename);
        $stmt->execute();
    } else if ($act == "updateburger") {
        //Получение данных из формы
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $status = $_POST['status'];
        $unique_filename = "";

        if (isset($_FILES['file_input_name'])) {
            $target_dir = "./uploads/"; // Директория, куда будут загружаться файлы
            $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));

            // Генерируем уникальное имя для файла
            $unique_filename = uniqid() . "." . $imageFileType;

            $target_file = $target_dir . $unique_filename;
            $uploadOk = 1;

            // Проверка, является ли файл изображением
            if (isset($_FILES["fileToUpload"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    echo "Файл является изображением - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "Файл не является изображением.";
                    $uploadOk = 0;
                }
            }

            // Проверка наличия файла
            if ($_FILES["fileToUpload"]["size"] == 0) {
                echo "Файл не был загружен.";
                $uploadOk = 0;
            }

            // Разрешенные форматы файлов
            $allowed_formats = ["jpg", "jpeg", "png"];
            if (!in_array($imageFileType, $allowed_formats)) {
                echo "Разрешены только JPG, JPEG и PNG файлы.";
                $uploadOk = 0;
            }

            // Проверка на ошибки при загрузке
            if ($uploadOk == 0) {
                echo "Файл не был загружен.";
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    // echo "Файл " . basename($_FILES["fileToUpload"]["name"]) . " успешно загружен.";
                } else {
                    echo "Произошла ошибка при загрузке файла.";
                }
            }
            $sql = "update burgers set name=:name, description=:description, price=:price, image_url:image_url, status=:status where id = '" . $id . "';";
            // Подготовка и выполнение запроса
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':image_url', $unique_filename);
        } else {
            $sql = "update burgers set name=:name, description=:description, price=:price, status=:status where id = '" . $id . "';";

            // Подготовка и выполнение запроса
            $stmt = $conn->prepare($sql);
        }
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':status', $status);

        $stmt->execute();
    } else if ($act == "deleteburger") {
        //Получение данных из формы
        $id = $_GET['id'];

        $sql = "delete from burgers where id = '" . $id . "';";
        // Подготовка и выполнение запроса
        $stmt = $conn->prepare($sql);
        
        $stmt->execute();
    }

    echo "Данные успешно отправлено!!!.";
} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}

$conn = null;
