
<body>
<br />

<div class="container">

<a href="bill.php" style="margin-left: 165px; font-family:cursive;" class="btn btn-danger">Return</a>
<br />
<br />
<form class="form-horizontal" action="edit_save.php" method="post">    
<?php
include('db.php');
if( empty($_POST['selector']) ) {
echo '<script>alert("Please Select A Record!")</script>';
echo "<script>windows: location='bill.php'</script>";
}
else {
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
$result = mysqli_query($con,"SELECT * FROM owners where id='$id[$i]'");
while($row = mysqli_fetch_array($result))
{ ?>
	<div class="thumbnail" style="margin:auto; width:600px;">
	<div style="margin-left: 70px; margin-top: 20px;">
		<div class="control-group">
		<label class="control-label" for="inputEmail" style="font-family:cursive; font-weight:bold; font-size:18px; color:blue;">Firstname</label>
		<div class="controls">
		<input name="member_id[]" type="hidden" value="<?php echo  $row['id'] ?>" />
			<input name="firstname[]" type="text" style="font-family:cursive; font-weight:bold;" value="<?php echo $row['lname'] ?>" />
		</div>
		</div>
		
		<div class="control-group">
		<label class="control-label" for="inputEmail" style="font-family:cursive; font-weight:bold; font-size:18px; color:blue;">Lastname</label>
		<div class="controls">
			<input name="lastname[]" type="text" style="font-family:cursive; font-weight:bold;" value="<?php echo $row['fname'] ?>" />
		</div>
		</div>
	
		<div class="control-group">
		<label class="control-label" for="inputEmail" style="font-family:cursive; font-weight:bold; font-size:18px; color:blue;">Middlename</label>
		<div class="controls">
			<input name="middlename[]" type="text" style="font-family:cursive; font-weight:bold;" value="<?php echo $row['barangay'] ?>" />
		</div>
		</div>
		
		<div class="control-group">
		<label class="control-label" for="inputEmail" style="font-family:cursive; font-weight:bold; font-size:18px; color:blue;">Address</label>
		<div class="controls">
			<input name="address[]" type="text" style="font-family:cursive; font-weight:bold;" value="<?php echo $row['meterno'] ?>" />
		</div>
		</div>
	</div>
	</div>

	<br />	
<?php 
}
}
}
?>
<input name="" class="btn btn-success" style="margin-left: 165px; font-family:cursive;" type="submit" value="Update">
</form>

</div>
</body>
</html>