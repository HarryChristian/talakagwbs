<?php session_start(); ?>
<?php
 include 'db.php';
$owner_id =$_REQUEST['id'];
$result = mysqli_query($con, "SELECT * FROM commercial_owners WHERE id  = '$owner_id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$id=$test['id'] ;					
				$account=$test['account'] ;
				$barangay=$test['barangay'] ;
				$meterno=$test['meterno'] ;
?>
<center><form action="delcomexec.php" method="post">
<strong><p style="font-size: 18px;">Delete this client?</p></strong>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<input class="btn btn-danger" type="submit" nsme="ok" value="Delete">
</form></center>