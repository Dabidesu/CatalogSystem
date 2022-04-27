<?php
  include 'db.php';
  $id = $_GET['id'];
  $sql = "delete from catalog where id=$id";
  $con->query($sql);
  $con->close();
  header("location: ../admin.php");
?>