<?php
    include('required.php');
    $main = new main();
    $upload = new upload();

    if(!empty($_POST['login']) && !empty($_POST['user']) && !empty($_POST['password'])){
        $main->login($_POST);
    }elseif(!empty($_POST['register'])){
        $main->register($_POST);
    }elseif(!empty($_POST['upload'])){
        $upload->process();
    }else{
        $main->logout();
    }


?>