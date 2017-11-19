<?php
include 'db.php';
	
	$account_id = isset($_POST['id']) ? $_POST['id'] : '';
	$account = isset($_POST['account']) ? $_POST['account'] : '';
	$barangay= isset($_POST['barangay']) ? $_POST['barangay'] : '';
	$meterno = isset($_POST['meterno']) ? $_POST['meterno'] : '';

	mysqli_query($con, "INSERT INTO  commercial_owners (id,account,barangay,meterno) 
		 VALUES ('$account_id','$account','$barangay','$meterno')"); 
				
				echo '<script>alert("Successfully Added!")</script>';
				echo '<script>windows: location="cclients.php"</script>';
?>