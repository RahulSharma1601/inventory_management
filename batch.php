<!--batch -->
<?php
include('includes/header.php');
if (isset($_POST['done'])) {
    $b_qty = $_POST['batch_qty'];
    $b_exp = $_POST['batch_exp'];
    $b_manuf = $_POST['batch_manuf'];
    $med_id = $_POST['med_id'];
    $price = $_POST['price'];
    $insert = "INSERT INTO `batch`(`batch_qty`, `batch_exp`, `batch_manuf`,  `med_id`,`price`) VALUES ('$b_qty','$b_exp','$b_manuf','$med_id','$price')";

    $q = mysqli_query($conn, $insert);
    if ($q) {
?>
        <script>
            alert('insert succesfull');
            open('batch.php', _SELF);
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('insert failed');
            open('batch.php', _SELF);
        </script>
<?php
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
    <style>
        .con {
            width: 60%;
            float: left;
            padding: 10px;
            margin-left: 400px;
            margin-top: 0px;
        }

        .aa {
            padding-top: 180px;
            margin: -150px;
            margin-left: -132px;
            margin-right: -155px;
        }
    </style>
</head>

<body>

    <a class="bat" href="addbatch.php">Add batch</a>
    <div class="con">
        <div class="aa log-lg-12">
            <h1 class="text-center">Batch Lists</h1>
            <table class="table table-striped table-hover table-bordered">
                <tr class="bg-white text-center text-white">
                    <th>id</th>
                    <th>quantity</th>
                    <th>expiry date</th>
                    <th>manufacture date</th>
                    <th>medicine name</th>
                    <th>batch entry date</th>
                    <th>Action</th>
                    <th>price</th>

                </tr>
                <?php
                $q = "SELECT * FROM batch INNER JOIN medicine ON batch.med_id = medicine.med_id";
                $query = mysqli_query($conn, $q);
                while ($res = mysqli_fetch_array($query)) {
                    $cnt_date = date("Y-m-d");
                    $exp_date = $res['batch_exp'];
                    $class = '';

                    if ($exp_date < $cnt_date) {
                        $class = 'text-danger';
                    } elseif (date('Y-m-d', strtotime('+2 months')) >= $exp_date) {
                        $class = 'text-warning';
                    } else {
                        $class = 'text-success';
                    }
                ?>

                    <tr class="text center">

                        <td><?php echo $res['batch_id']; ?></td>
                        <td><?php echo $res['batch_qty']; ?></td>

                        <td class="<?= $class ?>"><?php echo $res['batch_exp']; ?></td>
                        <td><?php echo $res['batch_manuf']; ?></td>
                      
                        <td><?php echo $res['med_name']; ?></td>
                        <td><?php echo $res['batch_entdt']; ?></td>
                        <td>
                            <a href="batch-edit.php?batch_id=<?php echo $res['batch_id']; ?>" class="btn btn-success btn-sm">Edit</a>
                            <a href="batch-del.php?batch_id=<?php echo $res['batch_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            <a href="sale.php?batch_id=<?php echo $res['batch_id']; ?>" class="btn btn-danger btn-sm">sale</a>
                        </td>
                        <td><?php echo $res['price']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>