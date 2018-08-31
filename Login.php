<?php
session_start();

include 'db.connect.php';

if(isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM people WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    echo $result->num_rows;

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $userid = $row["userid"];
            $username = $row["username"];
            $email = $row["email"];
            $password = $row["password"]; 

            $_SESSION["userid"] = $userid;
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;

         header("Location:test.php");
        } 
    } else {
        echo "(注)ユーザー名もしくはパスワードが間違っています。";
    }
            
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Page</title>
	<link rel="stylesheet" href="style05.css">
</head>
<body>
    <div class="logo">
        <h1>Life Tips</h1>
    </div>
    
    <div class="vid-container">
        <video class="bgvid" autoplay="autoplay" muted="muted" preload="auto" loop>
        <source src="http://mazwai.com/system/posts/videos/000/000/109/webm/leif_eliasson--glaciartopp.webm?1410742112" type="video/webm">
        </video>
    <div class="inner-container">
        <video class="bgvid inner" autoplay="autoplay" muted="muted" preload="auto" loop>
        <source src="http://mazwai.com/system/posts/videos/000/000/109/webm/leif_eliasson--glaciartopp.webm?random=1" type="video/webm">
        </video>
    <div class="box">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"" method="POST">
            <h3>Login</h3>
            <input type="text" placeholder="Username" name="username" required/>
            <input type="text" placeholder="Password" name="password" required/>
            <input type="hidden" name="userid" value="$userid">
            <button type="submit" name="login">Login</button>
            <a href="Register.php">Not a member?</a><br><br>
            <a href="Forgot.php">Forgot your password ?</a>
        </form>
    </div>
    </div>
    </div>
    	</body>
</html>
