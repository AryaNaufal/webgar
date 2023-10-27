
<?php
include('header.php');
session_start();
$admin_email=$_SESSION["admin_email"];
if($admin_email!="admin@admin.com")

{
   header("Location: login.php");
}
else 
{
?>
<!DOCTYPE html>
<html>
<head>
    <title>User management</title>
</head>
<body>
    <div class="main"> 
<div class="jumbotron">
  <h1 class="display-4">User Management</h1>
  <p class="lead">From Here you can add the new Employee.</p>
  <hr class="my-4">
   <div class="d-flex justify-content-center" style="margin-top: 30px;">
  <p>Just click on the button below to add the new employee</p>
  </div>
  <div class="d-flex justify-content-center">
  <a class="btn btn-primary btn-lg" href="Add_user.php" role="button">Add Employee</a>
 </div>
</div>
</div>
</body>
</html>
<?php
}
?>