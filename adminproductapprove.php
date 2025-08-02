<?php
include 'connection.php';
if(isset($_GET['bid']))
{
    $bid=$_GET['bid'];
    $q="select * from booking where bid='$bid'";
    $result=mysqli_query($conn,$q);
    while($row=mysqli_fetch_array($result))
    {
        $bid=$row[0];
        
    }
        $q="update booking set status='Delivered' where bid='$bid'";
            $result=mysqli_query($conn,$q);
            if($result)
			{
				echo "<script>alert('Successfully Delivered')</script>";
				echo "<script>location.href='adminhome.html'</script>";
			}	
			else
			{
				echo "<script>alert('Sorry  Error')</script>";
                echo "<script>location.href='adminhome.html'</script>";

			}
}
   

    


 ?>