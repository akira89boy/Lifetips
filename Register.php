<?php
include 'db.connect.php';
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register Page</title>
	<link rel="stylesheet" href="style02.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div class="header">
	<h1>Life Tips</h1>
	<a href="Login.php" class="Login"><i class="fas fa-sign-in-alt fa-2x"></i></a><br><br>
    </div>
    
    <div class="contents">
    	<form action="Insert.php" method="POST">
    		<h2>Life Tipsへようこそ！登録する</h2>
    		<p>名前: <input type="text" name="username" required><br></p>
        	<p>メールアドレス: <input type="email" name="email" required><br></p>
        	<p>パスワード: <input type="text" name="password" required><br></p>
        	<h3>Life Tipsに登録する</h3>
        	<input id="submit_button" type="submit" name="submit" value="登録する" style="width: 200px;font-size: 25px;background-color: #FFFF00; color: black; font-family:HG行書体; border-radius: 30px; cursor: pointer;"><br><br><br>
        </form>
    </div>
</body>
</html>