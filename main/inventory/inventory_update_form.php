<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS Link -->
        <link rel="stylesheet" href="../../css/inv_update.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Inventory | Update Form</title>
    </head>

    <body>

        <div class="container-fluid">
            <div class="row flex-nowrap">
                <div class="d-flex flex-column vh-100 flex-shrink-0 p-3 text-white" style="width: 220px;"> <svg class="bi me-2" width="40" height="32"> </svg><img src="../../assets/logo.png" alt=""><h3>Inventory</h3>
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

                        <!-- 2ND COLUMN -->
                <div class="col">
                    <div class="row">
                        <div class="header">
                            <h1>Edit Products</h1>
                        </div>
                    </div><br>

                        <h2>Update</h2>
                        <hr>
                        <div class="row">
                    <!-- for populate of inputs -->
                    <form action="inventory_update_form.php" method="POST" enctype="multipart/form-data">

                        <?php require_once '../../config/dbConfig.php'; ?>

                        <label/>Product: 
                        <select name="choice"><br>
                            <!-- Show products -->
                            <?php
                                $sql = "SELECT * FROM products";
                                $result = $conn->query($sql);

                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        echo "<option value='".$row['product_id']."'>".$row['product_name']."</option>";
                                    }
                                }
                                else{
                                    echo "<option value=''>EMPTY</option>";
                                }
                            ?>
                        </select>
                        <input type="submit" value="Populate">
                        <br><br>
                    </form>

                    <!-- update -->
                    <form action="sql/update.php" method="POST" enctype="multipart/form-data">
                        
                        <?php 
                            $product_id = "";
                            $product_name = "";
                            $product_qty = "";
                            $product_price = "";

                            //populate inputs
                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                                $sql = "SELECT * FROM products WHERE product_id='".$_POST['choice']."'";
                                $result = $conn->query($sql);

                                
                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){?>
                                        <!-- Populates inputs -->
                                        <div class="col-3">
                                        <label/>Product ID: 
                                        <input type="number" name="product_id" readonly value="<?php echo $row['product_id'] ?>">
                                        <br><br>
                                        </div>

                                        <div class="col-3">

                                        <label/>Product Name: 
                                        <input type="text" name="product_name" value="<?php echo $row['product_name'] ?>">
                                        <br><br>
                                        </div>

                                        <div class="col-3">

                                        <label/>Product QTY: 
                                        <input type="number" name="product_qty" value="<?php echo $row['product_qty'] ?>">
                                        <br><br>
                                        </div>

                                        <div class="col-3">

                                        <label/>Product Price: 
                                        <input type="number" name="product_price" value="<?php echo $row['product_price'] ?>">
                                        <br><br>
                                        </div>





                                        <label>Insert Image: </label><br>
                                        <input type="file" name="image">
                                        <br><br>

                                        <?php
                                    }
                                }  
                            }
                        ?>

                        <!-- <label/>Product ID: 
                        <input type="number" name="product_id" readonly value="<?php echo $row['product_id'] ?>">
                        <br><br> -->

                        <input class="btn btn-warning" type="submit" value="Update Product">
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>