<?php session_start();
if(!isset($_SESSION['username'])){
    echo '<script>windows: location="index.php"</script>';
    }

?>
<?php
$session=$_SESSION['username'];
include 'db.php';
$result = mysqli_query($con, "SELECT * FROM user WHERE username = '$session'");
while($row = mysqli_fetch_assoc($result))
  {
  $sessionname=$row['username'];

  }
?>
<!DOCTYPE html>
<html>
<head>
<title>Talakag Water Billing System</title>
<link href="css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Billing System</title>
</head>
<body>
<div class="container" style="width: 500px;">
<strong><p align="center" style="font-size: 30px; margin-top: 12px;">Add New Client</p></strong><hr>
<form method="post" action="addclientexec.php">
    <div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name" required>
    </div>
	<div class="form-group">
      <label for="fname">First Name:</label>
      <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name" required>
    </div>
	<div class="form-group">
      <label for="barangay">Barangay:</label>
      <input type="text" name="barangay" class="form-control" id="barangay" placeholder="Barangay" required>
    </div>
    <div class="form-group">
      <label for="meterno">Meter Number:</label>
      <input type="text" name="meterno" class="form-control" id="meterno" placeholder="Meter Number" required>
    </div>
    <button type="submit" name="add" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-primary">Clear</button>
  </form>
</div>