<?php 
    require_once "../../config/dbConfig.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Inventory Report</title>
    </head>

    <body>
        <h1>Inventory Report</h1><br>

        <table>
            <tr>
                <th>Product Name</th>
                <th>Quantity Left</th>
            </tr>

            <?php 
                //products
                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['product_name']."</td>";
                        echo "<td>".$row['product_qty']."</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </table><br><br>

        <table>
            <tr>
                <th>Product Name</th>
                <th>Quantity Sold</th>
            </tr>

            <?php
                //invoice
                $sqlInvoice = "SELECT order_desc, SUM(qty_taken) FROM invoice GROUP BY order_desc";
                $resultInvoice = $conn->query($sqlInvoice);

                if($resultInvoice->num_rows > 0){
                    while($row = $resultInvoice->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['order_desc']."</td>";
                        echo "<td>".$row['SUM(qty_taken)']."</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </table>
    </body>
</html>