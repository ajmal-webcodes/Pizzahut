<?php 
include 'connection.php'; 
if(isset($_REQUEST['submit']))
 { 
   $fname=$_REQUEST['fname'];
   $lname=$_REQUEST['lname'];
   $Email=$_REQUEST['Email'];
    $phno=$_REQUEST['phno'];
   $password=$_REQUEST['password'];
   $cpassword=$_REQUEST['cpassword'];
  
   $c="select count(*) as count from registration where uname='$Email'";
   $s=mysqli_query($conn,$c);
   $f=mysqli_fetch_array($s);
   if($f['count']==0)
   { 
      $q="INSERT INTO registration(fname,lname,uname,phno,Password,cpassword) values('$fname','$lname','$Email','$phno','$password','$cpassword')";
      $s=mysqli_query($conn,$q);
      if($s)
      {
            $q="INSERT INTO login(Username,Password,Role)values('$Email','$password','user')";
            $s=mysqli_query($conn,$q);
            if($s) 
            {
               echo "<script>alert('registration successfull')</script>";
               echo "<script>location.href='login.php'</script>";
            }
            else 
            { 
               echo "<script>alert('login error')</script>";
                echo "<script>location.href='login.php'</script>";
             }
      }
      else
      {
         echo "<script>alert('registration error)</script>";
         echo "<script>location.href='registration.php'</script>";
      }
   }

 else
    {
     echo "<script>alert('user already exist')</script>";
    }
 }
 ?>