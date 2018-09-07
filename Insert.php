<?php
include 'db.connect.php';

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$error = 0; 
$message1 = ""; 
$message2 = "";

$sql_B = "SELECT * FROM people WHERE email = '$email'";
$result_B = $conn->query($sql_B);

if($result_B->num_rows > 0) {
	$message1 = "アカウントは既に存在しています。";
	$error = 1;
	echo $message1;
} else {
	$sql = "INSERT INTO people (username, email, password)
	VALUES ('$username', '$email', '$password')";
		if ($conn->query($sql) === TRUE) {
    	echo "おめでとうございます！アカウントが作成されました。";
		} else {
    	echo "Error: ". $sql . "<br>" . $conn->error;
	}
}


?>
<br>
<a href="Register.php">Register Page</a>
