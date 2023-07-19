<?php
    include('required.php');

    // if(!empty($_POST['login']) && !empty($_POST['user']) && !empty($_POST['password'])){
    //     // Prevent SQL Injection
    //     $sanitized_user = mysqli_real_escape_string($db, $_POST['user']);
    //     $sanitized_password = md5($_POST['password']);
    //     // Check the user use username or email
    //     $column = email_check($_POST['email']) ? 'email' : 'username';
        
    //     // Get data
    //     $sql = "SELECT * FROM users WHERE $column='$sanitized_user' AND password='$sanitized_password'";
    //     $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    //     $num = mysqli_fetch_array($result);

    //     dumping($num);
            
    //     if($num > 0) {
    //         header("Location:index.html?a=Login Success");
    //     }else{
    //         header("Location:index.html?a=Email atau Password salah");
    //     }
    // }elseif(!empty($_POST['register'])){
    //     $check = register_check($_POST);
    //     if($check != "success") header("Location:register.html?a=$check");
        
    //     $_POST['password'] = md5($_POST['password']);
    //     $sql = "INSERT INTO users (username, gender, country, email, password)
    //             VALUES ('$_POST[username]', '$_POST[gender]', '$_POST[country]', '$_POST[email]', '$_POST[password]')";
    //     $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    //     header("Location:index.html?a=Register success. Please login");
    // }else{
    //     header("Location:index.html?a=404 Page not found");
    // }

    $nama = $_POST['username'];
    echo $nama;
?>