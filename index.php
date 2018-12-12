<?php 
session_start();
include('admin/database.php');
if (isset($_SESSION['id'])) {
$resid = $_SESSION['id'];
$sel1 = mysqli_query($link,"select * from register where id = $resid");
$arr = mysqli_fetch_assoc($sel1);
 $restype = $arr['type'];
 $res_id = $arr['id'];
 
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
   
<div class="container">
  <div class="row">
   <?php
   $sel = mysqli_query($link,"select * from startup");
    while ($row = mysqli_fetch_assoc($sel)) {
      ?>
       <div class="col-md-3">
      <a href="startup_detail?id=<?=$row['register_id']?>">
      <img src="img_startup/<?=$row['logo']?>" alt="<?=$row['logo']?>" class="img-responsive">
      <h3 class="text-center"><?=$row['company_name']?></h3>
      </a>
    </div>
    <?php
  }
  ?>
  </div>
</div>
</body>
</html>
