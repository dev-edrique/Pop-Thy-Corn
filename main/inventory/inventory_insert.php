<!DOCTYPE html>
<html>
    <head>
        <title>Inventory | New Product</title>
    </head>    

    <body>
        <form action="inventory_insert.php" method="POST" enctype="multipart/form-data">
            <h1>Add new Product</h1>

            <label>Product Name: </label>
            <input type="text" name="product_name">
            <br><br>

            <label>Product Price: </label>
            <input type="number" name="product_price">
            <br><br>

            <label>Product QTY: </label>
            <input type="number" name="product_qty">
            <br><br><br>

            <label>Insert Image: </label>
            <input type="file" name="image">
            <br><br>

            <input type="submit" value="Add Product">

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
            }
            $conn->close();
            ?>

        </form>

    </body>
</html> 