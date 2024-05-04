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
    <script src="assets/js/burger.js" defer></script>
    <script src="assets/js/eye.js" defer></script>
    <title>Онлайн-галлерея современного искусства</title>
</head>
<body>
    <?php
        include('incl/header.php');
    ?>
    <div class="line"></div>
    <?php
    if(isset($_SESSION['USER'])){
        echo '<section><div class="container"><p class="red f24px">Вы уже вошли в аккаунт!</p></div></section>';
        echo '<script>document.location.href="profile.php"</script>';

    }else{
        if(isset($_POST['Add'])){
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $passmd5=md5($pass);
    
    
            $sql1="SELECT * FROM user WHERE email='$email'";
            $res=$link->query($sql1);
            $user=$res->fetch();
    
            $sql2="SELECT * FROM user WHERE email='$email' AND pass='$passmd5'";
            $res=$link->query($sql2);
            $user2=$res->fetch();
    
            if(empty($email)){
                $erroremail.='<p class="yellow-text f16px">Вы не заполнили поле</p>';
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $erroremail.='<p class="yellow-text f16px">Неверный формат почты</p>';
            }elseif(empty($user)){
                $erroremail.='<p class="white f16px">Вы не зарегистрированы, <a href="reg.php" class="yellow-text">зарегистрируйтесь</a></p>';
            }
            if(empty($pass)){
                $errorpass.='<p class="yellow-text f16px">Вы не заполнили поле</p>';
            }elseif(empty($user2)){
                $errorpass.='<p class="yellow-text f16px">Неверный пароль</p>';
            }
    
            if(empty($erroremail)&&empty($errorpass)){?>
               <div class="container">
               <?echo ' <div class = "red f24px">Авторизация</div>';?>
               </div>
                <?$_SESSION['USER']=$user2;
                echo '<script>document.location.href="profile.php"</script>';
            }
        }
        
        
         ?>
    <main>
        <div class="Reg">
            <div class="container">
                <div class="reg-content">
                    <p class="f24px yellow-text">Авторизация</p>
                    <form class="form-auth" method="POST">
                        
                        <input type="text" class="inp-auth" placeholder="Введите почту*" name="email" value="<?=$email?>">
                        <?=$erroremail?>
                       
                        <div class="form-floating pass">
                          <span id="icon-pass"><img src="assets/img/Shape.png" alt="eyes" class="icon-pass"></span>
                          <input type="password" class="inp-auth input-pass" placeholder="Введите пароль*" name="pass" id="password">
                          <label for="password"></label>
                        </div>
                        <?=$errorpass?>
                        <div class="buttons-reg">
                              <a href="index.php" class="btn-red">Отмена</a>
                              <input type="submit" class="btn-red submit" name="Add" value="Авторизация">
                        </div>
                        <p class="f14px white">Нет аккаунта? Тогда <a href="reg.php" class="yellow-text">зарегистрируйтесь </a></p>
                      </form>
                        
                      
                </div>
            </div>
        </div>
    </main>
    <?}?>
    <div class="line"></div>
    <footer>
        <div class="container">
            <div class="footer-content">
                <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="logo"></a>
                <ul class="menu-content">
                    <li><a href="" class="menu">Картины</a></li>
                    <li><a href="" class="menu">Художники</a></li>
                    <li><a href="" class="menu">О нас</a></li>
                    <li><a href="" class="menu">Вопрос/ответ</a></li>
                </ul>
               
                <div class="text-footer">
                    <p class="white">По всем вопросам:</p>
                    <p class="white">“ArtGallery@mail.ru”</p>
                    <p class="white">+7 (928)-238-81-82</p>
                    
                </div>
            </div>
        </div>
    </footer>
</body>
</html>