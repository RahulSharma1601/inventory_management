<?php

include("includes/header.php");

require('db/db_config.php');

if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM user_login WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("location: loginpop.php");
}



?>
<?php
include("includes/header.php");
require('db/db_config.php');

$res = mysqli_query($conn, 'SELECT SUM(imp_disc) AS value_sum FROM imports');
$row = mysqli_fetch_assoc($res);
$sumDiscount = $row['value_sum'];

$res = mysqli_query($conn, 'SELECT SUM(pur_bill) AS value_add FROM saleing');
$row = mysqli_fetch_assoc($res);
$sumprofit = $row['value_add'];

$res = mysqli_query($conn, 'SELECT SUM(imp_bill) AS value_add FROM imports');
$row = mysqli_fetch_assoc($res);
$sum = $row['value_add'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="new.css">
</head>
<style>
    .card {
        background: #fff;
        text-align: center;
        padding: 30px 25px;
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.07);
        border-radius: 20px;
        margin-bottom: 30px;
        border: 5px solid rgba(0, 0, 0, 0.07);
        -webkit-transition: all 0.5s ease 0s;
        transition: all 0.5s ease 0s;
        margin-top: px;

    }

    .card-body1 {
        color: green;
        padding: 3%;
        margin: 3%;
        margin-left: 3px;

    }

    .head {
        text-align: center;
        margin-bottom: 8%;
        margin-top: 3%;
        text-decoration: solid;
        color: darkmagenta;
        margin-left: 250px;
    }

   
</style>

<body>
    <div class="page-content p-5" id="content">
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>
        <h2 class="display text-black">Medicine stock management</h2>
        <p class="lead text-black mb-0">Summery of stocks</p>
        <p class="text-black">-----------------------------------------------------------------------------------------------------------------------------------------------------------</p>
        <div class="container">
            <div class="card-group">
                <div class="card">
                    <div class="card-body1">
                        <?php
                        $select = "SELECT * FROM `saleing`";
                        $qry = mysqli_query($conn, $select);
                        $count = mysqli_num_rows($qry);
                        ?>
                        <h5 class="card-title">Total Sales</h5>
                        <h2>
                            <p class="card-text"><?= $count ?></p>
                        </h2>
                        <h5 class="card-title">Total Amount</h5>
                        <h2 class="text-green"><?php echo $sumprofit ?></h2>

                        <p class="card-text"></p>
                    </div>
                </div><br>
                <div class="card">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body1">
                        <h5 class="card-title">Profits</h5>
                        <h2 class="text-green"><?php echo $sumDiscount ?></h2>

                        <p class="card-text"></p>
                        <p class="card-text"><small class="text-body-secondary"></small></p>
                    </div>
                </div><br>
                <div class="card">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body1">
                        <h5 class="card-title">Total Purchase</h5>
                        <h2 class="text-green"><?php echo $sum ?></h2>
                        <p class="card-green"></p>
                        <p class="card-text"><small class="text-body-secondary"></small></p>
                    </div>
                </div>
                <br>
                <div class="card">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body1">
                        <h5 class="card-title">Discounts</h5>

                        <p class="card-text"></p>
                        <h2 class="text-green"><?php echo $sumDiscount ?></h2>
                        <p class="card-text"><small class="text-body-secondary"></small></p>
                    </div>
                </div>
            </div>
        </div>
    <div class="separator"></div>
    </div>
    </div>
    <?php
    include('includes/footer.php');
    ?>