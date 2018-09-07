<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Forgot Page</title>
	<link rel="stylesheet" href="style03.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<div class="header">
	<h1>Life Tips</h1>
	<a href="Register.php" class="signup"><i class="fas fa-user-plus fa-2x"></i></a><br><br>
    </div>
    
    <div class="contents">
    	<form action="test2.php" method="POST">
    		<h2>Forgot your password?</h2>
    		<p>Email address<br> <input type="text" name="email" minlength="4" maxlength="46" required class="address"><br></p>
        	<input id="submit_button" type="submit" value="パスワードのメールを送信する"><br><br>
            <a href="Login.php">ログイン画面へ戻る<br><br></a>
        </form>
    </div>
</body>
