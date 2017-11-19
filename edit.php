<?php session_start(); ?>
<?php
include 'db.php';
$owner_id =$_REQUEST['id'];

$result = mysqli_query($con, "SELECT * FROM owners WHERE id  = '$owner_id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$id=$test['id'] ;
				$lname= $test['lname'] ;					
				$fname=$test['fname'] ;
				$barangay=$test['barangay'] ;
				$meterno=$test['meterno'] ;

?>
<div class="container" style="width: 500px;">
<strong><p align="center" style="font-size: 30px; margin-top: 12px;">Edit Client</p></strong><hr>
<form method="post" action="editecex.php">
    <div class="form-group">
      <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
    </div>
    <div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="text" name="lname" class="form-control"  value="<?php echo $lname; ?>">
    </div>
  <div class="form-group">
      <label for="fname">First Name:</label>
      <input type="text" name="fname" class="form-control"  value="<?php echo $fname; ?>">
    </div>
  <div class="form-group">
      <label for="barangay">Barangay:</label>
      <input type="text" name="barangay" class="form-control"  value="<?php echo $barangay; ?>" >
    </div>
    <div class="form-group">
      <label for="meterno">Meter Number:</label>
      <input type="text" name="meterno" class="form-control" value="<?php echo $meterno; ?>">
    </div>
    <button type="submit" name="save" class="btn btn-success">Update</button>
  </form>
</div>