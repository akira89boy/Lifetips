<?php
session_start();
include 'db.connect.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Page</title>
	<link rel="stylesheet" href="style04.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
</head>
<body>

<?php

$userid = $_SESSION["userid"];
$image = "";

$sql = "SELECT * FROM people where userid = $userid";
$result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $image = $row["image"];
        } 
    } else {
        $image = "default.jpg";
    }

if (isset($_POST["editprofile"])) {

    // var_dump($_FILES["fileToUpload"]);

    if(!empty($_FILES["fileToUpload"]["name"])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                $image = basename( $_FILES["fileToUpload"]["name"]);
            } else {
                echo "Sorry, there was an error uploading your file.";
                $image = "";
            }
        }
    }
    
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

if ($image == ""){
    $sql = "UPDATE people SET username = '$username', email = '$email', password = '$password' WHERE userid ='$userid'";
} else {
    $sql = "UPDATE people SET username = '$username', email = '$email', password = '$password', image = '$image' WHERE userid='$userid'";
}


if ($conn->query($sql) === TRUE) {
  echo "Record is updated successfully";
     $_SESSION["username"] = $username;
     $_SESSION["email"] = $email;
     $_SESSION["password"] = $password;

} else {
  echo "Error during updating record: " . $conn->error;
 }
}



?>

    <div class="user">
        <?php echo "ようこそ ".$_SESSION["username"]." さん !"; ?>
    </div>
	<div class="header">
		<h1>Life Tips</h1>
        <a href="test.php" class="main"><i class="fas fa-list-alt fa-2x"></i></a>
        <a href="Logout.php" class="logout"><i class="fas fa-sign-out-alt fa-2x"></i></a>
        <form action='Delete.php' method='POST'>
            <input type='submit' class="delete" value='Delete' name='delete' style="font-size: 25px;background-color: white; color: black; border-radius: 30px; cursor: pointer;">
        </form>
    </div>
	<div class="container">
    	<h2>Edit profile</h2>
    </div>
    <div class="avatar-upload">
        <form action="Edit.php" method="POST" enctype="multipart/form-data">
        <div class="avatar-edit">
            <input type='file' id="fileToUpload" name="fileToUpload" accept=".png, .jpg, .jpeg" />
            <label for="fileToUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url(<?php echo "uploads/$image"; ?>);">
            </div>
        </div>
    </div>
</div>

<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#fileToUpload").change(function() {
    readURL(this);
});

</script>

    <div class="contents">
    		<h3>Profile</h3>
    		<p>Name: <input type="text" name="username" minlength="2" maxlength="30" value="<?php echo $_SESSION['username']; ?>" required><br></p>
        	<p>Email Address: <input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" required><br></p>
        	<p>Password: <input type="text" name="password" minlength="4" maxlength="13" value="<?php echo $_SESSION['password']; ?>" required><br><br><br></p>
            <input id="submit_button" type="submit" name="editprofile" value="登録する" style="width: 200px;font-size: 25px;background-color: #FE2E2E; color: white; font-family:BatangChe; border-radius: 30px; cursor: pointer;}"><br><br><br>
        </form>
  	</div>
