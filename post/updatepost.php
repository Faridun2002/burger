<?
// session_start();

// if(!isset($_SESSION['login'])){
//     $_SESSION["error"]="Сначало вы должны ввести логин и пароль!";
//     header("Location: login.php");
//     exit;
// }

// session_destroy();

include_once "../conn.php";
$conn = getconn();

$id = $_GET['id'];
// Пример SELECT-запроса
$query = "SELECT * FROM `post` where id = '" . $id . "'";

// Подготовка запроса
$stmt = $conn->prepare($query);

// Выполнение запроса
$stmt->execute();

// Получение результатов запроса
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="../css/styles.css" rel="stylesheet">
</head>

<body>
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div id="main-wrapper">

        <div class="nav-header" style="background-color: #F0542C;">
            <div class="">
                <a href="admin.php">
                    <center><img src="../img/logo.png" style="background-size: cover;"></center>
                </a>
            </div>
        </div>
        <div class="header">
            <div class="header-content clearfix">
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Поиск" aria-label="Поиск">
                        <div class="drop-down   d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Поиск">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="../img/11.png" height="40" width="40" alt="">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <a class="has-arrow" href="../burgers/viewburgers.php" aria-expanded="false">
                        <i class="icon-envelope menu-icon"></i> <span class="nav-text">Бургеры</span>
                    </a>
                    <a class="has-arrow" href="../category/viewcategory.php" aria-expanded="false">
                        <i class="icon-envelope menu-icon"></i> <span class="nav-text">Категории</span>
                    </a>
                    <a class="has-arrow" href="../post/viewpost.php" aria-expanded="false">
                        <i class="icon-envelope menu-icon"></i> <span class="nav-text">Посты</span>
                    </a>
                    <a class="has-arrow" href="../comment/viewcomment.php" aria-expanded="false">
                        <i class="icon-envelope menu-icon"></i> <span class="nav-text">Комментарии</span>
                    </a>
                </ul>
            </div>
        </div>
        <div class="content-body">
            <div class="container-fluid">
                <div class="container">
                    <form action="../query.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="act" value="updatepost">
                        <input type="hidden" name="id" value="<? echo $results[0]['id'] ?>">
                        <div class="form-group">
                            <label for="">Введите заголовок</label>
                            <input type="text" class="form-control" name="title" placeholder="Введите заголовок" required>
                        </div>
                        <div class="form-group">
                            <label for="">Введите текст</label>
                            <input type="text" class="form-control" name="text" placeholder="Введите текст" required>
                        </div>
                        <div class="form-group">
                            <label for="">Введите категорию</label>
                            <?php
                            include_once "../conn.php";
                            include_once "../log.php";

                            $conn = getconn();
                            $query = "SELECT * FROM category where status = 1";

                            // Подготовка запроса
                            $stmt = $conn->prepare($query);

                            // Выполнение запроса
                            $stmt->execute();
                            logger("Выполнение запроса: $query");

                            // Получение результатов запроса
                            $resulte = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            $string = '';
                            foreach ($resulte as $row) {
                                $string .= implode(", ", $row) . "\n"; // Разделитель между подмассивами и новая строка
                            }

                            logger("Результат: $string");
                            // Вывод результатов или их обработка
                            echo '<select name="categoryId">';
                            foreach ($resulte as $row) {
                                echo    "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                            }

                            echo '</select>';
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Выберите файл для загрузки:</label>
                            <input type="file" class="btn" value="Выбрать" name="fileToUpload" id="fileToUpload" required>
                        </div>
                        <div class="form-group">
                            <label for="">Введите статус</label>
                            <input type="text" class="form-control" name="status" placeholder="Введите статус" value="<? echo $results[0]['status'] ?>" required>
                        </div>
                        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                    </form>
                </div>
                <?php
                // echo "<center><h1>Добро пожаловать " . $_SESSION["lname"] .  "</h1></center>";
                ?>
            </div>
        </div>
    </div>
    <script src="../js/common.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/settings.js"></script>
    <script src="../js/gleek.js"></script>
    <script src="../js/styleSwitcher.js"></script>

</body>

</html>