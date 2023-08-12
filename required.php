<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    session_start();
    
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'tazkiya');

    if (!function_exists('dump')) {
        function dump($data, $die=true){
            echo '<pre>';
            var_dump($data);
            echo '</pre>';

            if($die) die();
        }
    }

    if (!function_exists('email_check')) {
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
    }

    if (!function_exists('register_check')) {
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
    }

    class Database {
        // Set mysqli
        public function mysqli() {
            // Connect to MySQL DBMS
            // $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $db = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();
            // return database handler
            return $db;
        }
    
        // Set PDO
        public function pdo() {
            $config = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
            $host = 'mysql:host='.DB_HOST.';dbname='.DB_NAME;
            $user = DB_USER;
            $pass = DB_PASS;
            
            try{
                $pdo = new PDO($host, $user, $pass, $config);
            }catch(PDOException $ex){
                dump('Failed to connect database. Please check your database configuration.');   
            }
            return $pdo;
        }
    }

    class main{
        private $mysql;
        private $pdo;

        public function __construct(){
            $database = new Database();
            $this->mysql = $database->mysqli();
            $this->pdo = $database->pdo();
        }

        public function login(){
            // Check the user use username or email
            $column = email_check($_POST['user']) ? 'email' : 'username';
            
            // Get data
            $sql = "SELECT * FROM users WHERE $column='".mysqli_real_escape_string($this->mysql, $_POST['user'])."'";
            $result = mysqli_query($this->mysql, $sql) or die(mysqli_error($this->mysql));
            $user_data = mysqli_fetch_array($result);

            // Check user exist and check if password equal with db
            if($user_data > 0 && password_verify($_POST['password'], $user_data['password'])) {
                // Set Session
                $_SESSION = [
                    'user_id' => $user_data['id'],
                    'logged_at' => date("Y-m-d H:i:s",time()),
                ];
                header("Location:dashboard.php");
            }else{
                header("Location:index.php?a=Email atau Password salah");
            }
        }

        public function register(){
            $check = register_check($_POST);
            if($check != "success") header("Location:register.php?a=$check");
            
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, gender, country, email, password)
                    VALUES ('$_POST[username]', '$_POST[gender]', '$_POST[country]', '$_POST[email]', '$_POST[password]')";
            $result = mysqli_query($this->mysql, $sql) or die(mysqli_error($this->mysql));
            header("Location:index.php?a=Register success. Please login");
        }

        public function logout(){
            session_destroy();
            header("Location:index.php");
        }
    }
?>