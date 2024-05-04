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
    <title>Онлайн-галлерея современного искусства</title>
</head>
<body>
    <?php
        include('incl/header.php');
    ?>
    <div class="line"></div>
    <?php

        if(isset($_GET['id']) ){
            
            $get_id=$_GET['id'];

            $sql="SELECT*FROM painting WHERE id='$get_id'";
            $res=$link -> query($sql);
            $picture=$res-> fetch();

            if($picture['id_status_painting']==2){

           

            $pict_material=$picture['id_material'];
            $pict_view=$picture['id_view'];

            $sql="SELECT*FROM material WHERE id='$pict_material'";
            $res=$link -> query($sql);
            $material=$res-> fetch();

            $sql="SELECT*FROM view WHERE id='$pict_view'";
            $res=$link -> query($sql);
            $view=$res-> fetch();

            $pict_artist=$picture['id_user'];
            $sql="SELECT*FROM user WHERE id='$pict_artist'";
            $res=$link -> query($sql);
            $artist=$res-> fetch();

        
    ?>
    <!-- МОДАЛЬНОЕ ОКНО УДАЛЕНИЯ -->
   <div class="modal" data-modal="modal">
    <div class="modal-form red-background">
        <div class="wrapper modal-form__wrapper">
            <p class="white">Вы точно хотите удалить картину "<?=$picture['name']?>"?</p>
            <button class="close-button">
                <img src="assets/img/close-white.png" alt="close" class="close-button__img">
            </button>
        </div><br>
        
        <a href="card.php?id=<?=$get_id?>&del_ok" id="" class="btn-head" >Удалить</a>
    </div>
  </div>
  <!-- МОДАЛЬНОЕ ОКНО УДАЛЕНИЯ -->
    <main>
        <section class="CardOne">
            <div class="container">
                <div class="cardone-content">
                    <img src="<?=$picture['photo']?>" alt="card" class="card-img">
                    <div class="text-card">
                        <h3 class="f24px red"><?=$picture['name']?></h3>
                        <p><?=$picture['size1']?>х<?=$picture['size2']?> см</p>
                        <div class="flexg10px">
                            
                            <p><span class="red">Материал: </span><?=$material['name']?></p>
                            <p><span class="red">Вид: </span><?=$view['name']?></p>
                        </div>
                        <p><span class="red">Художник:  <?=$artist['sirname']?> <?=$artist['name']?></span></p>
                        <?php
                            if($picture['count']!=0){

                           
                        ?>
                        <p class="f24px red"><?=$picture['price']?> ₽</p>
                        <? if($USER['id_level']==1){?>
                        <div class="button-card">
                            <a href="" class="btn-red">Добавить в корзину</a>
                        </div>
                        <? }}?>
                        <?php
                            if($picture['count']==0){

                        ?>
                        <div class="button-card">
                            <p class="btn-red">Продано!</p>
                        </div>
                        <?}
                            if($USER['id_level']==2 || $USER['id']==$picture['id_user']){
                                if(isset($_GET['del_ok'])){
                           
                                    $sql="DELETE FROM painting WHERE id= '$get_id'";
                                    $link->query($sql);
    
                                    $sql="DELETE FROM korz WHERE id_painting= '$get_id'";
                                    $link->query($sql);
                                    echo '<script>document.location.href="Catalog.php"</script>';
                                }

                           
                        ?>
                        <div class="button-card">
                            <button class="btn-red pointer btn-click" id="btn-click">Удалить</button>
                        </div>
                        <? }?>
                    </div>
                </div>
                <div class="title-line">
                    <p class="title red"><span class="yellow-text">П</span>охожие картины</p>
                    <div class="line-title-red"></div>
                </div><br><br>
                <div class="card-content">
                    <?php
                        $id_view=$view['id'];
                        $id_material=$material['id'];
                        $sql="SELECT*FROM painting WHERE id<> '$get_id' AND id_status_painting='2' AND id_view='$id_view' AND id_material='$id_material' LIMIT 0,4";
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
        </section>
    </main>
    <?}
        
    
        elseif($picture['id_status_painting']==1 || $picture['id_status_painting']==3){
            echo '<section><div class="container"><p class="red f24px">Эта картина еще не одобрена администратором</p></div></section>';
        }
    }else{
        echo '<section><div class="container"><p class="red f24px">Нажмите на картину!</p></div></section>';
    }?>
    <div class="line"></div>
    <?php
        include('incl/footer.php');
    ?>
    
</body>
</html>