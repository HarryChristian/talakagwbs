<?php session_start(); ?>
<?php
include 'db.php';
$user_id =$_REQUEST['id'];

$result = mysqli_query($con, "SELECT * FROM user WHERE id  = '$user_id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$id=$test['id'] ;
				$username= $test['username'] ;					
				$password=$test['password'] ;
				$lname=$test['last_name'] ;
        $fname=$test['first_name'] ;
?>

<div class="container" style="width: 500px;">
<strong><p align="center" style="font-size: 30px; margin-top: 12px;">Edit User</p></strong><hr>
<form method="post" action="edituserecex.php">
    <div class="form-group">
      <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
    </div>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" name="username" class="form-control"  value="<?php echo $username; ?>">
    </div>
  <div class="form-group">
      <label for="password">Password:</label>
      <input type="text" name="password" class="form-control"  value="<?php echo $password; ?>">
    </div>
  <div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="text" name="last_name" class="form-control"  value="<?php echo $lname; ?>" >
    </div>
    <div class="form-group">
      <label for="fname">First Name:</label>
      <input type="text" name="first_name" class="form-control" value="<?php echo $fname; ?>">
    </div>
    <button type="submit" name="save" class="btn btn-success">Update</button>
  </form>
</div>