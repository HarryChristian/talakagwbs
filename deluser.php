<?php session_start(); ?>
<?php
 include 'db.php';
$id =$_REQUEST['id'];
$result = mysqli_query($con, "SELECT * FROM user WHERE id  = '$id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$id=$test['id'] ;
?>
<center><form action="deluserexec.php" method="post">
<strong><p style="font-size: 18px;">Delete this account?</p></strong>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<input class="btn btn-danger" type="submit" nsme="ok" value="Delete">
</form></center>
