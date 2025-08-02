<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
body {
    background: #dff9e3;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}
.profile-container{
    color:rgba(11, 54, 31);
}
.header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 120px;
    padding: 0 1.7rem;
    color: #dff9e3;
    overflow: hidden;
    background: rgba(11, 54, 31, 0.957);
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.header h1 {
    font-size: 24px;
    margin: 0;
    padding: 0;
}

.header a {
    text-decoration: none;
    color: #dff9e3;
}

.container {
    text-align: center;
    max-width:700px;
    margin: 50px auto;
    line-height: 50px;
    background:#dff9e3;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.container img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin: 20px auto;
    object-fit: cover;
    display: block;
}

.buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 20px;
}

button, .btn {
    background: #104529;
    color:#dff9e3;
    width:50%;
    border: none;
    padding: 10px 20px;
    border-radius: 15px;
    transition: 0.2s;
    cursor: pointer;
}

.btn:hover, button:hover {
    background: #dff9e3;
    color: #104529;
}

form {
    display: flex;
    flex-direction: column;
    margin-top: 10px;
    align-items:center;
}

input[type="file"] {
    margin-top: 10px;
    padding: 5px;
    
}

input[type="submit"],input[type="reset"] {
    background: #104529;
    color: #dff9e3;
    width:50%;
    border: none;
    border-radius: 30px;
    padding: 10px 50px;
    transition: 0.2s;
    cursor: pointer;
    margin-top: 10px;
    margin-bottom: 20px;
}
input[type="text"],input[type="tel"] {
    color:#104529;
    width:320px;
    border: none;
    padding: 10px 20px;
    
   
}
input[type="tel"]{
    margin-bottom: 40px;
}
input[type="reset"]:hover,
input[type="submit"]:hover {
    background: #dff9e3;
    color: #104529;
}
.submitbtn{
    display:flex;
    flex-basis:50%;
    gap:30px;
}


/* Media query for small screens */
@media (max-width: 480px) {
    .container {
        max-width: 100%;
    }
    .profile-container img {
        width: 100px;
        height: 100px;
    }
}
</style>
</head>
<body>
    <?php
    session_start();
    include 'connection.php';

    if (!isset($_SESSION['uname'])) {
        header("Location: sign-in.html");
        exit();
    }

    $email = $_SESSION['uname'];
    $id = $_SESSION['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $newfName = $_POST["newfName"];
        $newlName = $_POST["newlName"];
        $newPhno = $_POST["newPhno"];

        // Handle profile picture upload (you should implement this separately)
        if ($_FILES["newProfilePicture"]["error"] == 0) {
            $targetDir = "profileimg/";
            $targetFile = $targetDir . basename($_FILES["newProfilePicture"]["name"]);
                // Upload the file
                if (move_uploaded_file($_FILES["newProfilePicture"]["tmp_name"], $targetFile)) {
                    // Update user details in the database
                    $updateQuery = "UPDATE registration SET fname = '$newfName',lname = '$newlName', phno = '$newPhno', pic = '$targetFile' WHERE uname = '$email'";
                    if (mysqli_query($conn, $updateQuery)) {
                       echo'<script>alert("Profile updated successfully!");</script>';
                        header("Location:userprofile1.php");
                        exit();
                    } else {
                        echo "Error updating profile: " . mysqli_error($conn);
                    }
                } else {
                    echo "Error uploading profile picture.";
                }
        }
         else 
        {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $newfName = $_POST["newfName"];
                $newlName = $_POST["newlName"];
                $newPhno = $_POST["newPhno"];
                 // Update name and phone number in the registration table
                 $updateRegistrationQuery = "UPDATE registration SET fname = '$newfName',lname = '$newlName', phno = '$newPhno' WHERE uname = '$email'";
                
                if (mysqli_query($conn, $updateRegistrationQuery)) {
                    echo '<script>alert("Profile updated successfully!");</script>';
                    header("Location: userprofile1.php");
                    exit();
                } else {
                    echo "Error updating profile: " . mysqli_error($conn);
                }
                
            }
            
        }
    }

    // Fetch the user's current details
    $query = "SELECT * FROM registration WHERE uname = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $f=$row['fname'];
        $l=$row['lname'];
        $profilePicture = $row['pic'];
        $phno = $row['phno'];
        $email = $row['uname'];
    }
    ?>
    <div class="container">
        <div class="profile-container">
           
             
            <h1>Edit Profile</h1>
            
            <form method="post" action="" enctype="multipart/form-data">
                <!-- Profile Picture Preview -->
                <div id="profilePicturePreview">
                    <img src="<?php echo $profilePicture; ?>" alt="Profile Picture">
                </div>
                <button id="uploadButton">Change Profile Picture</button>

                <!-- Hidden file input with a label -->
                <input type="file" id="fileInput" name="newProfilePicture" accept="image/*" style="display: none;">
                <label for="fileInput" id="fileInputLabel">&nbsp;</label>
                
                <div class="form-group">
                    <label for="newfName">&nbsp;</label>
                    <input type="text" name="newfName" id="newfName" value="<?php echo $f; ?>">
                </div>
                <div class="form-group">
                    <label for="newlName">&nbsp;</label>
                    <input type="text" name="newlName" id="newlName" value="<?php echo $l; ?>">
                </div>
               
                <div class="form-group">
                    <label for="newPhno">&nbsp;</label>
                    <input type="tel" name="newPhno" id="newPhno" value="<?php echo $phno; ?>">
                </div><br>
                <div class="submitbtn">
                <input type="submit" value="&nbsp;Save&nbsp;"><input type="reset" value="cancel">
                </div>
                <a href="profile.php">back</a>
            </form>
            
        </div>
    </div>

</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const uploadButton = document.getElementById("uploadButton");
        const fileInput = document.getElementById("fileInput");
        const profilePicturePreview = document.getElementById("profilePicturePreview");

        uploadButton.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default button behavior (e.g., form submission or link)

            fileInput.click(); // Trigger the file input when the button is clicked
        });

        // Update the label text when a file is selected
        fileInput.addEventListener("change", function() {
            const fileInputLabel = document.getElementById("fileInputLabel");
            if (fileInput.files.length > 0) {
                fileInputLabel.textContent = fileInput.files[0].name;
                // Display the selected image in the preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    profilePicturePreview.innerHTML = `<img src="${e.target.result}" alt="Profile Picture">`;
                };
                reader.readAsDataURL(fileInput.files[0]);
            } else {
                fileInputLabel.textContent = "Choose a file";
                // Reset the preview to the current profile picture
                profilePicturePreview.innerHTML = `<img src="${profilePicture}" alt="Profile Picture">`;
            }
        });
    });
</script>
</html>
