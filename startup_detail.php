<?php
session_start(); 
include('admin/database.php');
if(!isset($_SESSION['id'])){
header('location:signin');
}
else
{
	$resid = $_SESSION['id'];
	$sel1 = mysqli_query($link,"select * from register where id = $resid");
	$row = mysqli_fetch_assoc($sel1);
	$restype = $row['type'];
	if ($restype != 2) {
		echo "<script>alert('You are not allowed');location.href='index';</script>";
		// header('location:index');
	}
}





if(isset($_GET['id'])){
$id = $_GET['id'];
$sel = mysqli_query($link,"select * from startup where register_id = $id");
$row = mysqli_fetch_assoc($sel);	
}
 ?>
	

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Signin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
include('navbar.php');
	?>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<img src="img_startup/<?=$row['logo']?>" class="img-responsive">
			<h5 style="font-weight: bold">Company Name:<span><?=$row['company_name']?></span> </h5>
			<p>Name : <?=$row['name']?></p>
			<p>Description : <?=$row['description']?></p>
			<p>Location : <?=$row['location']?></p>
			
		</div>
	</div>
</div>

</body>
</html>
