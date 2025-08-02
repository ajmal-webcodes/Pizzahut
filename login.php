<?php
include 'connection.php';
SESSION_START();
if(isset($_REQUEST['submit']))
{
    $uname=$_REQUEST['uname'];
    $_SESSION['uname']=$uname;
    $pwd=$_REQUEST['password'];
    $q="select count(*) as count from login where Username='$uname'";
    $s=mysqli_query($conn,$q);
    $f=mysqli_fetch_array($s);
    if($f['count']!=0)
{
    $q="select * from login where Username='$uname'";
    $s=mysqli_query($conn,$q);
    $row=mysqli_fetch_array($s);
    $p=$row[2];
    $utype=$row[3];
    if($p==$pwd)
    {
            if($utype=='admin')
            {
                echo "<script>location.href='adminhome.html'</script>";
            }
            else if($utype=='user')
            {
                $q="select uname from registration where uname='$uname'";
                $_SESSION['user_name']=$uname;
                $s=mysqli_query($conn,$q);
                $f=mysqli_fetch_array($s);
                $_SESSION['id']=$f[0];
                echo "<script>location.href='userhome.php'</script>";
            }
             else if($utype=='staff')
            {
                $q="select emp_id from tblstaff where email='$uname'";
                $s=mysqli_query($conn,$q);
                $f=mysqli_fetch_array($s);
                $_SESSION['id']=$f[0];
                echo"<script>location.href='staffhome.php'</script>";
            }
            else
            {
               echo"user does not exist";
            }
        
    }
    else
       {
        echo "wrong password";
       }
    }
    else{
        echo"user doesn't exist";
    }
}
?>
