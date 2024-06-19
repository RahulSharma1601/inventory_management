<!--update company-->
<?php
include('includes/header.php');
if (isset($_POST['done'])) {
    // print_r($_POST);
    // $id = $_GET['comp_id'];
    $c_name = $_POST['comp_name'];
    $c_desc = $_POST['desc'];
    // $insert = "INSERT INTO `company`(`comp_name`, `comp_desc`) VALUES ('$c_name','$c_desc')";
    $q = "update company set  comp_name='$c_name', desc='$c_desc' where comp_id=$id";
    $query = mysqli_query($conn, $q);
    header('location:company.php');
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
     
    
        .containerss {
            width: 50%;
            float: right;
            margin-right: 400px;
            border-radius: 5%;
            margin-top: 50px;
            margin-left: 100px;
        }

      
    </style>
</head>
<body>
    <div class="containerss">
        <div class="col-lg-10 ">
            <form method="post" action=""><br>
                <div clas="card">
                    <div class="card-header bg-">
                        <h1 class="text-black text-center">Add Company</h1>
                    </div>
                    <br>

                    <label>company:</label>
                    <input type="text" name="comp_name" class="form-control"><br>

                    <label>description:</label>
                    <input type="text" name="desc" class="form-control" required><br>


                    <button class="btn btn-success" type="submit" name="done">Update</button>
                    <a href="company.php" class="btn btn-danger ">back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>