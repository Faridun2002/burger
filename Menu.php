<!doctype html>
<html class="no-js" lang="zxx">

<?php
include_once "head.php";
?>

<body>
    <?php include_once "header.php" ?>
    <!-- header-end -->

    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg overlay">
        <h3>Меню</h3>
    </div>
    <!-- bradcam_area_end -->

    <!-- best_burgers_area_start  -->
    <div class="best_burgers_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center mb-80">
                        <span>Бургер Меню</span>
                        <h3>Лучшие бургеры</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                include_once "conn.php";
                // Пример SELECT-запроса
                $query = "SELECT * FROM `burgers` where status = '1'";

                // Подготовка запроса
                $stmt = $conn->prepare($query);

                // Выполнение запроса
                $stmt->execute();

                // Получение результатов запроса
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Вывод результатов или их обработка
                foreach ($results as $row) {
                    echo    "<div class='col-xl-6 col-md-6 col-lg-6'>
                                <div class='single_delicious d-flex align-items-center'>
                                    <div class='thumb'>
                                        <img src='uploads/" . $row['image_url'] . "' alt=''>
                                    </div>
                                    <div class='info'>
                                        <h3>" . $row['name'] . "</h3>
                                        <p>" . $row['description'] . "</p>
                                        <span>$" . $row['price'] . "</span>
                                    </div>
                                </div>
                            </div>";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- best_burgers_area_end  -->

    <!-- features_room_startt -->
    <div class="Burger_President_area">
        <div class="Burger_President_here">
            <div class="single_Burger_President">
                <div class="room_thumb">
                    <img src="img/burgers/1.png" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>$20</span>
                            <h3>The Burger President</h3>
                            <p>Отличный способ сделать ваш бизнес заслуживающим доверия и актуальным.</p>
                            <a href="#" class="boxed-btn3">Заказать сейчас</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="single_Burger_President">
                <div class="room_thumb">
                    <img src="img/burgers/2.png" alt="">
                    <div class="room_heading d-flex justify-content-between align-items-center">
                        <div class="room_heading_inner">
                            <span>$20</span>
                            <h3>The Burger President</h3>
                            <p>Отличный способ сделать ваш бизнес заслуживающим доверия и актуальным.</p>
                            <a href="#" class="boxed-btn3">Заказать сейчас</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- features_room_end -->

    <!-- testimonial_area_start  -->
    <div class="testimonial_area ">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-60 text-center">
                        <span>Отзывы</span>
                        <h3>Счастливые клиенты</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="testmonial_active owl-carousel">
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <p>“Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor
                                            sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec
                                            sed
                                            neque.</p>
                                        <div class="testmonial_author">
                                            <div class="thumb">
                                                <img src="img/testmonial/1.png" alt="">
                                            </div>
                                            <h4>Kristiana Chouhan</h4>
                                            <div class="stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <p>“Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor
                                            sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec
                                            sed
                                            neque.</p>
                                        <div class="testmonial_author">
                                            <div class="thumb">
                                                <img src="img/testmonial/2.png" alt="">
                                            </div>
                                            <h4>Arafath Hossain</h4>
                                            <div class="stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_carousel">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <div class="single_testmonial text-center">
                                        <p>“Donec imperdiet congue orci consequat mattis. Donec rutrum porttitor
                                            sollicitudin. Pellentesque id dolor tempor sapien feugiat ultrices nec
                                            sed
                                            neque.</p>
                                        <div class="testmonial_author">
                                            <div class="thumb">
                                                <img src="img/testmonial/3.png" alt="">
                                            </div>
                                            <h4>A.H Shemanto</h4>
                                            <div class="stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial_area_ned  -->

    <!-- instragram_area_start -->
    <div class="instragram_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single_instagram">
                        <img src="img/instragram/1.png" alt="">
                        <div class="ovrelay">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_instagram">
                        <img src="img/instragram/2.png" alt="">
                        <div class="ovrelay">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_instagram">
                        <img src="img/instragram/3.png" alt="">
                        <div class="ovrelay">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single_instagram">
                        <img src="img/instragram/4.png" alt="">
                        <div class="ovrelay">
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- instragram_area_end -->

    <?php include_once "footer.php" ?>

</body>

</html>