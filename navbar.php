 <?php
// ession_start();
include('admin/database.php');
if (isset($_GET['res_id'])){
 $res_id = $_GET['res_id'];
 if ($res_id == 2) {
 	header('location:invester_profile');
 }
 else
 {
 	 	header('location:startup_profile.php');

 }
}
 ?>
 <nav class="navbar navbar-inverse">
      <div class="container-fluid">
      <ul class="nav navbar-nav navbar-right">
      	<?php
      	if(isset($_SESSION['id'])){
      		$id = $_SESSION['id'];
      		$arr1 = mysqli_query($link,"select * from register where id =$id");
      		$arr = mysqli_fetch_assoc($arr1);
      		?>
       	 <li><a href="index">Home</a></li>
       	 <li><a href="navbar?res_id=<?=$arr['type']?>">Profile</a></li>
         <li><a href="logout"><span></span> Logout</a></li>
      <?php
  		}else
  		{
  		?>
  		 <li><a href="index">Home</a></li>
       	 <li><a href="signin">Signin</a></li>
         <!-- <li><a href="logout.php"><span></span> Logout</a></li> -->
      <?php
		  }
		?>
      </ul> 
      </div>     
 </nav>
  