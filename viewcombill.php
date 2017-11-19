<?php session_start(); ?>
<?php
  include 'db.php';
  error_reporting(0);
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


<center><strong><p style="font-size: 30px; margin-top: 14px;">Residential Client's Bill/s</p></strong></center><hr>
<div class="container" style="overflow: auto; height: 440px;">

<form action="viewpayment.php" method="post">

<p style="margin: 0px;font-size: 18px;"><b>Name:</b> <?php echo $account;?></p> 



<p style="font-size: 18px; margin-bottom: 15px; float: left;"><b>Barangay:</b> <?php echo $barangay;?> </p>


<p style="float: left; font-size: 14px; font-weight: bold; margin-top: 4px; margin-right: 10px; margin-left: 510px;">Billing Date:</p>
 <input type="text" name="billmonth" id="billmonth" value="<?php echo date("F"); ?>" placeholder="Month" style="width: 75px; float: left;">
 <input type="text" name="billyear" id="billyear" value="<?php echo date("Y"); ?>" placeholder="Year" style="width: 45px; float: left;">
 <p style="float: left; font-size: 14px; font-weight: bold; margin-top: 4px; margin-left: 15px; margin-right: 10px;">Due Date:</p>
 <input type="text" name="duedate" id="duedate" value="" placeholder="ex. 17-Oct-17" style="width: 117px; float: left;">
  <table style="text-align: center;" class="table table-bordered">
    <thead>
	  <tr>
		<th style="width: 10%;text-align:center;">Previous Reading</th>
		<th style="width: 10%; text-align:center;">Present Reading</th>
		<th style="width: 10%; text-align:center;">Consumption</th>
		<th style="width: 5%; text-align:center;">Default Price</th>
    <th style="width: 5%; text-align:center;">First Rate</th>
    <th style="width: 5%; text-align:center;">Second Rate</th>
    <th style="width: 5%; text-align:center;">Third Rate</th>
		<th style="width: 10%; text-align:center;">Bill Amount</th>
    <th style="width: 10%; text-align:center;">Reading Date</th>
    <th style="width: 10%; text-align:center;">Status</th>
		<th style="width: 20%; text-align:center;">Functions</th>
      </tr>
    </thead>
    <tbody>
 <?php
$id =$_REQUEST['id'];
$result = mysqli_query($con, "SELECT * FROM commercial_bill WHERE account_id='$id' ORDER BY id DESC");
while($row = mysqli_fetch_array($result))
  {
	  $prev=$row['prev'];
	  $pres=$row['pres'];
    $first=$row['first_rate'];
    $second=$row['second_rate'];
    $third=$row['third_rate'];
    $default=$row['default_amount'];
    $status=$row['status'];
	  $totalcons=$pres - $prev;
    $setcons=10;
    //Formula for the bill amount
    if ($totalcons <= 10) {
      $bill = $default;
    }
    else if ($totalcons <= 20) {
      $bill = ($totalcons - 10) * ($first) + $default;
    }
    else if ($totalcons <= 30) {
      $bill = ($setcons) * ($first) + ($totalcons - 20) * ($second) + $default;
    }
    else if ($totalcons > 30) {
      $bill = ($setcons) * ($first) + ($setcons) * ($second) + ($totalcons - 30) * ($third) + $default;
    }
    //Return a two decimal format for the bill amount
    $billformat = number_format($bill, 2, '.', '');

  echo "<tr>";
  echo "<td>" . $prev . "</td>";
  echo "<td>" . $pres . "</td>";
  echo "<td>". $totalcons."</td>";
  echo "<td>" . $default . "</td>";
  echo "<td>" . $first . "</td>";
  echo "<td>" . $second . "</td>";
  echo "<td>" . $third . "</td>";
  echo "<td>" . $billformat . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $status . "</td>";
 echo "<td><a class='btn btn-info' name='submit' id='submit' style='background-color: #46b1e4;' href='viewcompayment.php?id=".$row['id']."'>Preview</a> ";
echo "<a class='btn btn-success' rel='facebox' href='editcombill.php?id=".$row['id']."'>Edit</a> ";
 echo "<a class='btn btn-warning' data-toggle='modal' href='delcombill.php?id=".$row['id']."'>Delete</a></td>";
  echo "</tr>";
  }
?>


   </tbody>
  </table>

  </form>

</div>