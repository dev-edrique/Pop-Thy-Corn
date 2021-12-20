<?php 
    require_once '../../config/dbConfig.php'; 
    session_start();
?>
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
        <!-- SIDE NAV -->
        <div class="container-fluid">
            <div class="row flex-nowrap">
                <!-- 1ST COLUMN -->
                <div class="d-flex flex-column vh-100 flex-shrink-0 p-3" style="width: 220px;"> <svg class="bi me-2" width="40" height="32"> </svg> <img src="../../assets/logo.png" alt=""><h3>Point of Sales</h3>
                    <hr>
                    <ul class="nav nav-pills flex-column mb-auto">
                            <li> <a href="pos_order.php" class="nav-link"> <i class="fa fa-dashboard"></i><span class="ms-2">Order</span> </a> </li>
                            <li> <a href="pos_history.php" class="nav-link "> <i class="fa fa-first-order"></i><span class="ms-2">Transaction History</span> </a> </li>
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
                            <h2>Order</h2>
                        </div>
                    </div><br>
                    <div class="cont">
                    <form class="col" action="pos_order.php" method="POST">

<label/>Search Product: 
    <select name="choice">
        <!-- Show products -->
        <?php
            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<option value='".$row['product_id']."'>".$row['product_name']."</option>";
                }
            }
            else{
                echo "<option value=''>EMPTY</option>";
            }
        ?>
    </select><br><br>

<label/>Order Qty: 
<input type="number" name="orderQty"><br><br>
<input class="btn btn-warning" type="submit" value="Summarize"><br><br><br>
</form>
        

<form class="justify-content-end" action="sql/process.php" method="post">
<?php
    $product_id = "";
    $product_name = "";
    $product_qty = "";
    $product_price = "";
    $qty = 0;
    $total = 0;

    //populate inputs
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $qty = $_POST['orderQty'];
        //for the next page
        $_SESSION['orderQty'] = $qty;

        $sql = "SELECT * FROM products WHERE product_id='".$_POST['choice']."'";
        $result = $conn->query($sql);
        
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){?>
                <!-- Process for total -->
                <?php $total = $row['product_price'] * $qty;?>

                <?php echo '<td>'."<img src='data:image/jpeg;base64,".base64_encode($row['product_img'])."'width=100px height=100px/>".'</td>'; ?><br><br>

                <!-- Populates inputs -->
                <label/>Product ID: <br>
                <input type="number" name="product_id" readonly value="<?php echo $row['product_id'] ?>">
                <br><br>

                <?php $_SESSION['product_qty'] = $row['product_qty'] ?>

                <label/>Product Name: <br>
                <input type="text" name="product_name" value="<?php echo $row['product_name'] ?>">
                <?php $_SESSION['product_name'] = $row['product_name']; ?>
                <br><br>

                <label/>Product Price: <br>
                <input type="number" name="product_price" value="<?php echo $row['product_price'] ?>">
                <br><br>

                <label/>Total: <br>
                <input type="number" name="total" value="<?php echo $total ?>">
                <?php $_SESSION['total'] = $total; ?>
                <br><br>

                <input type="submit" value="Process Order">
                <br><br>

                <?php
            }
        }  
    }
?>

</form>
                    </div>
                    
                    <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="pos_order.php">1</a></li>
                        <li class="page-item"><a class="page-link" href="sql/process.php">2</a></li>
                        <li class="page-item"><a class="page-link" href="sql/invoice.php">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                        </li>
                    </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- JS Link -->
        <script src="../../js/pos_order.js"></script>

        <!-- Bootstrap Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>