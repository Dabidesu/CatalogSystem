<?php

session_start();

require_once("./php/createdb.php");
require_once('./php/createuserdb.php');
require_once("./php/component.php");

$db = new createdb("catalogdb", "catalog");
$db = new createuserdb("catalogdb", "users");

if($_SESSION['user']){ //checks if user is logged in
    $user = $_SESSION['user']; //assigns user value
}
else if($_SESSION['admin']){   
    $user = $_SESSION['admin']; //assigns user value
}
else{
header("location: LandingPage.php"); // redirects if user is not logged in
}


if (isset($_POST['remove'])) {
    //print_r($_GET['id']);
    if($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if($value["product_id"] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product removed from cart')</script>";
                echo "<script>window.location ='cart.php'</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="icon" href="https://i.ibb.co/G3LH2x9/cart-icon.png">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css" integrity="sha512-1hsteeq9xTM5CX6NsXiJu3Y/g+tj+IIwtZMtTisemEv3hx+S9ngaW4nryrNcPM4xGzINcKbwUJtojslX2KG+DQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

<?php require_once ('php/header.php'); ?>

<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="carto">
                <br>
                <h6> Cart <i class="fas fa-shopping-basket"></i>  </h6>
                <hr>
                <?php 
                
                $total = 0;
                    if(isset($_SESSION['cart'])) {
                        $product_id = array_column($_SESSION['cart'], 'product_id');
                        $result = $db->getData();

                        while($row = mysqli_fetch_assoc($result)) {
                            foreach($product_id as $id) {
                                if($row['id'] == $id) {
                                    
                                    /* //Discount
                                    $discount_percentage = 10;
                                    $discount = ($row['prod_price'] * $discount_percentage) / 100; 
                                    $discounted_price = round($row['prod_price'] - $discount);
                                    */
                                    cartElement($row['id'], $row['prod_name'], $row['prod_price'], $row['prod_image']);
                                    $total = $total + (int)$row['prod_price'];
                                }
                            }
                        }
                    }
                    else {
                        echo "<h5> Cart is empty </h5>";
                    }
                ?>
            </div>
        </div>

        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <h6>&#160;CART TRANSACTION</h6><hr>
                <div class="row price-details"> 
                    <div class="col-md-6">
                        <?php 
                            if(isset($_SESSION['cart'])) {
                                $count = count($_SESSION['cart']);
                                echo "<h6>&#160;Price ($count items) </h6>";
                            }
                            else {
                                echo "<h6>&#160;Price (0 items) </h6>";
                            }
                        ?>
                        <h6>&#160;Delivery Charge</h6><hr>
                        <h6>&#160;Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                            <h6>₱ <?php echo $total; ?></h6>
                            <h6 class="text-success">₱
                            <?php 
                                $deliverycharge = 45; 
                                echo $deliverycharge;
                            ?>
                            </h6><hr>
                            <h6>₱ <?php echo $total + $deliverycharge; ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<center> <button onclick="window.location.href='index.php'">Home</button> </center>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
