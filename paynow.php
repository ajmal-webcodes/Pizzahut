<?php
include 'connection.php';
SESSION_START();
$bid=$_SESSION['bid'];
$a="select * from booking where bid='$bid'";
$result=mysqli_query($conn,$a);
while($row=mysqli_fetch_array($result))
{
    $bid=$row[0];
    $pid=$row[1];
    $item=$row[4];
    $nitem=$row[6];
    $total=$row[7];
}
$a="select * from product where pid='$pid'";
$result=mysqli_query($conn,$a);
while($row=mysqli_fetch_array($result))
{
       $pid=$row[0];
       $pname=$row[1];
       $rate=$row[3];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Section - Food Delivery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding-top: 250px;
        }
        .payment-section {
            max-width: 600px;
            margin: 0 auto;
            padding: 24px;
            background-color: #f9f9f9;
            border-radius: 10px;
        }
        h1 {
            text-align: center;
        }
        .order-summary {
            margin-top: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }
        .order-summary table {
            width: 100%;
        }
        .order-summary th, .order-summary td {
            padding: 5px;
            border-bottom: 1px solid #ccc;
        }
        .order-summary th {
            text-align: left;
        }
        .total {
            text-align: right;
        }
        .payment-form {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="number"], input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #4CAF50;
            color: #fff;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body  background="images/bg_4.jpg">
    <div class="payment-section">
        <h1>Payment Details</h1>
        <div class="order-summary">
            <table>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                </tr>
                <tr>
                    <td><?php echo $pname; ?></td>
                    <td><?php echo $nitem; ?></td>
                    <td><?php echo $rate; ?></td>
                </tr>
               
                <tr class="total">
                    <td>Total</td>
                    <td><?php echo $total ?></td>
                </tr>
               
            </table>
        </div>
        <form class="payment-form">
          
       <?php  echo "<button class=btn><a href='payment.php?bid=".$bid."'>Pay</button> </a>" ; ?><br/><br/>
       <?php  echo "<button class=btn><a href='userhome.php?bid=".$bid."'>Cancel</button> </a>" ; ?><br/><br/>
      

        </form>
    </div>
    <?php
// Define your menu items with prices (you can fetch these from a database in a real application)
/*$menuItems = [ "Item 1" => 10.00,];

// Initialize variables for order summary and total
$orderSummary = [];
$total = 0.00;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the payment form
    $cardNumber = $_POST["card-number"];
    $expiryDate = $_POST["expiry-date"];
    $cvv = $_POST["cvv"];

    // Calculate the total based on selected items
    foreach ($_POST as $item => $quantity) {
        if (array_key_exists($item, $menuItems)) {
            $itemTotal = $menuItems[$item] * $quantity;
            $total += $itemTotal;
            $orderSummary[] = "$item ($quantity) - $" . number_format($itemTotal, 2);
        }
    }

    // Perform any necessary server-side processing here
    // For example, you can validate the card information and record the transaction.

    // Display a success message
    echo "<h2>Payment Successful</h2>";
    echo "";
}*/
?>
   
