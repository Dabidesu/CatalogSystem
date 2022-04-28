<?php
session_start();

//Clear Session Cache
//session_destroy();

require_once('./php/createdb.php');
require_once('./php/component.php');

$db = new createdb("catalogdb", "catalog");

//Session Cart Functionality
if(isset($_POST['addto'])) {
    if(isset($_SESSION['cart'])) {
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        
        if(in_array($_POST['product_id'], $item_array_id)) {
           echo "<script> alert('Product already added in the cart.') </script>";
           echo "<script> window.location = 'index.php' </script>";
        }
        else {
           $count = count($_SESSION['cart']);
           $item_array = array(
            'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
            //print_r($_SESSION['cart']);
        }
        //print_r($_POST['product_id']);
    } 
    else {
        $item_array = array(
            'product_id' => $_POST['product_id']
        );

        // Cart Session Variable
        $_SESSION['cart'][0] = $item_array;
        //print_r($_SESSION['cart']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <link rel="icon" href="https://i.ibb.co/G3LH2x9/cart-icon.png">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css" integrity="sha512-1hsteeq9xTM5CX6NsXiJu3Y/g+tj+IIwtZMtTisemEv3hx+S9ngaW4nryrNcPM4xGzINcKbwUJtojslX2KG+DQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <?php require_once("php/header.php"); ?>
    <div class="container">
        <div class="row text-center py-5">
            <!-- Cards -->
            <?php
            
            $result = $db->getData();
            while($row = mysqli_fetch_assoc($result)) {
                component($row['id'], $row['prod_name'], $row['prod_price'], $row['prod_image'], $row['prod_desc'], $row['prod_stock']);
            }
            ?>
        </div>
    </div>

</body>
</html>