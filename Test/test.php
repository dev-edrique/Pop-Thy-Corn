<!DOCTYPE html>
<html>
<body>

<form action="test.php" method="POST">
    <input type="checkbox" name="butterCheck">
    <label name="butterProd">Butter </label><span name="butterPrice">P50</span><br>
    <input type="number" name="butterQty">
    <br>

    <input type="checkbox" name="cheeseCheck">
    <label name="butterProd">Butter </label><span name="cheesePrice">P60</span><br>
    <input type="number" name="cheeseQty">
    <br>

    <br>
    <input type="submit" value="Summarize Order">
</form>

<table>
    <tr>
        <th>Product</th>
        <th>Qty</th>
        <th>Price</th>
    </tr>

    <?php
        $butterProd = "Butter";
        $butterPrice = "50";
        $butterQty = "";

        $cheeseProd = "Cheese";
        $cheesePrice = "60";
        $cheeseQty = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            if(isset($_POST['butterCheck'])){
                $butterQty = $_POST['butterQty'];

                $butterPrice = $butterQty * $butterPrice;

                echo "<tr>";
                echo "<td>".$butterProd."</td>";
                echo "<td>".$butterQty."</td>";
                echo "<td>".$butterPrice."</td>";
                echo "</tr>";
            }

            if(isset($_POST['cheeseCheck'])){
                $cheeseQty = $_POST['cheeseQty'];

                $cheesePrice = $cheeseQty * $cheesePrice;

                echo "<tr>";
                echo "<td>".$cheeseProd."</td>";
                echo "<td>".$cheeseQty."</td>";
                echo "<td>".$cheesePrice."</td>";
                echo "</tr>";
            }

        }
    ?>
</table>
    


</body>
</html>