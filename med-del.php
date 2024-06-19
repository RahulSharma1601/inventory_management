<?php
include 'db/db_config.php';

$med_id = $_GET['med_id'];
$qry = "DELETE FROM `medicine` WHERE med_id = $med_id";
$result = mysqli_query($conn, $qry);

if ($result) {
    echo '<script>alert("Deletion successful"); window.location.href = "medicine.php";</script>';
} else {
    echo '<script>alert("Deletion failed"); window.location.href = "medicine.php";</script>';
}
?>