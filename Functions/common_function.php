<?php
    // Function for getting limited products from database 
    function getProducts() {
        // We are saying that use the Global variable $con otherwise it will give error as this function does not have any local var $con.
        global $con;

        // If any brand and category is not clicked then all the products are shown. 
        if(!isset($_GET['brand']) and !isset($_GET['category'])) {
            $query_to_select_all_products = "select * from `products` order by rand() LIMIT 0,9";
            $query_result = mysqli_query($con, $query_to_select_all_products);

            while($table_row = mysqli_fetch_assoc($query_result)) {
                $product_id = $table_row['product_id'];
                $product_title = $table_row['product_title'];
                $product_description = $table_row['product_description'];
                $category_id = $table_row['category_id'];
                $brand_id = $table_row['brand_id'];
                $product_image = $table_row['product_image1'];
                $product_price = $table_row['product_price'];

                echo "
                    <div class='product_1 col-md-4 mb-4'>
                        <div class='card h-100'>
                            <img src='./ADMIN/Images/$product_image' class='card-img-top my-2' alt='$product_title'>
                            <div class='card-body d-flex flex-column'> 
                                <h5 class='card-title mt-2'>$product_title</h5>
                                <p class='card-text mb-auto'>$product_description</p>
                                <p class='card-text mt-3 fw-bold'>&#8377; $product_price</p>
                                <div class='buttons mt-2'>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                    <a href='product_details.php?product_id=${product_id}' class='btn btn-dark px-3'>View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
    }

    // Function for getting all the products from database 
    function getAllProducts() {
        // We are saying that use the Global variable $con otherwise it will give error as this function does not have any local var $con.
        global $con;

        // If any brand and category is not clicked then all the products are shown. 
        if(!isset($_GET['brand']) and !isset($_GET['category'])) {
            $query_to_select_all_products = "select * from `products` order by rand()";
            $query_result = mysqli_query($con, $query_to_select_all_products);

            while($table_row = mysqli_fetch_assoc($query_result)) {
                $product_id = $table_row['product_id'];
                $product_title = $table_row['product_title'];
                $product_description = $table_row['product_description'];
                $category_id = $table_row['category_id'];
                $brand_id = $table_row['brand_id'];
                $product_image = $table_row['product_image1'];
                $product_price = $table_row['product_price'];

                echo "
                    <div class='product_1 col-md-4 mb-4'>
                        <div class='card h-100'>
                            <img src='./ADMIN/Images/$product_image' class='card-img-top my-2' alt='$product_title'>
                            <div class='card-body d-flex flex-column'> 
                                <h5 class='card-title mt-2'>$product_title</h5>
                                <p class='card-text mb-auto'>$product_description</p>
                                <p class='card-text mt-3 fw-bold'>&#8377; $product_price</p>
                                <div class='buttons mt-2'>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                    <a href='product_details.php?product_id=${product_id}' class='btn btn-dark px-3'>View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
    }

    // Function for getting specific brand or category products from database 
    function getUniqueProducts() {
        // We are saying that use the Global variable $con otherwise it will give error as this function does not have any local var $con.
        global $con;

        // If any brand is clicked then that brands products are shown.
        if(isset($_GET['brand'])) {
            $product_brand_id = $_GET['brand']; 
            $query_to_select_all_products = "select * from `products` where brand_id = $product_brand_id";
            $query_result = mysqli_query($con, $query_to_select_all_products);
            $number_of_rows = mysqli_num_rows($query_result);

            // If number of rows == 0 which means there are no products available of that brand
            if($number_of_rows == 0) {
                echo "<h2 class='products_not_available text-center text-danger'>Sorry! Products are not available.</h2>";
            }

            while($table_row = mysqli_fetch_assoc($query_result)) {
                $product_id = $table_row['product_id'];
                $product_title = $table_row['product_title'];
                $product_description = $table_row['product_description'];
                $category_id = $table_row['category_id'];
                $brand_id = $table_row['brand_id'];
                $product_image = $table_row['product_image1'];
                $product_price = $table_row['product_price'];

                echo "
                    <div class='product_1 col-md-4 mb-4'>
                        <div class='card h-100'>
                            <img src='./ADMIN/Images/$product_image' class='card-img-top my-2' alt='$product_title'>
                            <div class='card-body d-flex flex-column'> 
                                <h5 class='card-title mt-2'>$product_title</h5>
                                <p class='card-text mb-auto'>$product_description</p>
                                <p class='card-text mt-3 fw-bold'>&#8377; $product_price</p>
                                <div class='buttons mt-2'>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                    <a href='product_details.php?product_id=${product_id}' class='btn btn-dark px-3'>View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
        }

        // If any category is clicked then that categories products are shown.
        if(isset($_GET['category'])) {
            $product_category_id = $_GET['category']; 
            $query_to_select_all_products = "select * from `products` where category_id = $product_category_id";
            $query_result = mysqli_query($con, $query_to_select_all_products);
            $number_of_rows = mysqli_num_rows($query_result);

            // If number of rows == 0 which means there are no products available of that category
            if($number_of_rows == 0) {
                echo "<h2 class='products_not_available text-center text-danger'>Sorry! Products are not available.</h2>";
            }

            while($table_row = mysqli_fetch_assoc($query_result)) {
                $product_id = $table_row['product_id'];
                $product_title = $table_row['product_title'];
                $product_description = $table_row['product_description'];
                $category_id = $table_row['category_id'];
                $brand_id = $table_row['brand_id'];
                $product_image = $table_row['product_image1'];
                $product_price = $table_row['product_price'];

                echo "
                    <div class='product_1 col-md-4 mb-4'>
                        <div class='card h-100'>
                            <img src='./ADMIN/Images/$product_image' class='card-img-top my-2' alt='$product_title'>
                            <div class='card-body d-flex flex-column'> 
                                <h5 class='card-title mt-2'>$product_title</h5>
                                <p class='card-text mb-auto'>$product_description</p>
                                <p class='card-text mt-3 fw-bold'>&#8377; $product_price</p>
                                <div class='buttons mt-2'>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                    <a href='product_details.php?product_id=${product_id}' class='btn btn-dark px-3'>View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
    }

    // Function for getting all the brands from database 
    function getAllBrands() {
        // We are saying that use the Global variable $con otherwise it will give error as this function does not have any local var $con.
        global $con;

        // Query to get data from brands table
        $select_brands_query = "Select * from `brands`";

        // Result of the above query => it contains both the columns of the brands table.
        $query_result = mysqli_query($con, $select_brands_query);

        // Here mysqli_fetch_assoc($query_result) gives the value of next row starting from row number 2.
        // Here mysqli_fetch_assoc($query_result) will return row value till it reaches last row of table and then it will have null value and will terminate the loop. 
        while($result_data = mysqli_fetch_assoc($query_result)) {
            // Accessing the brand title from $result_data which contains row value.
            $brand_title = $result_data['brand_title'];

            // Accessing the brand id from $result_data which contains row value.
            $brand_id = $result_data['brand_id'];
            
            // Inserting into the DOM the brand title.
            echo "
                <li class='nav-item'>
                    <a class='nav-link text-light fs-5' href='index.php?brand=$brand_id'>$brand_title</a>
                </li>
            ";
        }
    } 

    // Function for getting all the categories from database 
    function getAllCategories() {
        // We are saying that use the Global variable $con otherwise it will give error as this function does not have any local var $con.
        global $con;

        // Query to get data from categories table
        $select_categories_query = "select * from `categories`";

        // Result of the above query => it contains both the columns of the categories table.
        $query_result = mysqli_query($con, $select_categories_query);

        // Here mysqli_fetch_assoc($query_result) gives the value of next row starting from row number 2.
        // Here mysqli_fetch_assoc($query_result) will return row value till it reaches last row of table and then it will have null value and will terminate the loop. 
        while($result_data = mysqli_fetch_assoc($query_result)) {
            // Accessing the category title from $result_data which contains row value.
            $category_title = $result_data['category_title'];

            // Accessing the category id from $result_data which contains row value.
            $category_id = $result_data['category_id'];

            // Inserting into the DOM the category title.
            echo "
                <li class='nav-item'>
                    <a class='nav-link text-light fs-5' href='?category=$category_id'>$category_title</a>
                </li>
            ";
        }
    } 

    // Function for getting all the products from database that matches the searched query 
    function search_product() {
        // We are saying that use the Global variable $con otherwise it will give error as this function does not have any local var $con.
        global $con;

        if(isset($_GET['search_data_product'])) {
            $search_data = $_GET['search_data'];
            $search_query = "select * from `products` where product_keywords like '%$search_data%'";
            $query_result = mysqli_query($con, $search_query);
            $number_of_rows = mysqli_num_rows($query_result);

            // If number of rows == 0 which means there are no products available of that brand
            if($number_of_rows == 0) {
                echo "<h2 class='products_not_available text-center text-danger'>Sorry! No Result Found.</h2>";
            }

            while($table_row = mysqli_fetch_assoc($query_result)) {
                $product_id = $table_row['product_id'];
                $product_title = $table_row['product_title'];
                $product_description = $table_row['product_description'];
                $category_id = $table_row['category_id'];
                $brand_id = $table_row['brand_id'];
                $product_image = $table_row['product_image1'];
                $product_price = $table_row['product_price'];

                echo "
                    <div class='product_1 col-md-4 mb-4'>
                        <div class='card h-100'>
                            <img src='./ADMIN/Images/$product_image' class='card-img-top my-2' alt='$product_title'>
                            <div class='card-body d-flex flex-column'> 
                                <h5 class='card-title mt-2'>$product_title</h5>
                                <p class='card-text mb-auto'>$product_description</p>
                                <p class='card-text mt-3 fw-bold'>&#8377; $product_price</p>
                                <div class='buttons mt-2'>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to Cart</a>
                                    <a href='product_details.php?product_id=${product_id}' class='btn btn-dark px-3'>View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
    }
    
    // Function for getting the product from database for which the user has clicked on view more button 
    function viewMore() {
        // We are saying that use the Global variable $con otherwise it will give error as this function does not have any local var $con.
        global $con;

        // If any brand and category is not clicked then all the products are shown. 
        if(isset($_GET['product_id'])) {
            $product_id = $_GET['product_id'];
            $query_to_select_all_products = "select * from `products` where product_id = $product_id";
            $query_result = mysqli_query($con, $query_to_select_all_products);

            while($table_row = mysqli_fetch_assoc($query_result)) {
                $product_id = $table_row['product_id'];
                $product_title = $table_row['product_title'];
                $product_description = $table_row['product_description'];
                $category_id = $table_row['category_id'];
                $brand_id = $table_row['brand_id'];
                $product_image1 = $table_row['product_image1'];
                $product_image2 = $table_row['product_image2'];
                $product_image3 = $table_row['product_image3'];
                $product_price = $table_row['product_price'];

                echo "
                    <div class='product_carousel m-auto'>
                        <div id='carouselExample' class='carousel slide'>
                            <button class='carousel-control-prev prev' type='button' data-bs-target='#carouselExample' data-bs-slide='prev'>
                                <span class='carousel-control-prev-icon product_prev_btn' aria-hidden='true'></span>
                                <span class='visually-hidden'>Previous</span>
                            </button>
                            <div class='carousel-inner'>
                                <div class='carousel-item active'>
                                    <img src='./ADMIN/Images/$product_image1' class='carousel_image d-block w-100' alt='$product_title'>
                                </div>
                                <div class='carousel-item'>
                                    <img src='./ADMIN/Images/$product_image2' class='carousel_image d-block w-100' alt='$product_title'>
                                </div>
                                <div class='carousel-item'>
                                    <img src='./ADMIN/Images/$product_image3' class='carousel_image d-block w-100' alt='$product_title'>
                                </div>
                            </div>
                            <button class='carousel-control-next next' type='button' data-bs-target='#carouselExample' data-bs-slide='next'>
                                <span class='carousel-control-next-icon product_next_btn' aria-hidden='true'></span>
                                <span class='visually-hidden'>Next</span>
                            </button>
                        </div>
                    </div>
                    <div class='product_details d-flex flex-column align-items-center mt-2 mb-4 text-center'>
                        <h2 class='my-4 fs-1'>$product_title</h2>
                        <p class='mt-4 mb-2 fs-4'>About this product</p>
                        <p class='product_description fs-5 w-75 mb-4'>$product_description</p>
                        <p class='fs-3'>Price:  &#8377; $product_price</p>
                    </div>
                    <div class='buttons mt-2 d-flex justify-content-center column-gap-5 my-4'>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary fs-5'>Add to Cart</a>
                        <a href='./display_all_products.php' class='btn btn-dark px-3 fs-5'>Continue Shopping</a>
                    </div>
                ";
            }
        }
    }

    // Function to store Cart details in Database
    function cart() {
        // We are saying that use the Global variable $con otherwise it will give error as this function does not have any local var $con.
        global $con;

        // If Add to Cart button is clicked then this block is executed. 
        if(isset($_GET['add_to_cart'])) {
            $product_id = $_GET['add_to_cart'];
            $ip_address = getIPAddress();
            $quantity = 0;

            $select_query = "select * from `cart_details` where ip_address = '$ip_address' and product_id = $product_id";
            $select_query_result = mysqli_query($con, $select_query);
            $number_of_rows = mysqli_fetch_assoc($select_query_result);

            if($number_of_rows > 0) {
                echo "
                    <script>
                        alert('Product already Added in the Cart!');
                    </script>
                ";
            }
            else {
                $insert_query = "insert into `cart_details` (product_id, ip_address, quantity) values ($product_id, '$ip_address', $quantity)";
                $insert_query_result = mysqli_query($con, $insert_query);
                if($insert_query_result) {
                    echo "
                        <script>
                            alert('Product added Successfully in the Cart.');
                        </script>
                    ";
                }
            }
            echo "
                <script>
                    window.open('index.php', '_self');
                </script>
            ";
        }
    }

    // Function to get number of Items in the Cart from Database
    function getNumberOfCartItems() {
        // We are saying that use the Global variable $con otherwise it will give error as this function does not have any local var $con.
        global $con;

        $ip_address = getIPAddress();

        $select_query = "select * from `cart_details` where ip_address = '$ip_address'";
        $select_query_result = mysqli_query($con, $select_query);
        $number_of_cart_items = mysqli_num_rows($select_query_result);
        
        echo $number_of_cart_items;
    }

    // Function to get the IP address of the User. 
    function getIPAddress() {  
        //whether ip is from the share internet  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
            $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
        }  
        //whether ip is from the remote address  
        else{  
            $ip = $_SERVER['REMOTE_ADDR'];  
        }  
        return $ip;  
    }  

    // Function to get the price of all the items and calculate the total price
    function getTotalCartPrice() : string {
        // We are saying that use the Global variable $con otherwise it will give error as this function does not have any local var $con.
        global $con;

        $ip_address = getIPAddress();
        $total_price = 0;

        $select_query = "select * from `cart_details` where ip_address = '$ip_address'";
        $select_query_result = mysqli_query($con, $select_query);

        while($table_row = mysqli_fetch_array($select_query_result)) {
            $product_id = $table_row['product_id'];
            $product_query = "select * from `products` where product_id = '$product_id'";
            $product_query_result = mysqli_query($con, $product_query);

            $table_row = mysqli_fetch_assoc($product_query_result);
            $product_price = $table_row['product_price'];
            $total_price += $product_price;
        }
        echo $total_price;
        return $total_price;
    }

    function getProductsToDisplayInCart() {
        // We are saying that use the Global variable $con otherwise it will give error as this function does not have any local var $con.
        global $con;

        $ip_address = getIPAddress();
        $total_price = 0;

        $select_query = "select * from `cart_details` where ip_address = '$ip_address'";
        $select_query_result = mysqli_query($con, $select_query);
        $number_of_rows = mysqli_num_rows($select_query_result);

        if($number_of_rows != 0) {
            while($table_row = mysqli_fetch_array($select_query_result)) {
                $product_id = $table_row['product_id'];
                $product_query = "select * from `products` where product_id = '$product_id'";
                $product_query_result = mysqli_query($con, $product_query);
    
                $table_row = mysqli_fetch_assoc($product_query_result);
                $product_title = $table_row['product_title'];
                $product_image = $table_row['product_image1'];
                $product_price = $table_row['product_price'];
                $product_quantity = 1;
                $total_price += $product_price;
    
                // Checking if update details button is clicked then updated the total price in the cart summary
                if(isset($_POST['update_details'])) {
                    $product_quantity = $_POST['quantity'];
                    $update_cart_table_query = "update `cart_details` set quantity = $product_quantity where ip_address = '$ip_address'";
                    $update_cart_table_query_result = mysqli_query($con, $update_cart_table_query);
                    $total_price *= $product_quantity; 
                }

                // Checking if remove button is clicked and if it is clicked then remove that product
                if(isset($_POST['remove_product'])) {
                    $id = $_POST['product_id'];
                    
                    $remove_product_query = "delete from `cart_details` where product_id = $id";
                    $remove_product_query_result = mysqli_query($con, $remove_product_query);

                    if($remove_product_query_result) {
                        echo "<script>alert('$product_title removed from Cart.')</script>";
                        echo "<script>window.open('cart.php', '_self')</script>";
                    }
                }

                echo "
                    <div class='product mt-4 border py-3'>
                        <div class='product_details d-flex column-gap-4 mb'>
                            <img src='./ADMIN/Images/$product_image' class='cart_img' alt=''>
                            <div class='details'>
                                <h4>$product_title</h4>
                                <p class='fs-5 mt-3'>Price: &#8377; $product_price</p>
                                <span class='fs-5 me-3'>Quantity</span><input type='text' name='quantity' value='$product_quantity' class='w-25 ps-1 text-center'>
                                <div class='buttons'>
                                    <!-- input[checkbox] element for checking when user clicks on remove product -->
                                    <input type='checkbox' hidden value='$product_id' id='check' class='product_checkbox' name='product_id'>
                                    <input type='submit' name='remove_product' value='Remove' class='remove_product border-0 bg-primary mt-4 text-light py-2 px-4'>
                                    <input type='submit' name='update_details' value='Update Details' class='border-0 bg-primary mt-4 text-light py-2 px-4 ms-3'>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
    }

    function getCartSummary() {
        // We are saying that use the Global variable $con otherwise it will give error as this function does not have any local var $con.
        global $con;

        $ip_address = getIPAddress();
        $total_price = getTotalCartPrice();

        $select_query = "select * from `cart_details` where ip_address = '$ip_address'";
        $select_query_result = mysqli_query($con, $select_query);
        $number_of_rows = mysqli_num_rows($select_query_result);

        if(isset($_POST['update_details'])) {
            $product_quantity = $_POST['quantity'];
            $total_price *= $product_quantity; 
        }

        if($number_of_rows != 0) {
            echo "
                <div class='summary bg-dark'>
                    <h2 class='cart_summary_heading text-light'>SUMMARY</h2>

                    <div class='total_price_details mt-4 text-light'>
                        <div class='subtotal d-flex justify-content-between'>
                            <p>SUBTOTAL</p>
                            <span class='subtotal_price text-right'>
                                &#8377; $total_price                                
                            </span>
                        </div>
                        <div class='delivery d-flex justify-content-between border-bottom mb-2'>
                            <p>DELIVERY</p>
                            <span class='subtotal_price text-right'>&#8377; 0.00</span>
                        </div>
                        <div class='total d-flex justify-content-between mh-25'>
                            <p class='fs-5'>TOTAL PRICE</p>
                            <span class='subtotal_price text-right fs-5'>
                                &#8377; $total_price
                            </span>
                        </div>
                    </div>

                    <div class='checkout_buttons mt-5 d-flex flex-column'>
                        <a href='./users_area/validate_user.php?redirectURI=cash_on_delivery.php' class='text-decoration-none w-100 text-light mx-auto text-center bg-primary mb-3 py-2 fs-5'>Cash On Delivery</a>
                        <p class='fs-2 fst-italic text-light text-center'>OR</p>
                        <a href='./users_area/validate_user.php?redirectURI=paytm_payment.php' class='text-decoration-none text-light paytm_btn w-100 bg-primary text-light py-2 fs-5'>                          
                            Pay with
                            <!-- Paytm Logo SVG -->
                            <svg class='paytm_logo_svg' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' zoomAndPan='magnify' viewBox='0 0 30 30.000001' preserveAspectRatio='xMidYMid meet' version='1.0' id='IconChangeColor'><defs><filter x='0%' y='0%' width='100%' xlink:type='simple' xlink:actuate='onLoad' height='100%' id='id1' xlink:show='other'><feColorMatrix values='0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0 0 0 1 0' color-interpolation-filters='sRGB'></feColorMatrix></filter><filter x='0%' y='0%' width='100%' xlink:type='simple' xlink:actuate='onLoad' height='100%' id='id2' xlink:show='other'><feColorMatrix values='0 0 0 0 1 0 0 0 0 1 0 0 0 0 1 0.2126 0.7152 0.0722 0 0' color-interpolation-filters='sRGB'></feColorMatrix></filter><clipPath id='id3'><path d='M 0.484375 5 L 29.515625 5 L 29.515625 24 L 0.484375 24 Z M 0.484375 5 ' clip-rule='nonzero' id='mainIconPathAttribute'></path></clipPath><mask id='id4'><g filter='url(#id1)'><g filter='url(#id2)' transform='matrix(0.0483871, 0, 0, 0.0489919, 0.48387, 4.744848)'><image x='0' y='0' width='600' xlink:href='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAGQCAAAAABXXkFEAAAAAmJLR0QA/4ePzL8AABidSURBVHic7d15lCRFnQfw7y8iq3tmYJgZGa4ZDmW4EUEED5AVVmDRRVEExeMhj0MWPFBWgRWEXdSVeS664qqIi6yCNyAKwyIqIoooggM8YUDZYQRkOEaYe6YrI+K3f/Qx3dWZ2VnVWdXR1d/Pezx6qrIiI6N+GRkZFREJEBEREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREREVFTZKIzMBWJQdCJzgR1G2MBwEx0NtrMTnQGphqxQeceuvfaVROdEeoqBtjvqhWq6y+Y6JxQN7GY9kVV9U71n3m1oKok2O0hDXUfQqrPzOSdE1Ujwf4rtS9oCCEEfUXXN+CpMyx2X6l1DUE1BNVXd3VgdfOxRcb4WTfPSmsKmQrdhwysjgn49s4DcUVUmQTnDVwHVVW7/lJIHWJxkGrQgbjq/sDq5mOLifjp34AXnTLXQQZWZxh8ZZfUTp24os5IcJK6MNjAmgqXQuqEBPv0qddNcdX9gdXNxxYN62bd0OPMlLoQMrDaz3pZtHOaTK2hfQystks8bj6YPaNUsRpm3DasZ3SqtLGovaxgryVaVx0ZVwwsGg9rgPdvHF1fMbCoZWItgEN/rZqOjqtKA0vEGGOMlGrD9W9r2t7eSypLqemsNnuXVLiDJhPLSSs3lfLbCwARwKtH71FnHglnkux2u8Bs+vyolCQn6kbOGxMxIejQpy00ZH9sIMmgOvR529Y5aFUFlvXNZ9JI+UMTM/YORAQYVnJFieWlkPm95Lyc8UZ/MSgAbH3AUf+4M4ImyLkfrMPlp2R9ThZhN71h4TXAbrHV7OnWrX9hxWoPwGbHlpigHpg2Z+7MHlNfs+L5DR6AbVtsVRNYor42r6kqy9fXrQ1Abjk0MMFjZtEG6l06EFJixkjSBD97VlaB1p9Wk/FRE7Tc9qLezhOdNmu7BXu8dK85gFdrcrsZdvjL5oMflr7GPfttXjkzY5fmhbtekMHD9B4z9z/k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' xlink:type='simple' xlink:actuate='onLoad' height='400' preserveAspectRatio='xMidYMid meet' xlink:show='embed'></image></g></g></mask></defs><g clip-path='url(#id3)'><g mask='url(#id4)'><g transform='matrix(0.0483871, 0, 0, 0.0489919, 0.48387, 4.744848)'><image x='0' y='0' width='600' xlink:href='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAlgAAAGQCAIAAAD9V4nPAAAABmJLR0QA/wD/AP+gvaeTAAAgAElEQVR4nO3d3XMk15nn9+/JrDe8FRrNBlok0WSTlIaagjQ7knY94sxGCDsxtjZ2HLs3BsMbjnU4bIcjPBH7Nwi69Y2vZq584/CFbeJmZz22VxvjEOTxLrn2vO3MALuUSIlkQ6KI6m40CkCh3jIfX+RLFbobjUIhC/WC34cINhpdyDqZlZnPec45eQ6IiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIiIjIuHKjLoCITCMzdqAGQBnWwOluI2PKG3UBRGS6bBq/b/wA1mAP9mANtmHTRl0ykefLjboAIjItoixwDz6AZfiTFiuGOX7g+CA/6sKJnEuBUESysGlswzrswtstch2CgLZhjjBHpUPNH3URRZ5PrfYicmXvGVWowm8GzLQ5bRB6SaeggQMHRqNAswjwru48MkaUEYrI1fzQOIFluNsiX+D0BPNwDhd1CkYxLyR0eG0oUgEzjZ2R8aFAKCJX8EMDmAP/lHyHVgPncIBhPRlhlBOGDRbyrBXZHmGJRZ6mUaMiMqj3jBMAOqe4FqHF6Z8Z5nDJX+PWUaOUpxnyfaiOqsQiz6FAKCID2TSqUIfGKZ0OnsMcuLjZ01ncKNrbBOo5HjmA3dEUWeS5FAhFZFBVCBrkGnhJztft/OvtAnRJUogG6MkYUh+hiFzeD41PYKZNoUPo46JEkHPiXBImRcaSAqGIXFLUNXgf2i0s6AY5c+fke06xUMaZmkZF5DLMqEAdWidYCA7nMJLBoiKTR4FQRC5jB9bg5VMWDsC6jaJK9mRiKRCKSN9+aDRhC1zAUbmbAp7bKCoyARQIRaQ/0bPzNVhoUE9GgapRVCafAqGI9CF9dj44JRd0m0OdmkRl4ikQishF3jOAOhSaWIMw6OkaVDIoE0+BUERe6IfGLAAvd/jNYs9Tgy6eRFRkwuk5QhE5358aTQBcndD4l/UzzwSm86iJTDJlhCLyPO8Zf2PkoQjBCeEhrbC7suCZWdNEJpsCoYic9Z7x+0YNduHXIGzQMgpzGD2ziWpBQZkeahoVETBjB2qwB8Ay7MK3W/xJh0YHn7hfEHo6CCURHZkd2O1ZWKMCFVgDuKbDZcY2VM8u7lGBZVi/rjJMJh0akRvDeh512IE92IMykNyytwAodGiG+B3mWnhePCLG7EwsvNz7gjPM4RkPi3xY5Duw/sJfudRbPBXFB7YKZVjr492jkAPswizcT3bn+2df9j0gCZA1aEIVNrO766Y7TlLyZ8uQFiP6cPvfx5tkGo/FxgbAzg67Y7jo2TqVCuUm7FCrjayElUr8zXUUYJ3VIqur3KvxoMzeHntNrmeF8kqFWo29K94d423BCqzD5hU2sg77Ga3Fd8nyRM8/pAlK5PuQnAi80aET0IBj8It4R/EDgtHtMo2Cg90941+HEE5zLM1cEAV3oAo/6i9mvGdnovgVbSRx691z3jo6kqvwDnwfvgM/gt/o8ErIifEQ9pNXLsOyseqoe/xVHmAXlpN/vUpEjOJfVIO5l+z4Bvw04JOQY6Nq3SnvVhzzHl/y+MyPQ2a0jxFFRGA6A2Glwtra8ofH3sFJs10fdWkwwHOhgblW/UvN2jfZ2AHY2qJSiWuSuytXu8P2bxO2YZuNjYW/+WVh/zj7d8jP+bMvzd1aLeSoPfjg88//DDbjXQa21mCT1VVYo/zW0HZ8s7ubf/G5f9zCDTjS37CgfXL0cKennJvnv/yi8rC58NK/8vOH11ee3la7l9sshsyGAFVHzXEIRXBGLsA3XIgRD4RJQ2CaEQ78sEQ8tsbAcD6LHiXH/PNeZo6Cx2uFblpzYbSIItPdNhZyCAx0V4uiRtlwHvuFOLL2Rogo9tBTjVlokjMeOorQKTJ7SMmjY3geFoCPC+hAPuR3lthuUgXPEXi4XBwRo6B4XsR9rk1jGd6C78IWbMBfNXlkOPAdQZFmHd8IQ8IAz+F5BAH5IjMz1E5pwYJHEfIeP8uzAVvJHmWYp06gKdz52a9/Z6n8lS81vMdh3iwYdXEAWnmv6OWPj9quk2vPtMNCAFWazbbV619dZmuNyj5rVYCtTKq159mM/pj7yk5hrjNTfGnhSTiMt3nsl4qLxbutky9OHp/U8+GMUS5TblIreUdPgkcPa9X/i42NeMcjWUbEeDtzX96ZmXPz7hXn2s7zB95c6HWOH9ZOj9zJw7eeeovLleeln84s2PytlzIoz6Nao+aOLyxP2hb6p20+D2kUWXyM5wgNlwPDvJ48Lw11Fi80D+AyeEai99H7AjQCcufMR9NykCfvUff5y0Kycy989z9skA8oGEGI2eDj/6K9bBmLBf7uTPzD6Mj0Jp0zHVyItQlPmSlhIc4l/3926vG0MRnM4Ru5MgdNmtDymekZonFhOIxCYBNqUIG7bRZCjgOOWvgu/oAu2Eb0sQIQ+pQ9TnzeL5x5yU0Nh9O227O33ppf/lqp/Gp81Y12jHdyJwFzhoHFkxObwznnNQqt5kkugHbI6a9Wu784lHC4Gf1x+7WjmS81cp24sSvDZeJ67qbgnBlGGN1HPQBnZj5+Yfbkcf2wWc/nZm8F2OGXH7O1xur7lB+wtpbFvq/D+tJrR/MvNZ0L4nWCriIEMM+Oq6WDz8pxreUS5ewtTwhXboyK7q2eO94vPf5s4UXliV75yzYP2hwEeMaZmo8jOi9d8lfsTEaY1bXTDYR9n2jO+GWBn87EmdOzcSJKBItNSs2kwFc/j5P7xWqOykycRqfutvBCOiXatXin4vCTzrn67PHqec4kPQjRBdFxtHMEPp0cVYiu/vPi0HsWv6YCQZNCyILhOljvZvvYv7izlrjYXsh+nsMcXxQAvg2rN7SxdFp2eGODnZ1Zf2W+sVhaeBVwLrmqR76L0Z3lTDHMjPi6cVhg7VL7tP7zxkyr+doS76+ytwhk3Wa4DuvzL328/Fo5cEktNR4In9lB6oZVM/fUeuWWpCfpMq6YXz49rpUaR4+Of7IVd+5GBg+H67A9d+efLL6xkAui0+DsIJEBOJeU3o4DHv/Kw8v0QA+nPBZVqjhqu8df3X9+eaI85rSNtTgIuuGtK62YJX/tK7EYyGWfvo9e/6QApXMbKndhrk4uyC5s90Ss+RJ7BYrQhGaHYpulBpbrGTqbVv16cr5nM8L0moh/JakdR4n4kwWKTZ54/CzP63Af/t7Zfdg0SNpRgxb5DvMtnAOvp/k6bXm+yJmjlN4eHVWfZo75wsVdpFNqWp4j3FlmbS3vKqWFVcA5Z2Zmzpwzc8bovqIyRMXpcs4558xzhpnzKLTyt/KvN//NH8//JXEUrOyfCQwZ2IfNUtkCF789RnKYMpNu0EVH/tmdds7houUKHC48mp11/p2FO3f+1sbihyezx0WABw+6w3kG2s3igvlBtItEb32lLzOzKIa5hVww/2md3d2+Szic8mDOOYNFy83/rPH88lRgF9ohB2H8HHx0u+x+RRmhxelU8qkMRRQnzrz7C7+iCFIOudtmrWdwRyRaE3GljU/Pmoh9b/y5X1G1IB3XQ4FbHcrgWnyco9wm9CE6SmffLjp0UWU3+tfuV7o0R/orSQtqFMMWa5RazDf5WoP7UEk+oMgPjdcBmG8ze8LiKQsdnIfzcMlex5t99q2f93XmKLluHH2pwyt17jb4URCPg/3hzZpLfVrC/up32Xtn8e1/vzi35Jxn8Y3Y3Jjl+EnVrdtmmhYwThJxxweFhh+cfOPz+B+yaSZdh+35O7+z9PqvOgvSg3M9hyh9r56fdceKWNwchzOvWWqdzjYPb9fjkUSXbildh+35l/7zxVcX/Vy8m0QRY/ABenE9Pz1cT7yfH97P8+ABH3wwivKQFIeorvfE//zwDf855fkbYw1+0MS1k4A3CVODxhdHkq0WCuwXWYXf7Cn6nxkfw8stTlpxnbM3ulzlvePKgcOBn6cTELaJOnSTtg5In6oceMCTO7sdsJBbRX5jBug2yc7CHDxu4jrMdbqN/GmHxsBDebttpGmvMIQQlnEtSknH4fpNaSadloxwrwyb1IrdtH/8oiBJ4ZK8iOjGeCZJxOZut5bmWkv78wDv1y563qpPy7Dp5Vd966Q/iu+mwxe9S29CGGcHcfqYJKie5Zu5W0/mXvqxzf0Hv8vaGifLrG9e5q2WYdPPewWftFXqikM94gw2TRXMWLwFcO/eiMoTJ9TxGe7B4sLzyxMN7vig2NNeNwnVfJe2H4KzeMT/U4/AVGEZTgzPzrQ9Xv29XU+neaeFBXheEmst/leXdA0O+IZJadOzyjmcR63DX57wbxvswlvwFtShccpii7kAvJ4UsGd/B9vrKEl1yXjgKE/1wK+Ra/DklB8lN54rNuNPiGkJhJD0qCW3m7Gv+sZncfJHNxxinu/P1+aWPlxm752MHrmLHh9b7rjuJz6qA+Ti3Y6SwrTd2DnDc87Mzfkri8Grtz6/Q30FuEwsjHcT10mT3kz209K+NM+7TDgZVnnoJtnnb9C5px9ZHL+q4TkuKmcRgFzSAZ9hN3f62YZJz180HLQ7yi2Ld3nq6cy0PXY/4MEBc8fU4Jvwyilei8C6Ecu5K8W/50jDatJYGsJsm9865c+TSvMNiIVTEwijO85KT/VwxAXqn3Mu6YBPu6PMuXDBd7fvfViY/bVRF3BYXPc/5zCLsxwDcpabr7PUqAHMXrK71Fk7jhRYRqvlufQ2RHjpe+5QypPtIKeJlulxSLM0r7dfLeNo232vM28KDgpzuBaFE96vU+88nQhmH5OS4VFph3FUqrBN0OSX7fhV0x4LpyYQ9pq8G0Tc3mVxA2KcGTrml5fm7ywBULmuJ+5HIO4sja/0uDHSw5U7zdudfeaql20jzZN9vTmuswdugHtC9uWByejwuw5RjMruTp0GnqfCz5Dy6eTCT3r+HL7PaYejTvJMSJoIDm+K1+Rc6nY6Oh4HPGjxuHPBr06FqQyEEytu/7B4HITDwdzy15Ze+8fwLvcv1Ug4edIoGA03dc5ZaAt1d/vzZeor/eeFQ40OAzQ1KFpNmrTfbij1l+dwPTUtDOcRuDgopq2mcSPw8MvRm54edOKk8EHy4OaUUiAcO1FLac8IQ1u4s7RUqXH/8o2EkyYejeLMkXap2cIpt9v7zFXZWR5ZWpy2jOmKmX7umW+u5T2jwTjdETQ9+ai7trKcTU+d40GH/+eUD6b8mQpd1uMoyQi7jzfMFxor7S+Yq7Kzc+GvT7SoUTgaS5ocBBbrbvHDZXZXRlasdNz8UOakEyFukOyOoHHdVtNrLUbaHW7xMNp6m/lT5uCT5AH/qaNAOKaeetTPee5eI7h1uUe5J5gj7oqLKqaBY6aVn/36/hDmGei3QMmo0RG8udwgTz2bMZKG9bQM6dgZ1+FRk09HUZhroct6fJ19CN0eWq7YnGFjg9q9KR44k4oHECUj1otz7fnFNmsjy4mTOSJtYp5BELmKdH4fwDdch7fbvD6dDaQKhGPOdVNDyPsrc58usfdOd9GGqdaTE2NGvl2a++yc6cSut1ijfHeR6+HS9TQcwFzAnTb34f4UXgIKhGPtqc5C5yi1cmzsUPt41EW7Dsm4obhu6gXhTLPIxga12ghKk87TKHJDxONmk8nknFFoc/+ZqV8nnwLhuItGTsbfG3M5m//0lL0f3ISeQkimY3OGcy60sn97/tM6e3vXv/vpzeCa31dkxNLOwiAgDNiC8rQlhQqEE8Alg6kdjtD5lp/uhyieYs5csrpkB390ux+FwKm6/kUup2XcbXNv2pJCBcLJYN0FVN3h/Vzx01uwfhOGzBDPxGYWTfdp7vB+vvjZ4ih2v7tmiMjNkj7I0W6TCxnGwuEjpUA4IbpzVNrrP1nOt2fYXeH+CAt0vXqm6Lz38Z1c6LG7cu0jhhxxg5Biodww0fTu0cRKxSJehx9N1TOFCoSTwfX0WpuHXztkHU6mq3niBXpmPXbm+bXa9Y8YciQLJ6p1VG6i5MHGx4d4YbwS1rRQIJwcZuls4oWZgO3NaWunfyFnyUJ+zvKlgK2t6979qJfWUxSUmyd+wD+pjQbGdI3VUyCcGC56rMcZ5hbnlhbu/IdUdzNatncCGOkSrMx6d+fv/A57e9e5+91VmERuoG4N0GFFXu7wnekZOzqVgdBNb+NV3DgYtPDv3IFNVoujLtI1cc6l9VHfx39p+UbtvsiIpXOQmrF4RBCyNj1tUlMZCCdvPcLL6ngdm11mY4flPlsodgBn1Zz1ZDQTV5tLFl22MGDuUrufHW/KTy2Ri4UBZmzBKGa2GIapDIRTnBGmnJUbVNe41+eZWIXNoL1nHb/b6T2M9a6vRbSYPdW1633bm3BejQkd57HUXSLK59AA9kZdpIxMZSCcWt251qL1YZf7b5jYhsrxoz8+qR3GGU08oXc6EPLKt55ktYh4u2aZR1lH0jbs8Jt5tuFgMeP3eBFjsuoO7xnLUDnFJWWemMK7OPsPnWLiuczOfF3rkTJaDqYnI8yNugDDMLVNo+l9zDmH3wQo9n8mrsC7jaOfzpWd5UKXrPNiUSy8+pIKSW3RxeNbiaI2Ga6nFm/RWfQ80334JKMt9/PmE7cKUzrAPZqqlfjIjfXFkfZCEd3Yx2FsUloBem6TQLqq+/APrCVDl+NZF92Zd0yXzIx/PoQCdW9A0ISPoZzxO4zKJF3XfcuyCSvNb5JtvnjLlkp/N0NpRAkH2fA6cPzozdrjQhiEZhYV1kWzeZu55Gm9Ab/iVNXS+cHNcG44FVXH4+VyebVx/XPr2GRlKLtw7BP4Sfeq62aHz2fJ/dR6bqwZSS+Hc9OX3vXZHcBijle8EY3UT46AJeHZJQU785Usm+mGn3CnUbA762LPlyM5btHHN4Sw3DNgjSagjHCsZVkV6l0n/aItWzxFdjwFiSULCrosV7BzYHhugJryZhQ2DvbKrdNqqRwWb8/lQmcUMnpMvIWfcwEh8bN28e5nXFmORsu41ebhcXCt1bjzMoLxVQXgswK5kJdbhBbHQsCd85Ekz+fErzGX2QfXm+o993qIp+xJ12eHouMkx2/nAb52zWlsT+IVlTYqf3QMuyV23bQs+1P9bHni5mJLlkYijsHdGXCN0MXhML1ZpSvrZlqQiboM+jKVgTBLaTzzHIaHheeeWNbT8dYbQTO+OBzOCAeLAZuwCdsnj7ZPHm3OHX3k53xHOYviGa4EZuUWkC915nJREHRxhnjlN+i+EQ6sedgsNH6e2VYv8fYXpFRjZNPFk2D9tITBnQA/wKW38uftR/RPXtT/5M6NlwPoLnfu4gWtnvvW0TAojFs+J3n+pIg3kmdlu7Pcx/lW6GOO0IsvvaaRg6USnVocmdLVwjLpaDijJ6RFNYnQETo8H+fwAehAaIQBXoiX1HjiAz6E4OyyqyGNBwXC/jhyh379drPRzAUNn9q5j6/limGu7Ir+iZ3NJjO7NK76XPcmAOvw3snD3eybFj+HjR221tzXDucKUetJtvsfux00HjYPst3mRSawJpzGwp+VWGlTCDkCzr8xlsEDF3DaGUp5ovEvndzzR8E0km+Kxm2f387jwY/g711/Okh3xZdCyEyBgk/H55OeG+Zfwa92mCtBQKHTd+PzAHp7KI2jHC2fkkcn353kzIcq5No0QgoBC+34F8k0rU82OX3zKykQXiANZvXFZuP0i8dfLbB1waj9O/d+HMybP3O7p3WULGvWXL1vdxuAddiBTB9CWD3kgxLrtPceu8KCRQn0EK6a4NacHdaz3+6LTGarUBQLvwPr+YsXDWjABvyfkBtO548ZzsOVOD3nBbtQgSbMALA+kiiYNIoa1Ba43SJX4BtnHx6vwTI8zCWJbINCu6dhOdOaX5rYmWFF/qZEBTowC02I6uRNmIV6nhz8DXyjyUzrOQ28GRQmqs1ks7HxoUB4sbhptBh0jmts/ZClAw7+7vkv33n4YOtb3/pvvsi3/VY+qSYOo+P66pvYBsh2SZU9WK6w/T/x1j8IvVnCjJtmzmzNv96hXsNpZLoOmw4zdmD1oge/VuFfwwy0h1MSB3jMQAjPVmNqsAo1KMPu9fcLRly3xuMZsy38AvPwC1h7pkjvJbWi0xKEFIJkG5mWPO0FPFxkMeB78AOowX/8zLu8Z5The/DPc/zrIu/Ukppb1kfSm7wK4YspEF4gHQPpHRc4rAEc/DH88Qt+Zf7Nf/hnbx7c/fEdl4smih5Cl/U4q+4CnOx7C6+FWc/DMsqkbKLrwv2ffj8c8tGNai9zz7uPjxUHrTz1AlF0++rzSvuugyQcOrAAvLhbMbMMrKdr0G9SKLIN3z3nA33XYcY2lH1+JWpotri/M7MWKWBir4LzTeXjE8Piwr5OpuPWW2ytnTZy2T9SPhmi0e4rzvlDeoPR3EGdw8zzbk6N5kZK2yFDOPUAqn00z1bgDhTbSa6Ueaecw3wWHT+Kfnb+9qN/+hGsOMJgQpvzr58C4RDsLQLxgJrJbU8bVLl8DzaLxcVgyqqNNyqtv7HSdsic0XDs9vGo3LuOKvzGLMEchFlHnmTIaA5mje/1sQrgMnwPZo18IbtiTDk1jQ6ZTWIsXGe1yOoqK9As01ykeEix1ucsNp1PZisnO4fhsuUm6FGDvt3QLD87Y3780odG2o4W0N8z41X4PnzDpxjiwiE8rmA0OryWgz4Gt0UvuOP4cYc8k3XrGRVlhNdi/E/FSoVvf5tvf5vVVdhm7x3u1SjWaC4CNBf7n8utfr9+WJ4rznWw7pjbIZZcJkL8QPqoi3GxpOqau8wkQrsAVIcxJs7FQ225ZCUsfnHmTbXTSRnhDbdJZZ/ax+z+gI0NgA8+mLvzO/5L/959ssQcdB4TFPGbVJfi2U1fyKDQyhU6hY45Lxk1MB2xcBJm6hxnE3jcxqHI8WCZgWsQoWJhPxQIb6oo7O3ss7vCRnXh09/1PmmDy/36Rqmwkm9ZEJo78px1QgLPmZHD+hj8Yp45C5Jp5SyezGsaLkINO5CLDOHsiJ8/8gYcqek89W33Q4Hw5olCIACzPvm/tZ//yZ2yHwQuH4bmnNEh9HCWRLJ0ovt+LicXz72YLECR4cDtkVMolItk3ise1yMHzQgtVCzshwLhjbIJ27xf451y8fBWqZGfme8U2nmMjuXiBSi83oaUdAJxBggA6iCUmyfzOVqjDQ6cEarm1hcNlrkx1je5D6yz94P5j63ZevXWEYVWjjCasD5djsnMXLKWVPyNi15xSSQNpFNFtxV5kZ7lOzLRXX3wktJbu5ueNpnhUUZ4M2xscLLP/ZV591GJ/2zWlW/X9i1qxoyXz7Vk3vyn0jh35o+bLO2suSSFzhsm8+elBtqUB3NGe1iTWkwZZYQ3w/vvM1e93fli5fbs7FIZi5O2ZBnddFDLlKZxmYhvbpefy99cO+k0nZinEC3rzObmyL5XfKCTRrf2y1BGeDPs7d3+cXs+R8dy8XjOdDBLd+lg3fVeyPXEwkvKWy70wknqMXVZ93XdHFHzSpaH7Qrb0gfYHwXC6Vecf2Xu9lcW/FeSlXKJ1sMwixYK1IXSn+SeMkiPjetEk7dPUiyUKaBzrT/Kn6/F6BrEZpfeWnzl78zdWevp/+uulTuV9+ShHmzD4kVIHjy48MVLS6fAzEy709907eNk8iYGFBmYMsJptQnbs0vl+WVXWng1nqkpWSjYTWsMTLTBG1LTnlm+lWNra/43fif/9f/24KAUz7H+jKWl01Kp861v/aJ6Muu8JDxP9WGfNgNWqcajAjEx3dFjQRnh0EQDDUZSsU6elFi488bMwiqWLpF2I5rmDPLgzBmW9fPN5vBmvZXVt/+TtztvHnz14XlREDg4mHnllaMTK817t6IWaDMNIR1/yRXbGewyGZtZFww6OuH6pYxwCFYP2Vt05WbecgHBtcfCTT6B+9yePSoV273x78b0CLo2eM7i/zI69MlhNHBu9u4XufbdH985/ZVH8Xpbz7x6ptT+olGi7Hs87Pn5eKQL0o8BgogbsyZl0ynXFwXCSzCvnytjk5kTNnb46OUOHW8kp+EnLJZO5osNc71RcPpzwS7nY2G2VZCew4hhXidX9CjMhTZ38pz3x3M+WEizE43IjaYf1y1pmp2Zjmk8xIOcx6pM40hNoxeJBgoa4XzLz8/29Ss/maO6lpvp4KJJHaIBKtdiY4PK/szX90vWxO+5cd+UXHAHcFb1B5+t/1zxg3VJlcJFtQxnnnPPfjlnhBbN1mOkdZGb8BHceOPRMtqlzsI+KCO8gEvuYt5xAe8VqEAdPnn+q1dXS4U/z9+6X3zozRbi32dIqcBzT++dHdbWyp/fKpy6nhfcjCAIsANbxu/SeYNc1rHQdU8GM0serH/RkU0fob9xGbmMiWlZ+2XYlBFeIL3xBTNecXYF3j03CgJ7e41vFZddY67Ypuf2ZxlGwah+99ybfKXC7u7CZ42Fdsn1NIfepBrhLhDMHzZ9N6RaeQ2exM4AABx2SURBVHfyHaNnUtZnEP9vmqddlecax2bIG3QLGIwywj45rxP6M/baN/fh9170wo9dB3NnomCm80xEDZ3eOTWYjY2ZD2nlgrTT/uYlIuvt4NYvv/zL1z5eHurbJEf1/GN7o466RManXTQqRrSWWsYz3UwhBcILdPuELpE9u2gKs6E0iEVPwofPpIQbG8Ct6ly5vtAqd1wyOuPG9UtVKq3dlcU7v0h/MI4V9JvohnwO6eMTo95Zg7aRQ1Pl9UNNoxdIm0YvyQ11iEronnlAbmcZ8B/OtcthetLfuGwQKDfZ2OldP3FYjaRyOUmuNOWfxnhEQXqO8xiUZfwpEF4g7eAZh8X4LO3ue/ZuUvuYrTXn2ZmRjTf2GjDMpZWYURdmQsVTAGTFbkydJPOr7gpHza66gRtCgXCSpJHN83BBEaBZBuLldm9/PGvdGaHtZkaAWpGtteBJyQU3thaQkagRXi4l+2suyi+vNgRaH+NFFAgnSU87LQDVtfgflpdh07/lkfPSk/6G5oO7K1T2O4H32b9dTg/FDa0TDCYdNnAzz5+rsGHMsNazHvSlPpDonB+fwTvjTYFwYh2WWN7hQZQRrrEObsV5Noz10CbKJtD82z9ffPuxi7sKb3Ib8eXlYEE5xKCcJbOaZbXBJLjmLvmRGLTD7hbkhRQIJ0jP6Rw41wnZWqPZBJiDbXD76eTOg6yZN0221ih2zPOi5r1uDi0Xyqff6ZBdnsUTEGW5zTSSqT43NAqEE6N7K3c0bSbYr8I2uysAn2zPlP/F4Uf/Y/Kim50D7a5Q2W+ba+Vb6c9uyDiNzIRZ381viPix4exONp2210KBcGJ0Y1tI23129MX/SmU/agmE7Vzpydu/9V8mrx1Gl33UzphMm/KCryT/Gl0Wtslatf7V/dCPShFNa3Djs+RL8dSgdnnDqDlcNG2DZEKBcHIkzXx4BA2PjQ1q9wCoAF7ujaNWieTpxczfO55mM3qQxF745ZzrGdeTdUkuoTHTDoul9K9OKY6IPI8C4WSIkqyk49xRvM3WGuW3AFiDTQtXci3XDZZZvjX0TDZtZuZe+JU8w9id2en6o+HWFlC7ddz0T6IU1uFsxHFZJs1lK046uyaWAuFkiNtFDaBZaLcNKvtxByFrgGPFy3o5duLErie9c4Re6Hl06LRCv0Pnqa98O/TNJ8QsXhc3CpyZF6xPxwsnrVKQDmqP9mVUhZEJkI7SzA/UIDk2C9Qnxmamm/GmuUYngJ1ZyodWfb/+1Tw7O9FiCzGHxUsuZHnen13X19p1Oo0nteahWTWZ1LdntSfjhJVi4aXczO3cXBvi5RizWyX+Mra22Ng4nW8V2vliu2BheEPXKJaBTcM5MjZzn443BcIJ0NvZ5jxaxQ5b/4xK5TmvzPqU77aIQqdeveXc7s/WkhE659n88pcftUMfLySdeXx01+Hh0knxND9zmqd3aSrdGORGUBTsi5pGx100EDPucnPuuF09fn2G1VV2d5/z4qE1zAQ+ZuHu7tbs7P8eDc85R2V+/i8eP57BXFAsjvgC3NoC2Fk+ruVbdT9dlyZakkNNpDIEYxN42gEwLoUZewqEYy1qC03+gvOsUThla4ty+QW/lf2J7/ByxbZzQL3+/51pkn3a7vHxHz5+/N8FsznXbpt5I74Ut7bYXan/9cppoZNzHUuG1J45sCLTpxFQ1sOg/VIgHGMGyRCVaDLteqF1/PpMtBL99RQhWr0hatgs3Xqt/1/ce/+/x8x5NhZV0sr+k7cfHs54USx0SSxM/y8yPZzDOY7bPT/SSX4BBcLxlVbnHA4LW/XcUa3AzjJraxf8ZqaFGLixdWxSrk3WqpwsP8p96TA354VhstIy3XUjdaOQaTYul+LYUiAcU73jG80Mn4YrnP71CrsrcdfX9ZiOK2hri/oK8Ghm8XDOdVyn+7BjPCRXqaFMl7B3KUKd2xdQIBxHT0dBOC65w7vz3L/+olz7Ow7J9ibA7P7BKw+P236z7jsz4mgYtz+jycrlirww47lGBxYarXCMBu+MNwXC8RK10vVGQTM7Wjh9/HKV2X3uc9GjC1mbputoe5O5KjvLtb+6+6T52VHn89C8MBmU6yxeQQfTgFIIhzb+eLqFXvarTwxYEiC9fvVBXkCBcIyYQXQ/judzwcFJ4A5WjgHmqnFac71FGvWMoZna2mJ3BbabP/vDx2/nagv1RsOI5r+JpkmNqyKWzGo3Rft+KV7WqyjcION03NL1SeWF9ED9WIhGhkZDNM3hiNrtOA54/FcrdGCteq1dg2dM2VW0CVCp8ODB4b17s/X9TmtmpricC+IlveMxPpZ2HMaPHUa/PP0T0xzDPITJunrTu6ND0XPyjIXuslBjUqAxpYxw9OJbLmkbXZwRnsza47er8ZyiI4uCU2p3l3v32Nmp/+kfHbzNofvsxPbDYtPoTizukh7EZE0Nl3bZ2rNIE8lkMSp6/3FyUssT+KkaRQfiLG6RHIegExZhOAsFTyNlhCPTMxbGWTqrthlQqPkHy+Hj/AonsFZl9w9GXNapFNUtKhXef/9kb+9kY2Pus1/69fl84U4Jz8sFUasw0Ntddm4umMY5l/zRUwufpDlOT0ZdgMmVjtAckw+5dZfC0agLMRkUCK9ZMlrf9TayRRkDYM559db+wWLjaLXEiVFf4f8YlyjovNbFL5o40dQESThkY4Ot5bkv7/i3An9+sdTKzwXFdjuwpME6PGdVw2iiGg8z8wAjdM6cedHEeHRHP43P45Wj4I1NkBgKh3lj1KRc+AJmR12IyaBAeIGeujyXH0iXjNnqNovFs5rQMzo07s4OOTksNXLB8a/D1v/GaYW1tTGIgnH9Nlc8CIP8qAszNN1wWGP1/ZOPfsDGBhzPf1g9fbjMQs7KZWYhKBIUn63xW66J3yTXiKKkAZgLivmmmz02K0R9NBOSEcpVONQnN4kUCC/Q8yQDA7V6OOi9/fVkhJZ2OLnT0BonueOfLQKcfhhPonZd86hdJI7int9+8esm3u5uPI1qpcKDB9y7d9zZ5xfbsMnGDkB17ZwrZo7lnWd+WKe6tmjHM51mwQKXVIkUC6fWkD7YwaJqCB01jfZLgfACmWSEaQqYnNLmmREWT6zdahwE5aOT+zNsJROn7b0DP8h6PwaWDoNjmjPCp0RVkA8+AGCd1fd5sMoKFA9pLj7n9cVDmmWKtTM/bJYpHh6yWGw2wnbohX68IJXINQgNPsfNKUPthwJh/zpvLLzyUfMwVzy41K/l9hYKhV/urnH7x8vWLgXFtgNOHgaP8seP3mRjn60/4vPvJivObw6l7INy8ZSnrtNcms4+wottswd7A/3q+ibQPP7F7Evl8GhujIZRSD/GYuhs1Ks8QFEaoHbafikQXshF52I+V/zZo4981zg9aczcvtPvL9dzzB09KZaW9xvVNuyWWYflHbbWYJPV7/I+VCrsjk8KeFZPz7+FhVGXZtJsbwK2+q1P/vrPXvvm7xHPkqC70hhLZ5kPBvrdYbhqIHOqgV1IgbBfrXrn5Mlnjx7831fYxib34fCQw1VW32dvnb1xjX9dV5hj7cZffvPzXz4+/si3hS99459iYfZ182jyIRmSAQKbkf2o0atsyqUniU6UF1EgvFBcRfT8006rfrVNbfIJfJJFoa5NlMFE4yDDzqV/d2y7xDY22FkGhtocfXz80Ze//E+P/Yd5LyAaJJVl7WDgRjOZHAOfL0EJvxGNTVeV9EIKhP275cZnCsEXyvReG3cThq2Tdm4u6vS6aMrTTWDhbt3sxDkb0/bAnR3W1roDlC5WgTVYY/WQ1Rr3agDNMs0yzcWl9ulS53Sp0wCCoNRu++22V2t87HL5E7+an7ntkrkTMh0y6pQRyrmCEq0lCkdqmemHAuFFkkq859fH7m7+jOGtFVEMi50wBCge8g//q6dHSKaaZR4c8heL+ZlOGHh+boCelmuxuzvfrhR+7YvcaaG08HtJS5ZLxvYCNI5/vv/jP0x/Ad4F2FvknWTkTLFG7R5wkJ95sxEPofL9Rqv1Shg+mi/cqy82c5aDbmUgwypBT+dtNhuUqRLMJN9N0woyw6JAeAljHwe7Pf2ZldTFD5AEBGH9oHhabd75Fcrnj6Es1li8N/uVZt4LvFwwnhfh4st/pzj/yszCimHMt5zzknbLaOGAOLCUyq++9s3fi3/HYVTjbz9eiZ4EBbBqtINVcnGgA0r7zDiwJAomjw9mmxhHc9SGIZ0i1GmWs9u0TJOxuwDHkALhReIpsZ2XL471+WTmgmh6ryxjT7JKH8Bssfzwz/9g8Zv/KSzhN5//FkHBb+8XFnPFILBuJjQel+LGBlA+mCs/no2PkfPiJSbSCWGgO4da2FNqM5dmXsncQBBVjuJs8ky6F32fzB+becNoOiFR/PfqGuUHGW1brmB8ZpaZgVOGUTeeSgqEF+qeRi4cz0aoHVgzVw1dCfxsN51MsRnfyqMMyR2Z2fxzX+8ZoRdiHUvWahi3CTbzLZ8kOYun+XGut3XRenuCe6bGe/qHcUbY8+I0Izz7/ZCm207ewYOQ5R1lhGMhXgV3DE73IrwER4qCfVEgvFCc2PhPTlzUSTZ2dmArdH+/k3szF2Y8MsXR27nlohlykqnCrdtCSHwLCElnlItToDGaVGxnZyb/Um5u0Vk68We06NKZA3Zm5PtzC977w6d27cyGXM+3mR+BJKfFWTSWeT/rd5ABjE9GWISmssF+aT3CC5w5kYLxzAh3gWDhsFVodKNWdiV1jriHK13GPYofzpkjXn2PaJn3dNE+l0TBYcSAQe3u5qqneUunuotD9fgU8DLiXQg8XO2QrTX2Bpv85rrckAc90ucIRy6qtNuNOfJXo0B4gTMnUn5utIU533onuPPwlZ4JdjO9EqNQEa1QGy9b6+LOMYdzcUdZEizNcHEWOH4xxjqN2bR2M37Fu7QCLWod2GSvmemGdQcdSDcjHA/KCPujptELxafSY7/kCkujLsw57q+3P2Jx4REueVxhSP1yjhfPmTHm6ZWZ87zmpJ/2vYvd1wvWubPPUoXd7dGVSIBkFNVYhR2NlemPMsILdavGbv7eqAtzjqVD1gHnkYZAnfjP4aYixUmyccO5VrFz8tW7rPU/M4DcJIqC/ZnsqvF1cxmPyczOLstlDn2zO+ZC1/u0tUyd7lhcLKgfgs8DPTshz6WUsC/KCC+QDs7zcrNubANh8wFbW8HRA2fd6UB7G9BkKnn5fPAkx9YWtXMm+pGbTlGwLwqEF0ifHQA8f1xDy+4uq6vHH/2r4/AhlsTu8e6uk8F0n2yEo2b7+McVVr8bryQsozWM28PAF3F3ckPdBy6mQHiheGoZP19zXnvUhXmhjY1W4wBC63laXKaJmZFMbmDOQi9kY4fyW6MulwBp9jUej08E0cwyaOhvPxQIL9TzWLR3yXWIrlO5zNZWEC6F6UgKzs57IpOvm+U7vIXTYPkYYK06wiJJl4E3nJbI3smM+hQkv+imY4jYcGmwzIV6zkFvXPsIgd1d2Dj5aK30xuHsUpNo/mgH4zOxi1xNNCeqc84wQjup1Q7f8tnZUbvouHDJ/LSZx0IH/kBbjFcJVjfhBZQRXiCZXSz0CnPOG/N6wxrQqBUsmlkmnQVNJl86xR2AkfOC01yTra0RF0t6DSkj7O0WHoBuAH0Y8zv7OHDp/73ceM41esbJo5mZhdbsUjOa3mII68GO3o1s6emZuxU7KQXHr8xyXFE6OF7Cbt05mw1e8VyP0kE9S3URZYQXMCya5T9XPHBea9TFebHN6I9GLvCMM7N9TkvouKmDwXvat801T/JHtSI7y3qOfuxkfqENfK5H4xm6TaPyIsoIL9StTHn+eI8ajVT2j9eqhQ/b8+7V6AY6Rus/XNmZGTDdBCToVxfNipquhOUZp65Y/+vbALt/MOrSyVO8s+tYjk4HGnBr1MWYEMoILxL3yhjg6uNfb9hkrcrO8skRn/3F7/fWA6fpaQoHfu4kKC6OuiBDZ2Yu/ezMMKu1Dg6/NMf9ERdMzjEeUZAkI5T+KBD2w4Dc3oI7Hf9ACFtb7K40f/br82/8EzxLM4l4kfSJlpTfcB/mX2u1l2F9pAUart4FHZ1zIRw/3H28+z+z8x73SVvCh2JIjwGMv2zaEsfmQgt7m1DkXAqEF+npavZO86MuTd/uc/z6W0f+TGg9sTC6vif2qojXAwacLR4+Pv3sq1Qqoy7UsJhZNCtCXIMxOwk4OWgDVHfZ3hxx+abegJWAG1uDmGwKhBeJh10BeF5h1KXp02bUdHYwUz4pzCTL6DrD4qmaJzA1NHDJlDkudNT32dih9vGoy5U9M3rz+OiHn75VPanlm8f/0XQnweNlkHCmFGwiTWUgzP5EdM4VCi9NTiAkzRgOZspH+VnP8+J7a7eZdJLCYZTIWjJo1Pfa4eIRW1uUp23VBTNzLgr6yVRqZscBxT99pfmzaDnM9dGWcPwMLQMb4PoYRkEG2+Zc+stDOj4Tc/fox9QEwh0A9oc6wN7zisPY7LAksfBxaaGWK4bRoyDdzsKo5W2kJeyTJY+RJ8t/n5TCo9dnqVz6KTob4zarKNgnD6GlLaKucfTzxqd7SRRkuF2DE2k4l/yYXBrW8//LenN4bbTGCgDT0jUxNYGQ5AaRjKfI6B7vkjsUUKvtZLLN69MTCw/IffZmNUya3ZxzFk0NPN6JoVk3ODjMsHa9elT7CTs7Az1F58Jw7Goz8URARvrhmLnQMLzGTOu4eFh/8s9hG7iOKDiMAWGZn2FNADq9i8Jn/R5XXNw6q+L0RvlLlacAP836qKRR2XMYfC/TjY/UtATC1RpsWjm6PtyZB5CvwIxkDJnt7m7WakxefTyKhZ9w8ue387vtw9znoRcNoLGooTReqMLMktbSMQmMaYBOg0NorpD3Tw+p//WP2N0dYIKxsF3382F65xx5HcDi/0XTH0QVlPhDaDSsNl/ff/VJPdwHYPuazj0P5rPeZjrXpUsmg25ebYPLUIU5w8KeUHHlT9OsOybAGSsG/SU9ZQB6q1jZpGI9cyX6AYW+N/qecQClU1ymfZbpoQ6gBN9PdnzyTUsgpMLGjmPF6IYu7EqffzRsL/oWx+LL/0WtNpkTeWxv8gmw3d75Z7X7uYPDhycHNcPDMHMkCaJz0ZhSS1b76QZHi+7WNuSvNCbE0TieFid98GN25vTJF/knv1gbsJ+sUumU8z//f38/vUslnXAZHeeLJI+kJsc12dc0QY//JXDH7erJ7GeHd4+Aa50+5r0oNJ/GS3Bme2ScETpmoQrLV9tUETbgxAPiQd3GlRY/sm5bUnx65EKKHt/rr6gVqBC3FnYbM692+HonCjaPXIFXC/TZJx6tR9I4s7n0AhvwKypSdKi9vqsIE2ISHozrR7nJ1lrw5YOc+QFB2pnkBuw/iGbz6D7I5Xle0L47lJJfk02ASoX3ayd775yw2cz9VnH2lZncXUeYVqZ70uj0oBnJgRj+RE3pG8WdZaTpqXPt01/WvuDg568BsJ40FV7G2loLyvOvRFUkl0zDyvX0B1l8a4wPcrxf0b/E/+Q777gTNgrt4/uw9UfUK6ytXevM2hXYhZcc9aQxLj5El7+IktbeJBc0zBGEnDg2kj79ga3BNnxQoNKm3MG5pJBX6C50pJ8HBqd5jgvs9FfpWoU1+JcO3xFaN3UyBlr5weKW2bRfwHMs5tiCCv3OYroLr/uUHYQ4LynJVaQH2cgb7Sw+x7ExLYFwdwU4/mipcO/DhTtLRjzsbtDLIg6k0ZMGDmr7j44f3sm60NdudxfehW1Wv3v86+Xjra25r2wUZpcLM+3iacF51pNCu55btWU8j/B50ss+eVczPGfWtsZ867j1qP7zbXgE64M3Eu7stP3l5tHPSwuvxg8nXFs+mDYvRO/Ys8xlCBSLp6etZqF1/OYBW2t8/mk8FOj659TegH/hE/rkAlxyO+byS/kk1xAkuZoZRzn+XYHilYe+Osdm1G/vs9jppl9uoKpvt5Ox52Ro5wB24Wt9bCsKzO8XeCtkpd3dYlIjv1xVK77cSOY5Nm75fL2AB32eDlFG+GkBP+DlDmGytSvpqbvtFfm4SH56hjCP7yC6y9uEbdi+fe8fzy/fitq9kqn/LtsCHIJnzjDnXHC0/+TxZ/8LrF/pFjxWNjbY2aF2j7132NiZ/XfLeQfFDq7qN32/szJXCJ3LB15g4GFm19qEbs6cmZ8vHDU/b9cfBYszx/dnMlx4b/bWW/PLXyvNv4oznHcNkdBhhA5n0RkZhRXLec1cq1lo47wgF9ZuHbO1xuoh5Sa7K6M508zYhh/BGw1W2nELWNKQfMlKg+vJCJNffFBkrwiwmd2d539oUA4oh3F/WNx2d5ktdPvRQsxR86nl+K9LlyvGZrKPbza42+mZa23gjNAAPHjic7vAb+eh73SwtzxvnHC7RmkW864WCwPweH+BlRb7yYNkGX6OIzUlu9FjHdbnv/LY9/ahSu1w0H1cplzGLQeBO/7J7SjEZlnMsbBJZT/+dneFjR2Ara2Flb+dy38lDAq4FTDKTcpNyte08obVitQK7ugoaO8dV/+YjQ22tqhk3Eg4+7Xv5L05muXDD7+a1TZfaHPlK/8I7nfyflBqA9Sr1IL2nWr97aQPamcZGFkITKU30NUmSx3mAjwPC/B8LjvJuRcQ+mCYTwAdn390yejSj6jAr7eYs3i4ygBXfLTTZWg6PijAQLf49NB9uxVvMRoTVL18eUiG3nQcn165PL/RoGQced2W6kszgLrj0OOXSTvitERBpjEQbsZ/buxc+b65ycYOW2vdv06tTSr7lJuwQ62WJF6b3X/fuN6ugPiYb7K6ClAuZ99C2I2sG9GCxsO0A9XusM91WI7Oq824GJHxWWU3vYHebrMc4kOJy99Dk42UHc6xnwd4dwg3nLS0mYzd2CDOiQe7y28a34F12IJd+B58/wqFqfS0hV69PJmoJnF9iqIg0xgIiW/rtY9hh729QTdSYfUeVEbZTjVK67AcR4jVQ1Zr3Ktd0zs/KLNXZm8vCR7DETUOw/V2wm1yH5YOAaq77DXHt5lhs6cV9OoBJhpVsTucQAhsGstQvPJo/lUow9plWiCfZcYORDee6KIZ7BRLH8moXi3qROWpJUW6uiF9iCM1hbskItnIJMBkEl1ERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERERE5Gb6/wG9py0ygiWdVQAAAABJRU5ErkJggg==' xlink:type='simple' xlink:actuate='onLoad' height='400' preserveAspectRatio='xMidYMid meet' xlink:show='embed'></image></g></g></g></svg> 
                        </a>
                    </div>

                    <p class='text-center mt-5'><a href='index.php' class='text-light'>Continue Shopping</a></p>
                </div>
            ";
        }
        else {
            echo "
                <h2 class='empty_cart text-center text-danger'>Cart is Empty.</h2>
                <p class='text-center py-2'><a href='index.php' class='text-light bg-primary py-2 px-3 fs-4 text-decoration-none'>Continue Shopping</a></p>            
            ";
        }
    }
?>