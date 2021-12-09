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

            <input type="submit" value="Login">
        </form>
    </body>
</html>