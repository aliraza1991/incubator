<?php 
session_start();
include('admin/database.php');
if (isset($_SESSION['id'])) {
$id = $_SESSION['id'];
$sel = mysqli_query($link,"select * from register where id = $id");
$row=mysqli_fetch_assoc($sel);
$restype = $row['type'];
$resid = $row['id'];
$email = $row['email'];

}

// include('admin/database.php');
date_default_timezone_set('Asia/Kolkata');
   $todayDate = date('Y-n-j H:i');
extract($_POST);
if (isset($submit)) {
	$sel = mysqli_query($link,"select * from invester where register_id = $res_id");
	if(mysqli_num_rows($sel)>0){
			$row = mysqli_fetch_assoc($sel);
		$id = $row['id'];
		$des = mysqli_real_escape_string($link,$des);
		$filetemp= $_FILES['photo']['tmp_name'];
	$file_name = $_FILES['photo']['name'];
	$filepath = "img_invester/".$file_name;
	if(move_uploaded_file($filetemp, $filepath)){
		$sql1 = "update invester set name='$name',company_name='$company_name',description='$des',photo='$file_name',past_investment='$past',register_type='$res_type',register_id='$res_id',date='$todayDate' where id = $id";
		if(mysqli_query($link,$sql1)){
			 echo "<script> location.href='profile.php'; </script>";
			 $msg= "updated";
			
		}
		else
		{
			 echo "<script> location.href='profile.php'; </script>";
			 $msg1= "update fail";
			
    
		}
	
	}
	else
	{

	$sql1 = "update invester set name='$name',company_name='$company_name',description='$des',past_investment='$past',register_type='$res_type',register_id='$res_id',date='$todayDate' where id = $id";
		if(mysqli_query($link,$sql1)){
			$msg= "updated";
			 // echo "<script> location.reload; </script>";
			 
			
		}
		else
		{
			$msg1= "update fail";
			 // echo "<script> location.reload; </script>";
			 
			
    
		}
	}
}
	else
	{
		$des = mysqli_real_escape_string($link,$des);
		$filetemp= $_FILES['photo']['tmp_name'];
	$file_name = $_FILES['photo']['name'];
	$filepath = "img_invester/".$file_name;
	move_uploaded_file($filetemp, $filepath);

	 $sql = "insert into invester (name,company_name,description,past_investment,photo,register_type,register_id,date) values ('$name','$company_name','$des','$past','$file_name',$res_type,$res_id,'$todayDate')";
	if(mysqli_query($link,$sql)) {
		$msg= "inserted";
		 // echo "<script> location.reload; </script>";
    
	}
	else
	{
		$msg1= "fail";
		 // echo "<script> location.reload; </script>";
    
	}
	

	}
}
 ?>
 <!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
include('navbar.php');
  ?>

<?php 
$sel1 = mysqli_query($link,"select * from invester where register_id = $resid");
//$check = mysqli_num_rows($sel1);
$row1 = mysqli_fetch_assoc($sel1);	


 ?>
 <div class="container">

 		
 	<div class="row">
 		<div class="col-md-3"></div>
 		<div class="col-md-6">

 			<form method="post" action="" enctype="multipart/form-data">
          	<div class="form-group">
          		Name:
          		<input type="text" name="name" value="<?=$row1['name']?>" class="form-control">
          	</div>
          	<div class="form-group">
          		Company Name:
          		<input type="text" name="company_name" value="<?=$row1['company_name']?>" class="form-control">
          	</div>
          	<div class="form-group">
          		Description:
          		<textarea class="form-control" name="des" ><?=$row1['description']?></textarea>
          	</div>
          	<div class="form-group">
          		Past Investment:
          		<input type="text" name="past" value="<?=$row1['past_investment']?>" class="form-control">
          	</div>
          	<div class="form-group">
          		<input type="hidden" name="res_type" value="<?=$restype?>" class="form-control">
          	</div>
          	<div class="form-group">
          		<input type="hidden" name="res_id" value="<?=$resid?>" class="form-control">
          	</div>
          	<div class="form-group">
          		Photo:
          		<input type="file" name="photo" value="<?=$row1['photo']?>" class="form-control">
          		<img src="img_invester/<?=$row1['photo']?>" height="100" width="100" alt="images">
          	</div>
          	<input type="submit" name="submit">
          	<span style="color: green"><?=@$msg;?></span><span style="color: red"><?=@$msg1;?></span>
          </form>

 		</div>
 	</div>
 </div>

      </body>
      </html>