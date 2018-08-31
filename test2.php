<?php
session_start();
include 'db.connect.php';
 
$email = $_POST["email"];
$subject = "Forget Password - Message";

// var_dump($email);

$sql = "SELECT password FROM people WHERE email='$email'";
$result = $conn->query($sql);

if($result->num_rows > 0){
	// while($row = $result->fetch_assoc()) {
	$row = $result->fetch_assoc();
		$password = $row["password"];
		$message = "password: $password";
		$result = mail("$email","$subject","$message"); //sending email
		// }
	} else {
	echo "Email is not found";
}

echo $conn->error;

echo 
 
echo "mail sent at " . time();

?>