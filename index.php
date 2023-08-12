<?php
    // Including connect.php to connect to Database 
    include('./includes/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoppers Bay</title>
    <!-- BootStrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Link -->
    <link rel="stylesheet" href="./USER/CSS/style.css">
</head>

<body>
    <!-- ******************************************** || Header Starts Here || *********************************************** -->
    <header class="container-fluid p-0">
        <!-- ******************************************** || Navbar Starts Here || *********************************************** -->
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <img class="logo" src="./USER/Images/Logo.png" alt="Logo">
                <a class="navbar-brand" href="#">Shoppers Bay</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"><sup>1</sup></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price : &#8377; 100</a>
                        </li>
                    </ul>

        <!-- ******************************************** || Search Starts Here || *********************************************** -->
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search Products..." aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        <!-- ******************************************** || Search Ends Here || *********************************************** -->
        </nav>
        <!-- ******************************************** || Navbar Ends Here || *********************************************** -->
    </header>
    <!-- ******************************************** || Header Ends Here || *********************************************** -->

    <!-- ******************************************** || Welcome Starts Here || *********************************************** -->
    <section class="welcome_container container_fluid">
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link text-light">Welcome Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Login</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- ******************************************** || Welcome Ends Here || *********************************************** -->

    <!-- ******************************************** || Hero Starts Here || *********************************************** -->
    <section class="hero_container">
        <div class="hero bg-light mt-2">
            <h3 class="text-center fs-1">SHOPPERS BAY</h3>
            <p class="text-center fs-5">Shopping Made Easy!</p>
        </div>
    </section>
    <!-- ******************************************** || Hero Ends Here || *********************************************** -->

    <!-- ******************************************** || Main Starts Here || *********************************************** -->
    <main>
        <!-- ******************************************** || Product Section Starts Here || *********************************************** -->
        <section class="product_section">
            <div class="product_section_container row">
                <!-- ******************************************** || Products Container Starts Here || *********************************************** -->
                <div class="products_container col-md-10">
                    <div class="products_row row mx-1">
                        <!-- Product 1 -->
                        
                        <!-- PHP Code -->
                        <?php
                            $query_to_select_all_products = "select * from `products` LIMIT 0,6";
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
                        ?>
                        <!-- PHP Code -->
                    </div>
                </div>
                <!-- ******************************************** || Products Container Ends Here || *********************************************** -->

                <!-- ******************************************** || Filter Container Starts Here || *********************************************** -->
                <div class="filter_container col-md-2 bg-dark p-0">

                    <!-- ******************************************** || Brands Starts Here || *********************************************** -->
                    <ul class="brands navbar-nav me-auto text-center">
                        <li class="nav-item bg-info">
                            <a class="nav-link text-light fs-4" href="#">Delivery Brands</a>
                        </li>

                        <!-- PHP Code -->
                        <?php
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
                        ?>
                        <!-- PHP Code -->
                    </ul>
                    <!-- ******************************************** || Brands Ends Here || *********************************************** -->

                    <!-- ******************************************** || Category Starts Here || *********************************************** -->
                    <ul class="categories navbar-nav me-auto text-center">
                        <li class="nav-item bg-info">
                            <a class="nav-link text-light fs-4" href="#">Category</a>
                        </li>
                        
                        <!-- PHP Code -->
                        <?php
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
                        ?>
                        <!-- PHP Code -->
                    </ul>
                    <!-- ******************************************** || Category Ends Here || *********************************************** -->
                </div>
                <!-- ******************************************** || Filter Container Ends Here || *********************************************** -->
            </div>
        </section>
        <!-- ******************************************** || Product Section Ends Here || *********************************************** -->
    </main>
    <!-- ******************************************** || Main Ends Here || *********************************************** -->

    <!-- ******************************************** || Footer Starts Here || *********************************************** -->
    <div class="footer container-fluid bg-primary text-center">
        <h4 class="text-black pt-2">All Rights Reserved &copy; Shoppers Bay.</h4>
        <p class="fs-5 m-2">Made by Mayank M Jain ♥</p>
    </div>
    <!-- ******************************************** || Footer Ends Here || *********************************************** -->

    <!-- BootStrap Script Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>