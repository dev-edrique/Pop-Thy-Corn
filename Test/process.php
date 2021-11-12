<!DOCTYPE html>
<html>
<body>

<?php 
	session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'popthycorn');

  //inserts user's order
  $userOrders = array();

  $totalPrice = "";

  if($_SERVER["REQUEST_METHOD"] == "POST"){

    //if input not empty, insert in array
    if(!empty($_POST['butterQtyTotal']) || !empty($_POST['butterPriceTotal'])){
      array_push($userOrders, ($_POST['Butter'] . " " . $_POST['butterQtyTotal'] . "pc(s)  P" . $_POST['butterPriceTotal']));
    }

    if(!empty($_POST['cheeseQtyTotal']) || !empty($_POST['cheesePriceTotal'])){
      array_push($userOrders, ($_POST['Cheese'] . " " . $_POST['cheeseQtyTotal'] . "pc(s)  P" . $_POST['cheesePriceTotal']));
    }

    if(!empty($_POST['caramelQtyTotal']) || !empty($_POST['caramelPriceTotal'])){
      array_push($userOrders, ($_POST['Caramel'] . " " . $_POST['caramelQtyTotal'] . "pc(s)  P" . $_POST['caramelPriceTotal']));
    }

    if(!empty($_POST['bbqQtyTotal']) || !empty($_POST['bbqPriceTotal'])){
      array_push($userOrders, ($_POST['Barbeque'] . " " . $_POST['bbqQtyTotal'] . "pc(s)  P" . $_POST['bbqPriceTotal']));
    }
    
    echo implode(" | ",$userOrders);
    
    $totalPrice = $_POST['sumOfAll'];

    $query = "INSERT INTO orders (user_id, order_orders, order_total) VALUES ('".rand(1, 10)."', '".implode(" | ",$userOrders)."', '".$totalPrice."')";

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