<?php 
        require_once '../../config/dbConfig.php';
        session_start();

        //checking if logged in
        if(!empty($_SESSION['admin_id'])){
            $employee = $_SESSION['admin_id'];
        }
?>

<!DOCTYPE html>
<html>

      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Project</title>
      <!-- CSS Link -->
      <link rel="stylesheet" href="../../css/admin.css">
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="cont">
                    <img class="logs" src="../../assets/logo.png">
                        <form action="admin_login.php" method="POST">
                            <h1>Employee Login</h1>

                            <label>Employee ID: </label><br>
                            <input type="text" name="admin_id"><br><br>

                            <label>Password: </label><br>
                            <input type="password" name="admin_password"><br><br>

                            <?php
                                $admin_id = "";
                                $admin_password = "";

                                if($_SERVER["REQUEST_METHOD"] == "POST"){
                                    $admin_id = $_POST['admin_id'];
                                    $admin_password = $_POST['admin_password'];

                                    $sql = "SELECT * FROM employee WHERE emp_id='".$admin_id."'";
                                    $result = $conn->query($sql);

                                    //check if it exist
                                    if($result->num_rows > 0){
                                        $result = $result->fetch_assoc();

                                        //password
                                        if($result['password'] == $admin_password){
                                            if($result['admin_status'] == "ADMIN"){
                                                $_SESSION['admin_id'] = $admin_id;
                                                echo "<script> alert('Login Success!');
                                                window.location.href = '../admin/admin_insert_employee.php';
                                                </script>";
                                            }
                                            else if($result['admin_status'] == "POS"){
                                                $_SESSION['admin_id'] = $admin_id;
                                                echo "<script> alert('Login Success!');
                                                window.location.href = '../POS/pos_history.php';
                                                </script>";
                                            }
                                            else if($result['admin_status'] == "INVEN"){
                                                $_SESSION['admin_id'] = $admin_id;
                                                echo "<script> alert('Login Success!');
                                                window.location.href = '../inventory/inventory_showProducts.php';
                                                </script>";
                                            }
                                        }
                                        else{
                                            echo "<script> alert('Incorrect Username/Password');</script>";
                                        }
                                    }
                                    else{
                                        //echo "<script> alert('Employee does not exist!');</script>";
                                        echo "<script> alert('Incorrect Username/Password');</script>";
                                    }
                                }
                            ?>

                            <input class="btn btn-primary" type="submit" value="Login">
                        </form>
                    </div>
                
                </div>

            </div>

        </div>
        
         <!-- Bootstrap Scripts -->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>