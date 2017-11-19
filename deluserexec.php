<?php
include 'db.php';
	$id = $_POST['id'];
	mysqli_query($con, "DELETE FROM user WHERE id='$id'");
	
		 echo '<script>alert("Successfully Deleted!")</script>';
		 echo "<script>windows: location='users.php'</script>";				
?>