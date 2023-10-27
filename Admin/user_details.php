<?php
session_start();
include('header.php');
include('../server.php');
$admin_email=$_SESSION["admin_email"];
if($admin_email!="admin@admin.com")

{
   header("Location: login.php");
}
else 
{
$email=$_SESSION["email"];
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Details</title>


<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

</head>
<style type="text/css">
	img {
  border-radius: 50%;
  width: 250px;
  height: 250px;
  margin-left: 280px;
  margin-top: 20px;
}
button {
	margin-top: 20px;
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

 	<img src="image/<?php echo $row["dp"]; ?>"> <br>
 	<hr>
<h6 style="margin-top: 20px; margin-left: 20px;">NAME : <?php echo $row["fname"]." ".$row["lname"]; ?> </h6> 
<h6 style="margin-top: 20px; margin-left: 20px;"> Date Of Birth : <?php echo $row["dob"]; ?> </h6> 
<h6 style="margin-top: 20px; margin-left: 20px;">Age : <?php echo $row["age_y"]; ?> Years and <?php echo $row["age_m"]; ?> months </h6>
<h6 style="margin-top: 20px; margin-left: 20px;"> Gender : <?php echo $row["gender"]; ?> </h6> 
<h6 style="margin-top: 20px; margin-left: 20px;">Password : <?php echo $row["password1"]; ?> </h6> 
<h6 style="margin-top: 20px; margin-left: 20px;">Added on : <?php echo $row["date_time"]; ?> </h6> 

 		<?php
} }?>
<hr>
</div>

<div class="Basic">
	<h5 style="text-align: center;"> Attendance Information </h5>
	<hr>
	<div class="data">
	  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Email</th>
                <th>Name</th>
                <th>Date</th>
                <th>Attendance</th>
                <th>Edit Attendance</th>
            </tr>
        </thead>
        <tbody>
 <?php 
$sql = "SELECT * FROM attendance WHERE email='$email'";
$result = $conn->query($sql);

  if ($result->num_rows > 0) {

  // output data of each row

while($row = $result->fetch_assoc())

{
 	?> 
  <tr>
                <td><?php  echo $row["email"]  ?></td>
                <td><?php  echo $row["fname"]." ".$row["lname"]?></td>
                <td><?php  echo $row["date_time"] ?></td>
                <td><?php  echo $row["attendance"] ?></td>
                 <td><form method="post"> 
                 		<input type="text" name="email" value="<?php echo $row["email"] ?>" hidden><input type="text" name="date" value="<?php echo $row["date_time"] ?>" hidden>
                    <input type="text" name="fname" value="<?php echo $row["fname"] ?>" hidden>
                    <input type="text" name="date" value="<?php echo $row["date_time"] ?>" hidden>
                    <input type="text" name="lname" value="<?php echo $row["lname"] ?>" hidden>
                     <div class="form-group">
    <select name="edit_att" required class="form-control" id="exampleFormControlSelect1">
      <option class="disabled"></option>
      <option>absent</option>
      <option>present</option>
      <option>leave</option>
    </select>
  </div>
                  <input type="submit" name="edit_attendance" class="btn btn-outline-primary" value="Edit attendance"></form></td>
    </tr>

 		<?php
} }?>

        </tbody>
    </table>
    <hr>
</div>
</div>

<div class="Basic">
  <h5 style="text-align: center;"> Attendance Count </h5>
  <hr>
  <?php
  $sql="SELECT * FROM attendance where email='$email' and attendance='present'";
  $sql1="SELECT * FROM attendance where email='$email' and attendance='absent'";
  $sql2="SELECT * FROM attendance where email='$email' and attendance='leave'";

if ($result=mysqli_query($conn,$sql))
{
  $rowcount=mysqli_num_rows($result);
if ($result1=mysqli_query($conn,$sql1))
{
  $rowcount1=mysqli_num_rows($result1);

if ($result2=mysqli_query($conn,$sql2))
{
  $rowcount2=mysqli_num_rows($result2);

$dataPoints = array( 

  array("y" => $rowcount,"label" => "Presents" ),
  array("y" => $rowcount1,"label" => "Absents" ),
  array("y" => $rowcount2,"label" => "Leaves" ),
);
 } } }
?>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php 
 $sql="SELECT * FROM attendance where email='$email'";
 $sql1="SELECT * FROM attendance where email='$email' and attendance='present'";
  if ($result=mysqli_query($conn,$sql))
{
  $rowcount=mysqli_num_rows($result);
if ($result1=mysqli_query($conn,$sql1))
{
  $rowcount1=mysqli_num_rows($result1);
  $percentage = ($rowcount1/$rowcount)*100;
  ?>
<br>
<h6> Overall attendance percentage : <?php print($percentage); } }?> %</h6>
<?php
$sql="SELECT * FROM attendance where email='$email' and attendance='present'";
  if ($result=mysqli_query($conn,$sql))
{
  $rowcount=mysqli_num_rows($result);
  ?>
<h6> Total Presents : <?php print($rowcount); }?> </h6>
<?php
$sql="SELECT * FROM attendance where email='$email' and attendance='absent'";
  if ($result=mysqli_query($conn,$sql))
{
  $rowcount=mysqli_num_rows($result);
  ?>
<h6> Total Absents : <?php print($rowcount); }?> </h6>
<?php
$sql="SELECT * FROM attendance where email='$email' and attendance='leave'";
  if ($result=mysqli_query($conn,$sql))
{
  $rowcount=mysqli_num_rows($result);
  ?>
<h6> Total Leaves : <?php print($rowcount); }?> </h6>
</div>
<hr>
<div class="Basic">
  <h5 style="text-align: center;"> Grades </h5>
<h6 style="margin-top: 20px;">Grade : </h6> 
<div class="progress">
  <?php 
 $sql="SELECT * FROM attendance where email='$email'";
 $sql1="SELECT * FROM attendance where email='$email' and attendance='present'";
  if ($result=mysqli_query($conn,$sql))
{
  $rowcount=mysqli_num_rows($result);
if ($result1=mysqli_query($conn,$sql1))
{
  $rowcount1=mysqli_num_rows($result1);
  $percentage = ($rowcount1/$rowcount)*100;
  ?>

  <div class="progress-bar" role="progressbar" style="width:<?php print($percentage);?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php print($percentage); ?>%</div>
</div>
  <?php  
  if($percentage>=90) 
  {
   ?> <div class="alert alert-success" role="alert">
  Grade A ! Keep doing the hard work 
</div>
<?php
  }
  elseif ($percentage>=70 and $percentage<=89) {
   ?> <div class="alert alert-success" role="alert">
 Grade B ! Well done.
</div>
<?php
  }
    elseif ($percentage>=50 and $percentage<=69) {
  ?> <div class="alert alert-primary" role="alert">
 Grade C ! Try to improve your attendance
</div>
<?php
  }
    elseif ($percentage>=30 and $percentage<=49) {
  ?> <div class="alert alert-warning" role="alert">
 Grade D ! Your attendance is very short ! Try to improve it
</div>
<?php
  }
elseif ($percentage<=29) {
   ?> <div class="alert alert-danger" role="alert">
  Grade F ! Your attendance is extremly short . Improve your attendance 
</div>
<?php
  }
   } }?>
<hr>
</div>

</div>
</hr>

</body>
</html>
<script>
	$(document).ready(function() {
          $('#dataTable').DataTable();
    });

</script> 
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  title:{
    text: "Graphical display of user attendance"
  },
  axisY: {
    title: "Attendance Chart",
    includeZero: true,
    prefix: "",
    suffix:  ""
  },
  data: [{
    type: "bar",
    yValueFormatString: "#,##0d",
    indexLabel: "{y}",
    indexLabelPlacement: "inside",
    indexLabelFontWeight: "bolder",
    indexLabelFontColor: "white",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>
<?php

}
?>