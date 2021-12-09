<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS Link -->
        <link rel="stylesheet" href="../../css/inventory_showProducts.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Inventory | New Product</title>
    </head>    

    <!-- <style>
        img{
            height: 150px;
            width: 150px;
        }
    </style> -->

    <body>

         <!-- SIDE NAV -->
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <!-- 1ST COLUMN -->
                <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0">
                    <img class="logo" src="../../assets/logo.png">
                    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                            <li>
                                <a href="inventory_showProducts.php" class="nav-link px-0 align-middle">
                                    <i class="fs-4"></i><span class="ms-1 d-none d-sm-inline">Inventory</span></a>
                            </li>
                            
                            <li>
                                <a href="inventory_insert.php" class="nav-link px-0 align-middle ">
                                    <i class="fs-4"></i><span class="ms-1 d-none d-sm-inline">Add Products</span></a>
                            </li>

                            <div class="logout">
                                <button type="button" class="btn btn-danger"><img src="https://img.icons8.com/external-others-sbts2018/50/000000/external-logout-social-media-basic-1-others-sbts2018.png" height="30px"/> Log Out</button>
                            </div>
                        </ul>
                        <hr>
                    </div>
                </div>

                <div class="col">
                    <div class="row justify-content-center">
                        <div class="header">
                            <h1>Inventory</h1>
                        </div>
                    </div><br>

                    <h1>Products</h1>
                    <hr>
                    <div class="row justify-content-center">
                        <table class="table table-striped table-hover">
                            <tr>
                                <td>ID</td>
                                <td>Photo</td>
                                <td>Product Name</td>
                                <td>Price</td>
                                <td>Qty</td>
                                <td>Actions</td>
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
                                            <td><a href="#" class="btn btn-warning">Update</a>
                                            <a href="sql/delete.php?delete=<?php echo $row['product_id'] ?>" class="btn btn-danger">Delete</a></td>
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
