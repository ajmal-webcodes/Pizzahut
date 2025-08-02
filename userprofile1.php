<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="profile.css">
</head>
<body>
    <?php
    session_start();
    include 'connection.php';

    if (isset($_SESSION['uname'])) {
        $uname = $_SESSION['uname'];
        $query = "SELECT * FROM registration WHERE uname = '$uname'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $f=$row['fname'];
            $l=$row['lname'];
            $email = $row['uname'];
            $phno = $row['phno'];
            $profilePicture = $row['pic'];

        }
    } else {
        header("Location: sign-in.html");
        exit();
    }
    ?>
    <div class="container">
    <div class="profile-container">
        <div class="header">
       <h2><i class="fa-solid fa-arrow-left fa-lg"></i> &nbsp; </h2> </a>  
        <h1><?php echo $f.' '.$l; ?></h1>
     </div>
        <div class="content">
        <img src="<?php echo $profilePicture; ?>" alt="Profile Picture">
        <p><?php echo $email; ?></p>
        <p><strong>Phno:&nbsp;</strong><?php echo $phno; ?></p>
        <!-- You can remove the "Edit Profile" button and form here -->
        <a href="profile_update.php" class="btn">Edit Profile</a>
       </div>
    </div>
</div>
</body>
</html>
