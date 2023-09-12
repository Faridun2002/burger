<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content='width=device-width, initial-scale=1.0' name='viewport' />

    <link rel="icon" type="image/png" href="./favicon.ico">

    <link rel="stylesheet" type="text/css" href="../wwwroot/vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../wwwroot/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="../wwwroot/vendor/animate/animate.css">

    <link rel="stylesheet" type="text/css" href="../wwwroot/vendor/css-hamburgers/hamburgers.min.css">

    <link rel="stylesheet" type="text/css" href="../wwwroot/vendor/select2/select2.min.css">

    <link rel="stylesheet" type="text/css" href="../wwwroot/css/util.css">
    <link rel="stylesheet" type="text/css" href="../wwwroot/css/main.css">
</head>

<body>
    <form class="login100-form validate-form" action="auth.php" method="post">
        <span class="login100-form-title" style="font-size: 24px; font-weight: bold;">
            Добавление категории
        </span>

        <div class="wrap-input100 validate-input" data-validate="">
            <input class="input100" type="text" name="name" placeholder="Название">
            <span class="focus-input100"></span>
        </div>
        <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="text" name="status" placeholder="Статус">
            <span class="focus-input100"></span>
        </div>
        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                Добавить
            </button>
        </div>
    </form>
    <script src="../wwwroot/vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="../wwwroot/vendor/bootstrap/js/popper.js"></script>
    <script src="../wwwroot/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="../wwwroot/vendor/select2/select2.min.js"></script>

    <script src="../wwwroot/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>

    <script async="" src="../wwwroot/js/site.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

    <script src="../wwwroot/js/main.js"></script>
    <script defer="" src="../wwwroot/js/static.js" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon="{&quot;rayId&quot;:&quot;80379e8bdaa2d967&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;,&quot;version&quot;:&quot;2023.8.0&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>

</body>

</html>