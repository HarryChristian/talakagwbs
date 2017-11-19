<?php session_start(); ?>
<?php
 include 'db.php';
$id =$_REQUEST['id'];
$result = mysqli_query($con, "SELECT * FROM user WHERE id  = '$id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$id=$test['id'] ;
?>
<form action="multuser.php" method="post">
<a class="btn btn-primary" rel="facebox" href="adduser.php" style="margin-bottom: 10px;">Add New User</a>
<button class="btn btn-success" style="margin-right: 0px; margin-bottom: 10px; margin-left: 782px;" name="edit" type="submit" id="validate">Edit Selected</button>
<a class="btn btn-warning" rel="facebox" style="margin-right: 0px; margin-bottom: 10px;" name="delete" type="submit" id="validate" href="warnmultuser.php">Delete Selected</a>
<input type="checkbox" name="select-all" id="select-all" style="margin-left: 10px;"> <strong>All</strong>
  <div style="overflow: auto; height: 518px;">
  <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="example">
    <thead>
      <tr> 
        <th style="text-align:center; color:black; width: 18%">Username</th>
        <th style="text-align:center; color:black; width: 18%">Password</th>
        <th style="text-align:center; color:black; width: 18%">Last Name</th>
        <th style="text-align:center; color:black; width: 18%">First Name</th>
        <th style="text-align:center; color:black; width: 16%">Functions</th>
        <th style="text-align:center; color:black; width: 8%;">Select</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $query=mysqli_query($con, "SELECT * FROM user ORDER BY username ASC")or die(mysqli_error());
    while($row=mysqli_fetch_array($query)){
    $id=$row['id'];
    ?>
      <tr>        

        <td style="text-align:center;"><?php echo $row['username'] ?></td>
        <td style="text-align:center;"><?php echo $row['password'] ?></td>
        <td style="text-align:center;"><?php echo $row['last_name'] ?></td>
        <td style="text-align:center;"><?php echo $row['first_name'] ?></td>
        <?php
 echo "<td style='width: 12%; text-align:center;'><a class='btn btn-success' rel='facebox' href='edituser.php?id=".$row['id']."'>Edit</a> ";
 echo "<a class='btn btn-warning' rel='facebox' href='deluser.php?id=".$row['id']."'>Delete</a></td>";
      ?>        
        <td style="text-align:center;"><input name="selector[]" type="checkbox" value="<?php echo $id; ?>"></td>
      </tr>
    <?php  } ?>            
    </tbody>
  </table>
  </div>
</form>
</body>
</html>
<script>
  // Listen for click on toggle checkbox
$('#select-all').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    }
});
</script>
<script>
  $('#select-all').click(function(event) {
  if(this.checked) {
      // Iterate each checkbox
      $(':checkbox').each(function() {
          this.checked = true;
      });
  }
  else {
    $(':checkbox').each(function() {
          this.checked = false;
      });
  }
});
</script>