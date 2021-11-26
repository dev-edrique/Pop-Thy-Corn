<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Project</title>
      <!-- CSS Link -->
      <link rel="stylesheet" href="../../css/pos_order.css">
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
                           <i class="fs-4 bi-bootstrap"></i> <span class="ms-1 d-none d-sm-inline">Transaction History</span></a>
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
                  <h1>Post Of Sales</h1>
                  <hr>
               </div>
               <!-- ORDER COLUMN -->
               <div class="container">
                  <div class="col-6">
                     <ul class="order">
                        <div class="row">
                           <div class="col-5">
                                 <li class="cb"> 
                                    <input type="checkbox" id="butterCheck">
                                    <label for="butterCheck"><img src="../../assets/butter.jpg"></label><br><span>Butter - P50</span>
                                    <input class="qty" type="number" id="butterQty">
                                 </li>
                           </div>
                           <div class="col-5">
                                 <li class="cb">
                                    <input type="checkbox" id="cheeseCheck">
                                    <label for="cheeseCheck"><img src="../../assets/cheese.jpg"></label><br><span>Cheese - P60</span>
                                    <input class="qty"t type="number" id="cheeseQty">
                                 </li>
                           </div>
                        </div><br>

                        <div class="row">
                           <div class="col-5">
                                 <li class="cb">
                                    <input type="checkbox" id="caramelCheck">
                                    <label for="caramelCheck"><img src="../../assets/caramel.jpg"></label><br><span>Caramel - P70</span>
                                    <input class="qty" type="number" id="caramelQty">
                                 </li>
                           </div>
                           <div class="col-5">
                                 <li class="cb"  >
                                    <input type="checkbox" id="bbqCheck">
                                    <label for="bbqCheck"><img src="../../assets/bbq.jpg"></label><br><span>Barbecue - P80</span>
                                    <input class="qty" type="number" id="bbqQty">
                                 </li>
                           </div>
                        </div><br>
                        <input class="summ" type="submit" value="Submit Order" onclick="summarizeOrder();return false;"><br>  
                     </ul>
                  </div>

                  <!-- TABLE COLUMN -->
                  <div class="col-7">
                     <div class="row">
                        <!-- ORDER SUMMARY -->
                        <table class="table-responsive-sm">
                           <form action="process.php" method="POST">
                              <tr>
                                 <th>Product</th>
                                 <th>Qty</th>
                                 <th>Price</th>
                              </tr>
                              <tr>
                                 <td><input type="text" readonly value="Butter" name="Butter"></td>
                                 <td><input class="inLab" type="number" readonly id="butterQtyTotal" name="butterQtyTotal"></td>
                                 <td><input class="inLab" type="number" readonly id="butterPriceTotal" name="butterPriceTotal"></td>
                              </tr>
                              <tr>
                                 <td><input type="text" readonly value="Cheese" name="Cheese"></td>
                                       <td><input class="inLab" type="number" readonly id="cheeseQtyTotal" name="cheeseQtyTotal"></td>
                                       <td><input class="inLab" type="number" readonly id="cheesePriceTotal" name="cheesePriceTotal"></td>
                              <tr>
                                 <td><input type="text" readonly value="Caramel" name="Caramel"></td>
                                 <td><input class="inLab" type="number" readonly id="caramelQtyTotal" name="caramelQtyTotal"></td>
                                 <td><input class="inLab" type="number" readonly id="caramelPriceTotal" name="caramelPriceTotal"></td>
                              </tr>
                              <tr>
                                 <td><input type="text" readonly value="Barbeque" name="Barbeque"></td>
                                 <td><input class="inLab" type="number" readonly id="bbqQtyTotal" name="bbqQtyTotal"></td>
                                 <td><input class="inLab" type="number" readonly id="bbqPriceTotal" name="bbqPriceTotal"></td>
                              </tr>
                              <tr>
                                 <td colspan="2" class="center">Total:</td>
                                 <td colspan="2"><input type="text" readonly class="sumOfAll" id="sumOfAll" name="sumOfAll"></td>
                              </tr>
                              <tr>
                                 <td colspan="3"><input type="submit" value="Order" id="orderButton" class="orderButton" disabled=disabled></td>
                              </tr>
                           </form>
                        </table>
                        <!-- Button trigger modal -->
                        <button id="modal" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                           Confirm
                        </button>
                        <button id="cancel" class="btn btn-danger">Cancel</button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                 <div class="modal-header">
                                 <h5 class="modal-title" id="staticBackdropLabel">Confirm Order</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </div>
                                 <div class="modal-body">
                                 ...
                                 </div>
                                 <div class="modal-footer">
                                 <button type="button" class="btn btn-primary">Confirm</button>
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div><!--/row-->
                  </div> <!--/table column-->
               </div><!--/container-->
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