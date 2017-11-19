<?php
include('db.php');
$id=$_POST['id'];
$lname=$_POST['lname'];
$fname=$_POST['fname'];
$barangay=$_POST['barangay'];
$meterno=$_POST['meterno'];

$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($con, "UPDATE owners SET id='$id[$i]', lname='$lname[$i]', fname='$fname[$i]', barangay='$barangay[$i]', meterno='$meterno[$i]' WHERE id='$id[$i]'")or die(mysqli_error());
}
echo '<script>alert("Successfully Updated!")</script>';
echo "<script>windows: location='rclients.php'</script>";

?>