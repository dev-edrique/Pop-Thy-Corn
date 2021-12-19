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
        <link rel="stylesheet" href="../../css/inventory_showProducts.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Inventory | New Product</title>
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
                            <li>
                                <a href="inventory_showProducts.php" class="nav-link px-0 align-middle">
                                    <i class="fs-4"></i><span class="ms-1 d-none d-sm-inline">Inventory</span></a>
                            </li>

                            <li>
                                <a href="inventory_insert.php" class="nav-link px-0 align-middle ">
                                    <i class="fs-4"></i><span class="ms-1 d-none d-sm-inline">Add Products</span></a>
                            </li>

                            <li>
                                <a href="inventory_update_form.php" class="nav-link px-0 align-middle ">
                                    <i class="fs-4"></i><span class="ms-1 d-none d-sm-inline">Update Product</span>
                                </a>
                            </li>

                            <div class="logout">
                                <a href="../admin/sql/logout.php">
                                    <button type="button" class="btn btn-danger"><img src="https://img.icons8.com/external-others-sbts2018/50/000000/external-logout-social-media-basic-1-others-sbts2018.png" height="30px"/> Log Out</button>
                                </a>
                            </div>
                        </ul>
                        <hr>
                    </div>
                </div> 
                <!-- 2ND COLUMN -->
                <div class="col">
                    <div class="row justify-content-center">
                        <div class="header">
                            <h1>Inventory</h1>
                        </div>
                    </div><br>

                    <h1>Add new Product</h1>
                    <hr>
                    <div class="row align-items-center">
                        <form action="inventory_insert.php" method="POST" enctype="multipart/form-data">

                            <div class="col">
                                <label>Product Name: </label><br>
                                <input type="text" name="product_name">
                            </div>

                            <div class="col">
                                <label>Product Price: </label><br>
                                <input type="number" name="product_price">
                            </div>

                            <div class="col">
                                <label>Product Quantity: </label><br>
                                <input type="number" name="product_qty">
                            </div>

                            <label>Insert Image: </label><br>
                            <input type="file" name="image">
                            <br><br>

                            <input class="btn btn-warning" type="submit" value="Add Product">
                            
                            <?php 
                                require_once '../../config/dbConfig.php';

                                //variables
                                $product_name = "";
                                $product_price = "";
                                $product_qty = "";
                                $errors = [];

                                if($_SERVER["REQUEST_METHOD"] == "POST"){
                                    $product_name = $_POST['product_name'];
                                    $product_price = $_POST['product_price'];
                                    $product_qty = $_POST['product_qty'];

                                    //if empty

                                    //proceed if no errors
                                    if(count($errors) == 0){
                                        if(!empty($_FILES['image']['tmp_name'])){
                                            $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                            $imageProperties = getimageSize($_FILES['image']['tmp_name']);

                                            $sql = "INSERT INTO products (product_name, product_price, product_qty, product_img) VALUES 
                                            ('".$product_name."', '".$product_price."', '".$product_qty."', '".$imgData."')";

                                            if($conn->query($sql)){
                                                echo "<script> alert('Product added!');</script>";
                                            }
                                            else{
                                                echo "<script> alert('Product failed to add');</script>";
                                                    
                                            }
                                        }
                                        //insert blank img
                                        else{
                                            $path = "default/empty.jpg";
                                            $imgData = addslashes(file_get_contents($path));
                                            $imageProperties = getimageSize($path);

                                            $sql = "INSERT INTO products (product_name, product_price, product_qty, product_img) VALUES 
                                            ('".$product_name."', '".$product_price."', '".$product_qty."', '".$imgData."')";

                                            if($conn->query($sql)){
                                                echo "<script> alert('Product added!');</script>";
                                            }
                                            else{
                                                echo "<script> alert('Product failed to add');</script>";
                                                    
                                            }
                                        }

                                    }
                                }
                                $conn->close();
                            ?>

                        </form>
                    </div>
                </div>       
            </div>    
        </div> 

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html> 
