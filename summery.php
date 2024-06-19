<?php
include 'db/db_config.php';
include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
   
   body{
    margin-top: 50px;
  margin-left: 276px;
  margin-right: 2px;
   }
    .table th,
    .table td {
        padding: 8px;
        border: 1px solid #ccc;
    }
    .table th {
        background-color: #f2f2f2;
    }
    .table tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .text-danger {
        color: red;
    }
    .text-warning {
        color: orange;
    }
    .text-success {
        color: green;
    }
</style>
   
</head>

<body cla>

<table class="table table-striped table-hover table-bordered">
    <tr>
        <th>Medicine Name</th>
        <th>Company Name</th>
        <th>Batch ID</th>
        <th>Batch Manufacturer</th>
        <th>Batch Quantity</th>
        <th>Batch Expiry Date</th>
        <th>Price</th>
    </tr>

    <?php
    // Fetch data from the tables
    $medicineQuery = "SELECT m.med_id, m.med_name, c.comp_name, b.batch_id, b.batch_manuf, b.batch_qty, b.batch_exp, b.price
                      FROM medicine m
                      INNER JOIN company c ON m.comp_id = c.comp_id
                      INNER JOIN batch b ON m.med_id = b.med_id";
    $medicineResult = mysqli_query($conn, $medicineQuery);

    // Display the data in the HTML table
    while ($row = mysqli_fetch_assoc($medicineResult)) {
        $exp_date = $row['batch_exp'];
        $class = '';
        
        if ($exp_date < date("Y-m-d")) {
            $class = 'text-danger';
        } elseif (date('Y-m-d', strtotime('+2 months')) >= $exp_date) {
            $class = 'text-warning';
        } else {
            $class = 'text-success';
        }

        echo "<tr>";
        echo "<td>{$row['med_name']}</td>";
        echo "<td>{$row['comp_name']}</td>";
        echo "<td>{$row['batch_id']}</td>";
        echo "<td>{$row['batch_manuf']}</td>";
        echo "<td>{$row['batch_qty']}</td>";
        echo "<td class='$class'>{$row['batch_exp']}</td>";
        echo "<td>{$row['price']}</td>";
        echo "</tr>";
    }
    ?>
</table>
    
</body>
</html>