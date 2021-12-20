<!DOCTYPE html>
<html>

    <body>
        <?php
                    require_once "../../../config/dbConfig.php";
                    session_start();
                
                    $order = $_SESSION['product_name'];
                    $qty = $_SESSION['orderQty'];
                    $total = $_SESSION['total'];
                    $product_qty = $_SESSION['product_qty'];
                
                    // $summary = $order." ".$qty." pc(s)";
                    $summary = $order;

                    $cash = "";
                    $process = 0;
                    $qty_change = "";

                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        $cash = $_POST['cash'];

                        $process = $cash - $total;

                        //checks if cash is higher that total
                        if($process <= 0){
                            echo "<script>alert('Not enough cash!');</script>";
                            echo "<script>window.location.href = 'process.php';</script>";
                        }
                        else{
                            $qty_change = $product_qty - $qty;
                            
                            //checks if theres still stocks
                            if($qty_change <= 0){
                                echo "<script>alert('Out of stocks!');</script>";
                            }
                            else{
                                //minus the qty of product
                                $conn->query("UPDATE products SET product_qty='".$qty_change."' WHERE product_name='".$order."' ");

                                //insert invoice
                                $sql = "INSERT INTO invoice(order_desc, total_amount, cash, cash_change, qty_taken) VALUES 
                                ('".$summary."', '".$total."', '".$cash."', '".$process."', '".$qty."')";

                                $conn->query($sql);

                                $_SESSION['last_id'] = mysqli_insert_id($conn);
                                $_SESSION['cash'] = $cash;
                                $_SESSION['change'] = $process;

                                echo "<script>alert('Order Success!');
                                window.location.href = 'invoice.php';
                                </script>";
                            }
                        }
                    }
            ?>
    </body>
</html>