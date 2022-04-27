<?php
  include 'db.php';
  $id = $_POST['id'];
  $prod_name = $_POST['prod_name'];
  $prod_price = $_POST['prod_price'];
  $prod_image = $_POST['prod_image'];
  $prod_desc = $_POST['prod_desc'];
  $sql = "update catalog set prod_name='$prod_name', prod_price='$prod_price', prod_image='$prod_image', prod_desc='$prod_desc' where id=$id";
  $result = $con->query($sql);
  $con->close();
  header("location: ../admin.php");
?>