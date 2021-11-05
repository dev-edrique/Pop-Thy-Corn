<!DOCTYPE html>
<html>
<head>
    <title>Hello</title>
</head>

<body>

<style>
    input[type="text"]{
        border: none;
        background-color: transparent;
        text-align: center;
    }

    .orderButton{
        text-align: center;
        width: 100%;
    }
</style>

<form>
    <input type="checkbox" id="butterCheck">
    <label>Butter </label><span>P50</span><br>
    <input type="number" id="butterQty">
    <br>

    <input type="checkbox" id="cheeseCheck">
    <label>Cheese </label><span>P60</span><br>
    <input type="number" id="cheeseQty">
    <br>

    <input type="checkbox" id="caramelCheck">
    <label>Caramel </label><span>P70</span><br>
    <input type="number" id="caramelQty">
    <br>

    <br>
    <input type="submit" value="Summarize Order" onclick="summarizeOrder();return false;">
</form>

<table>
    <form>
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
        </tr>

        <tr>
            <td><input type="text" readonly value="Butter"></td>
            <td><input type="text" readonly id="butterQtyTotal"></td>
            <td><input type="text" readonly id="butterPriceTotal"></td>
        </tr>

        <tr>
            <td><input type="text" readonly value="Cheese"></td>
                <td><input type="text" readonly id="cheeseQtyTotal"></td>
                <td><input type="text" readonly id="cheesePriceTotal"></td>
            </tr>
        <tr>
        <td><input type="text" readonly value="Caramel"></td>
                <td><input type="text" readonly id="caramelQtyTotal"></td>
                <td><input type="text" readonly id="caramelPriceTotal"></td>
            </tr>
        </tr>

        <tr>
            <td colspan="3"><input type="submit" value="Order" id="orderButton" class="orderButton" disabled=disabled></td>
        </tr>
    </form>
</table>
    
<script>
    function summarizeOrder(){
        //butter
        var butterChecker = document.getElementById('butterCheck');
        var butterPrice = 50;
        var butterQty = document.getElementById('butterQty').value;

        //cheese
        var cheeseChecker = document.getElementById('cheeseCheck');
        var cheesePrice = 60;
        var cheeseQty = document.getElementById('cheeseQty').value;

        //caramel
        var caramelChecker = document.getElementById('caramelCheck');
        var caramelPrice = 70;
        var caramelQty = document.getElementById('caramelQty').value;

        //basic checker
        //butter checker
        if(butterChecker.checked == true){
            document.getElementById('butterQtyTotal').value = butterQty;
            document.getElementById('butterPriceTotal').value = butterPrice * butterQty;

            document.getElementById('orderButton').disabled = false;
        }

        //cheese checker
        if(cheeseChecker.checked == true){
            document.getElementById('cheeseQtyTotal').value = cheeseQty;
            document.getElementById('cheesePriceTotal').value = cheesePrice * cheeseQty;

            document.getElementById('orderButton').disabled = false;
        }

        //caramel checker
        if(caramelChecker.checked == true){
            document.getElementById('caramelQtyTotal').value = caramelQty;
            document.getElementById('caramelPriceTotal').value = caramelPrice * caramelQty;

            document.getElementById('orderButton').disabled = false;
        }

        /*
        //advance checker   
        //butter checker
        if(butterChecker.checked == false){
            document.getElementById('orderButton').disabled = true;

            //clear
            document.getElementById('butterQtyTotal').value = "";
            document.getElementById('butterPriceTotal').value = "";
        }
        else if(document.getElementById('butterQty').value == 0 || document.getElementById('butterQty').value == ""){
            document.getElementById('orderButton').disabled = true;

            //clear
            document.getElementById('butterQtyTotal').value = "";
            document.getElementById('butterPriceTotal').value = "";
        }
        else if(butterChecker.checked == true){
            document.getElementById('butterQtyTotal').value = butterQty;
            document.getElementById('butterPriceTotal').value = butterPrice * butterQty;

            document.getElementById('orderButton').disabled = false;
        }

        //cheese checker
        if(cheeseChecker.checked == false){
            document.getElementById('orderButton').disabled = true;

            //clear
            document.getElementById('cheeseQtyTotal').value = "";
            document.getElementById('cheesePriceTotal').value = "";
        }
        else if(document.getElementById('cheeseQty').value == 0 || document.getElementById('cheeseQty').value == ""){
            document.getElementById('orderButton').disabled = true;

            //clear
            document.getElementById('cheeseQtyTotal').value = "";
            document.getElementById('cheesePriceTotal').value = "";
        }
        else if(cheeseChecker.checked == true){
            document.getElementById('cheeseQtyTotal').value = cheeseQty;
            document.getElementById('cheesePriceTotal').value = cheesePrice * cheeseQty;

            document.getElementById('orderButton').disabled = false;
        }

        //caramel checker
        if(caramelChecker.checked == false){
            document.getElementById('orderButton').disabled = true;

            //clear
            document.getElementById('caramelQtyTotal').value = "";
            document.getElementById('caramelPriceTotal').value = "";
        }
        else if(document.getElementById('caramelQty').value == 0 || document.getElementById('caramelQty').value == ""){
            document.getElementById('orderButton').disabled = true;

            //clear
            document.getElementById('caramelQtyTotal').value = "";
            document.getElementById('caramelPriceTotal').value = "";
        }
        else if(caramelChecker.checked == true){
            document.getElementById('caramelQtyTotal').value = caramelQty;
            document.getElementById('caramelPriceTotal').value = caramelPrice * caramelQty;

            document.getElementById('orderButton').disabled = false;
        }
        */

    }
</script>

</body>
</html>