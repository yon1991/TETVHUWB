<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexstyle.css">
    <title>Document</title>
</head>
<body>
    <div class="bg-image">
        <img src="cyber.jpg" class = "image">
    </div>

<div class="login">
<?php
require('db.php');
session_start();

if (isset($_POST['username'])){

    $username = $_REQUEST['username'];
	$password = ($_REQUEST['password']);
   
    $query = "SELECT * FROM `users` WHERE `username`='$username' and `password`='' + '$password'";
	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
	    header("Location: start.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='index.php'>Login</a></div>";
	}
    }else{
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required /><br>
<input type="password" name="password" placeholder="Password" required />
<br>
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
<p>The registration form can be succesfully created</p>
<h3>please enter the user name and password</h3>
</div>
<?php } ?>
</body>
</html>
