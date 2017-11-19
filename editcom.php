<?php session_start(); ?>
<?php
include 'db.php';
$account_id =$_REQUEST['id'];

$result = mysqli_query($con, "SELECT * FROM commercial_owners WHERE id  = '$account_id'");
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
<div class="container" style="width: 500px;">
<strong><p align="center" style="font-size: 30px; margin-top: 12px;">Edit Client</p></strong><hr>
<form method="post" action="editcomexec.php">
    <div class="form-group">
      <input type="hidden" name="account_id" class="form-control" value="<?php echo $id; ?>">
    </div>
  <div class="form-group">
      <label for="account">Account Name:</label>
      <input type="text" name="account" class="form-control"  value="<?php echo $account; ?>">
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