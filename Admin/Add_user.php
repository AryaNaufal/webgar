<?php 
include ('header.php');
include ('../server.php');
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
	<title>Add user</title>
	  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<style type="text/css">
	form{
		margin-top: 30px;
		margin-left: 300px;
		padding: 10px;

	
	}
	.form-group {
		margin-left: 14px;
		width: 350px;
	}
	.btn-primary{
		margin-left: 14px;
	}
</style>
<body>
	<div class="main">
<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <input type="name" name="fname" class="form-control" id="Name" aria-describedby="emailHelp" placeholder="Please enter user first name" required>
  </div>
    <div class="form-group">
    <input type="name" name="lname" class="form-control" id="Name" aria-describedby="emailHelp" placeholder="Please enter user last name" required>
  </div>
    <div class="form-group">
    <input type="email" name="email" class="form-control" id="Name" aria-describedby="emailHelp" placeholder="Please enter user email" required>
    <small id="emailHelp" class="form-text text-muted">User email must be unique.</small>
  </div>
  <div class="form-group">
     <input id="datepicker" name="dob" readonly placeholder="Please enter user date of birth" required />
  </div>
  <div class="form-group">
    <label for="image">Upload user profile picture </label>
    <input type="file" name="dp" accept="image/*" required class="form-control-file" id="image">
  </div>
   <div class="form-group">
    <label for="exampleFormControlSelect1">Gender</label>
    <select class="form-control" required name="gender" id="exampleFormControlSelect1">
      <option>Male</option>
      <option>Female</option>
    </select>
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" required id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Are you sure the above information is correct?</label>
  </div>
  <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
</form>
</div>
</body>
</html>
<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
    <?php 
}

?>