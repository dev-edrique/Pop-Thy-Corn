<?php 
    require_once "../../config/dbConfig.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Sales Report</title>
    </head>

    <body>
        <h1>Report</h1><br>

        <table>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
            </tr>

            <?php
                $sql = "SELECT * FROM products";

                $result = $conn->query($sql);

                //sales
                $totalSales = 0;
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        // $totalSales = $totalSales + $row['total_amount'];
                        echo "<tr>";
                        echo "<td>".$row['product_id']."</td>";
                        echo "<td>".$row['product_name']."</td>";
                        echo "<td>".$row['product_price']."</td>";
                        echo "</tr>";
                    }
                }
            ?>
            </table><br><br>

            <table>
            <tr>
                <th>Product Name</th>
                <th>Qty Sold</th>
                <th>Total Amount</th>
            </tr>
            <?php
                //
                $sqlTotal = "SELECT invoice_id, order_desc, SUM(total_amount), SUM(qty_taken) FROM invoice GROUP BY order_desc";

                $resultTotal = $conn->query($sqlTotal);
                $totalAmount = 0;

                if($resultTotal->num_rows > 0){
                    while($row = $resultTotal->fetch_assoc()){
                        echo "<tr>";
                        // echo "<td>".$row['invoice_id']."</td>";
                        echo "<td>".$row['order_desc']."</td>";
                        echo "<td>".$row['SUM(qty_taken)']."</td>";
                        echo "<td>".$row['SUM(total_amount)']."</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </table>
    </body>
</html>