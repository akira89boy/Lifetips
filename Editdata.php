<?php
session_start();
include 'db.connect.php';

$userid = $_SESSION["userid"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "UPDATE people SET username = '$username', email = '$email', password = '$password' WHERE userid='$userid'";

if ($conn->query($sql) === TRUE) {
  echo "Record is updated successfully";
  	// $_SESSION["username1"] = $username;
   //  $_SESSION["email"] = $email;
   //  $_SESSION["password"] = $password;

} else {
  echo "Error during updating record: " . $conn->error;
}
?>

<a href="test.php">Mainへ戻る<br><br></a>
