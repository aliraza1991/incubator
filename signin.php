<?php 
session_start();
include('admin/database.php');
extract($_POST);
if (isset($signin)) {

 $sel = mysqli_query($link,"select * from register where email = '$email'");
  if (mysqli_num_rows($sel)>0) {
  while ($row= mysqli_fetch_assoc($sel)) {
    $pass = $row['password'];
    $id = $row['id'];
    $pass1 = sha1($password);
    if ($pass1 == $pass) {
        // echo '<script>alert("hello");location.href="index.php"</script>';
              echo '<script>location.href="index"</script>';  
         $_SESSION['id'] = $id;
    }
    else
    {
        echo '<script>alert("Password not matched"); location.href="signin"</script>';
  
    }
  
}
}
else
{
          echo '<script>alert("You are not register user Please first signup");location.href="signup"</script>';
}
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
  <div class="container">
    <div class="row">
      <h3 class="text-center">Sign In</h3>
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <form class="form-group" action="" method="post">
          <div class="form-group">
            <input type="email" name="email" class="form-control">
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control">
          </div>
          <input type="submit" name="signin" class="form-control" value="Signin">
        </form>
      </div>
    </div>
  </div>

</body>
</html>
