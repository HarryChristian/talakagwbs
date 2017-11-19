<?php
include 'db.php';
	
	$owners_id = isset($_POST['owners_id']) ? $_POST['owners_id'] : '';
	$prev = isset($_POST['prev']) ? $_POST['prev'] : '';
	$pres = isset($_POST['pres']) ? $_POST['pres'] : '';
	$date= isset($_POST['date']) ? $_POST['date'] : '';
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$first = isset($_POST['first_rate']) ? $_POST['first_rate'] : '';
	$second = isset($_POST['second_rate']) ? $_POST['second_rate'] : '';
	$third = isset($_POST['third_rate']) ? $_POST['third_rate'] : '';
	$default = isset($_POST['default_amount']) ? $_POST['default_amount'] : '';
	$status = isset($_POST['status']) ? $_POST['status'] : '';
	$duedate= isset($_POST['duedate']) ? $_POST['duedate'] : '';

	mysqli_query($con, "INSERT INTO  bill (id,owners_id,prev,pres,default_amount,first_rate,second_rate,third_rate,date,status,duedate) 
		 VALUES ('$id','$owners_id','$prev','$pres','$default','$first','$second','$third','$date','$status','$duedate')"); 
				
				echo '<script>alert("Successfully Added!")</script>';
				echo '<script>windows: location="rbilling.php"</script>';
?>