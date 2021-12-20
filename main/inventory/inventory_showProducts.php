<?php 
        session_start();

        //checking if logged in
        if(!empty($_SESSION['admin_id'])){
            $employee = $_SESSION['admin_id'];
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS Link -->
        <link rel="stylesheet" href="../../css/inv_show.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Inventory | Display Products</title>
    </head>    


    <body>

         <!-- SIDE NAV -->
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <!-- 1ST COLUMN -->
                <div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white" style="width: 220px;"> <svg class="bi me-2" width="40" height="32"> </svg> <img src="../../assets/logo.png" alt=""><h3>Inventory</h3>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                        <li> <a href="inventory_showProducts.php" class="nav-link text-white"> <i class="fa fa-dashboard"></i><span class="ms-2">Inventory</span> </a> </li>
                        <li> <a href="inventory_insert.php" class="nav-link text-white"> <i class="fa fa-first-order"></i><span class="ms-2">Add Products</span> </a> </li>
                        <li> <a href="inventory_update_form.php" class="nav-link text-white"> <i class="fa fa-cog"></i><span class="ms-2">Edit Products</span> </a> </li>
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

                <div class="col">
                    <div class="row justify-content-center">
                        <div class="header">
                            <h1>Inventory</h1>
                        </div>
                    </div><br>

                    <h1>Products</h1>
                    <hr>
                    <div class="row-5 justify-content-center">
                        <table class="table table-striped table-hover">
                            <tr>
                                <td>ID</td>
                                <td>Photo</td>
                                <td>Product Name</td>
                                <td>Price</td>
                                <td>Qty</td>
                                <td></td>
                            </tr>

                            <?php 
                                require_once '../../config/dbConfig.php';

                                $sql = "SELECT * FROM products";
                                $result = $conn->query($sql);

                                //shows products
                                if($result->num_rows > 0){
                                    //displays data from db
                                    while($row = $result->fetch_assoc()){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['product_id'] ?></td>
                                            <?php echo '<td>'."<img src='data:image/jpeg;base64,".base64_encode($row['product_img'])."'width=100px height=100px/>".'</td>'; ?>
                                            <td><?php echo $row['product_name'] ?></td>
                                            <td><?php echo $row['product_price'] ?></td>
                                            <td><?php echo $row['product_qty'] ?></td>
                                            <!-- <td><a href="#" class="btn btn-warning">Update</a> -->
                                            <td><a href="sql/delete.php?delete=<?php echo $row['product_id'] ?>" class="btn btn-danger">Delete</a></td>
                                        </tr>
                                        <?php
                                    }
                                }  
                                else{
                                    echo "<td col-span='6'>No results</td>";
                                }
                                $conn->close();
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    </body>
</html> 
