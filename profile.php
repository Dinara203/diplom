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

    <script src="assets/js/modal.js" defer></script>
    <script src="assets/js/menu.js" defer></script>
 
    <title>Онлайн-галлерея современного искусства</title>
</head>
<body>
    <?php
        include('incl/header.php');
    ?>
    <div class="line"></div>
    <?php
        if($USER['id_level']==1 || $USER['id_level']==2){
            if(isset($_POST['updateprof'])){
                if($_FILES['photoprof']['size']==0){
                    $photo=$USER['photo'];
                }else{
                $x = md5(time());
                $photo = 'assets/img/uploads/'.$x.$_FILES['photoprof']['name'];
                move_uploaded_file($_FILES['photoprof']['tmp_name'], $photo);
                 }
                 if(empty($_POST['nameprof'])){
                    $name=$USER['name'];
                }else{
                    $name=$_POST['nameprof'];
                 }
                $sirname=$_POST['sirnameprof'];
                $text=$_POST['textprof'];
                
                $user_id=$USER['id'];
        
        
                $sql="UPDATE user SET
                            sirname ='$sirname',
                           photo ='$photo',
                           name = '$name',
                           text = '$text'
                           
        
                        WHERE id = '$user_id'";
                        $link -> query($sql);
        
                echo "<script>document.location.href=\"profile.php\"</script>";
            }
        }

    ?>
     <!-- МОДАЛЬНОЕ РЕДАКТИРОВАНИЯ ПРОФИЛЯ -->
   <div class="modal" data-modal="modal">
    <div class="modal-form red-background">
        <div class="wrapper-start ">
            <form action="" method="POST" class="form-add" enctype="multipart/form-data">

                <div class="const-photo">
                    <label for="files" id="btn-file" class="btn-photo pointer">
                        <div class="circle-photo">
                            <img src="<?=$USER['photo']?>" alt="card" class="img-art">
                        </div>
                        <div class="relative">
                            <img src="assets/img/photo-white.png" alt="photo">
                            <p class="f14px white">Нажмите, чтобы добавить фото</p>
                        </div>
                    </label>
                    <input id="files" accept="image/*" class="input-photo" type="file"  name="photoprof"/>
                    
                </div>
                <div class="inp-form">
                    <input type="text" name="sirnameprof" placeholder="Введите фамилия" class="inp-white" value="<?=$USER['sirname']?>">
                    <input type="text" name="nameprof" placeholder="Введите имя" class="inp-white" value="<?=$USER['name']?>">
                    <textarea name="textprof" class="inp-white" placeholder="Введите текст"><?=$USER['text']?></textarea>
                    <input type="submit" class="btn-head pointer" value="Редактировать профиль" name="updateprof">
                </div>
        </form>
            <button class="close-button">
                <img src="assets/img/close-white.png" alt="close" class="close-button__img">
            </button>

        </div>
        
       
    </div>
  </div>
  <!-- МОДАЛЬНОЕ РЕДАКТИРОВАНИЯ ПРОФИЛЯ  -->

   


    <main>
        <section class="Profile">
            <div class="container">

                <?php
                if(isset($_SESSION['USER'])){
                    if($USER['id_level']==3){?>
                        <div class="title-line">
                            <p class="title red"><span class="yellow-text">А</span>дмин <span class="yellow-text">п</span>анель <?=$USER['email']?></p>
                            <div class="line-title-red"></div>
                        </div>
                <div class="profile-content">
                   
                    <div class="info">
                        <p class="red f24px">Действия</p>
                        <div class="admin-content">

                            <a href="moderation.php" class="admin">
                                <div class="size">
                                    <img src="assets/img/picture.png" alt="picture">
                                    <h4 class="red">Модерация картин</h4>
                                </div>
                                <p class="red">Новых добавленных картин:</p>
                                <h4 class="red f24px">20</h4>
                            </a>
                            <a href="users.php" class="admin">
                                <div class="size">
                                    <img src="assets/img/users.png" alt="picture">
                                    <h4 class="red">Пользователи</h4>
                                </div>
                                <p class="red">Всего пользователей:</p>
                                <h4 class="red f24px">20</h4>
                            </a>
                            <a href="?do=exit" class="admin">
                                <div class="size">
                                    <img src="assets/img/exit.png" alt="picture">
                                    <h4 class="red">Выход</h4>
                                </div>
                                
                            </a>

                            
                        </div>
                    </div>
                </div>

                    <?}
                    elseif($USER['id_level']==2){

                   
                ?>
                <div class="title-line">
                    <p class="title red"><span class="yellow-text">Л</span>ичный <span class="yellow-text">к</span>абинет</p>
                    <div class="line-title-red"></div>
                </div>
                <div class="profile-content">
                    <div class="info">
                        <p class="red f24px">Информация</p>
                        <div class="profile-user">
                            <div class="circle-profile">
                                <img src="<?=$USER['photo']?>" alt="card" class="img-profile">
                            </div>
                            <div class="text-card">
                                <div class="buttons-reg">
                                    <h3 class="red"><?=$USER['sirname']?> <?=$USER['name']?></h3>
                                    <button id="btn-click" class="pointer btn-click"><img src="assets/img/update-prof.png" alt="update" title="изменить профиль"></button>

                                </div>
                                <p><?=$USER['email']?></p>
                                <p class="width-text"><?=$USER['text']?> </p>
                                
                            </div>
                        </div>
                    </div>
                    <div class="info">
                        <p class="red f24px">Действия</p>
                        <div class="art-content">

                            <a href="moderation.php" class="art">
                                <div class="size">
                                    <img src="assets/img/picture.png" alt="picture">
                                    <h4 class="red">Модерация заказов картин</h4>
                                </div>
                                <p class="red">Картины, которые хотят купить:</p>
                                <h4 class="red f24px">2</h4>
                            </a>
                            <a href="add.php" class="art">
                                <div class="size">
                                    <img src="assets/img/picture.png" alt="picture">
                                    <h4 class="red">Добавить картину</h4>
                                </div>
                                
                            </a>
                            <a href="?do=exit" class="art">
                                <div class="size">
                                    <img src="assets/img/exit.png" alt="picture">
                                    <h4 class="red">Выход</h4>
                                </div>
                                
                            </a>

                            
                        </div>
                    </div>
                </div>
                <?php
                    $sql_count = "SELECT COUNT(*) AS `count` FROM painting WHERE id_user= '$user_id'";
                    $res1 = $link -> query($sql_count)->fetch()['count'];
                ?>
                <div class="title-content">
                    <div class="title-line">
                        <p class="title red"><span class="yellow-text">В</span>се картины (<?=$res1?>)</p>
                        <div class="line-title-red"></div>
                    </div>
                    <div class="filter-poisk">
                        <div class="menu-block">
                            <div class="filter">
                            <?php
                            if(empty($_GET['filter'])){

                            ?>
                                Все картины
                            <?} elseif(isset($_GET['filter'])){
                                $get_filter = $_GET['filter'];

                                $sql_filt = "SELECT * FROM `status_painting` WHERE id='$get_filter'";
                                $result = $link -> query($sql_filt);
                                $filter_get = $result -> fetch();
                                echo $filter_get['name'];
                            }?>
                            </div>
                           
                            <ul class="menuList">
                                <li><a href="profile.php" class="white">Все картины</a></li>
                                <?php
                                
                                    $sql = "SELECT * FROM status_painting";
                                    $result = $link -> query($sql);
                                    foreach($result as $filters){?>
                                        <li><a href="profile.php?filter=<?=$filters['id']?>" class="white"><?=$filters['name']?></a></li>
                                    <?}
                              ?>
                              
                              
                                
                            </ul>
                        </div>

                    </div>
                </div><br><br>
                <div class="card-content"> 
                    <?php
                        if(isset($_GET['filter'])){
                            $get_filter = $_GET['filter'];
                            $dop_sql = "AND id_status_painting = '$get_filter'";
                        }
                        $sql="SELECT*FROM painting WHERE id_user='$user_id' $dop_sql ";
                        $res=$link -> query($sql);
                        $picture=$res-> fetchAll();

                        foreach($picture as $pictures){
                            

                           
                            
                      ?>
                      <!-- МОДАЛЬНОЕ ОКНО УДАЛЕНИЯ -->
                      <div class="modal" data-modal="delete" data-id="<?=$pictures['id']?>">
                            <div class="modal-form red-background">
                                <div class="wrapper modal-form__wrapper">
                                    <p class="white">Вы точно хотите удалить картину "<?=$pictures['name']?>"?</p>
                                    <button class="close-button">
                                        <img src="assets/img/close-white.png" alt="close" class="close-button__img">
                                    </button>
                                </div><br>
                                                 
                                <a href="profile.php?del_ok=<?=$pictures['id']?>" id="" class="btn-head" >Удалить</a>
                                <?php
                                     if(isset($_GET['del_ok'])){
                                        $del_ok=$_GET['del_ok'];
                                        $sql="DELETE FROM painting WHERE id= '$del_ok'";
                                        $link->query($sql);
        
                                        
                                        echo '<script>document.location.href="profile.php"</script>';
                                    }
                                ?>  
                            </div>
                        </div>
                        <!-- МОДАЛЬНОЕ ОКНО УДАЛЕНИЯ -->
                         
                         <!-- МОДАЛЬНОЕ РЕДАКТИРОВАНИЯ КАРТИНЫ -->
                            <div class="modal" data-modal="update" data-id="<?=$pictures['id']?>">
                                <div class="modal-form white-background">
                                    <div class="wrapper-start ">
                                        <form class="form-update" method="POST" enctype="multipart/form-data">
                                            <div class="const-photo pointer">
                                                <label for="files" id="btn-file" class="btn-photo pointer">
                                                    
                                                    <img src="<?=$pictures['photo']?>" alt="card" class="img-tov">
                                                    
                                                    <div class="relative">
                                                        <img src="assets/img/photo-white.png" alt="photo">
                                                        <p class="f14px white">Нажмите, чтобы добавить фото</p>
                                                    </div>
                                                </label>

                                                <input id="files" accept="image/*" class="input-photo" type="file"  name="photo"/>
                                            </div>
                                            <div class="inp-form">
                                                <input type="text" name="name" placeholder="Название картины*" class="inp-black" value="<?=$pictures['name']?>">
                                                <div class="size">
                                                    <input type="number" name="size1" placeholder="Ширина картины*" class="inp-black" value="<?=$pictures['size1']?>">
                                                    <p>X</p>
                                                    <input type="number" name="size2" placeholder="Высота картины*" class="inp-black" value="<?=$pictures['size2']?>">
                                                    <p>см</p>
                                                </div>
                                                <div class="size">
                                                    <select name="material" class="inp-black">
                                                        <option value="0">Материал</option>
                                                        <?php
                                                            $sql="SELECT * FROM material";
                                                            $res=$link->query($sql);
                                                            $material=$res->fetchAll();

                                                            foreach($material as $materials){?>
                                                                <option value="<?=$materials['id']?>"<?=$pictures['id_material'] == $materials['id'] ? "selected" : ""?>><?=$materials['name']?></option>
                                                            <?}
                                                        ?>
                                                    </select>
                                                    <select name="view" class="inp-black">
                                                        <option value="0">Вид</option>
                                                        <?php
                                                            $sql="SELECT * FROM view";
                                                            $res=$link->query($sql);
                                                            $view=$res->fetchAll();

                                                            foreach($view as $views){?>
                                                                <option value="<?=$views['id']?>"<?=$pictures['id_view'] == $views['id'] ? "selected" : ""?>><?=$views['name']?></option>
                                                            <?}
                                                        ?>
                                                       
                                                    </select>
                                                </div>
                                              
                                                <div class="size">
                                                    <input type="text" name="price" placeholder="Стоимость картины*" class="inp-black" value="<?=$pictures['price']?>">
                                                    <p>₽</p>
                                                </div>
                                                <div class="button-card">
                                                    <input type="submit" name="UpdateTov" class="btn-red pointer" value="Редактировать картину">
                                                </div>
                                            </div>
                                            <?$pictures_id=$pictures['id'];
                                               
                                                if(isset($_POST['UpdateTov'])){
                                                    
                                                    $name= $_POST['name'];
                                                    $price= $_POST['price'];
                                                    $size1= $_POST['size1'];
                                                    $size2= $_POST['size2'];
                                                    $material= $_POST['material'];
                                                    $view= $_POST['view'];
                                                    

                                                     if($_FILES['photo']['size']==0){
                                                         $photo=$pictures['photo'];
                                                     }else{
                                                     $x = md5(time());
                                                     $photo = 'assets/img/picture/'.$x.$_FILES['photo']['name'];
                                                     move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
                                                     }
                                                    
                                     
                                                     $sql="UPDATE painting SET
                                                     photo ='$photo',
                                                     name = '$name',
                                                     price = '$price',
                                                     size1 = '$size1',
                                                     size2 = '$size2',
                                                     id_material = '$material',
                                                     id_view='$view'
                                                     WHERE id = '$pictures_id'";
                                                     $link -> query($sql);
                                     
                                                 echo "<script>document.location.href=\"profile.php\"</script>";
                                                 }?>
                                        </form>
                                        <button class="close-button">
                                            <img src="assets/img/close-red.png" alt="close" class="close-button__img">
                                        </button>

                                    </div>
                                    
                                
                                </div>
                            </div>
                            <!-- МОДАЛЬНОЕ РЕДАКТИРОВАНИЯ КАРТИНЫ  -->

                     <div class="more-img ">
                        
                        <img src="<?=$pictures['photo']?>" alt="photo" class="img-new pointer border-yellow">
                        <div class="content-button">
                            <p class="white"><?=$pictures['name']?></p>
                            <?if($pictures['id_status_painting']==2){?>
                            <a href="card.php?id=<?=$pictures['id']?>" class="btn-white">Подробнее</a>
                            <?}?>
                           
                        </div>
                        <?if($pictures['count']==0){?>
                        <div class="btn-sale white">Продано!</div>
                        <?}?>
                            <div class="buttons-up">
                                <?if($pictures['id_status_painting']==1){?>
                                <button data-id="<?=$pictures['id']?>"  class="update pointer" id="update"><img src="assets/img/update-tov.png" alt="update"></button>
                                <?}?>
                                            
                                <button data-id="<?=$pictures['id']?>" class="delete pointer" id="delete"><img src="assets/img/delete.png" alt="delete"></button>
                            </div>
                            
                    </div>
                    <?}
                   
                    
                    
                    ?>

                 
                   
   
                </div>


                <?php
                 }
                
                elseif($USER['id_level']==1){

                
                ?>
                <div class="title-line">
                    <p class="title red"><span class="yellow-text">Л</span>ичный <span class="yellow-text">к</span>абинет</p>
                    <div class="line-title-red"></div>
                </div>
                <div class="profile-content">
                    <div class="info">
                        <p class="red f24px">Информация</p>
                        <div class="profile-user">
                            <div class="circle-profile">
                                <img src="<?=$USER['photo']?>" alt="card" class="img-profile">
                            </div>
                            <div class="text-user">
                                <div class="buttons-reg">
                                    <h3 class="red"><?=$USER['sirname']?> <?=$USER['name']?></h3>
                                    <button id="btn-click" class="pointer btn-click"><img src="assets/img/update-prof.png" alt="update" title="изменить профиль"></button>
                                    
                                </div>
                                <p><?=$USER['email']?></p>
                                <p><?=$USER['text']?> </p>
                                <a href="?do=exit" class="btn-red">Выход</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="title-content">
                    <div class="title-line">
                        <p class="title red"><span class="yellow-text">В</span>аши заказы</p>
                        <div class="line-title-red"></div>
                    </div>
                    <div class="filter-poisk">
                        <div class="menu-block">
                            <div class="filter">
                                Все 
                            </div>
                            <ul class="menuList">
                              
                              <li><a href="profile.html" class="white">В обработке</a></li>
                              <li><a href="profile.html" class="white">Неопубликованные</a></li>
                              <li><a href="profile.html" class="white">Опубликованные</a></li>
                                
                            </ul>
                        </div>

                    </div>
                </div><br><br>
                <div class="card-content"> 
                    <a href="card.html">
                        <div class="card">
                            <div class="img-sale">
                                <img src="assets/img/card1.png" alt="" class="img-card">
                                <div class="btn-sale white">В пути</div>
                            </div>
                            <p class="black">Задумчивая девушка,</p>
                            <p class="price red">5800 ₽</p>
                        </div>
                    </a>
                    <a href="card.html">
                        <div class="card">
                            <div class="img-sale">
                                <img src="assets/img/card3.jpeg" alt="" class="img-card">
                                <div class="btn-sale white">Доставлен</div>
                            </div>
                            <p class="black">Задумчивая девушка,</p>
                            <p class="price red">5800 ₽</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        

  
        <?}
                }elseif(empty($_SESSION['USER'])){
                    echo '<section><div class="container"><p class="red f24px">В начале авторизуйтесь!</p></div></section>';
                    echo '<script>document.location.href="auth.php"</script>';

                }?>
    </main>
    
    
  
    
   

 
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