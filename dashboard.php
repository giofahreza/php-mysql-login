<?php
    include('required.php');
    if(empty($_SESSION['user_id'])){
        header('Location: index.php');
    }

    dump($_SESSION, false);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Image Upload Form</title>
</head>
<body>
    <p>You are logged in. <a href="process.php">Click here</a> to log out</p>

    <br>
    <h2>Upload Image</h2>
    <form action="process.php" method="POST" enctype="multipart/form-data">
        <label for="image">Choose Image:</label>
        <input type="file" name="image" accept="image/*" required>
        <br>
        <label for="alt_text">Alternate Text:</label>
        <input type="text" name="alt_text" required>
        <br>
        <button type="submit" name="upload" value="1">Upload</button>
    </form>
</body>
</html>