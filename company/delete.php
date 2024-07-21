<?php
  include('connection.php');
  error_reporting(E_ALL);

  $id = $_GET['id'];

  $query = "DELETE FROM data WHERE id=$id";
  $data = mysqli_query($conn, $query);

  if ($data) {
    echo "<script>window.location.href = 'home.php';</script>";
  }
?>