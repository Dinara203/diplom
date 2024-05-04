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
    <script src="assets/js/menu.js" defer></script>
    <script src="assets/js/btn.js" defer></script>
    <script src="assets/js/burger.js" defer></script>
    <title>Онлайн-галлерея современного искусства</title>
</head>
<body>
    <?php
        include('incl/header.php');
    ?>
    <div class="line"></div>
    <main>
        <section class="Catalog">
            <div class="container">
                <div class="title-content">
                    <div class="title-line">
                        <p class="title red"><span class="yellow-text">К</span>аталог</p>
                        <div class="line-title-red"></div>
                    </div>
                    <div class="filter-poisk">
                        <div class="menu-block">
                            <div class="filter">
                                Фильтры  
                            </div>
                            <ul class="menuList">
                              <li><a href="Catalog.html" class="white">По убыванию цены</a></li>
                              <li><a href="Catalog.html" class="white">По возрастанию цены</a></li>
                              <li><a href="Catalog.html" class="white">Сначала новые</a></li>
                              <li><a href="Catalog.html" class="white">Сначала старые</a></li>
                                
                            </ul>
                        </div>
                        <form action="" class="poisk-content" method="POST">
                            <input type="text" placeholder="Поиск картины..." class="inp-poisk" name="text">
                            <input type="submit" class="inp-naiti" name="poisk" value="Найти">
                        </form>

                    </div>
                </div>
                <div class="catalog-content">
                    <div class="text-category">
                        <div class="material">
                            <div class="material-line">
                                <p class="red f24px">Материал</p>
                                <div class="line-title-red"></div>
                            </div><br>
                           <div class="material-content">
                            <a href="" class="black">Карандаш</a>
                            <a href="" class="black">Акрил</a>
                            <a href="" class="black">Мелки</a>
                            <a href="" class="black">Акварель</a>
                            <a href="" class="black">Масло</a>
                            <a href="" class="black">Гуашь</a>
                           </div>
                            
                        </div>
                        <div class="material">
                            <div class="material-line">
                                <p class="red f24px">Вид</p>
                                <div class="line-title-red"></div>
                            </div><br>
                            <div class="material-content">
                                <a href="" class="black">Портрет</a>
                                <a href="" class="black">Пейзаж</a>
                                <a href="" class="black">Натюрморт</a>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-content">
                      <?php
                        $sql="SELECT*FROM painting WHERE id_status_painting='2'";
                        $res=$link -> query($sql);
                        $picture=$res-> fetchAll();

                        foreach($picture as $pictures){
                            $pict_artist=$pictures['id_user'];
                            $sql="SELECT*FROM user WHERE id='$pict_artist'";
                            $res=$link -> query($sql);
                            $artist=$res-> fetch();
                      ?>
                        <a href="card.php?id=<?=$pictures['id']?>">
                            <div class="card">
                                <img src="<?=$pictures['photo']?>" alt="photo" class="img-card">
                                <p class="black"><?=$pictures['name']?></p>
                                <p class="red f16px">Художник: <?=$artist['sirname']?> <?=$artist['name']?></p>
                                <p class="price red"><?=$pictures['price']?> ₽</p>
                            </div>
                        </a>
                        <?}?>
                        
                        
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <img src="assets/img/кнопка.png" alt="btn" class="go-top">
    <div class="line"></div>
    <?php
        include('incl/footer.php');
    ?>
</body>
</html>