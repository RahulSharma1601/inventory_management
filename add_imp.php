


<?php
include('includes/header.php');
// if (isset($_POST['done'])) {
//     $supl_nam=$_POST['supl_id'];
//     $batch_id=$_POST['batch_id'];
//     $imp_bill=$_POST['imp_bill'];
//     $desc=$_POST['desc'];
//     $qty=$_POST['qty'];
//     $insert="INSERT INTO `imports`( `supl_id`, `batch_id`, `imp_bill`, `imp_disc`, `imp_qty`) VALUES ('$supl_nam','$batch_id',' $imp_bill','$desc','$qty')";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        .card{
            margin-left: 256px;
    /* padding-top: 50px; */
    margin-right: 6px;
    
}
.sup{
    margin-left: 1000px;
}
        
    </style>
</head>
<body>
    <a class="sup" href="suppdetail.php">Add New Supplier</a>
<div class="container">
        <div class="col-lg-10 ">
            <form method="post" action=""><br>
                <div class="card">
                    <div class="card-header bg-white">
                        <h1 class="text-black text-center">Add Import Detail</h1>
                    </div>
                    <br>


                    <label>Supplier Name:</label>
                    
                    <select name="supl_id" class="form-select">
                        <option value="">--Select name--</option>
                        <?php
                        $select = "select * from supplier";
                        $qry = mysqli_query($conn, $select);
                        while ($fetch_supl_name = mysqli_fetch_assoc($qry)) {
                        ?>
                            <option value="<?= $fetch_supl_name['supl_id'] ?>"><?= $fetch_supl_name['supl_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br>

                    <label> Batch no.</label>
                    <select name="batch_id" class="form-select">
                    <?php
                        $select = "select * from batch";
                        $qry = mysqli_query($conn, $select);
                        while ($fetch_batch_id = mysqli_fetch_assoc($qry)) {
                        ?>
                            <option value="<?= $fetch_batch_id['batch_id'] ?>"><?= $fetch_batch_id['batch_id'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br>
                   

                    <label>total Bill</label>
                    <input type="text" name="imp_bill" class="form-control" required><br>

                    <label>quantity</label>
                    <input type="number" name="qty" class="form-control" required><br>

                    <label>Discount</label>
                    <input type="text" name="desc"  class="form-control" required><br>

                    <button class="btn btn-success" type="submit" name="done">submit</button>
                </div>
            </form>
            
<?php
//include('includes/header.php');
if (isset($_POST['done'])) {
    $supl_nam=$_POST['supl_id'];
    $batch_id=$_POST['batch_id'];
    $imp_bill=$_POST['imp_bill'];
    $desc=$_POST['desc'];
    $qty=$_POST['qty'];
    $insert="INSERT INTO `imports`( `supl_id`, `batch_id`, `imp_bill`, `imp_disc`, `imp_qty`) VALUES ('$supl_nam','$batch_id',' $imp_bill','$desc','$qty')";

    $q = mysqli_query($conn, $insert);
    if ($q) {
?>
        <script>
            alert(' succesfully');
            open('medicine.php', _SELF);
        </script>
    <?php
    } else {
    ?>
        <script>
            alert(' failed');
            open('medicine.php', _SELF);
        </script>
<?php
    }
}
?>
        </div>
    </div>
    
</body>
</html>