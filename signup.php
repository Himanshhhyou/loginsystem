<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
include  'partials/_dbconnect.php';
$uname = $_POST["uname"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$exists = false;
if(($password == $cpassword) && $exists == false){
$sql = "INSERT INTO `users` (`uname`, `password`, `date`) VALUES ('$uname', '$password', current_timestamp())";
$result = mysqli_query($conn,$sql);
if($result){
$showAlert = true;
}
}
else{
$showError = "Password not match";
}
}
?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
<?php
if($showAlert){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your account created. Now you can login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
<?php
if($showError){
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> ' . $showError.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
	<div class="container">
		<h1 class="text-center">Sign up to LearnAngle</h1>
		<form action="/loginsystem/signup.php" method="post">
  <div class="mb-3">
    <label for="uname" class="form-label">Username</label>
    <input type="text" class="form-control" id="uname" name="uname" required>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
	<div class="mb-3">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name = "cpassword">
	<div class="form-text">Make sure type the same password</div>
  </div>
  <button type="submit" class="btn btn-primary ">Sign Up</button>
</form>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity=>
  </body>
</html>
