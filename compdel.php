<?php
include 'db/db_config.php';
$comp_id =$_GET['comp_id'];
$qryy= "DELETE FROM `company` WHERE comp_id = $comp_id ";
mysqli_query($conn,$qryy);
header('location:company.php');
?>