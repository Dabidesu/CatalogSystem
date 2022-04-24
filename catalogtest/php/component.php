<?php
    function rating($numOfStars) {
        $empStar = 5 - ($numOfStars % 5);
        for ($x = 0; $x < $numOfStars; $x++) {
            echo "<i class=\"fas fa-star\"></i>";
                
        }
        for ($x = 0; $x < $empStar; $x++) {
            echo "<i class=\"far fa-star\"></i>";
        }
    }

    function component($productid, $productname, $productprice, $productimage, $productdescription) {
        $discount_percentage = 10;
        $discount = ($productprice * $discount_percentage) / 100; //350
        $discounted_price = round($productprice - $discount);
        $element = "
        <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
            <form action=\"index.php\" method=\"post\">
                <div class=\"card shadow\">
                    <div>
                        <img src=\"$productimage\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                    </div>
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">$productname</h5>
                        <h6> 
                        <!-- . rating(round(2)) . -->
                        <!--
                            <i class=\"fas fa-star\"></i>
                            <i class=\"fas fa-star\"></i>
                            <i class=\"fas fa-star\"></i>
                            <i class=\"fas fa-star\"></i>
                            <i class=\"far fa-star\"></i>
                        -->
                        </h6>
                        <p class=\"card-text\">$productdescription</p>
                        <h5>
                            <small><s>₱$productprice</s></small>
                            <span class=\"price\">₱$discounted_price</span>
                        </h5>

                        <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"addto\"> <i class=\"fas fa-shopping-cart\"></i> Add to Cart</button>
                        <input type=\"hidden\" name=\"product_id\" value=\"$productid\">
                    </div>
                </div>
            </form>
        </div>";

        echo $element;
    }

    function cartElement($productid, $productname, $productprice, $productimage) {
        $discount_percentage = 10;
        $discount = ($productprice * $discount_percentage) / 100; //350
        $discounted_price = round($productprice - $discount);
        $elementwo = "
        <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
            <div class=\"border rounded\">
                <div class=\"row bg-white\">
                <div class=\"col-md-3 pl-0\">
                    <img src=$productimage alt=\"img1\" class=\"img-fluid\">
                </div> 
                <div class=\"col-md-6\">
                    <h5 class=\"pt-2\">$productname</h5>
                    <small class=\"text-secondary\"> Seller: </small>
                    <h5 class=\"pt-2\">₱$productprice</h5>
                    <button type=\"submit\" class=\"btn btn-primary\"> Buy Now </button>
                    <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\"> Remove from Cart </button>
                </div>
                <div class=\"col-md-3 py-5\">
                        <div> 
                            <button type=\"button\" class=\"btn bg-light border square-md\">
                                <i class=\"fas fa-minus\"></i>
                            </button>
                                <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                            <button type=\"button\" class=\"btn bg-light border square-md\">
                                <i class=\"fas fa-plus\"></i>
                            </button>
                </div>
                </div>
            </div>
        </form>";
        
        echo $elementwo;
    }
?>