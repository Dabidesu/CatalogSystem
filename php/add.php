<?php
    include 'db.php';
    $prod_name = $_POST["prod_name"];
    $prod_price = $_POST["prod_price"];
    $prod_image = $_POST["prod_image"];
    $prod_desc = $_POST["prod_desc"];
    $sql = "INSERT INTO catalog (prod_name, prod_price, prod_image, prod_desc) values ('$prod_name', '$prod_price', '$prod_image', '$prod_desc')";
    $con->query($sql);
    $con->close();
    header("location: ../admin.php");
?>