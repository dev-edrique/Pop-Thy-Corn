<!DOCTYPE html>
<html>
    <head>
        <title>Inventory | Update Form</title>
    </head>

    <body>
        <!-- for populate of inputs -->
        <form action="inventory_update_form.php" method="POST" enctype="multipart/form-data">
            <h1>Edit Product</h1>
            <?php require_once '../../config/dbConfig.php'; ?>

            <label/>Product: 
            <select name="choice">
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
                            <label/>Product ID: 
                            <input type="number" name="product_id" readonly value="<?php echo $row['product_id'] ?>">
                            <br><br>

                            <label/>Product Name: 
                            <input type="text" name="product_name" value="<?php echo $row['product_name'] ?>">
                            <br><br>

                            <label/>Product QTY: 
                            <input type="number" name="product_qty" value="<?php echo $row['product_qty'] ?>">
                            <br><br>

                            <label/>Product Price: 
                            <input type="number" name="product_price" value="<?php echo $row['product_price'] ?>">
                            <br><br>

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

            <input type="submit" value="Edit Product">
        </form>

    </body>
</html>