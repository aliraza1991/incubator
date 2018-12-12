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
	$sel = mysqli_query($link,"select * from startup where register_id = $res_id");
	if(mysqli_num_rows($sel)>0){
			$row = mysqli_fetch_assoc($sel);
		$id = $row['id'];
		$des = mysqli_real_escape_string($link,$des);
		$filetemp= $_FILES['photo']['tmp_name'];
	$file_name = $_FILES['photo']['name'];
	$filepath = "img_startup/".$file_name;
	if(move_uploaded_file($filetemp, $filepath))
{
$sql1 = "update startup set name='$name',company_name='$company_name',description='$des',no_co_founder=$founder,location='$location',logo='$file_name',register_type=$res_type,register_id=$res_id,date='$todayDate' where id = $id";
		if(mysqli_query($link,$sql1)){
			 $msg = "updated";
			 //echo "<script> location.reload; </script>";
			
		}
		else
		{
			// echo "<script> location.href='profile.php'; </script>";
			 echo "update fail";
			
    
		}
	

}
else
{
	$sql1 = "update startup set name='$name',company_name='$company_name',description='$des',no_co_founder=$founder,location='$location',register_type=$res_type,register_id=$res_id,date='$todayDate' where id = $id";
		if(mysqli_query($link,$sql1)){
			 $msg = "updated";
			// echo "<script> location.reload; </script>";
			
		}
		else
		{
						 $msg1 =  "update fail";
		//	echo "<script> location.reload; </script>";
			
    
		}
	}
}
	else
	{
		$des = mysqli_real_escape_string($link,$des);
		$filetemp= $_FILES['photo']['tmp_name'];
	$file_name = $_FILES['photo']['name'];
	$filepath = "img_startup/".$file_name;
	move_uploaded_file($filetemp, $filepath);

	 $sql = "insert into startup (name,company_name,description,location,no_co_founder,logo,register_type,register_id,date) values ('$name','$company_name','$des','$location',$founder,'$file_name',$res_type,$res_id,'$todayDate')";
	if(mysqli_query($link,$sql)) {
		$msg= "inserted";
		 echo "<script> location.reload; </script>";
    
	}
	else
	{
		$msg1= "fail";
		 echo "<script> location.reload; </script>";
    
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
$sel1 = mysqli_query($link,"select * from startup where register_id = $resid");
//$check = mysqli_num_rows($sel1);
$row2 = mysqli_fetch_assoc($sel1);	


 ?>
 <div class="container">

 		
 	<div class="row">
 		<div class="col-md-3"></div>
 		<div class="col-md-6">
 			<form method="post"  action="" enctype="multipart/form-data">
          	<div class="form-group">
          		Name:
          		<input type="text" name="name" value="<?=$row2['name']?>" class="form-control">
          	</div>
          	<div class="form-group">
          		Company Name:
          		<input type="text" name="company_name" value="<?=$row2['company_name']?>" class="form-control">
          	</div>
          	<div class="form-group">
          		Description:
          		<textarea class="form-control" name="des"><?=$row2['description']?></textarea>
          	</div>
          	<div class="form-group">
          		Location:
          		<input type="text" name="location" value="<?=$row2['location']?>" class="form-control">
          	</div>
          	<div class="col-md-9">
          		<div class="form-group">
          		No. Co-founders:
          		<select name="founder"  class="form-control">
          			<option ><?=$row2['no_co_founder']?></option>
          			<option>1</option>
          			<option>2</option>
          			<option>3</option>
          			<option>4</option>
          			<option>5</option>
          		</select>
          		<!-- <input type="tel" name="founder" value="<?=$row2['no_co_founder']?>" class="form-control"> -->
          	</div>
          	</div>
          	<div class="col-md-3">
          		<div class="form-group">
	          		<span style="visibility: hidden;">Add</span>
	          		<!-- <button class="form-control" id="add" data-toggle="modal" data-target="#myModal">Add</button> -->
	          		<a href="" class="btn btn-default form-control" id="add" data-toggle="modal" data-target="#myModal">Add</a>
          		</div>
          	</div>
          	<!-- <div id="feild"></div> -->
          
          	<div class="form-group">
          		Logo:
          		<input type="file" name="photo" value="<?=$row2['logo']?>" class="form-control">
          		<img src="img_startup/<?=$row2['logo']?>" height="100" width="100" alt="images">
          	</div>
          	<div class="form-group">
          		<input type="hidden" name="res_type" value="<?=$restype?>" class="form-control">
          	</div>
          		<div class="form-group">
          		<input type="hidden" name="res_id" value="<?=$resid?>" class="form-control">
          	</div>
          		
          	<input type="submit" name="submit">
          	<span style="color: green"><?=@$msg;?></span>
 			<span style="color: red"><?=@$msg1;?></span>
 			
          </form>
 		</div>
 	</div>
 </div>

<!---- modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Co-Founder</h4>
      </div>
      <div class="modal-body">
        <form id="founder_form">
        	<div class="form-group" id="feild"></div>
        	 <input type="hidden" name="startup_id"  value="<?=$row2['id']?>">
        	<input type="button" name="submit" id="submit" value="submit">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

<?php 
$startup_id = $row2['id'];
$founder = mysqli_query($link,"select * from co_founder where startup_id = $startup_id");
$row3 = mysqli_fetch_assoc($founder);
 ?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#add").click(function(){
			$("#feild").append('<input type="text" name="co_founder[]" value="<?php if(mysqli_num_rows($founder)>0){ echo $row3['founder_detail']; } else { echo " "; } ?>" class="form-control"><br>');
		})

		$('#submit').click(function(){
			$.ajax({
				url:"api.php",
				method:"POST",
				data:$("#founder_form").serialize(),
				success:function(data){
					alert(data);
					// header.reload();
					$('#founder_form')[0].reset();
				}
			})
		})
	})
</script>
      </body>
      </html>