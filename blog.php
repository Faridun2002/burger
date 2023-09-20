<!doctype html>
<html class="no-js" lang="zxx">

<?php include_once "head.php" ?>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <?php include_once "header.php" ?>

    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg">
        <h3>блог</h3>
    </div>
    <!-- bradcam_area_end -->

    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <?php
                        include_once "conn.php";
                        $conn = getconn();

                        $query = "SELECT p.`title`, p.`text`,p.`image_url`,p.`createDate`,COUNT(c.`text`) AS `comment`, category.`name` AS category FROM `post` AS p
                        LEFT JOIN `comment` AS c ON p.`id` = c.`postId`
                        JOIN category AS category ON p.`categoryId` = category.`id` where p.status = '1'
                        GROUP BY p.`id`";

                        // Подготовка запроса
                        $stmt = $conn->prepare($query);

                        // Выполнение запроса
                        $stmt->execute();

                        // Получение результатов запроса
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        // Вывод результатов или их обработка
                        foreach ($results as $row) {
                            echo    " <article class='blog_item'>
                    <div class='blog_item_img'>
                        <img class='card-img rounded-0' src='uploads/" . $row['image_url'] . "' alt=''>
                        <a href='#' class='blog_item_date'>
                            <h3>" . $row['createDate'] . "</h3>
                            <p>Ян</p>
                        </a>
                    </div>

                    <div class='blog_details'>
                        <a class='d-inline-block' href='single-blog.html'>
                            <h2>'" . $row['title'] . "'</h2>
                        </a>
                        <p>'" . $row['text'] . "':</p>
                        <ul class='blog-info-link'>
                            <li><a href='#'><i class='fa fa-user'></i> " . $row['category'] . "</a></li>
                            <li><a href='#'><i class='fa fa-comments'></i> " . $row['comment'] . " комментариев</a></li>
                        </ul>
                    </div>
                </article>";
                        }
                        ?>

                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Поиск по ключевому слову' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Поиск по ключевому слову'">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Поиск</button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Категория</h4>
                            <ul class="list cat-list">
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Ресторанная еда</p>
                                        <p>(37)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Новости туризма</p>
                                        <p>(10)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Современные технологии</p>
                                        <p>(03)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Продукт</p>
                                        <p>(11)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Вдохновение</p>
                                        <p>(21)</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Здравоохранение (21)</p>
                                        <p>09</p>
                                    </a>
                                </li>
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Недавний пост</h3>
                            <div class="media post_item">
                                <img src="img/post/post_1.png" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>Из жизни ты была рыбой...</h3>
                                    </a>
                                    <p>12 января 2019 г.</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="img/post/post_2.png" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>Удивительный Хаббл</h3>
                                    </a>
                                    <p>02 Несколько часов назад</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="img/post/post_3.png" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>Астрономия или астрология</h3>
                                    </a>
                                    <p>03 Несколько часов назад</p>
                                </div>
                            </div>
                            <div class="media post_item">
                                <img src="img/post/post_4.png" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>Телескоп астероидов</h3>
                                    </a>
                                    <p>01 Несколько часов назад</p>
                                </div>
                            </div>
                        </aside>
                        <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title">Облака тегов</h4>
                            <ul class="list">
                                <li>
                                    <a href="#">проект</a>
                                </li>
                                <li>
                                    <a href="#">любовь</a>
                                </li>
                                <li>
                                    <a href="#">технологии</a>
                                </li>
                                <li>
                                    <a href="#">путешествовать</a>
                                </li>
                                <li>
                                    <a href="#">ресторан</a>
                                </li>
                                <li>
                                    <a href="#">стиль жизни</a>
                                </li>
                                <li>
                                    <a href="#">дизайн</a>
                                </li>
                                <li>
                                    <a href="#">иллюстрация</a>
                                </li>
                            </ul>
                        </aside>


                        <aside class="single_sidebar_widget instagram_feeds">
                            <h4 class="widget_title">Ленты Instagram</h4>
                            <ul class="instagram_row flex-wrap">
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="img/post/post_5.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="img/post/post_6.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="img/post/post_7.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="img/post/post_8.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="img/post/post_9.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="img/post/post_10.png" alt="">
                                    </a>
                                </li>
                            </ul>
                        </aside>


                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Новостная рассылка</h4>

                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите адрес электронной почты'" placeholder='Введите адрес электронной почты' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Подписаться</button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <?php include_once "footer.php" ?>

</body>