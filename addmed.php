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
        .containerss {
            width: 40%;
            float: right;
            margin-right: 500px;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="containerss">
        <div class="col-log-6 m-auto">
            <form method="post" action=""><br>
                <div clas="card">
                    <div class="card-header bg-">
                        <h1 class="text-black text-center">Add Medicine </h1>
                    </div>
                    <br>
                    <label>Name:</label>
                    <input type="text" name="med_name" class="form-control" required><br>

                    <label>company name</label>
                    <select name="comp_id" class="form-select">
                    <option value="">--Select name--</option>
                        <?php
                        $select = "select * from company";
                        $qry = mysqli_query($conn, $select);
                        while ($fetch_con_name = mysqli_fetch_assoc($qry)) {
                        ?>
                            <option value="<?= $fetch_con_name['comp_id'] ?>"><?= $fetch_con_name['comp_name'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br>


                    <label for="type">choose types</label>
                    
                    <select name="med_type" class="form-control">
                    <option value="">--Select type--</option>
                        <option value="tablets">tablets</option>
                        <option value="liquid">liquids</option>
                        <option value="liquid">capsules</option>
                        <option value="liquid">creams</option>
                        <option value="liquid">patches</option>
                    </select>
                    <br>

                    <label>description:</label>
                    <input type="text" name="med_desc" class="form-control" required><br>
                    <button class="btn btn-success" type="submit" name="done">submit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>