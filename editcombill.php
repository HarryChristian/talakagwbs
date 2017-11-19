<?php session_start(); ?>
<?php
include 'db.php';
$owner_id =$_REQUEST['id'];

$result = mysqli_query($con, "SELECT * FROM commercial_bill WHERE id  = '$owner_id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$id=$test['id'] ;
				$prev= $test['prev'] ;					
				$pres=$test['pres'] ;
				$default=$test['default_amount'] ;
				$first=$test['first_rate'] ;
        $second=$test['second_rate'] ;
        $third=$test['third_rate'] ;
        $date=$test['date'] ;
        $status=$test['status'] ;

?>
<!DOCTYPE html>
<html>
<head>
<title>TMWS Water Billing System</title>
<link href="css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>

<div class="container" style="width: 500px;">
<strong><p align="center" style="font-size: 30px; margin-top: 50px;">Edit Bill</p></strong><hr>
<form method="post" action="editcombillexec.php">
    <div class="form-group">
      <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
    </div>
    <div class="form-group" style="float: left;">
      <label for="prev">Previous Reading:</label>
      <input type="text" name="prev" class="form-control"  value="<?php echo $prev; ?>">
    </div>
  <div class="form-group" style="float: left; margin-left: 64px;">
        <label for="default_amount">Default Price:</label>
      <input type="text" name="default_amount" class="form-control"  value="<?php echo $default; ?>" >
    </div>
  <div class="form-group" style="float: left;">
      <label for="pres">Present Reading:</label>
      <input type="text" name="pres" class="form-control"  value="<?php echo $pres; ?>">
    </div>
    <div class="form-group" style="float: left; margin-left: 64px;">
          <label for="first_rate">First Rate:</label>
      <input type="text" name="first_rate" class="form-control" value="<?php echo $first; ?>">
    </div>
    <div class="form-group" style="float: left;">
      <label for="date">Reading Date:</label>
      <input type="text" name="date" class="form-control" value="<?php echo $date; ?>">
    </div>
        <div class="form-group" style="float: left; margin-left: 64px;">
      <label for="second_rate">Second Rate:</label>
      <input type="text" name="second_rate" class="form-control" value="<?php echo $second; ?>">
    </div>
        <div class="form-group" style="float: left;">
      <label for="status">Status:</label>
      <input type="text" name="status" class="form-control" value="<?php echo $status; ?>">      
    </div>
      <div class="form-group" style="float: left; margin-left: 64px;">
      <label for="third_rate">Third Rate:</label>
      <input type="text" name="third_rate" class="form-control" value="<?php echo $third; ?>">
    </div>
    <button type="submit" name="save" class="btn btn-success">Update</button>
    <a class="btn btn-primary" href="cbilling.php">Go Back</a>
  </form>
</div>

</body>
</html>