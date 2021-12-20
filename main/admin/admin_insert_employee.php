<!DOCTYPE html>
<html>
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Project</title>
      <!-- CSS Link -->
      <link rel="stylesheet" href="../../css/pos_order.css">
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   </head>

    <body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
        <!-- 1ST COLUMN -->
            <div class="d-flex flex-column vh-100 flex-shrink-0 p-3" style="width: 220px;"> <svg class="bi me-2" width="40" height="32"> </svg> <img src="../../assets/logo.png" alt=""><h3>Point of Sales</h3>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                        <li> <a href="admin_report_inventory.php" class="nav-link"> <i class="fa fa-dashboard"></i><span class="ms-2">Inventory Report</span> </a> </li>
                        <li> <a href="admin_report_sales.php" class="nav-link "> <i class="fa fa-first-order"></i><span class="ms-2">Sales Report</span> </a> </li>
                        <li> <a href="admin_insert_employee.php" class="nav-link "> <i class="fa fa-first-order"></i><span class="ms-2">Manage Employee</span> </a> </li>
                    
                </ul>
                <div class="logout">
                        <a href="../admin/sql/logout.php">
                        <button type="button" class="btn btn-danger"><img src="https://img.icons8.com/external-others-sbts2018/50/000000/external-logout-social-media-basic-1-others-sbts2018.png" height="30px"/> Log Out</button>
                        </a>
                </div>
                <hr>
                <footer class="text-center text-lg-start">
                        <!-- Copyright -->
                        <div class="text-center p-3">
                        Pop Thy Corn © 2021 Copyright
                        </div>
                <!-- Copyright -->
                </footer>
            </div>
            
            <!-- 2ND COLUMN -->
            <div class="col">
                <div class="row justify-content-center">
                    <div class="header">
                        <h1>Manage Employee</h1>
                    </div>
                </div><br>
                <form action="admin_insert_employee.php" method="POST">
                    <h2>Add Employee</h2>
                    <hr>

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
                        <option value="INVEN">INVENTORY</option>
                        <option value="ADMIN">ADMIN</option>
                    </select><br><br>

                    <input class="btn btn-danger" type="submit" value="Add Employee"><br><br>


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
                    </div>
                    </div>
                    </div>
 <!-- Bootstrap Scripts -->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>

</html>