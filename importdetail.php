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
        .container {
            /* margin-left: 300px; */
            tab-size: 10px;
            padding: 104px;
            margin-left: 200px;
            margin-top: -81px;




        }

        .heaa {

            margin-left: 130px;
        }

        .aa {
            margin-left: 600px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="col-lg-12">
            <h1 class="text-center">Import list</h1>
            <table class="table table-striped table-hover table-bordered">
                <tr class="bg-white text-center text-white">


                    <th>id</th>
                    <th>supllier name</th>
                    <th>batch ID</th>
                    <th>import date</th>
                    <th>Bill</th>
                    <th>Discount</th>
                    <th>quantity</th>




                </tr>

                <?php
                $q = 'select * from imports';
                $importdetails = mysqli_query($conn, $q);
                while ($res = mysqli_fetch_array($importdetails)) {

                ?>
                    <tr class="text-center">
                        <td><?php echo $res['imp_id']; ?></td>
                        <td><?php echo $res['supl_id']; ?></td>
                    
                        <td><?php echo $res['batch_id']; ?></td>
                        <td><?php echo $res['imp_dt']; ?></td>
                        <td><?php echo $res['imp_bill']; ?></td>
                        <td><?php echo $res['imp_disc']; ?></td>
                        <td><?php echo $res['imp_qty']; ?></td>



                    </tr>

                <?php


                }

                ?>
        </div>


    </div>
    

    <div class="aa">
        <a href="add_imp.php">Add import detail</a>
        <a href="supplist.php">See Supplier Details</a>
    </div>
</body>

</html>