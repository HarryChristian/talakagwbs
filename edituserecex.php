<?php
include 'db.php';
$user_id =$_REQUEST['id'];
			 		$id = isset($_POST['id']) ? $_POST['id'] : '';
					$username= isset($_POST['username']) ? $_POST['username'] : '';				
					$password= isset($_POST['password']) ? $_POST['password'] : '';
					$lname= isset($_POST['last_name']) ? $_POST['last_name'] : '';
					$fname= isset($_POST['first_name']) ? $_POST['first_name'] : '';
	
mysqli_query($con, "UPDATE user SET id = '$id', username = '$username',
	 password = '$password', last_name = '$lname', first_name = '$fname' WHERE id = '$user_id'");
	 echo '<script>alert("Successfully Updated!")</script>';
	 echo "<script>windows: location='users.php'</script>";
?>