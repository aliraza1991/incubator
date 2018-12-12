<?php 
include('admin/database.php');
date_default_timezone_set('Asia/Kolkata');
   $todayDate = date('Y-n-j H:i');

if (isset($_POST['name'])) {
		$name = $_POST["name"];
		$test = $_POST['test'];
		$num = count($name);
		if($num > 1)
		{
		for ($i=0; $i < $num; $i++) { 
			if (trim($name[$i] != '')) {
				$sql = "insert into demo (name,test) values ('$name[$i]','$test')";
					mysqli_query($link,$sql);
			}
		}
		echo "inserted";
		}
		else
		{
		echo "enter Name";	
		}
}


if (isset($_POST['co_founder'])) {
		$founder = $_POST['co_founder'];
		$startup_id = $_POST['startup_id'];
	$num = count($founder);
	if ($num > 1) {
		for ($i=0; $i < $num ; $i++) { 
			if (trim($founder[$i] != '')) {
				$sql1 = "insert into co_founder(founder_detail,startup_id,date) values ('$founder[$i]',$startup_id,'$todayDate') ";
				mysqli_query($link,$sql1);
			}
		}
		echo "Insertd ok";
	}
	else
	{
		echo "Enter Co-Founder Details";
	}
}




 ?>
