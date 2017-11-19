<?php
	include('db.php');
	error_reporting(0);
    if(isset($_POST['delete'])){

   
	if(isset($_POST['selector'])){
		foreach ($_POST['selector'] as $id):
			mysqli_query($con,"DELETE FROM owners WHERE id='$id'");
		endforeach;
		echo '<script>alert("Successfully Deleted!")</script>';
		echo "<script>windows: location='rclients.php'</script>";
	}
	else{
		echo '<script>alert("Please Select A Client!")</script>';
		echo "<script>windows: location='rclients.php'</script>";
		?>
		<?php
	}
	}
    else if(isset($_POST['edit'])){
       if( empty($_POST['selector']) ) {
echo '<script>alert("Please Select A Client!")</script>';
echo "<script>windows: location='rclients.php'</script>";
}
else {
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
$result = mysqli_query($con,"SELECT * FROM owners where id='$id[$i]'");
while($row = mysqli_fetch_array($result))
{ ?>

<!DOCTYPE html>
<html>
<head>
<title>TMWS Water Billing System</title>
<link href="css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>

	<center><form class="form-horizontal" action="multeditclient.php" method="post">
	<div class="thumbnail" style="width: 300px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 22px;">
	<strong><p align="center" style="font-size: 30px; margin-top: 0px;">Edit Client</p></strong> <hr>
	<div style="margin-top: 0px; margin-bottom: 0px;">
		<div class="control-group">
		<label class="control-label" for="lname" style="font-weight:bold; font-size:18px;">Last Name:</label>
		<div class="controls">
		<input name="id[]" type="hidden" value="<?php echo  $row['id'] ?>" />
			<input name="lname[]" type="text" style="font-weight:bold;" value="<?php echo $row['lname'] ?>" />
		</div>
		</div>
		
		<div class="control-group">
		<label class="control-label" for="fname" style="font-weight:bold; font-size:18px;">First Name:</label>
		<div class="controls">
			<input name="fname[]" type="text" style="font-weight:bold;" value="<?php echo $row['fname'] ?>" />
		</div>
		</div>
	
		<div class="control-group">
		<label class="control-label" for="barangay" style="font-weight:bold; font-size:18px;">Barangay Name:</label>
		<div class="controls">
			<input name="barangay[]" type="text" style="font-weight:bold;" value="<?php echo $row['barangay'] ?>" />
		</div>
		</div>
		
		<div class="control-group">
		<label class="control-label" for="meterno" style="font-weight:bold; font-size:18px;">Meter Number:</label>
		<div class="controls">
			<input name="meterno[]" type="text" style="font-weight:bold;" value="<?php echo $row['meterno'] ?>" />
		</div>
		</div>
		
	</div>
	</div>

	<br/>	

<?php 
}
}
}
?>
<?php
    }
?>	
<input name="submit" class="btn btn-success" type="submit" value="Update" style="margin-bottom: 20px;">
<a class="btn btn-primary" href="rclients.php" style="margin-bottom: 20px;">Back</a>
</form>
</center>

</body>
</html>