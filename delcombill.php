<link href="css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
<?php session_start(); ?>
<?php
 include 'db.php';
$id =$_REQUEST['id'];
$result = mysqli_query($con, "SELECT * FROM commercial_bill WHERE id  = '$id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$id=$test['id'] ;
?>
<br><br><br><br><br><br><br><br><br>
<form action="delcombillexec.php" method="post" align="center">
<strong><p style="font-size: 18px;">Delete this record?</p></strong>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<input class="btn btn-danger" type="submit" nsme="ok" value="Delete">
<a class="btn btn-primary" href="cbilling.php">Go Back</a>
</form>