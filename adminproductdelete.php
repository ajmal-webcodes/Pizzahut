<?php
include 'connection.php';
SESSION_START();
if(isset($_GET['pid']))
{
    $pid=$_GET['pid'];
   # $a="select * from tblfood where fid='$fid'";
 #   $result=mysqli_query($conn,$a);
  ##  {
  #      $fid=$row[0];
   #     $fname=$row[1];
   # }
$a="delete from product where pid='$pid'";
  $result=mysqli_query($conn,$a);
  if($result)
  {
    echo "<script>location.href='adminproductview.php'</script>";

  }


}
?>