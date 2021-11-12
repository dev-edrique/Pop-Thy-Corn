<!DOCTYPE html>
<html>
<body>

<?php 
	session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'popthycorn');

  //insert products
  $products = array();

  //inserts user's order
  $userOrders = array();

  $totalPrice = "";

  if($_SERVER["REQUEST_METHOD"] == "POST"){

    //insert array
    array_push($products, array($_POST['Butter'], $_POST['butterQtyTotal'], $_POST['butterPriceTotal']));
    array_push($products, array($_POST['Cheese'], $_POST['cheeseQtyTotal'], $_POST['cheesePriceTotal']));
    array_push($products, array($_POST['Caramel'], $_POST['caramelQtyTotal'], $_POST['caramelPriceTotal']));
    array_push($products, array($_POST['Barbeque'], $_POST['bbqQtyTotal'], $_POST['bbqPriceTotal']));
    $totalPrice = $_POST['sumOfAll'];

    //removes empty
    for($i = 0; $i<=count($products)-1 ;$i++){
      if(empty($products[$i][1]) || empty($products[$i][2])){
        //do nothing if empty qty & total
      }
      else{
        //insert them in 
        array_push($userOrders, array($products[$i][0], $products[$i][1], $products[$i][2]));
      }
    }

    $query = "INSERT INTO orders (user_id, order_orders, order_total) VALUES ('".rand(1, 10)."', '".json_encode($userOrders)."', '".$totalPrice."')";

    mysqli_query($conn, $query);

    echo "
    <script>
      window.location = 'test2.php';
      // alert('".json_encode($userOrders)."');
      // alert('".$totalPrice."');
      alert('Order Success!');
    </script>";
  }
  else{
    echo "
    <script>
      alert('Order Failed');
    </script>";
  }
  
?>

<a href="test2.php">Back</a>

</body>
</html>