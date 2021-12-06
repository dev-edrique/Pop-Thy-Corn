<?php 
    require_once '../../../config/dbConfig.php';

    $product_id = "";
    $product_name = "";
    $product_price = "";
    $product_qty = "";

    if(isset($_GET['delete'])){
        $product_id = $_GET['delete'];
        $conn->query("DELETE FROM products WHERE product_id=$product_id");

        echo "<script> alert('Product Removed!');
        window.location.href = '../inventory_showProducts.php';
        </script>";
    }
?>