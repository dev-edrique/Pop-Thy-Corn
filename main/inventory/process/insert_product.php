<?php 
    require_once '../../../config/dbConfig.php';

    //variables
    $product_name = "";
    $product_price = "";
    $product_qty = "";
    $errors = [];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_qty = $_POST['product_qty'];

        //proceed if no errors
        if(count($errors) == 0){
            $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
            $imageProperties = getimageSize($_FILES['image']['tmp_name']);

            $sql = "INSERT INTO products (product_name, product_price, product_qty, product_img) VALUES 
            ('".$product_name."', '".$product_price."', '".$product_qty."', '".$imgData."')";

            if($conn->query($sql)){
                echo "<script> alert('Product added!');
                window.location.href='../inventory_insert.php';
                </script>";
                }
                else{
                    echo "<script> alert('Product failed to add');
                    window.location.href='../inventory_insert.php'; 
                    </script>";
                    
            }

        }
    }



?>