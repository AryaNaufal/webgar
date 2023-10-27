<?php
include 'server.php';
$id_users = $_GET['id'];

$query = mysqli_query($conn, "DELETE FROM users WHERE id = '$id_users'");
header("location: Admin/user_view.php");