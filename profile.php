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
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">
				
			</div>
			<div class="col-md-4">

				<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?=$email?>
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><p><?php if($restype==1){
				echo "Startup";
				}
				else
				{
				echo "Invester";
				}?></p></li>
    <li>  <a type="button"  data-toggle="modal" data-target="<?php if($restype==1){?>
			  #myModal	
			  <?php
			}
			  else
			  {
			  ?>
			  #myModal1
			  <?php
			  }
			  ?>">Profile</a>
</li>
    <li><a href="logout.php">logout</a></li>
  </ul>
</div>
				
				
				
				<span style="color:green"><?=@$msg;?></span><br>
        		<span style="color: red"><?=@$msg1;?></span>
          
			
			</div>
		</div>
	</div>
<?php 
$sel2 = mysqli_query($link,"select * from startup where register_id = $resid");
//$check = mysqli_num_rows($sel1);
$row2 = mysqli_fetch_assoc($sel2);	


 ?>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Startup Dtails</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="startup_profile.php" enctype="multipart/form-data">
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
          	<div class="form-group">
          		<input type="hidden" name="res_type" value="<?=$restype?>" class="form-control">
          	</div>
          		<div class="form-group">
          		<input type="hidden" name="res_id" value="<?=$resid?>" class="form-control">
          	</div>
          	<div class="form-group">
          		Logo:
          		<input type="file" name="photo" value="<?=$row2['logo']?>" class="form-control">
          		<img src="img_startup/<?=$row2['logo']?>" height="100" width="100" alt="images">
          	</div>
          	<input type="submit" name="submit">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<?php 
$sel1 = mysqli_query($link,"select * from invester where register_id = $resid");
//$check = mysqli_num_rows($sel1);
$row1 = mysqli_fetch_assoc($sel1);	


 ?>
 <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">invester Dtails</h4>
        </div>
        <div class="modal-body">
        	<form method="post" action="invester_profile.php" enctype="multipart/form-data">
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
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</body>
</html>
