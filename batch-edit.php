<!--batch -->
<?php
include('includes/header.php');
if (isset($_POST['done'])) {
    $id=$_GET['batch_id'];
    $b_qty = $_POST['batch_qty'];
    $b_exp = $_POST['batch_exp'];
    $b_batch=$_POST['batch_numb'];
    $b_manuf = $_POST['batch_manuf'];
    $med_id = $_POST['med_id'];
    $price=$_POST['price'];
  
    $q="update batch set batch_id=$id,batch_qty='$b_qty',batch_exp='$b_exp',batch_numb='$b_batch',batch_manuf='$b_manuf',med_id='$med_id',price='$price' where batch_id=$id";
    $query=mysqli_query($conn,$q);
    header('location:batch.php');   
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
    width: 60%;
    float: left;
    padding: 10px;
    margin-left: 400px;
    margin-top: 5px;
}
        
    </style>
</head>

<body>

    <div class="container">
        <div class="col-lg-12    m-auto">
            <form method="post" action=""><br>
                <div clas="card">
                    <div class="card-header bg-white">
                        <h1 class="text-black text-center">Edit Medicine Batch </h1>
                    </div>
                    <br>
                    <label>ID:</label>
                    <input type="number" name="batch_id" class="form-control" ><br>

                    <label>quantity:</label>
                    <input type="number" name="batch_qty" class="form-control" ><br>

                    <label>expiry date:</label>
                    <input type="date" name="batch_exp" class="form-control" required><br>

                    <label>manufacture date:</label>
                    <input type="date" name="batch_manuf" class="form-control" required><br>

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
                    
                    <button class="btn btn-success" type="submit" name="done">update</button>
                    <a href="batch.php" class="btn btn-danger f"  >back</a>
                </div>
            </form>
        </div>
    </div>
</body>   

</html>

