<?php
include 'db.php';
$owner_id =$_REQUEST['id'];
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$lname = isset($_POST['lname']) ? $_POST['lname'] : '';
	$fname = isset($_POST['fname']) ? $_POST['fname'] : '';
	$barangay= isset($_POST['barangay']) ? $_POST['barangay'] : '';
	$meterno= isset($_POST['meterno']) ? $_POST['meterno'] : '';

	mysqli_query($con, "UPDATE owners SET id ='$id', lname ='$lname',
		 fname ='$fname', barangay='$barangay', meterno='$meterno' WHERE id = '$owner_id'");
		 echo '<script>alert("Successfully Updated!")</script>';
		 echo "<script>windows: location='rclients.php'</script>";
?>		 