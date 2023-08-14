<?php
    // Including connect.php in includes folder to access the connection variable $con.
    include('./includes/connect.php');

    function getProducts() {
        // We are saying that use the Global variable $con otherwise it will give error as this function does not have any local var $con.
        global $con;

        // If any brand and category is not clicked then all the products are shown. 
        if(!isset($_GET['brand']) and !isset($_GET['category'])) {
            $query_to_select_all_products = "select * from `products` order by rand() LIMIT 0,9";
            $query_result = mysqli_query($con, $query_to_select_all_products);

            while($table_row = mysqli_fetch_assoc($query_result)) {
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
                                    <a href='#' class='btn btn-primary'>Add to Cart</a>
                                    <a href='#' class='btn btn-dark px-3'>View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
    }

    function getAllProducts() {
        // We are saying that use the Global variable $con otherwise it will give error as this function does not have any local var $con.
        global $con;

        // If any brand and category is not clicked then all the products are shown. 
        if(!isset($_GET['brand']) and !isset($_GET['category'])) {
            $query_to_select_all_products = "select * from `products` order by rand()";
            $query_result = mysqli_query($con, $query_to_select_all_products);

            while($table_row = mysqli_fetch_assoc($query_result)) {
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
                                    <a href='#' class='btn btn-primary'>Add to Cart</a>
                                    <a href='#' class='btn btn-dark px-3'>View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
    }

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
                                    <a href='#' class='btn btn-primary'>Add to Cart</a>
                                    <a href='#' class='btn btn-dark px-3'>View More</a>
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
                                    <a href='#' class='btn btn-primary'>Add to Cart</a>
                                    <a href='#' class='btn btn-dark px-3'>View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
    }

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
                                    <a href='#' class='btn btn-primary'>Add to Cart</a>
                                    <a href='#' class='btn btn-dark px-3'>View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
    }
?>