<?php

include("includes/header.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            margin-top: 2%;
        }
         .caps{
            color: blue;
            text-align: center;
            margin-bottom: 2%;
        }
        .rows{
            background-color: skyblue;
            text-align: center;
        }
        .btn{
            float: right;
            margin-top: 1%;
        }

            
    </style>
</head>

<body>
    <div class="container">
        <div class="col-lg-12">
            <h1 class="caps"> <a href="custdetail.php" class="btn btn-danger ">Back</a> BILL DETAILS</h1>
            <table class="table table-striped table-hover table-bordered">
                <tr class="rows">

                    <td>Date</td>
                    <td>Total Bill</td>
                    <td>Name</td>
                    <td>Medicine</td>
                    <td>Discount</td>
                    <td>Quantity</td>
                </tr>
                <?php
                $q = "select * from saleing";
                $saledata = mysqli_query($conn, $q);
                while ($res = mysqli_fetch_array($saledata)) {

                ?>
                    <tr class="text-center">
                        <td><?php echo $res["pur_dt"]; ?></td>
                        <td><?php echo $res["pur_bill"]; ?></td>
                        <td><?php echo $res["cust_id"]; ?></td>
                        <td><?php echo $res["batch_id"]; ?></td>
                        <td><?php echo $res["pur_disc"]; ?></td>
                        <td><?php echo $res["pur_qty"]; ?></td>






                    </tr>



                <?php










                }

                ?>



            </table>
        </div>
    </div>







</body>

</html>