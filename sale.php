<?php
require('db/db_config.php');
include('includes/header.php');

// Check if the batch_id parameter exists in the URL
if (isset($_GET['batch_id'])) {
    // Retrieve the batch_id value from the URL
    $batch_id = $_GET['batch_id'];

    // Query the database to fetch the medicine name and batch details based on the batch_id
    $query = "SELECT m.med_id, m.med_name, m.med_comp, m.med_type, m.med_desc, m.med_dt, m.comp_id,
              b.batch_qty, b.batch_exp, b.batch_manuf, b.batch_entdt, b.price
              FROM medicine m
              INNER JOIN batch b ON m.med_id = b.med_id
              WHERE b.batch_id = '$batch_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Medicine found, retrieve the medicine name and batch details
        $med_name = $row['med_name'];
        $batch_qty = $row['batch_qty'];
        $price = $row['price'];
    } else {
        // No medicine found for the specified batch_id
        echo "No medicine found for the specified batch_id.";
        exit;
    }
} else {
    // The batch_id parameter is not present in the URL
    echo "No batch_id parameter found in the URL.";
    exit;
}

if (isset($_POST['done'])) {
    // Retrieve the form data
    $cust_id = $_POST['cust_id'];
    $med_name = $_POST['desc'];
    $saleQty = $_POST['sale_qty'];

    // Retrieve the med_id of the specified medicine
    $medQuery = "SELECT `med_id` FROM `medicine` WHERE `med_name` = '$med_name'";
    $medResult = mysqli_query($conn, $medQuery);
    $medRow = mysqli_fetch_assoc($medResult);

    if (!$medRow) {
        // No medicine found with the specified name
        echo "No medicine found for the specified name.";
    } else {
        $med_id = $medRow['med_id'];

        // Retrieve the batch details based on the med_id
        $batchQuery = "SELECT `batch_id`, `batch_qty`, `batch_exp`, `batch_manuf`,  `med_id`, `batch_entdt`, `price` FROM `batch` WHERE `med_id` = '$med_id'";
        $batchResult = mysqli_query($conn, $batchQuery);
        $batchRow = mysqli_fetch_assoc($batchResult);

        if (!$batchRow) {
            // No batch found for the specified medicine
            echo "No batch found for the specified medicine.";
        } else {
            $batch_id = $batchRow['batch_id'];
            $batch_qty = $batchRow['batch_qty'];
            $price = $batchRow['price'];

            // Check if the Sale Quantity is greater than the Batch Quantity
            if ($saleQty > $batch_qty) {
                echo "<script>alert('Error: Sale Quantity cannot exceed Batch Quantity.');</script>";
            } else {
                // Subtract the Sale Quantity from the Batch Quantity
                $updatedQty = $batch_qty - $saleQty;

                // Check if the updated quantity is less than zero
                if ($updatedQty < 0) {
                    echo "<script>alert('Error: Insufficient quantity. Sale Quantity cannot exceed Batch Quantity.');</script>";
                } else {
                    // Update the Batch Quantity in the batch table
                    $updateBatchQuery = "UPDATE `batch` SET `batch_qty` = '$updatedQty' WHERE `batch_id` = '$batch_id'";
                    mysqli_query($conn, $updateBatchQuery);

                    // Insert the sale details into the saleing table
                    $insertSaleQuery = "INSERT INTO `saleing` (`pur_dt`, `pur_bill`, `cust_id`, `batch_id`, `pur_qty`) VALUES (CURRENT_TIMESTAMP(), '{$_POST['total_price']}', '$cust_id', '$batch_id', '$saleQty')";
                    mysqli_query($conn, $insertSaleQuery);

                    // Display a success message
                    echo "<script>alert('Sale Quantity updated successfully!');</script>";
                    header("Location: batch.php");
                    exit;
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale Form</title>

    <style>
        .containerss {
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
            <form method="post" action="">
                <div class="card">
                    <div class="card-header bg-">
                        <h1 class="text-black text-center">Sale Details</h1>
                    </div>
                    <br>

                    <label>Customer Name:</label>
                    <select name="cust_id" class="form-select">
                        <option value="">Select name</option>
                        <?php
                        $select = "SELECT * FROM `customer`";
                        $qry = mysqli_query($conn, $select);
                        while ($fetch_con_name = mysqli_fetch_assoc($qry)) {
                            ?>
                            <option value="<?= $fetch_con_name['cust_id'] ?>"><?= $fetch_con_name['cust_name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <br>

                    <label>Medicine:</label>
                    <input type="text" name="desc" class="form-control" value="<?php echo $med_name; ?>" required
                        readonly><br>

                    <?php if ($row): ?>
                        <label>Total Quantity:</label>
                        <input type="text" name="total_qty" class="form-control" value="<?php echo $batch_qty; ?>" required
                            readonly><br>

                        <label>Sale Quantity:</label>
                        <input type="text" name="sale_qty" class="form-control" required
                            oninput="calculateTotalPrice()"><br>

                        <label>Price:</label>
                        <input type="text" name="price" class="form-control" value="<?php echo $price; ?>" required
                            readonly><br>

                        <label>Total Price:</label>
                        <input type="text" name="total_price" id="total_price" class="form-control" required readonly><br>

                        <script>
                            // Calculate the initial Total Price on page load
                            document.addEventListener('DOMContentLoaded', function () {
                                calculateTotalPrice();
                            });

                            function calculateTotalPrice() {
                                var totalQty = parseInt(document.getElementsByName("total_qty")[0].value);
                                var price = parseFloat(document.getElementsByName("price")[0].value);
                                var saleQty = parseInt(document.getElementsByName("sale_qty")[0].value);

                                var totalPrice = saleQty * price;

                                if (!isNaN(totalPrice)) {
                                    document.getElementsByName("total_price")[0].value = totalPrice.toFixed(2);
                                } else {
                                    document.getElementsByName("total_price")[0].value = "";
                                }
                            }
                        </script>

                        <div class="card-footer text-center">
                            <input type="submit" name="done" class="btn btn-primary" value="Done">
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger text-center" role="alert">
                            No medicine found for the specified batch_id.
                        </div>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</body>

</html>