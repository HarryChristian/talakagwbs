<?php
include('db.php');
$id=$_POST['id'];
$account=$_POST['account'];
$barangay=$_POST['barangay'];
$meterno=$_POST['meterno'];

$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($con, "UPDATE commercial_owners SET id='$id[$i]', account='$account[$i]', barangay='$barangay[$i]', meterno='$meterno[$i]' WHERE id='$id[$i]'")or die(mysqli_error());
}
echo '<script>alert("Successfully Updated!")</script>';
echo "<script>windows: location='cclients.php'</script>";

?>