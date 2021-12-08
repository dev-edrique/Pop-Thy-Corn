<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Project</title>
      <!-- CSS Link -->
      <link rel="stylesheet" href="../../css/pos_history.css">
      <link rel="stylesheet" href="../../css/general.css">
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   </head>

   <body>
      <!-- SIDE NAV -->
      <div class="container-fluid">
         <div class="row flex-nowrap">
            <!-- 1ST COLUMN -->
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0">
               <img class="logo" src="../../assets/logo.png">
               <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                  <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                     <!-- <li class="nav-item">
                           <a href="#" class="nav-link align-middle px-0">
                              <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                           </a>
                     </li>
                     <li>
                           <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                              <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> 
                           </a>
                     </li> -->
                     <li>
                        <a href="pos_order.php" class="nav-link px-0 align-middle">
                           <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Orders</span></a>
                     </li>
                     <li>
                        <a href="pos_history.php" class="nav-link px-0 align-middle ">
                           <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Transaction History</span></a>
                     <li>
                        <a href="#" class="nav-link px-0 align-middle">
                           <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Total Sales</span></a>
                     </li>

                     <div class="logout">
                     <button type="button" class="btn btn-danger"><img src="https://img.icons8.com/external-others-sbts2018/50/000000/external-logout-social-media-basic-1-others-sbts2018.png" height="30px"/> Log Out</button>
                  </div>
                  </ul>
                  <hr>
               </div>
            </div>
            
            <!-- 2ND COLUMN -->
            <div class="col">
               <div class="header">
                  <h1>Transaction History</h1>
               </div>
               <!--Mine-->
               <table class="center">
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
                           echo "<td>".$row['invoice_id']."</td>";
                           echo "<td>".$row['order_desc']."</td>";
                           echo "<td>".$row['total_amount']."</td>";
                           echo "<td>".$row['cash']."</td>";
                           echo "<td>".$row['cash_change']."</td>";
                           echo "<td>".$row['date']."</td>";
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