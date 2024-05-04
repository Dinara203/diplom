<?php
//session_start();
require('incl/connect.php');
if(isset($_SESSION['USER'])){
    $user_id=$_SESSION['USER'] ['id'];
    $sql="SELECT * FROM user WHERE id='$user_id'";
    $res=$link->query($sql);
    $USER=$res->fetch(2);
}
if(isset($_GET['do'])){
    if($_GET['do'] =='exit'){
        unset($_SESSION['USER']);
        echo '<script>document.location.href="index.php"</script>';
    }
}

?>