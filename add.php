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
    <title>Онлайн-галлерея современного искусства</title>
</head>
<body>
    <?php
        include('incl/header.php');
    ?>
    <div class="line"></div>
    <?php
    if(isset($_SESSION['USER'])){
        if($USER['id_level']==2){
         
            if(isset($_POST['Add'])){
                $name=$_POST['name'];

                if($_FILES['photo']['size']==0){
                    $error_photo='<p class="f14px red">Вам нужно добавить фото</p>';
                }else{
                    $x = md5(time());
                    $photo = 'assets/img/picture/'.$x.$_FILES['photo']['name'];
                    move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
                }

                $price=$_POST['price'];
                $pricesize=iconv_strlen($price);
                if($pricesize>7){
                    $errorprice='<p class="f14px red">Введите сумму до 1 000 000!</p>';
                }else{
                    $price=$_POST['price'];
                }

                $name=$_POST['name'];
                $namesize=iconv_strlen($name);

                if($namesize>7){
                    $errorname='<p class="f14px red">Введите не больше 40 символов!</p>';
                }else{
                    $name=$_POST['name'];
                }

                $size1=$_POST['size1'];
                $size1size=iconv_strlen($size1);
                $size2=$_POST['size2'];
                $size2size=iconv_strlen($size2);
                if($size1size>4 || $size2size>4){
                    $errorsize='<p class="f14px red">Введите не больше 4 чисел!</p>';
                }else{
                    $size1=$_POST['size1'];
                    $size2=$_POST['size2'];
                }



                if(empty($_POST['name']) || empty($_POST['size1']) || empty($_POST['size2']) || empty($_POST['material']) || empty($_POST['view']) || empty($_POST['price'])){
                    $error='<p class="f14px red">Заполните все данные!</p>';

                }
                
                if(empty($error) && empty($errorname) && empty($error_photo) && empty($errorprice) && empty($errorsize) ){
                   
                    $material=$_POST['material'];
                    $view=$_POST['view'];
                    $data=date('d.m.Y');
                    
                    $user_id=$USER['id'];
            
                    $insert_news_sql = "INSERT INTO painting (photo, name, price, size1, size2, id_view, id_material, id_status_painting, data, count, id_user) VALUES ('$photo','$name','$price', '$size1', '$size2', '$view','$material', '1', '$data', '1', '$user_id')";
                    $link -> query($insert_news_sql);
                    

                    
                    echo '<script>document.location.href="profile.php"</script>';
                    
                }
            }

       
    
    ?>
    <main>
        <section class="Add">
            <div class="container">
                <div class="Add-content">
                    <form action="" class="form-add" method="POST" enctype="multipart/form-data">
                        <div class="const-photo">
                            <label for="files" id="btn-file" class="btn-file">
                                <img src="assets/img/photo.png" alt="photo">
                                <p class="f14px red">Нажмите, чтобы добавить фото</p>
                            </label>
                            <input id="files" accept="image/*" class="input-photo" type="file"  name="photo" value="<?=$photo?>"/>
                            <?=$error_photo?>
                        </div>
                        <div class="inp-form">
                            <input type="text" name="name" placeholder="Название картины*" class="inp-black" value="<?=$name?>">
                            <?=$errorname?>
                            <div class="size">
                                <input type="number" name="size1" placeholder="Ширина картины*" class="inp-black" value="<?=$size1?>">
                                <p>X</p>
                                <input type="number" name="size2" placeholder="Высота картины*" class="inp-black" value="<?=$size2?>">
                                <p>см</p>
                            </div>
                            <?=$errorsize?>
                            <div class="size">
                                <select name="material" class="inp-black">
                                    <option value="0">Материал</option>
                                    <?php
                                        $sql="SELECT * FROM material";
                                        $res=$link->query($sql);
                                        $material=$res->fetchAll();

                                        foreach($material as $materials){?>
                                            <option value="<?=$materials['id']?>"<?=$_POST['material'] == $materials['id'] ? "selected" : ""?>><?=$materials['name']?></option>
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
                                            <option value="<?=$views['id']?>"<?=$_POST['view'] == $views['id'] ? "selected" : ""?>><?=$views['name']?></option>
                                        <?}
                                    ?>
                                </select>
                            </div>
                            <div class="size">
                                <input type="text" name="price" placeholder="Стоимость картины*" class="inp-black" value="<?=$price?>">
                                <p>₽</p>
                            </div>
                            <?=$errorprice?>
                            <?=$error?>
                            <div class="button-card">
                                <input type="submit" name="Add" class="btn-red pointer" value="Добавить картину">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php
     }else{
        echo '<section><div class="container"><p class="red f24px">Вы не художник! Хотите стать художником, напишите на почту "ArtGallery@mail.ru!</p></div></section>';
        echo '<script>document.location.href="index.php"</script>';
    }
    }else{
        echo '<section><div class="container"><p class="red f24px">Вы не художник! Хотите стать художником, напишите на почту "ArtGallery@mail.ru!</p></div></section>';
        echo '<script>document.location.href="index.php"</script>';
    }
    ?>
    <div class="line"></div>
    <?php
        include('incl/footer.php');
    ?>
    
</body>
</html>
