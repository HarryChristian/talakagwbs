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
				$id = $test['id'] ;				
				$account = $test['account'] ;
				$barangay = $test['barangay'] ;
				$meterno = $test['meterno'] ;

?>

  <strong><p align="center" style="font-size: 30px; margin-top: 12px;">Add Client's Bill</p></strong><hr>
<p style="margin-bottom: 3px; font-size: 20px;"><b>Name:</b> <?php echo $account?> <br> <b>Barangay:</b> <?php echo $barangay;?> </p>
 <form method="post" action="addcombill.php">
<div>    
  <table class="table" style="width: 420px;">
    <thead>
          <tr>
  <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <td>Reading Date:</td>
  <td><input type="text" name="date" value="<?php $date=date('d-M-y'); echo $date; ?>" /></td>
    <td></td>
      </tr>
      <tr>
    <td>Previous Reading:</td>
    <td><input type="text" name="prev"  required/></td>
    <td>Cu.m</td>
      </tr>
    </thead>
    <tbody>
      <tr>
     <td>Present Reading:</td>
    <td><input type="text" name="pres" required/></td>
    <td>Cu.m</td>
     </tr>
      <tr>
     <td>Default Price:</td>
    <td><input type="text" name="default_amount" value="50.00" required/></td>
    <td>PHP</td>
     </tr>
           <tr>
     <td>First Rate:</td>
    <td><input type="text" name="first_rate" value="7.00" required/></td>
    <td>PHP</td>
     </tr>
           <tr>
     <td>Second Rate:</td>
    <td><input type="text" name="second_rate" value="7.50" required/></td>
    <td>PHP</td>
     </tr>
           <tr>
     <td>Third Rate:</td>
    <td><input type="text" name="third_rate" value="8.00" required/></td>
    <td>PHP</td>
     </tr>
           <tr>
     <td>Status:</td>
    <td><input type="text" name="status" value="Not Paid" required/></td>
    <td>PHP</td>
     </tr>
      <tr>
        <td style="border: none;"><button type="submit" name="total" class="btn btn-primary">Submit</button></td>
      </tr>
    </tbody>
  </table>
</div>