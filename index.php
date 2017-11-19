<!DOCTYPE html>
<html>
<head>
	<title>TMWS WATER BILLING SYSTEM</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body style="background-color: #0985c5;">
<?php
	require('db.php');
	session_start();
    //if form is submitted, insert values into the database.
    if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); //removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
	//checking is user existing in the database or not
        $query = "SELECT * FROM user WHERE BINARY username = BINARY'$username' AND BINARY password = BINARY '$password'";
		$result = mysqli_query($con,$query) or die(mysqli_error());
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("location: home.php"); //redirect user to billing.php
            } else{
            	echo "<script>alert('Invalid Username or Password')</script>";
            	header('refresh: 0.1; url=index.php');
				}
    } else{
?>
<div class="container" style="width: 500px;
	height: 590px;
    border: solid 5px white;
    border-radius: 5px;
    margin-top: 30px;
    background-color: white;
}">
<center><img height="250" width="250" draggable="false" src="img/tmws.png"></center>
<hr style="border: 1px solid #607D8B;">
<center><strong align="center" style="color: #2e3092; font-size: 28px;">TMWS WATER BILLING SYSTEM</strong><hr style="border: 1px solid #607D8B;"></center>
	<form method="post" action="" name="login">
		<div class="form-group" style="color: #2e3092; font-size: 16px;">
			<label for="user">Username:</label>
			<input type="text" name="username" class="form-control" id="user" placeholder="Enter Username" required>
		</div>
		<div class="form-group" style="color: #2e3092; font-size: 16px;">
			<label for="pwd">Password:</label>
			<input type="password" name="password" class="form-control" id="pwd" placeholder="Enter Password" required>
		</div>
		<div align="center">
		<button type="submit" name="ok" class="btn btn-primary" style="background-color: #0da8c6; border-color: #0da8c6; padding-left: 20px; padding-right: 20px; font-size: 16px;">Login</button>
		</div>
	</form>
</div>
<?php } ?>
</body>
</html>