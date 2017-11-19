<?php
include 'db.php';
	
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$lname = isset($_POST['lname']) ? $_POST['lname'] : '';
	$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
	$barangay= isset($_POST['barangay']) ? $_POST['barangay'] : '';
	$meterno = isset($_POST['meterno']) ? $_POST['meterno'] : '';

	mysqli_query($con, "INSERT INTO  owners (id,lname,fname,barangay,meterno) 
		 VALUES ('$id','$lname','$fname','$barangay','$meterno')"); 
				
				echo '<script>alert("Successfully Added!")</script>';
				echo '<script>windows: location="rclients.php"</script>';
?>