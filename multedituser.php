<?php
include('db.php');

		$id=$_POST['id'] ;
		$username= $_POST['username'] ;					
		$password=$_POST['password'] ;
		$last_name=$_POST['last_name'] ;
        $first_name=$_POST['first_name'] ;

$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($con, "UPDATE user SET id='$id[$i]', username='$username[$i]', password='$password[$i]', last_name='$last_name[$i]', first_name='$first_name[$i]' WHERE id='$id[$i]'")or die(mysqli_error());
}
echo '<script>alert("Successfully Updated!")</script>';
echo "<script>windows: location='users.php'</script>";

?>