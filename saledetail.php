

<?php
include('includes/header.php');
require('db/db_config.php');
   // Assuming you have already established a database connection using `$conn`

   $q = "SELECT s.`pur_id`, s.`pur_dt`, s.`pur_bill`, c.`cust_name`, m.`med_name`, s.`pur_qty`
         FROM `saleing` s
         INNER JOIN `customer` c ON s.`cust_id` = c.`cust_id`
         INNER JOIN `batch` b ON s.`batch_id` = b.`batch_id`
         INNER JOIN `medicine` m ON b.`med_id` = m.`med_id`";

   $salelists = mysqli_query($conn, $q);

   if (!$salelists) {
      // Query execution failed, display an error message
      echo "Error: " . mysqli_error($conn);
   } else {
      // Check if any rows are returned
      if (mysqli_num_rows($salelists) > 0) {
         ?>
         <!DOCTYPE html>
         <html lang="en">
         <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
               .col-lg-12 {
                  padding-left: 261px;
               }
            </style>
         </head>
         <body>
            <div class="container">
               <div class="col-lg-12">
                  <h1 class="text-center">Sale Details</h1>
                  <table class="table table-striped table-hover table-bordered">
                     <tr class="bg-white text-center text-white">
                        <th>id</th>
                        <th>customer name</th>
                        <th>date</th>
                        <th>medicine name</th>
                        <th>Quantity</th>
                        <th>amount</th>
                        <th>print</th>
                     </tr>
                     <?php
                     while ($res = mysqli_fetch_assoc($salelists)) {
                        ?>
                        <tr class="text-center">
                           <td><?php echo $res['pur_id']; ?></td>
                           <td><?php echo $res['cust_name']; ?></td>
                           <td><?php echo date('Y-m-d', strtotime($res['pur_dt'])); ?></td>
                           <td><?php echo $res['med_name']; ?></td>
                           <td><?php echo $res['pur_qty']; ?></td>
                           <td><?php echo $res['pur_bill']; ?></td>
                           <td>
                              <a href="salesbill.php?pur_id=<?php echo $res['pur_id']; ?>">generate bill</a>
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
         <?php
      } else {
         // No rows returned, display a message
         echo "No data found.";
      }
   }

   // Close the database connection
   mysqli_close($conn);
?>