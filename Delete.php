<?php
session_start();
include 'db.connect.php';
$userid = $_SESSION["userid"];

    $sql = "DELETE FROM people WHERE userid='$userid'";

    if ($conn->query($sql) === TRUE) {
       echo "Record is deleted successfully";
    } else {
       echo "Error during deleting record: " . $conn->error;
}
?>

<a href="Login.php">Login Page</a>