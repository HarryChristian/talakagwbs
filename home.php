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
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link href="css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="js/jquery1.js" type="text/javascript"></script>
<script src="css/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
	jQuery(document).ready(function($) {
	  $('a[rel*=facebox]').facebox({
		loadingImage : 'src/loading.gif',
		closeImage   : 'src/closelabel.png'
	  })
	})
  </script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
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

@media screen and (orientation: portrait) {
  .boxed { max-width: 90%; }
}

@media screen and (orientation: landscape) {
  .boxed { max-height: 90%; }
}
.boxed
{
max-width: 80%;
border-radius: 3px;
display:inline-block;
border: 1px;
width:230px;
padding:10px;
margin-left: auto;
margin-right: 10px;
}


</style>
</head>
<body>
<nav class="navbar navbar-default" style="border: 5px #0985c5; background-color: #0985c5;">
	<div class="container-fluid">
		<div class="navbar-header">
      <img height="50" width="50" draggable="false" src="img/tmws.png" style="float: left; margin-right: 10px;">
      <a class="navbar-brand" href="" style="color: white;">TMWS Water Billing System</a>
		</div>
		<ul class="nav navbar-nav">
		<li class="active"><a href="home.php" style="color: white;">Home</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn" style="color: white; background-color: #0985c5; font-size: 14px;">Billing<span class="caret"></span></a>
    <div class="dropdown-content">
      <a href="rbilling.php" style="color: white;">Residential</a>
      <a href="cbilling.php" style="color: white;">Commercial</a>
    </div>
  </li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn" style="color: white; background-color: #0985c5; font-size: 14px;">Clients<span class="caret"></span></a>
    <div class="dropdown-content">
      <a href="rclients.php" style="color: white;">Residential</a>
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
<center><img height="450" width="450" draggable="false" src="img/tmws.png"></center>

<!--- Status -->
	<center><!--- Consumers -->
	<div class="boxed2">
		<img src="img/padding.png">
	 </div>

	<div class="boxed btn btn-info">
			<img height="75" width="75"src="img/user.png" style="float">
			<h3>Consumers</h3>
			<h1 style="center" class="total">
				<?php
					$result=mysqli_query($con, "SELECT (SELECT COUNT(*) FROM owners) AS count1,(SELECT COUNT(*) FROM commercial_owners) AS count2");
						$data=mysqli_fetch_assoc($result);

						echo $data['count1'] + $data['count2'];
						?>

			</h1>
	 </div>

	 <div class="boxed btn btn-success">
	 		<img height="75" width="75"src="img/paid.png" style="float">
	 		<h3>Paid</h3>
	 		<h1 style="center" class="total">
	 			<?php
	 				$result=mysqli_query($con, "SELECT count(*) as total FROM bill WHERE status LIKE 'paid'");
	 					$data=mysqli_fetch_assoc($result);
	 					echo $data['total'];
	 					?>
	 		</h1>
	  </div>


		<div class="boxed btn btn-warning">
				<img height="75" width="75"src="img/unpaid.png" style="float">
				<h3>Unpaid</h3>
				<h1 style="center" class="total">
					<?php
						$result=mysqli_query($con, "SELECT count(*) as total FROM bill WHERE status LIKE 'not%'");
							$data=mysqli_fetch_assoc($result);
							echo $data['total'];
							?>
				</h1>
		 </div>


		 <div class="boxed btn btn-danger">
	 			<img height="75" width="75"src="img/due.png" style="float">
	 			<h3>Due</h3>
	 			<h1 style="center" class="total">
	 				<?php
	 					$result=mysqli_query($con, "SELECT count(*) as total FROM bill WHERE status LIKE 'due'");
	 						$data=mysqli_fetch_assoc($result);
	 						echo $data['total'];
	 						?>
	 			</h1>
	 	 </div>
<center>


</body>
</html>
