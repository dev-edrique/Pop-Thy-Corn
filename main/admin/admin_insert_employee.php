<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Add Employee</title>
    </head>

    <body>
        <form action="admin_insert_employee.php" method="POST">
            <h1>Add Employee</h1>

            <label>First Name: </label>
            <input type="text" name="first_name"><br><br>

            <label>Last Name: </label>
            <input type="text" name="last_name"><br><br>

            <label>Contact Number: </label>
            <input type="text" name="contact_number" maxlength="11"><br><br>

            <label>Password: </label>
            <input type="password" name="password"><br><br>

            <select name="admin_status">
                <option value="POS">POS</option>
                <option value="INVEN">INVEN</option>
                <option value="ADMIN">ADMIN</option>
            </select><br><br>

            <input type="submit" value="Add Employee"><br><br>
            <a href="sql/logout.php">Logout</a>

            <?php 
                require_once '../../config/dbConfig.php';

                //variables
                $first_name = "";
                $last_name = "";
                $contact_number = "";
                $password = "";
                $admin_status = "";

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $first_name = $_POST['first_name'];
                    $last_name = $_POST['last_name'];
                    $contact_number = $_POST['contact_number'];
                    $password = $_POST['password'];
                    $admin_status = $_POST['admin_status'];

                    $sql = "INSERT INTO employee (first_name, last_name, contact_number, password, admin_status) 
                    VALUES ('".$first_name."', '".$last_name."', '".$contact_number."', '".$password."', '".$admin_status."');";

                    if($conn->query($sql)){
                        echo "<script> alert('Employee added!');</script>";
                        }
                    else{
                        echo "<script> alert('Employee failed to add');</script>";
                    }

                }
                $conn->close();
            ?>

        </form>

    </body>

</html>