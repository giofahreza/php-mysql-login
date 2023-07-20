<?php
    session_start();
    
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'tazkiya');

    $db = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
    function dumping($data, $die=true){
        echo '<pre>';
        var_dump($data);
        echo '</pre>';

        if($die) die();
    }

    function email_check($email){
        if(!empty($email)){
            $email1 = explode("@",$email);
            if(!empty($email1[1])){
                $email2 = explode(".", $email1[1]);
                if(empty($email2[1])){
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
        return true;
    }

    function register_check($data){
        $check = "success";

        // Username check
        if(empty($_POST['username']) || (strlen($_POST['username'])<4 && strlen($_POST['username'])>16) || preg_match('/\s/',$_POST['username']) || !ctype_alpha($_POST['username'])){
            $check = "Please make sure username : contain at least 4 characters and maximum 16 characters, also not contain any spaces / special character / number";
        }
        // Email check
        if(!email_check($_POST['email'])){
            $check = "Please make sure email correct";
        }
        // Password check
        if(empty($_POST['password']) || strlen($_POST['password'])<8 || !preg_match('/[a-z]/', $_POST['password']) || !preg_match('/[A-Z]/', $_POST['password']) || !preg_match('/[0-9]/', $_POST['password']) || !preg_match('/[\'^£$%&*()}{@#~!;:?><>,|=_+¬-]/', $_POST['password']) || preg_match('/\s/',$_POST['password'])){
            $check = "Please make sure password : Must not contain spaces and Must contain at least 8 characters, one lowercase letter, one capital letter, one number, & one special character";
        }
        // Retype Password check
        if(empty($_POST['repassword']) || empty($_POST['password']) != empty($_POST['repassword'])){
            $check = "Please make sure password : Password and Retype password must be equal";
        }
        // Gender check
        if(empty($_POST['gender']) || ($_POST['gender']!='male' && $_POST['gender']!='female')){
            $check = "Please make sure you select gender";
        }
        // Country check
        $country = ['indonesia', 'germany', 'uk', 'usa'];
        if(empty($_POST['country']) || !in_array($_POST['country'], $country)){
            $check = "Please make sure you select country";
        }
        // Agreement check
        if(empty($_POST['agreement']) || $_POST['agreement'] != "agree"){
            $check = "Please agree our T&C first";
        }

        return $check;
    }
?>