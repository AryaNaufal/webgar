<?php
session_start();
include('header.php');
include('../server.php');
$email=$_SESSION["email"];
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

?>
<style type="text/css">
	.modal-lg {
    max-width: 90%;
}
</style>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Attendance</title>
</head>
<body>
	<?php  if ($result->num_rows > 0) {

  // output data of each row

while($row = $result->fetch_assoc())

{
 	?>
    <div class="main"> 
<div class="jumbotron">
  <h1 class="display-4">Attendance Management</h1>
  <p class="lead">From Here you can Mark attendance , View your attendance details or Mark leave.</p>
  <hr class="my-4">
   <div class="d-flex justify-content-center" style="margin-top: 30px;">
  <p>Feel Free to Mark attendance , View your attendance details or Mark leave</p>
  </div>
  <div class="d-flex justify-content-center">
  	<form method="post">
  	<input type="email" name="email" value="<?php echo $row["email"] ?>" hidden>
  	<input type="fname" name="fname" value="<?php echo $row["fname"] ?>" hidden>
  	<input type="lname" name="lname" value="<?php echo $row["lname"] ?>" hidden>
  	<button type="submit" class="btn btn-outline-success" name="mark_attendance">Mark Attendance</button>
  	</form>
  	<form method="post">
  	<input type="email" name="email" value="<?php echo $row["email"] ?>" hidden>
  	<input type="fname" name="fname" value="<?php echo $row["fname"] ?>" hidden>
  	<input type="lname" name="lname" value="<?php echo $row["lname"] ?>" hidden>
  	<button type="submit" class="btn btn-outline-danger"  style="margin-left: 5px;" name="mark_leave">Mark Leave</button>
</form>


  	<button type="button" data-toggle="modal" data-target="#exampleModal"  style="margin-left: 5px;" class="btn btn-outline-info">View Attendance</button>
  	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Attendance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
    $sql = "SELECT * FROM attendance WHERE email='$email'";
$result = $conn->query($sql);

?>
      <div class="modal-body">
        <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Email</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Attendance</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  	<?php 
            if ($result->num_rows > 0) {

  // output data of each row

while($row = $result->fetch_assoc()) {
            ?>
    <tr>
      <th scope="row"><?php  echo $row["fname"]?></th>
      <td><?php  echo $row["lname"]?></td>
      <td><?php  echo $row["email"]?></td>
      <td><?php  echo $row["attendance"]?></td>
      <td><?php  echo $row["date_time"]?></td>
    </tr>
    <?php 
  }
}  

?> 
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<?php

}
}
?>
</body>
</html>
