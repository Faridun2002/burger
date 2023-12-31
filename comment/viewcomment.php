<?
// session_start();

// if(!isset($_SESSION['login'])){
//     $_SESSION["error"]="Сначало вы должны ввести логин и пароль!";
//     header("Location: login.php");
//     exit;
// }

// session_destroy();

include_once "../log.php";

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
                <a href="../admin.php">
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
                    <center>
                        <h2>Список комментариев</h2>
                    </center>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">User</th>
                                <th scope="col">Post</th>
                                <th scope="col">Text</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once "../conn.php";

                            $conn = getconn();
                            $query = "SELECT c.`id`, CONCAT(u.`fName`,' ',u.`lName`) AS username, p.`text` as post, c.`text` FROM `comment` AS c
                            JOIN post AS p ON c.`postId` = p.`id`
                            JOIN `user` AS u ON c.`userId` = u.`id`";

                            // Подготовка запроса
                            $stmt = $conn->prepare($query);

                            // Выполнение запроса
                            $stmt->execute();
                            logger("Выполнение запроса: $query");

                            // Получение результатов запроса
                            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            $string = '';
                            foreach ($results as $row) {
                                $string .= implode(", ", $row) . "\n"; // Разделитель между подмассивами и новая строка
                            }

                            logger("Результат: $string");
                            // Вывод результатов или их обработка
                            foreach ($results as $row) {
                                echo    "<tr>
                                    <th scope='col'>" . $row['id'] . "</th>
                                    <th scope='col'>" . $row['username'] . "</th>
                                    <th scope='col'>" . $row['post'] . "</th>
                                    <th scope='col'>" . $row['text'] . "</th>
                                    <th scope='col'>" . $row['comment'] . "</th>
                                    <th scope='col'><a href='updatepost.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a></th>
                                    <th scope='col'><a href='deletepost.php?id=" . $row['id'] . "' class='btn btn-primary'>Delete</a></th>
                                    </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <a href="addcomment.php" class="btn btn-success mb-2">Добавить</a>
                </div>
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