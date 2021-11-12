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

    table{
        background-color: grey;
    }

    td{
        border: solid black 1px;
    }

    .orderButton{
        text-align: center;
        width: 100%;
    }

    .sumOfAll{
        width: 100%;
        background-color: grey;
    }

    .center{
        text-align: center;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<form>
    <input type="checkbox" id="butterCheck" onclick="enableButton()">
    <label>Butter </label><span>P50</span><br>
    <input type="number" id="butterQty">
    <br>

    <input type="checkbox" id="cheeseCheck" onclick="enableButton()">
    <label>Cheese </label><span>P60</span><br>
    <input type="number" id="cheeseQty">
    <br>

    <input type="checkbox" id="caramelCheck" onclick="enableButton()">
    <label>Caramel </label><span>P70</span><br>
    <input type="number" id="caramelQty">
    <br>

    <input type="checkbox" id="bbqCheck" onclick="enableButton()">
    <label>Barbeque </label><span>P80</span><br>
    <input type="number" id="bbqQty">
    <br>

    <br>
    <input type="submit" value="Summarize Order" onclick="summarizeOrder();return false;">
</form>

<table>
    <form action="process.php" method="POST">
        <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
        </tr>

        <tr>
            <td><input type="text" readonly value="Butter" name="Butter"></td>
            <td><input type="number" readonly id="butterQtyTotal" name="butterQtyTotal"></td>
            <td><input type="number" readonly id="butterPriceTotal" name="butterPriceTotal"></td>
        </tr>

        <tr>
            <td><input type="text" readonly value="Cheese" name="Cheese"></td>
                <td><input type="number" readonly id="cheeseQtyTotal" name="cheeseQtyTotal"></td>
                <td><input type="number" readonly id="cheesePriceTotal" name="cheesePriceTotal"></td>

        <tr>
            <td><input type="text" readonly value="Caramel" name="Caramel"></td>
            <td><input type="number" readonly id="caramelQtyTotal" name="caramelQtyTotal"></td>
            <td><input type="number" readonly id="caramelPriceTotal" name="caramelPriceTotal"></td>
        </tr>

        <tr>
            <td><input type="text" readonly value="Barbeque" name="Barbeque"></td>
            <td><input type="number" readonly id="bbqQtyTotal" name="bbqQtyTotal"></td>
            <td><input type="number" readonly id="bbqPriceTotal" name="bbqPriceTotal"></td>
        </tr>

        <tr>
            <td class="center">Total:</td>
            <td colspan="2"><input type="text" readonly class="sumOfAll" id="sumOfAll" name="sumOfAll"></td>
        </tr>

        <tr>
            <td colspan="3"><input type="submit" value="Order" id="orderButton" class="orderButton" disabled=disabled></td>
        </tr>
    </form>
</table>
    
<script>
    //variables
    var butterChecker = document.getElementById('butterCheck');
    var cheeseChecker = document.getElementById('cheeseCheck');
    var caramelChecker = document.getElementById('caramelCheck');
    var bbqChecker = document.getElementById('bbqCheck');

    //clear butter
    function clearButter(){
        //clear
        document.getElementById('butterQty').value = "";
        document.getElementById('butterQtyTotal').value = "";
        document.getElementById('butterPriceTotal').value = "";
        document.getElementById('butterPriceTotal').value = "";
    }

    //clear cheese
    function clearCheese(){
        //clear
        document.getElementById('cheeseQty').value = "";
        document.getElementById('cheeseQtyTotal').value = "";
        document.getElementById('cheesePriceTotal').value = "";
    }

    //clear caramel
    function clearCaramel(){
        //clear
        document.getElementById('caramelQty').value = "";
        document.getElementById('caramelQtyTotal').value = "";
        document.getElementById('caramelPriceTotal').value = "";
    }

    //clear bbq
    function clearBBQ(){
        //clear
        document.getElementById('bbqQty').value = "";
        document.getElementById('bbqQtyTotal').value = "";
        document.getElementById('bbqPriceTotal').value = "";
    }

    function enableButton(){
        document.getElementById('orderButton').disabled = true;

        if(butterChecker.checked == true){
            document.getElementById('orderButton').disabled = false;
        }
        
        if(cheeseChecker.checked == true){
            document.getElementById('orderButton').disabled = false;
        }

        if(caramelChecker.checked == true){
            document.getElementById('orderButton').disabled = false;
        }
        if(bbqChecker.checked == true){
            document.getElementById('orderButton').disabled = false;
        }
    }

    function summarizeOrder(){
        //butter
        var butterPrice = 50;
        var butterQty = document.getElementById('butterQty').value;

        //cheese
        var cheesePrice = 60;
        var cheeseQty = document.getElementById('cheeseQty').value;

        //caramel
        var caramelPrice = 70;
        var caramelQty = document.getElementById('caramelQty').value;

        //bbq
        var bbqPrice = 80;
        var bbqQty = document.getElementById('bbqQty').value;

        //butter checker
        if(butterChecker.checked == true){
            document.getElementById('butterQtyTotal').value = butterQty;
            document.getElementById('butterPriceTotal').value = butterPrice * butterQty;

            document.getElementById('orderButton').disabled = false;

            //disable button if empty but checked
            if(document.getElementById('butterQty').value == 0 || document.getElementById('butterQty').value == ""){
                document.getElementById('orderButton').disabled = true;
                clearButter();
            }
        }
        else if(butterChecker.checked == false){
            clearButter();
        }

        //cheese checker
        if(cheeseChecker.checked == true){
            document.getElementById('cheeseQtyTotal').value = cheeseQty;
            document.getElementById('cheesePriceTotal').value = cheesePrice * cheeseQty;

            document.getElementById('orderButton').disabled = false;
            
            //disable button if empty but checked
            if(document.getElementById('cheeseQty').value == 0 || document.getElementById('cheeseQty').value == ""){
                document.getElementById('orderButton').disabled = true;
                clearCheese();
            }
        }
        else if(cheeseChecker.checked == false){
            clearCheese();
        }

        //caramel checker
        if(caramelChecker.checked == true){
            document.getElementById('caramelQtyTotal').value = caramelQty;
            document.getElementById('caramelPriceTotal').value = caramelPrice * caramelQty;

            document.getElementById('orderButton').disabled = false;

            //disable button if empty but checked
            if(document.getElementById('caramelQty').value == 0 || document.getElementById('caramelQty').value == ""){
                document.getElementById('orderButton').disabled = true;
                clearCaramel();
            }
        }
        else if(caramelChecker.checked == false){
            clearCaramel();
        }

        //bbq checker
        if(bbqChecker.checked == true){
            document.getElementById('bbqQtyTotal').value = bbqQty;
            document.getElementById('bbqPriceTotal').value = bbqPrice * bbqQty;

            document.getElementById('orderButton').disabled = false;

            //disable button if empty but checked
            if(document.getElementById('bbqQty').value == 0 || document.getElementById('bbqQty').value == ""){
                document.getElementById('orderButton').disabled = true;
                clearBBQ();
            }
        }
        else if(bbqChecker.checked == false){
            clearBBQ();
        }

        //total of all product
        var butterPriceTotal = parseInt(document.getElementById('butterPriceTotal').value);
        var cheesePriceTotal = parseInt(document.getElementById('cheesePriceTotal').value);
        var caramelPriceTotal = parseInt(document.getElementById('caramelPriceTotal').value);
        var bbqPriceTotal = parseInt(document.getElementById('bbqPriceTotal').value);

        var priceTotal = [butterPriceTotal, cheesePriceTotal, caramelPriceTotal, bbqPriceTotal];

        var sumOfAll = 0;

        //sums all inputs
        for(var i = 0; i <= priceTotal.length ;i++){
            if(isNaN(priceTotal[i])){
                //
            }
            else{
                sumOfAll = sumOfAll + priceTotal[i];
            }
        }

        document.getElementById('sumOfAll').value = parseInt(sumOfAll);

    }
</script>

</body>
</html>