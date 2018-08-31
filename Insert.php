<?php
include 'db.connect.php';

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "INSERT INTO people (username, email, password)
VALUES ('$username', '$email', '$password')";


if ($conn->query($sql) === TRUE) {
    echo "おめでとうございます！アカウントが作成されました。";
} else {
    echo "Error: ". $sql . "<br>" . $conn->error;
}
?>
<br>
<a href="Register.php">Register Page</a>
