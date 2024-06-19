<!-- company-->
<?php
include('includes/header.php');
if (isset($_POST['done'])) {
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
      
        .containers{
            width: 49%;
            float: left;
            margin-left: 500px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
<a class="a text-black" href="addcomp.php">Add Company</a>
    <div class="containers">
        <div class="col-lg-11 m-auto">
            <h1 class="text-center">Companies Lists</h1>
            <br>
            <table class="table table-striped table-hover table-bordered">
                <tr class="bg-white text-black">
                    <th>id</th>
                    <th>company</th>
                    <th>description</th>
                    <th>update</th>
                </tr>
                <?php
                $q = "select * from company";
                $query = mysqli_query($conn, $q);

                while ($res = mysqli_fetch_array($query)) {
                ?>
                    <tr class="text-center">

                        <td><?php echo $res['comp_id']; ?></td>
                        <td><?php echo $res['comp_name']; ?></td>
                        <td><?php echo $res['comp_desc']; ?></td>
                        <td><button class="btn-warning btn"><a href="compupdate.php?comp_id=<?php echo $res['comp_id'];?> "class="text-white">update</a></button>
                        <a href="compdel.php?comp_id=<?php echo $res['comp_id'];?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>