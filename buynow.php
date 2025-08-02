<?php
include 'connection.php';

session_start();
$name = $_SESSION['uname'];
$q = "SELECT * FROM registration WHERE uname='$name'";
$r = mysqli_query($conn, $q);
while($row = mysqli_fetch_array($r))
 {
    $user_id = $row[0];
  #  $rate = $row[3];
    $st = $row[4];
}

if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];

    $q = "SELECT * FROM product WHERE pid='$pid'";
    $r = mysqli_query($conn, $q);
    while ($row = mysqli_fetch_array($r)) {
        $pid = $row[0];
        $pname = $row[1];
        $rate = $row[3];
       # $st = $row[4];
    }
 echo $st;
 echo $pid;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Delivery Booking</title>
    <link rel="stylesheet" href="buynow.css">
</head>
<body>
    <header>
        <h1>Food Delivery Booking</h1>
    </header>

    <div class="booking-form" style="background-image: url('./images/bg_4.jpg');">
        <h2>Order Details</h2>
        <form method="post" action="buynow.php">
            <input type="hidden" value="<?php echo $_GET['pid']; ?>" name="pid">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" required>

            <!-- Sample product summary -->
            <h3>Order Summary</h3>
            <ul class="order-summary">
                <li>Item: <?php echo $pname; ?></li>
                <li>Price: <?php echo $rate; ?></li>
            </ul>
            </body>
</html>

            <button type="submit" name="btnsubmit">Proceed</button>
        </form>
    </div>

<?php
if (isset($_POST['btnsubmit']))
 {
    $prid = $_POST['pid'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $quantity = $_POST['quantity'];
    $q = "SELECT * FROM product WHERE pid='$prid'";
    $r = mysqli_query($conn, $q);
    while ($row = mysqli_fetch_array($r)) 
    {
        $prid = $row[0];
        $pname = $row[1];
        $rate = $row[3];
      #  $st = $row[4];
    }
    #$sto = $st - $quantity;
    #echo $sto;
    $t=$rate*$quantity;
    echo $rate*$_POST['quantity'];

   
    // Update product stock in the database
   
   
    
        // Insert order details into the 'booking' table
        $s = "INSERT INTO booking(productid,userid,bname,address,phone,nitem,total,status,paydtls) VALUES ('$prid', '$user_id', '$name', '$address', '$phone', '$quantity','$t','Ordered','Not Paid')";
        $a = mysqli_query($conn, $s);
        
        if ($a) 
        {
            $last_id = mysqli_insert_id($conn);
            $_SESSION['bid'] = $last_id;

            echo "<script>alert('Product booked')</script>";
            echo "<script>location.href='paynow.php'</script>";
        } else 
        {
            echo "Error inserting booking data";
        }
    
     
 }
?>
 