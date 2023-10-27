<?php
session_start();
error_reporting(0);
include('header.php');
include('../server.php');
$email=$_SESSION["email"];
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);
?>
<style type="text/css">
	.content{
  display: flex;
}
.card1  {
	padding: 1px;
  margin-top: 4px;
  background-color: white;
  height: 90px;
  width: 260px;
  border-radius: 4px;
  margin-left: 15px;
}
.card2 {
  margin-top: 4px;
  background-color: white;
  height: 150px;
  width: 260px;
  border-radius: 4px;
  margin-left: 15px;
}
.card1 h6 , .card2 h6 {
 margin-top: 25px;
 margin-left: 15px;
  font-size: 15px;
}
.card1 h6:hover , .card2 h6:hover {
  cursor: pointer;
  color: darkblue;
  }
.card1 h5 , .card2 h5{
  font-size: 15px;
  margin-left: 15px;
}
.card1 h6{

  color: #7f9be4;
}
.card2 h6{
  color : #65ddb5;
}
#file{
  color: red;
width:130px;
}
.cards i{
  font-size: 24px;
  float: right;
  margin-right: 20px;
  color: #dcdfea;
}
.content{
  display: flex;
  margin-top: 14px;
  margin-left: 14px;
}
#myChart{
  height: 300px;
  width: 765px;
}
.graph1{
  background-color: white;
  border-radius: 4px;
}
#piechart{
  margin-left: 20px;
}
.content1{
   margin-top: 14px;
 margin-left: 14px;
 display: flex;

}

</style>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Employee Dashboard</title>
</head>
<body>
<div class="main">
	<div class="container">
		<div class="content">
		<div class="cards">
  <div class="card1"><i style="float: left ; padding: 4px; margin-top: 19px; margin-left: 4px; font-size: 50px; color:palegreen;" class="fa fa-check-circle"></i><h6>Notifications</h6> <h5>2 New Notifications</h5></div>
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

  <div class="card2"><h6>Attandence</h6><h5> <?php print($percentage); ?>% <progress  id="file" value="<?php print($percentage); } }?>" max="100"> </progress> <i class="fas fa-tasks"></i>
</h5>

	<h5 style="color:skyblue; font-size: 13px;">Mark your attandence once a day !</h5>
	</div>
</div>
<table class="table table-striped table-bordered" style="margin-top: 10px; margin-left: 14px; width: 99%; border-radius: 4px;"  >
  <thead>
    <tr>
      <th scope="col">email</th>
      <th scope="col">Name</th>
      <th scope="col">Date</th>
      <th scope="col">Attendance</th>
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
    </tr>
          <?php
} }?>

  </tbody>  
</table>
</div>
	</div>
</div>
</body>
</html>