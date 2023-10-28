<?php
include '../server.php';
session_start();
$sql = mysqli_query($conn, "SELECT * FROM users WHERE email='$_SESSION[email]'");
$row = mysqli_fetch_array($sql);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <title>User Dashboard</title>
</head>

<style type="text/css">
  body {
    background-color: #edeff1;
  }

  .sidebar {

    height: 100%;
    width: 230px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #4269d7;
    overflow-x: hidden;
    padding-top: 16px;

  }

  .sidebar a {
    padding: 26px 8px 6px 16px;
    text-decoration: none;
    font-size: 15px;
    color: #cbd3e8;
    display: block;
  }

  .sidebar button {

    margin-left: 12px;
  }

  .sidebar a:hover {
    color: #f1f1f1;
  }

  .main {
    margin-left: 220px;
    /* Same as the width of the sidenav */
    padding: 0px 10px;
  }

  @media screen and (max-height: 450px) {
    .sidebar {
      padding-top: 15px;
    }

    .sidebar a {
      font-size: 18px;
    }
  }
</style>

<body>
  <div class="sidebar">
    <a href="user_profile.php" style="color: white;"><i class="fas fa-user-circle" style="font-size: 40px;"></i><?= $row['fname'] ?><i class="fa fa-circle" style="color: #15f716 ; font-size: 11px;"></i></a>
    <a href="user_Dashboard.php"><i class="fa fa-fw fa-tachometer"></i> Dashboard</a>
    <a href="attendance.php"><i class="fas fa-clipboard-list"></i> Attendance</a>
    <a href="report.php"><i class="fas fa-poll"></i> Your Work</a>
    <a href="leave_request.php"><i class="fas fa-envelope-open"></i> Report Task</a>
    <br>
  </div>
  <div class="main">
    <nav class="navbar navbar-light bg-light justify-content-between">
      <a class="navbar-brand">Welcome to Online Attendance System</a>
      <form method="post">
        <button class="btn btn-outline-danger my-2 my-sm-0" name="u_logout" type="submit">Logout</button>
      </form>
    </nav>

  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>