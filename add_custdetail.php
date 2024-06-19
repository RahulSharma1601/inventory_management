<?php
include('includes/header.php');
?>
<?php
if(isset($_POST['done'])){
//  print_r($_POST)

$cus_name=($_POST['cus_name']);
$cus_add=($_POST['cus_add']);
$cus_state=($_POST['cus_state']);
$cus_pin=($_POST['cus_pin']);
$cus_num=($_POST['cus_num']);

$insert="INSERT INTO `customer`( `cust_name`, `cust_add`, `cust_state`, `cust_pin`, `cust_num`) VALUES ('$cus_name','$cus_add','$cus_state','$cus_pin','$cus_num')";
$q=mysqli_query($conn,$insert);
if($q){
?>
<script>

    alert('succes');
    open('purchasebill.php',_SELF)
</script>
<?php
}else{
    ?>
    <script>
    alert('failed');
    open('customer.php',_SELF)
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
    <title>add customer</title>


    <style>

        .card{
            /* padding: auto;
            margin: auto;
            color: green; */
            margin-left: 300px;
            margin-top: 10px;
          
        }
        .conta{
           
            width: 45%;
            float: right;
        }
        .container{
          margin-left: 200px;
          margin-top: 50px;
        }
    </style>
</head>
<body>
   


<div class="container">
        <div class="col-lg-10 ">
            <form method="post" action=""><br>
                <div class="card">
                    <div class="card-header bg-">
                        <h1 class="text-black text-center">Add Customer Detail</h1>
                    </div>
                    <br>


                    <label>Customer Name:</label>
                    <input type="text" name="cus_name" class="form-control" required><br>

                    <label> Address:</label>
                    <input type="text" name="cus_add" class="form-control" required><br>

                    <label>state:</label>
                    <input type="text" name="cus_state" class="form-control" required><br>
                    
                    <label>Pincode:</label>
                    <input type="text" name="cus_pin" class="form-control" required><br>

                    <label>Customer Number:</label>
                    <input type="mobile" id="number" name="cus_num" class="form-control" required><br>




                    <button class="btn btn-success" type="submit" name="done">Add</button>
                </div>
            </form>
        </div>
    </div>
    <div class="conta">
        
    <a href="custsailinglist.php">See Customers Details
    <input type="button">
    </a>
   

    </div>
    
    
</body>
</html>