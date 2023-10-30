<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "attendance_system";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);
// adding user
if (isset($_POST["add_user"])) {

  $date = date("Y-m-d");
  $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
  $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
  $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
  $password = 111;
  $agey = date_diff(date_create($dob), date_create($date));
  $age_y = $agey->format('%y');
  $agem = date_diff(date_create($dob), date_create($date));
  $age_m = $agem->format('%m');

  // for user image
  $filename = $_FILES["dp"]["name"];
  $tempname = $_FILES["dp"]["tmp_name"];
  $folder = "image/" . $filename;
  $sql1 = mysqli_query($conn, "SELECT * FROM users where email='$email'");
  if (mysqli_num_rows($sql1) > 0) {

    echo "<script>alert('User Already Exist')</script>"
?>
    <?php

  } else {
    $sql = "INSERT INTO users (email,fname,lname,dob,age_y,age_m,password1,password2,dp,gender,date_time) VALUES ('$email','$fname','$lname','$dob','$age_y','$age_m','$password','$password','$filename','$gender','$date')";
    mysqli_query($conn, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
      $msg = "Image uploaded successfully";
    ?> <script type="text/javascript">
        alert("User Added Successfully")
      </script>
    <?php
    } else {
      $msg = "Failed to upload image";
    }
  }
}
// adding subject
// View User Details
if (isset($_POST["view_details"])) {
  session_start();

  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $_SESSION["email"] = $email;
  header("Location: user_details.php");
}
//login user
if (isset($_POST["login"])) {
  session_start();

  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $_SESSION["email"] = $email;
  $password = mysqli_real_escape_string($conn, $_POST["password"]);

  $sql = mysqli_query($conn, "SELECT * FROM users where email='$email' and password1='$password'");
  $row  = mysqli_fetch_array($sql);
  if (is_array($row)) {
    header("Location: User/user_dashboard.php");
  } else {
    ?> <script type="text/javascript">
      alert("Incorrect email/password Combination.")
    </script>
  <?php
  }
}
// send message to admin
if (isset($_POST["send_message"])) {
  $name = mysqli_real_escape_string($conn, $_POST["name"]);
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
  $message = mysqli_real_escape_string($conn, $_POST["message"]);
  $date = date("Y-m-d");

  $sql = "INSERT INTO messages (name,email,phone,message,date_time) VALUES ('$name','$email','$phone','$message','$date')";
  if (!mysqli_query($conn, $sql)) {
  ?> <script type="text/javascript">
      alert("Message not send! Please try again after some time")
    </script>
  <?php
  } else {
  ?> <script type="text/javascript">
      alert("Message sent Successfully !")
    </script>
  <?php
  }
}
//reset password
if (isset($_POST["reset_password"])) {


  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = 111;
  $sql = "UPDATE users SET password1='$password', password2='$password' WHERE email='$email'";
  if (!mysqli_query($conn, $sql)) {
  ?> <script type="text/javascript">
      alert("Password not updated . Try again !")
    </script>
  <?php
  } else {
  ?> <script type="text/javascript">
      alert("Password updated Successfully !")
    </script>

  <?php
  }
}
// when user updates dp
if (isset($_POST["update_dp"])) {
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $filename = $_FILES["dp"]["name"];
  $tempname = $_FILES["dp"]["tmp_name"];
  $folder = "../Admin/image/" . $filename;


  $sql = "UPDATE users SET dp='$filename' WHERE email='$email'";
  mysqli_query($conn, $sql);

  // Now let's move the uploaded image into the folder: image
  if (move_uploaded_file($tempname, $folder)) {
    $msg = "Image uploaded successfully";
  ?> <script type="text/javascript">
      alert("Picture updated Successfully")
    </script>
    <?php
  } else {
    $msg = "Failed to upload image";
  }
}

if (isset($_POST["change_password"])) {
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $c_password = mysqli_real_escape_string($conn, $_POST["c_password"]);
  $c_password1 = mysqli_real_escape_string($conn, $_POST["c_password1"]);
  $u_password1 = mysqli_real_escape_string($conn, $_POST["u_password1"]);
  $u_password2 = mysqli_real_escape_string($conn, $_POST["u_password2"]);

  if ($u_password1 == $u_password2) {
    if ($c_password == $c_password1) {
      $sql = "UPDATE users SET password1='$u_password1' ,password2='$u_password1' WHERE email='$email' and password1='$c_password'";

      if (!mysqli_query($conn, $sql)) {
    ?> <script type="text/javascript">
          alert("Password not updated . Try again !")
        </script>
      <?php
      } else {
      ?> <script type="text/javascript">
          alert("Password updated Successfully !")
        </script>
      <?php
      }
    } else {
      ?> <script type="text/javascript">
        alert("Current password is incorrect")
      </script>
    <?php
    }
  } else {
    ?> <script type="text/javascript">
      alert("Two passwords didnt match")
    </script>
  <?php
  }
}
//admin login
if (isset($_POST["admin_login"])) {
  session_start();

  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $_SESSION["admin_email"] = $email;
  $password = mysqli_real_escape_string($conn, $_POST["password"]);
  $email1 = "admin@admin.com";
  $password1 = "admin";
  if ($email == $email1 && $password == $password1) {
      header("Location: admin_dashboard.php");
  } else {
    echo '<script>alert("Incorrect ID,Password combination")</script>';
  }
}
//admin logout
if (isset($_POST["logout"])) {
  session_destroy();
  header("Location: login.php");
}
// user logout
if (isset($_POST["u_logout"])) {
  session_destroy();
  header("Location: ../Login.php");
}
// when student mark attendance as present

if (isset($_POST["mark_attendance"])) {
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
  $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
  $attendance = "present";
  $date = date("Y-m-d");
  $sql = mysqli_query($conn, "SELECT * FROM attendance where date_time='$date' and email='$email'");
  $row  = mysqli_fetch_array($sql);
  if (is_array($row)) {
  ?> <script type="text/javascript">
      alert("Attendance Already Marked")
    </script>
    <?php

  } else {
    $sql = "INSERT INTO attendance (email,fname,lname,attendance,date_time) VALUES ('$email','$fname','$lname','$attendance','$date')";
    if (!mysqli_query($conn, $sql)) {
    ?> <script type="text/javascript">
        alert("Attendance didnt mark! Please try again after some time")
      </script>
    <?php
    } else {
    ?> <script type="text/javascript">
        alert("Attendance Marked Successfully !")
      </script>
    <?php
    }
  }
}
// when student mark attendance as absent

if (isset($_POST["mark_leave"])) {
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
  $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
  $attendance = "absent";
  $date = date("Y-m-d");
  $sql = mysqli_query($conn, "SELECT * FROM attendance where date_time='$date' and email='$email'");
  $row  = mysqli_fetch_array($sql);
  if (is_array($row)) {
    ?> <script type="text/javascript">
      alert("Attendance Already Marked")
    </script>
    <?php

  } else {
    $sql = "INSERT INTO attendance (email,fname,lname,attendance,date_time) VALUES ('$email','$fname','$lname','$attendance','$date')";
    if (!mysqli_query($conn, $sql)) {
    ?> <script type="text/javascript">
        alert("Attendance didnt mark! Please try again after some time")
      </script>
    <?php
    } else {
    ?> <script type="text/javascript">
        alert("Attendance Marked Successfully !")
      </script>
    <?php
    }
  }
}
// send leave request to admin
if (isset($_POST["leave_req"])) {
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
  $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
  $message = mysqli_real_escape_string($conn, $_POST["message"]);
  $date = date("Y-m-d");

  // Define the target directory for uploading images
  $targetDir = "User/userwork/";

  // Get the file name of the uploaded image
  $imageName = basename($_FILES["image"]["name"]);

  // Create the complete target file path
  $targetFile = $targetDir . $imageName;

  // Check if the image was successfully uploaded
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
    // Image uploaded successfully, and its path is stored in $targetFile
    $imagePath = $targetFile;

    // Insert the data, including the image path, into the database
    $sql = "INSERT INTO leave_requests (email, fname, lname, message, date_time, image_path, status) 
                VALUES ('$email', '$fname', '$lname', '$message', '$date', '$imagePath', 'REJECT')";

    if (mysqli_query($conn, $sql)) {
    ?>
      <script type="text/javascript">
        alert("Leave Request submitted to admin!")
      </script>
    <?php
    } else {
    ?>
      <script type="text/javascript">
        alert("Leave Request didn't submit to admin! Please try again after some time")
      </script>
    <?php
    }
  } else {
    ?>
    <script type="text/javascript">
      alert("Failed to upload the image. Please try again.")
    </script>
    <?php
  }
}
// when admin approve leave 
if (isset($_POST["approve_leave"])) {
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
  $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
  $date = mysqli_real_escape_string($conn, $_POST["date"]);
  $attendance = "leave";
  $sql = mysqli_query($conn, "SELECT * FROM attendance where date_time='$date' and email='$email'");
  $row  = mysqli_fetch_array($sql);
  if (is_array($row)) {
    $sql = "UPDATE attendance SET attendance='$attendance'  WHERE email='$email' and date_time='$date'";

    if (!mysqli_query($conn, $sql)) {
    ?> <script type="text/javascript">
        alert("Leave not Added . Try again !")
      </script>
    <?php
    } else {
    ?> <script type="text/javascript">
        alert("Attendance updated Successfully !")
      </script>
    <?php
    }
  } else {
    $sql = "INSERT INTO attendance (email,fname,lname,attendance,date_time) VALUES ('$email','$fname','$lname','$attendance','$date')";
    if (!mysqli_query($conn, $sql)) {
    ?> <script type="text/javascript">
        alert("Leave not Added . Try again !")
      </script>
    <?php
    } else {
    ?> <script type="text/javascript">
        alert("Attendance updated Successfully !")
      </script>
    <?php
    }
  }
}
// when admin did not approve leave
if (isset($_POST["reject_leave"])) {
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
  $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
  $date = mysqli_real_escape_string($conn, $_POST["date"]);
  $attendance = "absent";
  $sql = mysqli_query($conn, "SELECT * FROM attendance where date_time='$date' and email='$email'");
  $row  = mysqli_fetch_array($sql);
  if (is_array($row)) {
    $sql = "UPDATE attendance SET attendance='$attendance'  WHERE email='$email' and date_time='$date'";

    if (!mysqli_query($conn, $sql)) {
    ?> <script type="text/javascript">
        alert("Leave not Added . Try again !")
      </script>
    <?php
    } else {
    ?> <script type="text/javascript">
        alert("Attendance updated Successfully !")
      </script>
    <?php
    }
  } else {
    $sql = "INSERT INTO attendance (email,fname,lname,attendance,date_time) VALUES ('$email','$fname','$lname','$attendance','$date')";
    if (!mysqli_query($conn, $sql)) {
    ?> <script type="text/javascript">
        alert("Leave not Added . Try again !")
      </script>
    <?php
    } else {
    ?> <script type="text/javascript">
        alert("Attendance updated Successfully !")
      </script>
    <?php
    }
  }
}

if (isset($_POST["edit_attendance"])) {
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
  $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
  $date = mysqli_real_escape_string($conn, $_POST["date"]);
  $edit_att = mysqli_real_escape_string($conn, $_POST["edit_att"]);

  $sql = "UPDATE attendance SET attendance='$edit_att'  WHERE email='$email' and date_time='$date'";

  if (!mysqli_query($conn, $sql)) {
    ?> <script type="text/javascript">
      alert("Leave not Added . Try again !")
    </script>
  <?php
  } else {
  ?> <script type="text/javascript">
      alert("Attendance updated Successfully !")
    </script>
<?php

  }
}
?>