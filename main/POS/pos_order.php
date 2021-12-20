<?php 
    require_once '../../config/dbConfig.php'; 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>test</title>
    </head>

    <style>
        /* input[type=text], input[type=number]{
            border: 0;
        } */
    </style>

    <body>
        <h1>Order</h1>
        <form action="pos_order.php" method="POST">

        <label/>Search Product: 
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
                </select><br><br>

                <label/>Order Qty: 
                <input type="number" name="orderQty"><br><br>

                <input type="submit" value="Summarize"><br><br><br>
                </form>

                <form action="sql/process.php" method="post">
                <?php
                $product_id = "";
                $product_name = "";
                $product_qty = "";
                $product_price = "";
                $qty = 0;
                $total = 0;

                //populate inputs
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $qty = $_POST['orderQty'];
                    //for the next page
                    $_SESSION['orderQty'] = $qty;

                    $sql = "SELECT * FROM products WHERE product_id='".$_POST['choice']."'";
                    $result = $conn->query($sql);
                    
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){?>
                            <!-- Process for total -->
                            <?php $total = $row['product_price'] * $qty;?>

                            <?php echo '<td>'."<img src='data:image/jpeg;base64,".base64_encode($row['product_img'])."'width=100px height=100px/>".'</td>'; ?><br><br>

                            <!-- Populates inputs -->
                            <label/>Product ID: 
                            <input type="number" name="product_id" readonly value="<?php echo $row['product_id'] ?>">
                            <br><br>

                            <?php $_SESSION['product_qty'] = $row['product_qty'] ?>

                            <label/>Product Name: 
                            <input type="text" name="product_name" value="<?php echo $row['product_name'] ?>">
                            <?php $_SESSION['product_name'] = $row['product_name']; ?>
                            <br><br>

                            <label/>Product Price: 
                            <input type="number" name="product_price" value="<?php echo $row['product_price'] ?>">
                            <br><br>

                            <label/>Total: 
                            <input type="number" name="total" value="<?php echo $total ?>">
                            <?php $_SESSION['total'] = $total; ?>
                            <br><br>

                            <input type="submit" value="Process Order">
                            <br><br>

                            <?php
                        }
                    }  
                }
                ?>
            
        </form>


    </body>

    
</html>