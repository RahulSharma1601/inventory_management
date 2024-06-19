<?php
include('includes/header.php');
require('db/db_config.php');

// Check if the 'pur_id' parameter is set in the URL
if (isset($_GET['pur_id'])) {
   // Get the 'pur_id' value from the URL
   $pur_id = $_GET['pur_id'];

   // Assuming you have already established a database connection using `$conn`
   $q = "SELECT `pur_id`, `pur_dt`, `pur_bill`, `cust_id`, `batch_id`, `pur_qty` FROM `saleing` WHERE `pur_id` = '$pur_id'";
   $saleDetails = mysqli_query($conn, $q);

   if (!$saleDetails) {
      // Query execution failed, display an error message
      echo "Error: " . mysqli_error($conn);
   } else {
      // Check if any rows are returned
      if (mysqli_num_rows($saleDetails) > 0) {
         $res = mysqli_fetch_assoc($saleDetails);
         ?>
         <!DOCTYPE html>
         <html lang="en">

         <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <link rel="stylesheet" href="style.css">
            <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

            <style>
               @media print {
                  .btn {
                     display: none;
                  }

                  .form-control {
                     border: 0px;
                  }

                  #basic-addon1 {
                     border: 0px;

                  }
               }

               .card {
                  background-color: white;
                  opacity: 0.7;
                  padding-right: 10px;
    padding-left:-100px;
    margin-left: 50px;
               }

               .container {
                  margin-right: 20px;
               }
            </style>

            <script>
               function printinvoice() {
                  window.print();
               }

               function BtnAdd() {
                  var v = $("#TRow").clone().appendTo("#TBody")
                  $(v).find("input").val('');
                  $(v).removeClass("d-none");
               }

               function BtnDel(v) {
                  $(v).parent().parent().remove();
               }

               function Calc(v) {
                  var index = $(v).parent().parent().index();
                  var quantity = document.getElementsByName("quantity")[index].value;
                  var price = document.getElementsByName("price")[index].value;
                  var amount = quantity * price;
                  document.getElementsByName("amount")[index].value = amount;
                  GetTotal();
               }

               function total() {
                  var sum = 0;
                  var total = document.getElementsByName("total")
                  for (let index = 0; index < total.length; index++) {
                     var amount = total[index].value;
                     sum = +(sum) + +(amount);
                  }
                  document.getElementById("ftotal").value = sum;
               }
            </script>
         </head>

         <body>
            <div class="container head">
               <div class="card text-center">
                  <div class="head">
                     <h2>MEDICINE SHOP NAME</h2>
                     <h4>North lakhimpur, Assam</h4>
                     <h5>jail road, near police station, ward no-xyz</h5>
                     <h6>Phone no. 1234567890</h6>
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-6">
                           <div class="col-10">
                              <div class="input-group mb-3">
                                 <span class="input-group-text" id="basic-addon1">Invoice No. :</span>
                                 <input type="number" class="form-control" placeholder="no." aria-label="no." aria-describedby="basic-addon1" value="<?php echo $res['pur_id']; ?>" required>
                              </div>
                           </div>
                           <div class="col-9">
                              <div class="input-group mb-3">
                                 <span class="input-group-text" id="basic-addon1">Date :</span>
                                 <input type="date" class="form-control" placeholder="date" aria-label="date" aria-describedby="basic-addon1" value="<?php echo $res['pur_dt']; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="col-10">
                           <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Name :</span>
                              <select name="cust_name" class="form-select">
                                 <?php
                                 // Fetch customer details based on the cust_id from the saleing table
                                 $cust_id = $res['cust_id'];
                                 $q2 = "SELECT `cust_id`, `cust_name` FROM `customer` WHERE `cust_id` = '$cust_id'";
                                 $custDetails = mysqli_query($conn, $q2);
                                 if (mysqli_num_rows($custDetails) > 0) {
                                    $cust = mysqli_fetch_assoc($custDetails);
                                    echo "<option value='" . $cust['cust_id'] . "'>" . $cust['cust_name'] . "</option>";
                                 }
                                 ?>
                              </select>
                           </div>
                           <div class="input-group mb-3">
                              <span class="input-group-text" id="basic-addon1">Address :</span>
                              <input type="text" class="form-control" placeholder="Address" aria-label="Address" aria-describedby="basic-addon1" required><br>
                           </div><br>
                           <div class="col-5">
                              <div class="input-group mb-3">
                                 <span class="input-group-text" id="basic-addon1">City :</span>
                                 <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" required>
                              </div>
                              <div class="input-group mb-3">
                                 <span class="input-group-text" id="basic-addon1">Phone No. :</span>
                                 <input type="number" class="form-control" placeholder="Number" aria-label="Number" aria-describedby="basic-addon1" required>
                              </div>
                           </div>
                        </div>
                        <table class="table table-bordered">
                           <thead class="table-dark">
                              <tr>
                                 <!-- <th scope="col">SL No.</th> -->
                                 <th scope="col" class="text-end">Medicine</th>
                                 <th scope="col" class="text-end">Quantity</th>
                                 <th scope="col" class="text-end">Price</th>
                                 <th scope="col" class="text-end">Amount</th>
                                 <th scope="col" class="noPrint"></th>
                                 <th><button type="button" class="btn btn-warning" onclick="BtnAdd()">+</button></th>
                              </tr>
                           </thead>
                           <tbody id="TBody">
                              <tr id="TRow" class="d-none">
                                 <!-- <th scope="row">1</th> -->
                                 <td>
                                    <select name="comp_id" class="form-select">
                                       <?php
                                       $q3 = "SELECT `comp_id`, `comp_name` FROM `company`";
                                       $compDetails = mysqli_query($conn, $q3);
                                       if (mysqli_num_rows($compDetails) > 0) {
                                          while ($comp = mysqli_fetch_assoc($compDetails)) {
                                             echo "<option value='" . $comp['comp_id'] . "'>" . $comp['comp_name'] . "</option>";
                                          }
                                       }
                                       ?>
                                    </select>
                                 </td>
                                 <td><input type="number" class="form-control text-end" name="quantity" onchange="Calc(this)"></td>
                                 <td><input type="number" class="form-control text-end" name="price" onchange="Calc(this)"></td>
                                 <td><input type="number" id="amounts" class="form-control text-end" name="amount"></td>
                                 <td class="noPrint"> <button type="button" class="btn btn-danger" onclick="BtnDel(this)">X</button></td>
                              </tr>
                              <tr id="TRow">
                                 <th scope="row">1</th>
                                 <td>
                                    <select name="comp_id" class="form-select">
                                       <?php
                                       $q3 = "SELECT `comp_id`, `comp_name` FROM `company`";
                                       $compDetails = mysqli_query($conn, $q3);
                                       if (mysqli_num_rows($compDetails) > 0) {
                                          while ($comp = mysqli_fetch_assoc($compDetails)) {
                                             echo "<option value='" . $comp['comp_id'] . "'>" . $comp['comp_name'] . "</option>";
                                          }
                                       }
                                       ?>
                                    </select>
                                 </td>
                                 <td><input type="number" class="form-control text-end" name="quantity" onchange="Calc(this)"></td>
                                 <td><input type="number" class="form-control text-end" name="price" onchange="Calc(this)"></td>
                                 <td><input type="number" id="amounts" class="form-control text-end" name="amount"></td>
                                 <td class="noPrint"> <button type="button" class="btn btn-danger" onclick="BtnDel(this)">X</button></td>
                              </tr>
                           </tbody>
                        </table>
                        <div class="row">
                           <div class="col-8"></div>
                           <div class="col-4">

                           <div class="input-group mb-3">
                                 <span class="input-group-text" id="basic-addon1">Total amount:-</span>
                                 <input type="number" class="form-control text-end" id="total" name="total" aria-label="Username" aria-describedby="basic-addon1" oninput="GetTotal()" readonly>
                              </div>

                              <div class="input-group mb-3">
                                 <span class="input-group-text" id="basic-addon1">G.S.T :</span>
                                 <input type="number" class="form-control text-end" id="gst" name="gst" aria-label="Username" aria-describedby="basic-addon1" oninput="GetTotal()" value="">
                              </div>
                              
                              <div class="input-group mb-3">
                                 <span class="input-group-text" id="basic-addon1">Net amount:-</span>
                                 <input type="number" class="form-control text-end" id="ftotal" name="ftotal" aria-label="Username" aria-describedby="basic-addon1">
                              </div>
                             
                            
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row mt-4">
                  <div class="col-5"></div>
                  <div class="col-3 noPrint">
                     <button type="button" class="btn btn-primary btn-lg" onclick="printinvoice()">Print</button>
                  </div>
                  <div class="col-3"></div>
               </div>
            </div>
         </body>

         </html>
<?php
      } else {
         // No rows found with the given pur_id
         echo "No sales details found.";
      }
   }
} else {
   // No 'pur_id' parameter found in the URL
   echo "No pur_id parameter found.";
}

include('includes/footer.php');
?>