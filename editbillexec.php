<?php
include 'db.php';
$owner_id =$_REQUEST['id'];
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$prev = isset($_POST['prev']) ? $_POST['prev'] : '';
	$pres = isset($_POST['pres']) ? $_POST['pres'] : '';
	$default= isset($_POST['default_amount']) ? $_POST['default_amount'] : '';
	$first= isset($_POST['first_rate']) ? $_POST['first_rate'] : '';
	$second= isset($_POST['second_rate']) ? $_POST['second_rate'] : '';
	$third= isset($_POST['third_rate']) ? $_POST['third_rate'] : '';
	$date= isset($_POST['date']) ? $_POST['date'] : '';
	$status= isset($_POST['status']) ? $_POST['status'] : '';

	mysqli_query($con, "UPDATE bill SET id ='$id', prev ='$prev',
		 pres ='$pres', default_amount='$default', first_rate='$first', second_rate='$second', third_rate='$third', date='$date', status='$status' WHERE id = '$owner_id'");
		 echo '<script>alert("Successfully Updated!")</script>';
		 echo "<script>windows: location='rbilling.php'</script>";
?>		 