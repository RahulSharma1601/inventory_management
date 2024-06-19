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
      .col-lg-12{  
            margin-left: 100px;
    padding-right: 67px;
    padding-left: 147px;
    margin-top: 68px;
      }
   </style>
</head>

<body>


    <div class="container">
        <div class="col-lg-12">
            <h1 class="text-center">Supplier Lists</h1>
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
                $q = 'select *from supplier';
                $supplists = mysqli_query($conn, $q);
                while ($res = mysqli_fetch_array($supplists)) {
                ?>

                    <tr class="text-center">
                        <td><?php echo $res['supl_id']; ?></td>
                        <td><?php echo $res['supl_name']; ?></td>
                        <td><?php echo $res['supl_add']; ?></td>
                        <td><?php echo $res['supl_state']; ?></td>
                        <td><?php echo $res['supl_pin']; ?></td>
                        <td><?php echo $res['supl_num']; ?></td>

                    </tr>
                <?php
                }
                ?>
            </table>

        </div>
    </div>

</body>

</html>









