<?php 
    require_once '../../../config/dbConfig.php';

    $id = "";

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $conn->query("DELETE FROM products WHERE product_id=$id");

        echo "<script> alert('Product Removed!');
        window.location.href = '../inventory_showProducts.php';
        </script>";
    }
?>