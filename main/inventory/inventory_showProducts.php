<!DOCTYPE html>
<html>
    <head>
        <title>Inventory | New Product</title>
        <!--CSS-->
        <link rel="stylesheet" href="../../css/general.css">
    </head>    

    <style>
        img{
            height: 150px;
            width: 150px;
        }
    </style>

    <body>
        <h1>Products</h1>

        <table class="center">
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
                        <?php echo '<td>'."<img src='data:image/jpeg;base64,".base64_encode($row['product_img'])."'/>".'</td>'; ?>
                        <td><?php echo $row['product_name'] ?></td>
                        <td><?php echo $row['product_price'] ?></td>
                        <td><?php echo $row['product_qty'] ?></td>
                        <td><a href="#">Update</a></td>
                        <td><a href="sql/delete.php?delete=<?php echo $row['product_id'] ?>">Delete</a></td>
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

    </body>
</html> 