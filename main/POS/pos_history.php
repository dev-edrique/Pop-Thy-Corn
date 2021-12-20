<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Project</title>
      <!-- CSS Link -->
      <link rel="stylesheet" href="../../css/history.css">
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   </head>

   <body>
      <!-- SIDE NAV -->
      <div class="container-fluid">
         <div class="row flex-nowrap">
            <!-- 1ST COLUMN -->
            <div class="d-flex flex-column vh-100 flex-shrink-0 p-3" style="width: 220px;"> <svg class="bi me-2" width="40" height="32"> </svg> <img src="../../assets/logo.png" alt=""><h3>Point of Sales</h3>
               <hr>
               <ul class="nav nav-pills flex-column mb-auto">
                     <li> <a href="pos_order.php" class="nav-link"> <i class="fa fa-dashboard"></i><span class="ms-2">Order</span> </a> </li>
                     <li> <a href="pos_history.php" class="nav-link "> <i class="fa fa-first-order"></i><span class="ms-2">Transaction History</span> </a> </li>
                    
               </ul>
               <div class="logout">
                     <a href="../admin/sql/logout.php">
                        <button type="button" class="btn btn-danger"><img src="https://img.icons8.com/external-others-sbts2018/50/000000/external-logout-social-media-basic-1-others-sbts2018.png" height="30px"/> Log Out</button>
                     </a>
               </div>
               <hr>
               <footer class="text-center text-lg-start">
                     <!-- Copyright -->
                     <div class="text-center p-3">
                        Pop Thy Corn © 2021 Copyright
                     </div>
               <!-- Copyright -->
               </footer>
            </div>
            
            <!-- 2ND COLUMN -->
            <div class="col">
               <div class="row justify-content-center">
                  <div class="header">
                     <h1>Transaction History</h1>
                  </div>
               </div><br>
               <!--Mine-->
               <table class="table table-striped table-hover">
                  <tr>
                     <th>Invoice ID</th>
                     <th>Order Description</th>
                     <th>Total Amount</th>
                     <th>Cash</th>
                     <th>Change</th>
                     <th>Date</th>
                  </tr>

                  <?php 
                     //SQL
                     $conn = new mysqli("localhost", "root" ,"" ,"popthycorn");

                     $sql = "SELECT * FROM invoice";
                     $result = $conn->query($sql);

                     //shows history
                     if($result->num_rows > 0){
                        //displays data from db
                        while($row = $result->fetch_assoc()){
                           echo "<tr>";
                           echo "<td>".$row['invoice_id']."</td>";
                           echo "<td>".$row['order_desc']."</td>";
                           echo "<td>".$row['total_amount']."</td>";
                           echo "<td>".$row['cash']."</td>";
                           echo "<td>".$row['cash_change']."</td>";
                           echo "<td>".$row['date']."</td>";
                           echo "</tr>";
                        }
                     }  
                     else{
                        echo "<td col-span='6'>No results</td>";
                     }
                  ?>
               </table>

            </div><!--/2ND COLUMN-->
         </div> <!--/row flex-nowrap-->
      </div> <!--/container-fluid-->

      <!-- JS Link -->
      <script src="../../js/pos_order.js"></script>

      <!-- Bootstrap Scripts -->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   </body>
</html>