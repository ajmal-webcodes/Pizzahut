<?php
include 'connection.php';
SESSION_START();
if(isset($_GET['pid']))
{
    $pid=$_GET['pid'];
    $a="select * from product where pid='$pid'";
    $result=mysqli_query($conn,$a);
    while($row=mysqli_fetch_array($result))
    {
        $pid=$row[0];
        $pname=$row[1];
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Add Products</title>
  <link rel="stylesheet" href="product.css">
</head>
<body background="images/bg_4.jpg">
  
  <h1>Update Products</h1>
  <form action="adminproductupdate.php" method="post" enctype="multipart/form-data">
  <div class=" form-group mt-3">
              <input type="hidden" class="form-control"  name="pid"  value="<?php echo $pid; ?>" readonly>
                </div>
    <div class="form-group">
      <label for="product-name">Product Name</label>
      <input type="text" id="product-name" name="pname" value="<?php echo $pname; ?>" readonly>
    </div>
   
    <div class="form-group">
      <label for="product-rate">Product Rate</label>
      <input type="number" id="product-rate" name="rate" required>
    </div>
   
   
    <button type="submit" name="submit">Add Product</button>
  </form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
  #echo $fid;
  $pid=$_POST['pid'];
  $pname=$_POST['pname'];
  $rate=$_POST['rate'];
  
  $a="update product set rate='$rate' where pid='$pid'";
  $result=mysqli_query($conn,$a);
  if($result)
  {
    echo "<script>alert('Update Successfully')</script>";

    echo "<script>location.href='Adminproductview.php'</script>";

  }


}
?>