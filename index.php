<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/adapt.css">
    <script src="assets/js/slide.js" defer></script>
    <script src="assets/js/burger.js" defer></script>
    <title>Онлайн-галлерея современного искусства</title>
</head>
<body>
    <?php
    include('incl/header.php');
    ?>
    <div class="line"></div>
    <main>
        <div class="Banner">
            <div class="slider-cont">
                <div class="slider">
                    <img src="assets/img/banner1.png" class="slide fade" alt="banner">
                    <img src="assets/img/banner2.png" class="slide fade" alt="banner">
                    <img src="assets/img/banner3.png" class="slide fade" alt="banner">
                </div>
            </div>
            <div class="container">
                <div class="banner-content">
                    <h1 class="red">Онлайн-галерея</h1>
                    <h1>современных художников</h1><br><br> 
                    <p>Найдите свою картину, чтобы украсить свой интерьер</p>
                    <div class="button-banner">
                        <a href="Catalog.php" class="ban-btn">Смотреть картины</a>
                    </div>
                </div>
            </div>
            <img src="assets/img/banner4.png" alt="img" class="img-ban">
            
        </div>
        <div class="line"></div>
        <section class="New">
            <div class="container">
                <div class="title-line">
                    <p class="title white"><span class="yellow-text">Н</span>овинки</p>
                    <div class="line-title-white"></div>
                </div><br><br>
                    <div class="card-content">
                        <div class="more-img">
                            <img src="assets/img/card2.png" alt="" class="img-new pointer">
                            <div class="content-button">
                                <p class="white">Название картины</p>
                                <a href="card.php" class="btn-white">Подробнее</a>
                            </div>
                        </div>
                        <div class="more-img">
                            <img src="assets/img/slide1.png" alt="" class="img-new pointer">
                            <div class="content-button">
                                <p class="white">Название картины</p>
                                <a href="card.php" class="btn-white">Подробнее</a>
                            </div>
                        </div>
                        <div class="more-img">
                            <img src="assets/img/slide2.png" alt="" class="img-new pointer">
                            <div class="content-button">
                                <p class="white">Название картины</p>
                                <a href="card.php" class="btn-white">Подробнее</a>
                            </div>
                        </div>
                        <div class="more-img">
                            <img src="assets/img/banner1.png" alt="" class="img-new pointer">
                            <div class="content-button">
                                <p class="white">Название картины</p>
                                <a href="card.php" class="btn-white">Подробнее</a>
                            </div>
                        </div>
                        <div class="more-img">
                            <img src="assets/img/banner2.png" alt="" class="img-new pointer">
                            <div class="content-button">
                                <p class="white">Название картины</p>
                                <a href="card.php" class="btn-white">Подробнее</a>
                            </div>
                        </div>
                    </div>
            </div>

        </section>
        <div class="line"></div>
        <div class="About" id="About">
            <div class="about-content">
                <div class="container">
                    <div class="about-text">
                        <p class="red f24px">Добро пожаловать в онлайн-галерею<br> современного искусства </p>
                        <p>Здесь вы можете посмотреть разные картины<br> современных художников и найти ту, которая запала<br> вам в душу.<br>
                            Онлайн-галлерея дает возможность раскрыться<br> любому человеку в искусстве!<br>
                        </p><br>
                        <div class="line-title-red"></div>
                        <p class="red">Хотите выкладывать и продавать свои работы? Тогда<br> пишите нам на почту “ArtGallery@mail.ru”
                        </p>
                    </div>
                </div>
                <img src="assets/img/about.png" alt="about" class="img-about">
            </div>
        </div>
        <div class="line"></div>
        <section class="Question" id="Question">
            <div class="container">
                <div class="title-line">
                    <p class="title red"><span class="yellow-text">В</span>опрос/<span class="yellow-text">О</span>твет</p>
                    <div class="line-title-red"></div>
                </div>
                <div class="question-content">
                    <div class="acordeon">
                        <div class="question-plus">
                            <p class="red f24px">Как выкладывать сюда свои работы?</p>
                            <img src="assets/img/plus.svg" alt="plus" class="plus">
                        </div>
                        <div class="acordeon-content">
                            <p>Вам нужно написать на почту “ArtGallery@mail.ru” и зарегистрироваться на сайте (администратор в течении дня сделает ваш профиль “художником”)<br>
                                Затем вы сможете выкладывать свои работы на сайт</p>
                                
                        </div>
                        <div class="line-red"></div>
                    </div>
                    <div class="acordeon">
                        <div class="question-plus">
                            <p class="red f24px">Как оплачивать картины после заказа?</p>
                            <img src="assets/img/plus.svg" alt="plus" class="plus">
                        </div>
                        <div class="acordeon-content">

                            <div class="question-zakaz">
                                <div class="icon-text">
                                    <img src="assets/img/icon1.png" alt="icon">
                                    <p>Вам предоставляется почта художника, который нарисовал эту картину</p>
                                </div>
                                <div class="icon-text">
                                    <img src="assets/img/icon2.png" alt="icon">
                                    <p>На почте вы можете задать любые вопросы, попросить видео или дополнительное фото</p>
                                </div>
                                <div class="icon-text">
                                    <img src="assets/img/icon3.png" alt="icon">
                                    <p>На счет оплаты и доставки вы договариваетесь с самим художником, дальше он высылает вам картину на ваш адрес или же вы забираете картину сами, тут как вам удобнее</p>
                                </div>
                            </div>
                                
                        </div>
                        <div class="line-red"></div>
                    </div>
                    <div class="acordeon">
                        <div class="question-plus">
                            <p class="red f24px">Можно ли как-то попросить художника нарисовать картину на заказ?</p>
                            <img src="assets/img/plus.svg" alt="plus" class="plus">
                        </div>
                        <div class="acordeon-content">
                            <p>Пока что наш сайт не предоставляет данные услуги, ведь сайт предназначен больше как онлайн-галерея, нежели для создания картин на заказ и не все художники рисуют картины на заказ</p>
                                
                        </div>
                        <div class="line-red"></div>
                    </div>
                </div>
            </div>
            
        </section>
       

    </main>
    <div class="line"></div>
    <?php
    include('incl/footer.php');
    ?>
</body>
</html>