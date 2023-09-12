<?
session_start();

if(isset($_SESSION['login'])){
    echo "Добро пожаловать ". $_SESSION['lname'];
} else {
    $_SESSION["error"]="Сначало вы должны ввести логин и пароль!";
    header("Location: login.php");
    exit;
}

session_destroy();
?>