<?php
include 'db.php';
$owner_id =$_REQUEST['account_id'];
	$account_id = isset($_POST['id']) ? $_POST['id'] : '';
	$account = isset($_POST['account']) ? $_POST['account'] : '';
	$barangay= isset($_POST['barangay']) ? $_POST['barangay'] : '';
	$meterno= isset($_POST['meterno']) ? $_POST['meterno'] : '';

	mysqli_query($con, "UPDATE commercial_owners SET id ='$account_id', account ='$account', barangay='$barangay', meterno='$meterno' WHERE id = '$owner_id'");

		 echo '<script>alert("Successfully Updated!")</script>';
		 echo "<script>windows: location='cclients.php'</script>";
?>		 