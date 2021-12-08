<?php 
        session_start();
        require_once '../../config/dbConfig.php';

        //checking
        if(empty($_SESSION['admin_id'])){
            $test = "";
            echo "EMPTY";
        }
        else{
            $test = $_SESSION['admin_id'];
            echo "EMPTY";
        }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Login</title>
    </head>

    <body>
        <form action="admin_login.php" method="POST">
            <h1>Employee Login</h1>

            <label>Employee ID: </label>
            <input type="text" name="admin_id"><br><br>

            <label>Password: </label>
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
                            echo "<script> alert('Login Success!');</script>";
                            $_SESSION['admin_id'] = $admin_id;
                        }
                        else{
                            echo "<script> alert('Incorrect Password');</script>";
                        }
                    }
                    else{
                        echo "<script> alert('Employee does not exist!');</script>";
                    }
                }
            ?>

            <input type="submit" value="Login">
        </form>
    </body>
</html>