<?php
include('header.php');
include('../server.php');
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
	<title>User View</title>
	

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

</head>
<style type="text/css">
	.data{
		margin-left: 14px;
	}
</style>
<body>
  <?php
    $sql = "SELECT * FROM messages";
$result = $conn->query($sql);

?>
   
<div class="main">
	<div class="data">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>

            </tr>
        </thead>
        <tbody>
            <?php 
            if ($result->num_rows > 0) {

  // output data of each row

while($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?php  echo $row["name"]  ?></td>
                <td><?php  echo $row["email"]  ?></td>
                <td><?php  echo $row["message"]?></td>
                <td><?php  echo $row["date_time"] ?></td>
               </tr>
            <?php 
  }
}  

?> 
        </tbody>
    </table>
</div>
</div>
</body>
</html>
<script>
	$(document).ready(function() {
          $('#dataTable').DataTable();
    });

</script> 
<?php

}
?>