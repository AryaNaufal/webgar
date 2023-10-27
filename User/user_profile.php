<?php
session_start();
include('header.php');
include('../server.php');
$email=$_SESSION["email"];
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Details</title>
</head>
<style type="text/css">
	img {
  border-radius: 50%;
  width: 250px;
  height: 250px;
  margin-left: 280px;
  margin-top: 20px;
}
.btn-outline-primary  , .form-group{
	margin-top: 10px;
	 margin-left: 350px;
}
.Basic {
	background-color: #f8f9fa;
	padding: 14px;
	border-radius: 4px;
	margin-left: 120px;
	margin-right: 120px;
	margin-bottom: 10px;
	margin-top: 14px;
	
}
.Ancestors {
	background-color: #f8f9fa;
	padding: 14px;
	border-radius: 4px;
	margin-left: 120px;
	margin-right: 120px;
	margin-bottom: 10px;
	margin-top: 14px;
	
}
.form1 .form-group {
	margin-left: 265px;
}
.form1 h6{
text-align: center;
}
.Ancestors img {
  border-radius: 50%;
  width: 250px;
  height: 250px;
  margin-top: 20px;
}
</style>
<body>
	<div class="main">

<div class="Basic">
	<h5 style="text-align: center;"> Basic Information </h5>
	<hr>
 <?php  if ($result->num_rows > 0) {

  // output data of each row

while($row = $result->fetch_assoc())

{
 	?> 

 	<img src="../Admin/image/<?php echo $row["dp"]; ?>"> <br>
 	<form method="POST" enctype="multipart/form-data">

  <input type="email" name="email" value="<?php echo $row["email"];?>" hidden>

 		<div class="form-group">
    <label for="image">Change profile picture </label>
    <input type="file" name="dp" accept="image/*" required class="form-control-file" id="image" required>
  	</div>
 		<button type="submit" name="update_dp" class="btn btn-outline-primary"><i class="fas fa-image"></i> Update Dp</button>
 	</form>

 	<hr>
<h6 style="margin-top: 20px; margin-left: 20px;">NAME : <?php echo $row["fname"]." ".$row["lname"]; ?> </h6> 
<h6 style="margin-top: 20px; margin-left: 20px;"> Date Of Birth : <?php echo $row["dob"]; ?> </h6> 
<h6 style="margin-top: 20px; margin-left: 20px;">Age : <?php echo $row["age_y"]; ?> Years and <?php echo $row["age_m"]; ?> months </h6>
<h6 style="margin-top: 20px; margin-left: 20px;"> Gender : <?php echo $row["gender"]; ?> </h6> 
<h6 style="margin-top: 20px; margin-left: 20px;">Added on : <?php echo $row["date_time"]; ?> </h6> 
<!-- Button trigger modal -->
<button style="margin-top: 10px; margin-left: 20px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 Change Password
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
      <div class="modal-body">
      	
       <input type="password" style="width: 300px;" class="form-control" name="c_password" placeholder="Please enter current password" required><br>
       <input type="text" style="width: 300px;" class="form-control" name="c_password1" hidden value="<?php echo $row["password1"];?>" required>
        <input type="text" style="width: 300px;" class="form-control" name="email" hidden value="<?php echo $row["email"];?>" required>
       <input type="password" style="width: 300px;" class="form-control" name="u_password1" placeholder="Please enter new password" required> <br>
       <input type="password" style="width: 300px;" class="form-control" name="u_password2" placeholder="Please re-enter new password" required>
       <br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        <button type="submit" name="change_password" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<hr>
 		<?php
} }?>
</div>
</div>
</body>
</html>