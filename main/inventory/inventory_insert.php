<!DOCTYPE html>
<html>
    <head>
        <title>Inventory | New Product</title>
    </head>    

    <body>
        <form action="process/insert_product.php" method="POST" enctype="multipart/form-data">
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
        </form>

    </body>
</html> 