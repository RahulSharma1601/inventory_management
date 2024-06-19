<?php
require('db/db_config.php');

if (!empty($_SESSION["id"])) {
    header("location: index.php");
}
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $con_password = $_POST["con_password"];
    $duplicate = mysqli_query($conn, "SELECT * FROM user_login WHERE name='$name' OR email='$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo
        "<script> alert('username or email already taken');</script>";
    } else {
        if ($password == $con_password) {
            $query = "INSERT INTO user_login VALUES('','$name','$number','$email','$password','$con_password')";
            mysqli_query($conn, $query);
            echo
            "<script> alert('Registration success');</script>";
        } else {
            echo

            "<script> alert('Password does not match');</script>";
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="register1.css">


</head>

<body>

    <div class="main">

        <div class="form">



            <div class="form-element">



                <h2>Create Your Account</h2>
                <form class="" action="" method="post" autocomplete="off">
                    <label for="name"> Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name"required value="">
            </div>
            <div class="form-element">

                <label for="number">phone Number</label>
                <input type="text" name="number" id="number" placeholder="Enter your mobile number"required value="">
            </div>
            <div class="form-element">

                <label for="email"> E-mail</label>
                <input type="text" name="email" id="email" placeholder="Enter your Email"required value="">
            </div>
            <div class="form-element">

                <label for="password"> Password</label>
                <input type="password" name="password" id="password" placeholder="Enter Password"required value="">
            </div>
            <div class="form-element">


                <label for="con_password"> Confirm Password</label>
                <input type="password" name="con_password" id="con_password" placeholder="Confirm Password" required value="">
            </div>
            <div class="form-element">

                <button type="submit" name="submit">Create</button>
                <a id="back" href="loginpop.php">BACK</a>

            </div>
            </form>

            <br>


        </div>
    </div>

</body>

</html>