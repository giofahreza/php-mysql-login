<?php
    include('required.php');
    if(empty($_SESSION['user_id'])){
        header('Location: index.php');
    }

    echo 'You are logged in. <a href="process.php">Click here</a> to log out.';
    dump($_SESSION);
?>