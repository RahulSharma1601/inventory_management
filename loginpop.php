<?php
require('db/db_config.php');


if (!empty($_SESSION["id"])) {
    header("location: index.php");
}
if (isset($_POST["submit"])) {
    $nameemail = $_POST["nameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM user_login WHERE name ='$nameemail' OR email='$nameemail'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        } else {
            echo
            "<script> alert('wrong password');</script>";
        }
    } else {
        echo
        "<script> alert('user not registered');</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>

<body>
    <h1 class="toptitle">MY INVENTORY</h1>

    <div class="center">
        <a href="register.php"><button id="show-signup">sign-up</button></a>
        <button id="show-login">Login</button>
    </div>




    <form class="popup" action="" method="post" autocomplete="off">
        <div class="close-btn">&times;</div>
        <div class="form">

            <div class="form-element">
                <label for="nameemail">Email</label>
                <input type="text" name="nameemail" id="nameemail" required value="">
            </div>
            <div class="form-element">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required value="">
            </div>
           
        
            <div class="form-element">
                <button type="submit" name="submit">login</button>
            </div>
            <div class="form-element">
                <a href="#">Forgot password?</a>
            </div>
        </div>


        <script src="/loginpop.js"></script>

    </form>



</body>

</html>