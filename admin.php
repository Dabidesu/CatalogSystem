<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" href="https://i.ibb.co/G3LH2x9/cart-icon.png">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css" integrity="sha512-1hsteeq9xTM5CX6NsXiJu3Y/g+tj+IIwtZMtTisemEv3hx+S9ngaW4nryrNcPM4xGzINcKbwUJtojslX2KG+DQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
    
<?php
session_start(); //starts the session
if($_SESSION['admin']){ //checks if user is logged in
}
else{
header("location: LandingPage.php"); // redirects if user is not logged in
}
$user = $_SESSION['admin']; //assigns user value
?>
    
<body>
    <div class="container">
        <table class="table">
            <center><br> <br><h1> Admin </h1></center>
            <hr><br>

            <!-- Retrieve Table from Database -->
            <div class="col-md-7">
                <div class="input-group mb-3">
                    <form action="" method="GET">
                        <input type="text" id="searchfield" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="form-control" placeholder="Search item(s)">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-dark">Search</button>
                            <button type="submit" class="btn btn-secondary" onclick="document.getElementById('searchfield').value = '';">✖</button>
                        </div>
                        
                    </form>
                </div>
            </div>
            <tr>
                <th>Product Name</th>
                <th>Product Price (₱)</th>
                <th>Image URL</th>
                <th>Product Description</th>
                <th>Qty</th>
            </tr>
            <tbody>
                <?php include 'php/read.php'; ?>
            </tbody>
        </table>

        <!-- Add Data -->
        <br> <br>
        <h5> Add Entry </h5>
        <hr>
        <form class="form-inline m-2" action="php/add.php" method="POST">
            <label for="prod_name">Name:</label>
            <input type="text" class="form-control m-2" id="prod_name" name="prod_name">
            <label for="prod_price">Price (₱):</label>
            <input type="number" class="form-control m-2" id="prod_price" name="prod_price">
            <label for="prod_image">Image URL:</label>
            <input type="text" class="form-control m-2" id="prod_image" name="prod_image">
            <label for="prod_desc">Description:</label>
            <input type="text" class="form-control m-2" id="prod_desc" name="prod_desc">
            <label for="prod_stock">Stock Qty:</label>
            <input type="number" class="form-control m-2" id="prod_stock" name="prod_stock">
            <center> <button type="submit" class="btn btn-primary" style="margin-top: 25px;">Submit</button> </center>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
