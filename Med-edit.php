<!-- Medecine -->

<?php
include('includes/header.php');
if (isset($_POST['done'])) {
    $id=$_GET['med_id'];
    $m_name = $_POST['med_name'];
    $m_type = $_POST['med_type'];
    $m_desc = $_POST['med_desc'];
    $c_id = $_POST['comp_id'];
   $q="update medicine set med_id=$id, med_name='$m_name', med_type='$m_type', med_desc='$m_desc', comp_id='$c_id' where med_id=$id";
   $query =mysqli_query($conn,$q);
   header('location:medicine.php');
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
        * {
            margin: 0;
            padding: 5px;
            box-sizing: border-box;
        }
        .containerss {
            background-color: seashell;
            width: 70%;
            position: absolute;
            margin-left: 15%;

        }

        .card-header {
            background-color: whitesmoke;
        }
    </style>
</head>
<body>
    <div class="containerss">
        <div class="col-log-6 m-auto">
            <form method="post" action=""><br>
                <div clas="card">
                    <div class="card-header bg-">
                        <h1 class="text-black text-center">Edit Medicine </h1>
                    </div>
                    <br>

                    <label>Edit Name:</label>
                    <input type="text" name="med_name" class="form-control" required><br>

                    <label>company name</label>
                    <select name="comp_id" class="form-select">
                    <option value="">--Select name--</option>
                        <?php
                        $select = "SELECT * FROM company";
                        $qry = mysqli_query($conn, $select);
                        while ($fetch_con_name = mysqli_fetch_assoc($qry)) {
                            $comp_id = $fetch_con_name['comp_id'];
                            $comp_name = $fetch_con_name['comp_name'];
                            $comp_desc = $fetch_con_name['comp_desc'];
                            $selected = ($comp_id == $row['comp_id']) ? 'selected' : '';

                            echo '<option value="' . $comp_id . '" ' . $selected . '>' . $comp_name . '</option>';
                        }
                        ?>
                    </select>
                    <br>

                    <label for="type">choose types</label>
                    <select name="med_type" class="form-control">
                    <option value="">--Select name--</option>
                    <option value="tablets">tablets</option>
                        <option value="liquid">liquids</option>
                        <option value="liquid">capsules</option>
                        <option value="liquid">creams</option>
                        <option value="liquid">patches</option>
                    </select>
                    <br>

                    <label>description:</label>
                    <input type="text" name="med_desc" class="form-control" required><br>
                    <button class="btn btn-success" type="submit" name="done">Update</button>
                    <a href="medicine.php" class="btn btn-danger ">back</a>
                </div>
            </form>
        </div>
    </div>


















</body>

</html>