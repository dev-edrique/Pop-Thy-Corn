<?php 
	session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'popthycorn');

	// initialize variables
  $username = "";
	$first_name = "";
  $last_name = "";
	$email = "";
  $password = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO user(username, first_name, last_name, email, password) VALUES ('".$username."','".$first_name."', '".$last_name."', '".$email."','".$password."') ";

    mysqli_query($conn, $query);
    echo '<script>
    window.location = "signup.php";
    alert("Account Successfully created!");
  
    </script>';
  }
  else{
    echo '<script>
      window.location = "inventory.php";
      alert("Account creation Failed!");
  
    </script>';
  }
  
?>