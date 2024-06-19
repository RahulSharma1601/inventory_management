<?php
include 'db/db_config.php';

$batch_id =$_GET['batch_id'];
$qryy= "DELETE FROM `batch` WHERE batch_id = $batch_id ";
$result = mysqli_query($conn, $qryy);
// mysqli_query($conn,$qryy);
if ($result) {
    echo '<script>alert("Deletion successful"); window.location.href = "batch.php";</script>';
} else {
    echo '<script>alert("Deletion failed"); window.location.href = "batch.php";</script>';
}
// header('location:batch.php');

?>