<?php
include('header.php');
include('../server.php');

$admin_email = $_SESSION["admin_email"];
if ($admin_email != "admin@admin.com") {
  header("Location: login.php");
} else {
?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>User View</title>

    <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

  </head>
  <style type="text/css">
    .data {
      margin-left: 14px;
    }
  </style>

  <body>
    <?php
    $sql = "SELECT * FROM leave_requests";
    $result = $conn->query($sql);

    if (isset($_POST['approve'])) {
      // Handle the 'APPROVE' button click
      $id = $_POST['id'];
      $email = $_POST['email'];
      $date = $_POST['date'];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];

      // Execute SQL query to update the status to 'APPROVE' in the database
      $updateQuery = "UPDATE leave_requests SET status = 'APPROVE' WHERE id = '$id' AND email = '$email'";
      $conn->query($updateQuery);

      // Store the status in a session variable
      $_SESSION['approval_status'] = 'APPROVE';
    } else if (isset($_POST['reject'])) {
      // Handle the 'REJECT' button click
      $id = $_POST['id'];
      $email = $_POST['email'];
      $date = $_POST['date'];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];

      // Execute SQL query to update the status to 'REJECT' in the database
      $updateQuery = "UPDATE leave_requests SET status = 'REJECT' WHERE id = '$id' AND email = '$email'";
      $conn->query($updateQuery);

      // Store the status in a session variable
      $_SESSION['approval_status'] = 'REJECT';
    } else if (isset($_POST['delete'])) {
      // Handle the 'REJECT' button click
      $id = $_POST['id'];
      $email = $_POST['email'];
      $date = $_POST['date'];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];

      // Execute SQL query to update the status to 'REJECT' in the database
      $updateQuery = "DELETE FROM leave_requests WHERE id = '$id'";
      $conn->query($updateQuery);
      header("location: leave_requests.php");
    }
    ?>

    <div class="main">
      <div class="data">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th width="10%;">Email</th>
              <th width="20%;">Message</th>
              <th width="10%;">Date</th>
              <th width="15%;">Approve</th>
              <th width="15%;">Reject</th>
              <th>PIC</th>
              <th>Delete</th>

            </tr>
          </thead>
          <tbody>
            <?php
            if ($result->num_rows > 0) {

              // output data of each row

              while ($row = $result->fetch_assoc()) {
            ?>

                <tr>
                  <td><?php echo $row["email"]  ?></td>
                  <td><?php echo $row["message"] ?></td>
                  <td><?php echo $row["date_time"] ?></td>
                  <td>
                    <form action="" method="POST">
                      <input type="text" name="id" value="<?php echo $row["id"] ?>" hidden>
                      <input type="text" name="email" value="<?php echo $row["email"] ?>" hidden>
                      <input type="text" name="date" value="<?php echo $row["date_time"] ?>" hidden>
                      <input type="text" name="fname" value="<?php echo $row["fname"] ?>" hidden>
                      <input type="text" name="lname" value="<?php echo $row["lname"] ?>" hidden>
                      <button type="submit" name="approve" value="APPROVE" class="btn btn-primary">APPROVE</button>
                    </form>

                  <td>
                    <form action="" method="POST">
                      <input type="text" name="id" value="<?php echo $row["id"] ?>" hidden>
                      <input type="text" name="email" value="<?php echo $row["email"] ?>" hidden>
                      <input type="text" name="date" value="<?php echo $row["date_time"] ?>" hidden>
                      <input type="text" name="fname" value="<?php echo $row["fname"] ?>" hidden>
                      <input type="text" name="lname" value="<?php echo $row["lname"] ?>" hidden>
                      <button type="submit" name="reject" value="REJECT" class="btn btn-primary">REJECT</button>
                    </form>
                  <td>
                    <img src="../User/<?= $row['image_path']; ?>" alt="Report Image" width="50">
                  </td>
                  <td>
                    <form action="" method="POST">
                      <input type="text" name="id" value="<?php echo $row["id"] ?>" hidden>
                      <input type="text" name="email" value="<?php echo $row["email"] ?>" hidden>
                      <input type="text" name="date" value="<?php echo $row["date_time"] ?>" hidden>
                      <input type="text" name="fname" value="<?php echo $row["fname"] ?>" hidden>
                      <input type="text" name="lname" value="<?php echo $row["lname"] ?>" hidden>
                      <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                    </form>
                  </td>
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