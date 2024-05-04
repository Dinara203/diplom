<?php

try{
    $link = new PDO("mysql:host=localhost; charset=utf8; dbname=OnlineGallery;", 'root', '');
}catch(PDOException $error){
   echo $error;
}
?>