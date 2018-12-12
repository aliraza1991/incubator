<?php
include('admin/database.php');
 date_default_timezone_set('Asia/Kolkata');
   $todayDate = date('Y-n-j H:i');
extract($_POST);
if (isset($submit)) {
	$pass= sha1($password);
	if (mysqli_query($link,"insert into register(type,email,password,date) values('$r1','$email','$pass','$todayDate')")) 
		{
		echo '<script>alert("Inserted"); location.href="signin.php"</script>';
		}
		else
		{
			echo '<script>alert("Failed"); location.href="signup.php"</script>';
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Signup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
			<h2 class="text-center">Sign up</h2>
			<form method="post" action="">
				<div class="form-group">
					<input type="radio" name="r1" value="1" checked>Startup
					<input type="radio" name="r1" value="2">Invester
				</div>
				<div class="form-group">
					<input type="email" class="form-control" name="email">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" name="password">
				</div>
				<input type="submit" name="submit" class="form-control btn btn-success" value="Signup">
			</form>
		</div>
	</div>
</div>

</body>
</html>
