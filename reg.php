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

            $name=$_POST['name'];
            $email=$_POST['email'];
            $sirname=$_POST['sirname'];
            $pass1=$_POST['pass1'];
            $pass2=$_POST['pass2'];
            $passcount=iconv_strlen($pass1);
    
            if(empty($name)){
              $errorname.='<p class="yellow-text f16px">Вы не заполнили поле</p>';
          }
          if(empty($email)){
              $erroremail.='<p class="yellow-text f16px">Вы не заполнили поле</p>';
          }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
              $erroremail.='<p class="yellow-text f16px">Неверный формат почты</p>';
          }

    
          if(empty($pass1)){
              $errorpass1.='<p class="yellow-text f16px">Вы не ввели пароль</p>';
          }elseif($passcount<6){
              $errorpass1.='<p class="yellow-text f16px">Введите пароль не менее 6 символов</p>';
          }
          if(empty($pass2)){
              $errorpass2.='<p class="yellow-text f16px">Вы не повторили пароль</p>';
          }elseif($pass1!=$pass2){
              $errorpass2.='<p class="yellow-text f16px">Пароли не совпадают</p>';
              
          }

          if(isset($_POST['checkbox'])&& $_POST['checkbox'] == "Yes"){

          }else{
            $error_check = '<p class="yellow-text f16px">нужно согласие</p>';
          }

          if(empty($errorname)&& empty($erroremail) && empty($errorpass1) && empty($errorpass2) && empty($error_check)){
              $sql = "SELECT * FROM user WHERE email='$email'";
              $res=$link->query($sql);
              $passmd5=md5($pass1);
              $photo='assets/img/person.png';
              $date=date('d.m.Y');

              
              if($res->rowCount()==0){
                  $sql = "INSERT INTO user (sirname, name, text, photo, data, email, pass, id_level) VALUES ('$sirname', '$name','','$photo','$date','$email','$passmd5', '1')";
                  $res=$link->query($sql);
                  $good= '<p class="white">Вы успешно зарегистрированы, <a href="Catalog.php" class="yellow-text">перейти к просмотру картин</a></p>';
              }else{
                  $erroremail.='<p class="white f16px">Такая почта уже зарегистрирована, <a href="auth.php" class="yellow-text">авторизуйтесь</a></p>';
              }
          }
          }

   
    ?>
    <main>
        <div class="Reg">
            <div class="container">
                <div class="reg-content">
                    <p class="f24px yellow-text">Регистрация</p>
                    <form class="form-auth" method="POST">
                        <input type="text" class="inp-auth" placeholder="Введите имя/никнейм*" name="name" value="<?=$name?>">
                        <?=$errorname?>
                        <input type="text" class="inp-auth" placeholder="Введите фамилия" name="sirname" value="<?=$sirname?>">
                        <input type="text" class="inp-auth" placeholder="Введите почту*" name="email" value="<?=$email?>">
                        <?=$erroremail?>
                       
                        <div class="form-floating pass">
                          <span id="icon-pass"><img src="assets/img/Shape.png" alt="eyes" class="icon-pass"></span>
                          <input type="password" class="inp-auth input-pass" placeholder="Введите пароль*" name="pass1" id="password">
                          <label for="password"></label>
                        </div>
                        <?=$errorpass1?>
                       
                        <div class="form-floating pass">
                          <span id="icon-pass"><img src="assets/img/Shape.png" alt="eyes" class="icon-pass"></span>
                          <input type="password" class="inp-auth input-pass" placeholder="Повторите пароль*" name="pass2" id="password">
                          <label for="password"></label>
                        </div>
                        <?=$errorpass2?>
                        <div class="flex-input">
                            <input type="checkbox" name="checkbox" value="Yes"><p class="f14px white">Согласие с правилами регистрации*</p>
                        </div>
                        <?=$error_check?>
                       
                        <div class="buttons-reg">
                              <a href="index.php" class="btn-red">Отмена</a>
                              <input type="submit" class="btn-red submit" name="Add" value="Регистрация">
                        </div>
                        <?=$good?>
                        <p class="f14px white">Уже есть аккаунт? Тогда <a href="auth.php" class="yellow-text">авторизуйтесь </a></p>
                      </form>
                        
                      
                </div>
            </div>
        </div>
    </main>
    <? }?>
    <div class="line"></div>
    <?php
        include('incl/footer.php');
    ?>
</body>
</html>