<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pizza Express</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
	
	
  </head>
  <body>
   
      
     
           
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3 mt-5 pt-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">VIEW PRODUCTS</h2>
            <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
            <p class="mt-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-6">
        		
        	</div>
        </div>
    	</div>
    

    
    
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>

<?php
include 'connection.php';
$q="select * from product";
$r=mysqli_query($conn,$q);
echo "<centre>";
echo "<br>";
echo "<table class=table table-striped><tr><th width=200> pid </th>
<th width=200>Name</th><th width=200>Description</th><th width=200>Price</th>
<th width=200>Stock</th><th width=200>Image</th>
</tr>";
while($row=mysqli_fetch_array($r))
{
  # $imgname=$rows['imgname'];
  echo "<tr>";
  #echo "<td>".$row['pid']."</td>";
  echo "<td>".$row['name']."</td>";
  echo "<td>".$row['description']."</td>";
  echo "<td>".$row['rate']."</td>";
  echo "<td>".$row['type']."</td>";
  echo "<td><img width=200 height=200 src='image/".$row['image']."'</td>";
  $pid=$row[0];
  echo "<td>"."<a href='adminproductupdate.php?pid=".$pid."'>Update</button class=btn-success></a>"."</td>";
  echo "<td>"."<a href='adminproductdelete.php?pid=".$pid."'>Delete</button ></a>"."</td>";


}
echo "</table>";
echo "</centre>";

?>