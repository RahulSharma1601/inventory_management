<!-- Medecine -->

<?php
include('includes/header.php');
if (isset($_POST['done'])) {
    $m_name = $_POST['med_name'];    
    $m_type = $_POST['med_type'];
    $m_desc = $_POST['med_desc'];
    $c_id = $_POST['comp_id'];
    $insert = "INSERT INTO `medicine`(`med_name`, `med_type`, `med_desc`, `comp_id`) VALUES ('$m_name','$m_type','$m_desc','$c_id')";
    $q = mysqli_query($conn, $insert);
    if ($q) {
?>
        <script>
            alert('medicine added succesfully');
            open('medicine.php', _SELF);
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('company added failed');
            open('medicine.php', _SELF);
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
      
        .containers {
            background-color: seashell;
            width: 60%;
            float: left;
            margin-left: 400px;
            margin-top: 70px;
        }
    </style>
</head>
<body>
<a class="med" href="addmed.php">Add medicine</a>

    <div class="containers">
        <div class="col-lg-12">
            <h1 class="text-center">Medicines Lists</h1>
            <table class="table table-striped table-hover table-bordered">
                <tr class="bg-white text-center text-white">
                    <th> id </th>
                    <th>name</th>
                    <th>type</th>
                    <th>description</th>
                    <th>date</th>
                    <th>company id</th>
                    <th>Action</th>
                </tr>
                <?php
                $qu = "select * from medicine inner join company on medicine.comp_id = company.comp_id";
                $meddata = mysqli_query($conn, $qu);
                while ($res = mysqli_fetch_array($meddata)) {
                ?>
                    <tr class="text-center"></tr>

                    <td><?php echo $res['med_id']; ?></td>
                    <td><?php echo $res['med_name']; ?></td>
                    <td><?php echo $res['med_type']; ?></td>
                    <td><?php echo $res['med_desc']; ?></td>
                    <td><?php echo $res['med_dt']; ?></td>
                    <td><?php echo $res['comp_name']; ?></td>
                    <td>
                        <a href="Med-edit.php?med_id=<?php echo $res['med_id'];?>" class="btn btn-success btn-sm">Edit</a>
                        <a href="med-del.php?med_id=<?php echo $res['med_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
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















