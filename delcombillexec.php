<?php
include 'db.php';
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	mysqli_query($con, "DELETE from commercial_bill WHERE id='$id'");
		 echo '<script>alert("Successfully Deleted!")</script>';
		 echo "<script>windows: location='cbilling.php'</script>";
?>