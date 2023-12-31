<?php
    include('required.php');
    if(!empty($_SESSION['user_id'])){
        header('Location: dashboard.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/main.css">
        <title>Meine Sprache</title>
        <script src="assets/js/main.js"></script>

    </head>
    <body>
        <a href="https://api.whatsapp.com/send?phone=4917676043467&text=Hello." class="whatsapp" target="_blank">
            <i class="fa fa-whatsapp"></i>
        </a>



        <!-------------------------------------------------- NAVBAR -------------------------------------------------->

            <div class="navbar">

                <div class="nav-header">
                    <div class="nav-logo">
                        <a href="#">
                            <img src="assets/images/logo.png" alt="logo" style="height: 100px; margin-top: -23px; margin-left: -25px;">
                        </a>
                    </div>
                </div>

                <input type="checkbox" id="nav-check">
                <div class="nav-btn">
                    <label for="nav-check">
                        <span></span>
                        <span></span>
                        <span></span>
                    </label>
                </div>

                <div class="nav-links">
                    <a href="index.php">LOGIN</a>

                    <a href="register.php">REGISTER</a>

                </div>

            </div>
        <!-------------------------------------------------- NAVBAR -------------------------------------------------->


        <!-------------------------------------------------- CONTENT 2 -------------------------------------------------->
        <form class="row form" id="content9" method="POST" action="process.php">
            <div class="col-12" style="margin-bottom: 25px;">
                <h1>REGISTER</h1>
            </div>
            <div class="col-12" style="margin-bottom: 10px; font-weight:600;">
                <label>Username :</label>
                <div class="form-input">
                    <input type="text" name="username" required>
                </div>
            </div>
            <div class="col-12" style="margin-bottom: 10px; font-weight:600;">
                <label>Email :</label>
                <div class="form-input">
                    <input type="email" name="email" required>
                </div>
            </div>
            <div class="col-12" style="margin-bottom: 10px; font-weight:600;">
                <label>Password :</label>
                <div class="form-input">
                    <input type="password" name="password" required>
                </div>
            </div>
            <div class="col-12" style="margin-bottom: 10px; font-weight:600;">
                <label>Retype Password :</label>
                <div class="form-input">
                    <input type="password" name="repassword" required>
                </div>
            </div>
            <div class="col-12" style="margin-bottom: 10px; font-weight:600;">
                <label>Gender :</label>
                <div class="form-input">
                    <input type="radio" name="gender" value="male" id="gender-male" required>
                    <label for="gender-male">Male</label>
                    <br>
                    <input type="radio" name="gender" value="female" id="gender-female" required>
                    <label for="gender-female">Female</label>
                </div>
            </div>
            <div class="col-12" style="margin-bottom: 10px; font-weight:600;">
                <label>Country :</label>
                <div class="form-input">
                    <select name="country" required>
                        <option value="indonesia">Indonesia</option>
                        <option value="germany">Germany</option>
                        <option value="uk">United Kingdom</option>
                        <option value="usa">United State of America</option>
                    </select>
                </div>
            </div>
            <div class="col-12" style="margin-bottom: 10px;">
                <div class="form-input">
                    <input type="checkbox" name="agreement" value="agree" style="width:unset;" id="agreement" required>
                    <label for="agreement">I accept <a href="tc.html" target="_blank">terms and conditions</a></label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-input" style="text-align: right;">
                    <input type="submit" value="register" name="register" style="width:auto;">
                </div>
            </div>
        </form>
        <!-------------------------------------------------- CONTENT 2 -------------------------------------------------->



        <!-------------------------------------------------- CONTENT 3 -------------------------------------------------->
        <div class="row" style="background: #00747A; color:white; padding: 0 30px; white-space: break-spaces;">
            <div class="col-12 col-md-4">
                <p>
Kontakt+49(0)341/3085506
info@myschule.de
Bauhofstraße 3-5
04103 Leipzig
                </p>
            </div>
            <div class="col-12 col-md-4">
                <p>
Öffnungszeiten
Montag
10:00–12:00, 13:00–15:00UhrDienstag
geschlossenMittwoch
10:00–12:00, 13:00–15:00 UhrDonnerstag
09:00–12:00 UhrFreitag
geschlossen
                </p>
            </div>
            <div class="col-12 col-md-4">
                <p>
Telefonzeiten
Montag und Mittwoch
8:00-10:00 Uhr und 13:00-16:00 UhrDienstag und Donnerstag
8:00-12:00 UhrFreitag
8:00-10:00 Uhr
                </p>
            </div>
        </div>
        <!-------------------------------------------------- CONTENT 3 -------------------------------------------------->



    </body>
</html>
