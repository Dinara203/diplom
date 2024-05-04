<?php
session_start();
require("incl/head.php");
?>

<header>
        <div class="container">
            <div class="header-content">
                <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="logo"></a>
                <ul class="menu-content">
                    <li><a href="Catalog.php" class="menu">Картины</a></li>
                    <li><a href="artists.php" class="menu">Художники</a></li>
                    <li><a href="index.php#About" class="menu">О нас</a></li>
                    <li><a href="index.php#Question" class="menu">Вопрос/ответ</a></li>
                </ul>
                
                <?php
                  if(empty($_SESSION['USER'])){?>
                    <div class="buttons">
                      <a href="reg.php" class="btn-head">Регистрация</a>
                      <a href="auth.php" class="btn-head">Авторизация</a>
                    </div>
                      
                  <?}elseif(isset($_SESSION['USER'])){
                    if($USER['id_level']==1){?>
                      <div class="buttons">
                        <a href="korz.php"><img src="assets/img/korz.png" alt="korz" title="Корзина"></a>
                        <a href="profile.php"><img src="assets/img/iconuser.png" alt="profile" title="Личный кабинет"></a>
                      </div>
                    <?}elseif($USER['id_level']==2){?>
                      <div class="buttons">
                        <a href="?do=exit" class="btn-head">Выход</a>
                        <a href="profile.php"><img src="assets/img/iconuser.png" alt="profile" title="Личный кабинет"></a>
                      </div>
                    <?}elseif($USER['id_level']==3){?>
                      <div class="buttons">
                        <a href="?do=exit" class="btn-head">Выход</a>
                        <a href="profile.php"><img src="assets/img/iconuser.png" alt="profile" title="Личный кабинет"></a>
                      </div>
                    <?}
                  }
                ?>
                
                
                
                <!-- бургер -->
              <div class="burger-menu">
                <button class="burger-menu_button">
                  <img src="assets/img/menu.png" alt="menu">
                </button>
                <nav class="burger-menu_nav">
                  <button class="burger-menu_close">
                    <img src="assets/img/close.png" alt="close">
                  </button>
                  <a href="Catalog.php" class="burger-menu_link">Картины</a>
                  <a href="artists.php" class="burger-menu_link">Художники</a>
                  <a href="index.php#About" class="burger-menu_link">О нас</a>
                  <a href="index.php#Question" class="burger-menu_link">Вопрос/ответ</a>
                  <?php
                  if(empty($_SESSION['USER'])){?>
                    <div class="buttons-burger">
                      <a href="reg.php" class="btn-head">Регистрация</a>
                      <a href="auth.php" class="btn-head">Авторизация</a>
                    </div>
                      
                  <?}elseif(isset($_SESSION['USER'])){
                    if($USER['id_level']==1){?>
                      <div class="buttons-flex-burger">
                        <a href="korz.php"><img src="assets/img/korz.png" alt="korz" title="Корзина"></a>
                        <a href="profile.php"><img src="assets/img/iconuser.png" alt="profile" title="Личный кабинет"></a>
                      </div>
                    <?}elseif($USER['id_level']==2){?>
                      <div class="buttons-flex-burger">
                        <a href="profile.php"><img src="assets/img/iconuser.png" alt="profile" title="Личный кабинет"></a>
                        <a href="?do=exit" class="btn-head">Выход</a>
                        
                      </div>
                    <?}elseif($USER['id_level']==3){?>
                      <div class="buttons-flex-burger">
                        <a href="profile.php"><img src="assets/img/iconuser.png" alt="profile" title="Личный кабинет"></a>
                        <a href="?do=exit" class="btn-head">Выход</a>
                        
                      </div>
                    <?}
                  }
                ?>
                    
                </nav>
              </div>
              <!-- бургер -->
            </div>
        </div>
    </header>



    


  