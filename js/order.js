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