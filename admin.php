<?
session_start();

if(!isset($_SESSION['login'])){
    $_SESSION["error"]="Сначало вы должны ввести логин и пароль!";
    header("Location: login.php");
    exit;
}

session_destroy();
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
    <link href="css/styles.css" rel="stylesheet">
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
                    <center><img src="./img/logo.png" style="background-size: cover;"></center>
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
                                <img src="./img/11.png" height="40" width="40" alt="">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="icon-envelope menu-icon"></i> <span class="nav-text">Бургеры</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="./burgers/viewburgers.php">Список бургеров</a></li>
                        <li><a href="./burgers/addburgers.php">Добавить</a></li>
                        <li><a href="./burgers/updateburgers.php">Обновить</a></li>
                        <li><a href="./burgers/deleteburgers.php">Удалить</a></li>
                    </ul>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="true">
                        <i class="icon-envelope menu-icon"></i> <span class="nav-text">Категории</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="./category/category.php">Список категорий</a></li>
                        <li><a href="./category/addcategory.php">Добавить</a></li>
                        <li><a href="./email-read.html">Обновить</a></li>
                        <li><a href="./email-compose.html">Удалить</a></li>
                    </ul>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-envelope menu-icon"></i> <span class="nav-text">Листы</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="./email-inbox.html">Добавить</a></li>
                        <li><a href="./email-read.html">Обновить</a></li>
                        <li><a href="./email-compose.html">Удалить</a></li>
                    </ul>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-envelope menu-icon"></i> <span class="nav-text">Посты</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="./email-inbox.html">Добавить</a></li>
                        <li><a href="./email-read.html">Обновить</a></li>
                        <li><a href="./email-compose.html">Удалить</a></li>
                    </ul>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-envelope menu-icon"></i> <span class="nav-text">Пользователи</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="./email-inbox.html">Добавить</a></li>
                        <li><a href="./email-read.html">Обновить</a></li>
                        <li><a href="./email-compose.html">Удалить</a></li>
                        <li><a href="./email-compose.html">Список пользователей</a></li>
                    </ul>
                </ul>
            </div>
        </div>
        <div class="content-body">
            <div class="container-fluid">
                <?php 
                    echo "<center><h1>Добро пожаловать " . $_SESSION["lname"] .  "</h1></center>";
                ?>
            </div>
        </div>
    </div>
    <script src="./js/common.min.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./js/settings.js"></script>
    <script src="./js/gleek.js"></script>
    <script src="./js/styleSwitcher.js"></script>

</body>

</html>