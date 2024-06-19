<!--batch -->
<?php
include('includes/header.php');
if (isset($_POST['done'])) {
    // print_r($_POST);
    $b_id = $_POST['batch_id'];

    $b_qty = $_POST['batch_qty'];
    // $b_dt = $_POST['batch_dt'];
    $b_exp = $_POST['batch_exp'];
    $b_manuf = $_POST['batch_manuf'];
    // $b_stock = $_POST['batch_stock'];
    $med_id = $_POST['med_id'];
    $price=$_POST['price'];

    
    $insert = "INSERT INTO `batch`(`batch_id`,`batch_qty`, `batch_exp`, `batch_manuf`,  `med_id`,`price`) VALUES ('$b_id','$b_qty','$b_exp','$b_manuf','$med_id','$price')";
   
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
      
        .container {
            /* background-color: skyblue; */
            width: 50%;
            float: right;
            margin-top: 50px;
            margin-right: 400px;
        }
      
    </style>
</head>

<body>




    <div class="container">
        <div class="col-lg-12    m-auto">
            <form method="post" action=""><br>
                <div clas="card">
                    <div class="card-header ">
                        <h1 class="text-black text-center">Add Batch detail </h1>
                    </div>
                    <br>
                    <label>id:</label>
                    <input type="number" name="batch_id" class="form-control" ><br>

                    <label>quantity:</label>
                    <input type="number" name="batch_qty" class="form-control" ><br>

                    <!-- <label>date:</label>
                    <input type="text" name="batch_dt" class="form-control"><br> -->

                    <label>expiry date:</label>
                    <input type="date" name="batch_exp" class="form-control" required><br>

                    <label>manufacture date:</label>
                    <input type="date" name="batch_manuf" class="form-control" required><br>

                    <!-- <label>stock:</label>
                    <input type="number" name="batch_stock" class="form-control" required><br> -->

                    <!-- <label>medicine company:</label>
                    <input type="text" name="med_id" class="form-control"><br> -->

                    <label>medicine name</label>
                    <select name="med_id" class="form-select">
                    <option value="">--Select name--</option>

                        <?php
                        $select = "select * from medicine";
                        $qrry = mysqli_query($conn, $select);
                        while ($fetch_med_name = mysqli_fetch_assoc($qrry)) {
                        ?>
                            <option value="<?= $fetch_med_name['med_id'] ?>"><?= $fetch_med_name['med_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    
                    <br>
                    <label>price:</label>
                    <input type="number" name="price" class="form-control" required><br>
                    


                    <button class="btn btn-success" type="submit" name="done">submit</button>
                </div>
            </form>
        </div>
    </div>
   



</body>

</html>

