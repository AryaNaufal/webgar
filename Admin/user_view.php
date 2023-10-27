<?php
include('header.php');
include('../server.php');
session_start();
$admin_email = $_SESSION["admin_email"];
if ($admin_email != "admin@admin.com") {
  header("Location: login.php");
} else {
?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>User View</title>


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
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    ?>

    <div class="main">
      <button style="float: right; margin-right: 12px;" class="btn btn-primary my-2 my-sm-0" onclick="exportToExcel('dataTable', 'user-data')"><i class="fas fa-download"></i> Generate Report</button> <br><br>
      <div class="data">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th colspan="2" style="text-align: center;">Age</th>
              <th>Password</th>
              <th>Add Date</th>
              <th colspan="2" style="text-align: center;">Operations</th>

            </tr>
          </thead>
          <tbody>
            <?php
            if ($result->num_rows > 0) {

              // output data of each row

              while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                  <td><?php echo $row["fname"] . " " . $row["lname"]  ?></td>
                  <td><?php echo $row["email"]  ?></td>
                  <td><?php echo $row["age_y"] . " Year"  ?></td>
                  <td><?php echo $row["age_m"]  . " Month" ?></td>
                  <td><?php echo $row["password1"]  ?></td>
                  <td><?php echo $row["date_time"]  ?></td>
                  <td>
                    <a href="<?php echo '../delete.php?id=' . $row['id']; ?>" class="btn btn-outline-danger">Delete</a>
                  </td>

                  </td>
                  <td>
                    <form method="post"> <input type="text" name="email" value="<?php echo $row["email"] ?>" hidden><button class="btn btn-outline-info" name="view_details">View Details</button></form>
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


  <script type="text/javascript">
    function exportToExcel(tableID, filename = '') {
      var downloadurl;
      var dataFileType = 'application/vnd.ms-excel';
      var tableSelect = document.getElementById(tableID);
      var tableHTMLData = tableSelect.outerHTML.replace(/ /g, '%20');

      // Specify file name
      filename = filename ? filename + '.xls' : 'export_excel_data.xls';

      // Create download link element
      downloadurl = document.createElement("a");

      document.body.appendChild(downloadurl);

      if (navigator.msSaveOrOpenBlob) {
        var blob = new Blob(['\ufeff', tableHTMLData], {
          type: dataFileType
        });
        navigator.msSaveOrOpenBlob(blob, filename);
      } else {
        // Create a link to the file
        downloadurl.href = 'data:' + dataFileType + ', ' + tableHTMLData;

        // Setting the file name
        downloadurl.download = filename;

        //triggering the function
        downloadurl.click();
      }
    }
  </script>


<?php

}
?>