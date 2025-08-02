<?php 
include 'connection.php'; 
if(isset($_REQUEST['submit']))
 { 
   $name=$_REQUEST['name'];
   $description=$_REQUEST['description'];
   $rate=$_REQUEST['rate'];
   $type=$_REQUEST['type'];
    $filename=$_FILES["image"]["name"];
    $tempname=$_FILES["image"]["tmp_name"];
    $folder="./image/". $filename;

   { 
      $q="INSERT INTO product(name,description,rate,type,image) values('$name','$description','$rate','$type','$filename')";
      $s=mysqli_query($conn,$q);
      if($s)
  
      {
        
            if(move_uploaded_file($tempname,$folder))
      
                echo "<script>alert('product added Successfully')</script>";
                echo "<script>location.href='adminhome.html'</script>";
      }
      else
      {
         echo "<script>alert('registration error)</script>";
         echo "<script>location.href='add-product.php'</script>";
      }
   }

 }
 ?>