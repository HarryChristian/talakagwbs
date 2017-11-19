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
<strong><p align="center" style="font-size: 30px; margin-top: 12px;">Add New User</p></strong><hr>
<form method="post" action="useradd.php">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
    </div>
  <div class="form-group">
      <label for="password">Password:</label>
      <input type="text" name="password" class="form-control" id="password" placeholder="Password" required>
    </div>
  <div class="form-group">
      <label for="last_name">Last Name:</label>
      <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" required>
    </div>
    <div class="form-group">
      <label for="first_name">First Name:</label>
      <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" required>
    </div>
    <button type="submit" name="add" class="btn btn-primary">Submit</button>
    <button type="reset" class="btn btn-primary">Clear</button>
  </form>
</div>