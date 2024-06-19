<!--print customer data -->

<?php
include("includes/header.php")
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .btn{
            float: right;
            margin-top: 1%;
        }
        .col-lg-12{
            padding-left: 300px;
        }
    </style>
</head>

<body>


    <div class="container">
        <div class="col-lg-12">
            <h1 class="text-center"><a href="custdetail.php" class="btn btn-danger">back</a> Customer Lists</h1>
            
            <table class="table table-striped table-hover table-bordered">
                <tr class="bg-white text-center text-white">

                    <th>id</th>
                    <th>Name</th>
                    <th>address</th>
                    <th>state</th>
                    <th>pincode</th>
                    <th>number</th>
                </tr>

                <?php
                $q = 'select *from customer';
                $customer = mysqli_query($conn, $q);
                while ($res = mysqli_fetch_array($customer)) {
                ?>

                    <tr class="text-center">
                        <td><?php echo $res['cust_id']; ?></td>
                        <td><?php echo $res['cust_name']; ?></td>
                        <td><?php echo $res['cust_add']; ?></td>
                        <td><?php echo $res['cust_state']; ?></td>
                        <td><?php echo $res['cust_pin']; ?></td>
                        <td><?php echo $res['cust_num']; ?></td>

                    </tr>
                <?php
                }
                ?>
            </table>








        </div>
    </div>




</body>

</html>