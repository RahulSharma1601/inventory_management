<!-- company-->
<?php
include('includes/header.php');
if (isset($_POST['done'])) {
    // print_r($_POST);
    $c_name = $_POST['comp_name'];
    $c_desc = $_POST['desc'];
    $insert = "INSERT INTO `company`(`comp_name`, `comp_desc`) VALUES ('$c_name','$c_desc')";

    $q = mysqli_query($conn, $insert);
    if ($q) {
?>
        <script>
            alert('company added succesfully');
            open('company.php', _SELF);
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('company added failed');
            open('company.php', _SELF);
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
        .containerss{
            /* background-color: skyblue; */
            width: 60%;
            float: right;
            margin-top: 100px;
            margin-right: 100px;
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

                    <label>Add Company Name:</label>
                    <input type="text" name="comp_name" class="form-control"><br>                    

                    <label>Company description:</label>
                    <input type="text" name="desc" class="form-control" required><br>

                    <button class="btn btn-success" type="submit" name="done">submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>