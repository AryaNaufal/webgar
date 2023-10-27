<?php 
session_start();
include('../server.php');
include('header.php');
$admin_email=$_SESSION["admin_email"];
if($admin_email!="admin@admin.com")

{
   header("Location: login.php");
}
else 
{
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Admin Dashboard</title>
  </head>
  <style type="text/css">
   body{
    background-color: #edeff1;
   }
.main {
  margin-left: 220px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}
.cards{
  display: flex;
}
.card1 , .card2 , .card3 , .card4 {
  margin-top: 4px;
  background-color: white;
  height: 90px;
  width: 33%;
  border-radius: 4px;
  margin-left: 15px;
}
.card1 h6 , .card2 h6 , .card3 h6 , .card4 h6{
 margin-top: 25px;
 margin-left: 15px;
  font-size: 15px;
}
.card1 h6:hover , .card2 h6:hover , .card3 h6:hover , .card4 h6:hover{
  cursor: pointer;
  color: darkblue;
  }
.card1 h5 , .card2 h5 , .card3 h5 , .card4 h5{
  
  font-size: 20px;
  margin-left: 15px;
}
.card1 h6{
  color: #7f9be4;
}
.card2 h6{
  color : #65ddb5;
}
.card3 h6{
  color: #bbeef7;
}
.card4 h6{
  color: #f3d36f;
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
  <body>
<div class="main">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
  <strong>Welcome !</strong> You can check Online Attendence of all the employee below.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="cards">
  <div class="card1"><h6>Users</h6> <h5> <?php $sql = "SELECT * FROM users";
if ($result=mysqli_query($conn,$sql)) {
    $rowcount=mysqli_num_rows($result);
    echo $rowcount; 
}?> <i class="fas fa-users"></i></h5></div>
  
  <div class="card3"><h6>Admins</h6> <h5> 1 <i class="fas fa-user-cog "></i></h5></div>
  <div class="card4"><h6>Tasks</h6><h5> 50% <progress  id="file" value="50" max="100"> </progress> <i class="fas fa-tasks"></i>
</h5></div>
</div>
<div class="content">
  <div class="graph1"> <h5 style="padding: 10px; color: skyblue;">Users Overview</h5><canvas id="myChart"></canvas> </div>
  <div class="graph2" id="piechart"> </div>
 </div>
 <div class="content1">
   <div style="width: 58%;background-color: white; border-radius: 4px; " > 
    <h6 style="padding: 10px; color: skyblue;"> Projects</h6>
    <label style="margin-left: 10px; font-size: 13px;">User Management</label>
     <div class="progress" style="width: 90%; margin-left: 10px;">
  <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div><br>
<label style="margin-left: 10px;font-size: 13px;">Admin Management</label>
<div class="progress" style="width: 90%; margin-left: 10px;">
  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
</div><br>
<label style="margin-left: 10px;font-size: 13px;">Attendance Management</label>
<div class="progress" style="width: 90%; margin-left: 10px;">
  <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
</div> <br>
   </div>
   <div style="width: 40%; margin-left: 15px; border-radius: 4px;">
    <img src="../Assets/Images/attendence.jpg" width="438px" height="325px">
   </div>
 </div>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Students', 8],
  ['Admins', 1],
  ['Attendance', 2],
  ['Teachers', 8]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Overall Information' , 'width':300, 'height':350};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
<script>
var xValues = [50,60,70,80,90,100,110,120,130,140,150];
var yValues = [7,8,7,9,8,12,10,9,14,12,15];

new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 6, max:16}}],
    }
  }
});
</script>
<?php 
}

?>