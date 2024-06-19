<?php

include("includes/header.php");
?>
<?php
if (isset($_POST['done'])) {

    $sup_name = ($_POST['sup_name']);
    $sup_add = ($_POST['sup_add']);
    $sup_state=($_POST['sup_state']);
    $sup_pin=($_POST['sup_pin']);
    $sup_num = ($_POST['sup_num']);

    $insert = "INSERT INTO `supplier`(`supl_name`, `supl_add`, `supl_state`, `supl_pin`, `supl_num`) VALUES ('$sup_name','$sup_add','$sup_state','$sup_pin','$sup_num')";

    $q = mysqli_query($conn, $insert);
    if ($q) {
?>
        <script>
            alert("succes")
            open("suppdetail.php", _SELF)
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("succes")
            open("suppdetail.php", _SELF)
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
    <title>add supplier</title>
    <style>
        .connt {

            width: 25%;
            float: right;
        }
        .container{
            margin-left: 300px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="col-lg-10 ">
            <form method="post" action=""><br>
                <div clas="card">
                    <div class="card-header bg-white">
                        <h1 class="text-black text-center">Add Supplier</h1>
                    </div>
                    <br>


                    <label>Supplier Name:</label>
                    <input type="text" name="sup_name" class="form-control" required><br>

                    <label> Address:</label>
                    <input type="text" name="sup_add" class="form-control" required><br>

                    <label>state:</label>
                    <input type="text" name="sup_state" class="form-control" required><br>

                    <label>pincode:</label>
                    <input type="number" name="sup_pin" class="form-control" required><br>

                    <label>Number:</label>
                    <input name="mobile" name="sup_num" id="number" type="number" class="form-control" required><br>

                    <button class="btn btn-success" type="submit" name="done">submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="connt">
        <a href="supplist.php">Supplier Details</a>
    </div>
</body>
</html>