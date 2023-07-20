<?php
    include('required.php');

    if(!empty($_POST['login']) && !empty($_POST['user']) && !empty($_POST['password'])){
        // Prevent SQL Injection
        $sanitized_user = mysqli_real_escape_string($db, $_POST['user']);
        $sanitized_password = md5($_POST['password']);
        // Check the user use username or email
        $column = email_check($_POST['user']) ? 'email' : 'username';
        
        // Get data
        $sql = "SELECT * FROM users WHERE $column='$sanitized_user' AND password='$sanitized_password'";
        $result = mysqli_query($db, $sql) or die(mysqli_error($db));
        $user_data = mysqli_fetch_array($result);

        if($user_data > 0) {
            // Set Session
            $_SESSION = [
                'user_id' => $user_data['id'],
                'logged_at' => date("Y-m-d H:i:s",time()),
            ];
            header("Location:dashboard.php");
        }else{
            header("Location:index.php?a=Email atau Password salah");
        }
    }elseif(!empty($_POST['register'])){
        $check = register_check($_POST);
        if($check != "success") header("Location:register.php?a=$check");
        
        $_POST['password'] = md5($_POST['password']);
        $sql = "INSERT INTO users (username, gender, country, email, password)
                VALUES ('$_POST[username]', '$_POST[gender]', '$_POST[country]', '$_POST[email]', '$_POST[password]')";
        $result = mysqli_query($db, $sql) or die(mysqli_error($db));
        header("Location:index.php?a=Register success. Please login");
    }else{
        session_destroy();
        header("Location:index.php");
    }

?>