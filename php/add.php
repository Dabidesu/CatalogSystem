<?php
    include 'db.php';
    $prod_name = $_POST["prod_name"];
    $prod_price = $_POST["prod_price"];
    $prod_image = $_POST["prod_image"];
    $prod_desc = $_POST["prod_desc"];
    $prod_stock = $_POST["prod_stock"];
    $sql = "INSERT INTO catalog (prod_name, prod_price, prod_image, prod_desc, prod_stock) values ('$prod_name', '$prod_price', '$prod_image', '$prod_desc', $prod_stock)";
    $con->query($sql);
    $con->close();
    header("location: ../admin.php");
?>