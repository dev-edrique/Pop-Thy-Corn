<?php 
    require_once "../../../config/dbConfig.php";
    session_start();

    $order = $_SESSION['product_name'];
    $qty = $_SESSION['orderQty'];
    $total = $_SESSION['total'];
    $product_qty = $_SESSION['product_qty'];
    
    $summary = $order." ".$qty." pc(s)";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Title</title>
    </head>

    <body>
        <form action="process2.php" method="post">
            <label/>Order: 
            <input type="text" name="orders" value="<?php echo $summary ?>" readonly>
            <br><br>

            <label/>Total: P
            <input type="number" name="total" value="<?php echo $total; ?>" readonly>
            <br><br>

            <label/>Cash: 
            <input type="number" name="cash">
            <br><br>

            <input type="submit" value="Complete Order">
        </form>

    </body>
</html>