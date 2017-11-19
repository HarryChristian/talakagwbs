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
<title>TMWS Water Billing System</title>
<link href="css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">

<script src="js/jquery1.js" type="text/javascript"></script>
<script src="js/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel2.png'
	  })
	})
  </script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TMWS Water Billing System</title>
<style>
.active a{
    background-color: #46b1e4 !important;
}
/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 100px;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #46b1e4}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
    background-color: #839fd1;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
</head>

<script src="js/jqueryy.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

<body>
<nav class="navbar navbar-default" style="border: 5px #0985c5; background-color: #0985c5;">
  <div class="container-fluid">
    <div class="navbar-header">
      <img height="50" width="50" draggable="false" src="img/tmws.png" style="float: left; margin-right: 10px;">
      <a class="navbar-brand" href="" style="color: white;">TMWS Water Billing System</a>
    </div>
    <ul class="nav navbar-nav">
    <li><a href="home.php" style="color: white;">Home</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn" style="color: white; background-color: #0985c5; font-size: 14px;">Billing<span class="caret"></span></a>
    <div class="dropdown-content">
      <a href="rbilling.php" style="color: white;">Residential</a>
      <a href="cbilling.php" style="color: white;">Commercial</a>
    </div>
  </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn" style="color: white; background-color: #46b1e4; font-size: 14px;">Clients<span class="caret"></span></a>
    <div class="dropdown-content">
      <a href="rclients.php" style="color: white; background-color: #46b1e4;">Residential</a>
      <a href="cclients.php" style="color: white;">Commercial</a>
    </div>
  </li>
    <li><a href="users.php" style="color: white;">Users</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a align="center" style="color: white;">Current User: <?php echo $_SESSION['username']; ?></a></li>
      <li><a class="btn btn-danger" href="logout.php" style="padding: 10px 10px 10px 10px; margin-top: 3px; margin-right: 4px; color: white; background-color: #fa7d78;" onclick="return confirm('Logout? Are you sure?');">Logout</a></li>
    </ul>
  </div>
</nav>

<div class="container" style="width:1280px; height: 0px; margin-top: 0px; margin-bottom: 0px;">
<center><strong style="font-size: 30px;">Residential Clients</strong></center>
</div>

<div class="container" style="width:1280px;">
<form action="multclient.php" method="post">
<a class="btn btn-primary" rel="facebox" href="addclient.php" style="margin-bottom: 10px;">Add New Client</a>
<button class="btn btn-success" style="margin-right: 0px; margin-bottom: 10px; margin-left: 818px;" name="edit" type="submit" id="validate">Edit Selected</button>
<button class="btn btn-warning" style="margin-right: 0px; margin-bottom: 10px;" name="delete" type="submit" id="validate" onclick="return confirm('Delete Selected Client/s? Are You Sure?');">Delete Selected</button>
<input type="checkbox" name="select-all" id="select-all" style="margin-left: 10px;"> <strong>All</strong>
  <div style="overflow: auto; height: 530px;">
  <table cellpadding="0" cellspacing="0" border="0" class="table table-hover table-bordered" id="example">
    <thead>
      <tr> 
        <th style="text-align:center; color:black; width: 18%">Last Name</th>
        <th style="text-align:center; color:black; width: 18%">First Name</th>
        <th style="text-align:center; color:black; width: 18%">Barangay Name</th>
        <th style="text-align:center; color:black; width: 18%">Meter Number</th>
        <th style="text-align:center; color:black; width: 16%">Functions</th>
        <th style="text-align:center; color:black; width: 8%;">Select</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $query=mysqli_query($con, "SELECT * FROM owners ORDER BY lname ASC")or die(mysqli_error());
    while($row=mysqli_fetch_array($query)){
    $id=$row['id'];
    ?>
      <tr>        
        <td style="text-align:center;"><?php echo $row['lname'] ?></td>
        <td style="text-align:center;"><?php echo $row['fname'] ?></td>
        <td style="text-align:center;"><?php echo $row['barangay'] ?></td>
        <td style="text-align:center;"><?php echo $row['meterno'] ?></td>
        <?php
 echo "<td style='width: 12%; text-align:center;'><a class='btn btn-success' rel='facebox' href='edit.php?id=".$row['id']."'>Edit</a> ";
 echo "<a class='btn btn-warning' rel='facebox' href='del.php?id=".$row['id']."'>Delete</a></td>";
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