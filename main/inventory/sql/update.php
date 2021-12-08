<?php 
    require_once '../../../config/dbConfig.php';

    $product_id = "";
    $product_name = "";
    $product_price = "";
    $product_qty = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_qty = $_POST['product_qty'];

        $conn->query("UPDATE products 
        SET product_name='".$product_name."', product_qty='".$product_qty."', product_price='".$product_price."'
        WHERE product_id=$product_id");

        echo "<script> alert('Product Updated!');
        window.location.href = '../inventory_update_form.php';
        </script>";
    }
?>