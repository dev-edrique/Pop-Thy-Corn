<?php 
    require_once "../../../config/dbConfig.php";
    require_once "../../../fpdf/fpdf.php";
    date_default_timezone_set('Asia/Manila');
    session_start();

    $order = $_SESSION['product_name'];
    $qty = $_SESSION['orderQty'];
    $total = $_SESSION['total'];
    $product_qty = $_SESSION['product_qty'];
    $last_id = $_SESSION['last_id'];
    $cash = $_SESSION['cash'];
    $change = $_SESSION['change']

    // $summary = $order;

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../../../css/invoice.css">
        <title>Invoice</title>
    </head>

    <body>
        <h1>Receipt</h1>
        <hr>
        <form action="invoice.php" method="POST">
            <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total Amount</th>
                <th>Cash</th>
                <th>Change</th>
                <th>Date</th>
            </tr>

            <?php
                $date = date("Y-m-d h:i:s a", time());

                $sql = "SELECT * FROM invoice WHERE invoice_id='".$last_id."' ";

                $result = $conn->query($sql);
               
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            echo "<tr>";
                            // echo "<td>".$row['invoice_id']."</td>";
                            echo "<td>".$row['order_desc']."</td>";
                            echo "<td>".$row['qty_taken']."</td>";
                            echo "<td>".$row['total_amount']."</td>";
                            echo "<td>".$row['cash']."</td>";
                            echo "<td>".$row['cash_change']."</td>";    
                            echo "<td>".$row['date']."</h3>"; 
                            echo "</tr>";       
                            }
                        }
                        else{
                            echo "<td>Does not exist!</td>";
                        }

                //goes back to order
                if(isset($_POST['unset'])){
                    unset($_SESSION['product_name']);
                    unset($_SESSION['orderQty']);
                    unset($_SESSION['total']);
                    unset($_SESSION['product_qty']);
                    unset($_SESSION['last_id']);
                    unset($_SESSION['cash']);
                    unset($_SESSION['change']);
                    echo "<script>window.location.href = '../pos_order.php';</script>";
                }

                //put in pdf
                if(isset($_POST['pdf'])){
                    //pdf
                    ob_start();
                    $pdf = new FPDF();
                    $pdf->AddPage('L');

                    $pdf->SetFont('arial','',12);
                    $pdf->Cell(0,10,"Invoice",1,1,'C');
                    $pdf->Cell(45,10,"Product",1,0);
                    $pdf->Cell(45,10,"Quantity",1,0);
                    $pdf->Cell(45,10,"Total Amount",1,0);
                    $pdf->Cell(45,10,"Cash",1,0);
                    $pdf->Cell(45,10,"Change",1,0);
                    $pdf->Cell(50,10,"Date",1,0);
                    $pdf->Ln();

                    $pdf->Cell(45,10,$order,1,0);
                    $pdf->Cell(45,10,$qty,1,0);
                    $pdf->Cell(45,10,$total,1,0);
                    $pdf->Cell(45,10,$cash,1,0);
                    $pdf->Cell(45,10,$change,1,0);
                    $pdf->Cell(50,10,$date,1,0);

                    $file = $date.'.pdf';
                    $pdf->output($file,'D');
                    ob_end_flush(); 
                }
            ?>
            </table> <br>
            <input type="submit" name="unset" value="Done">
            <input type="submit" name="pdf" value="Print Invoice">
        </form>
    </body>
</html>
