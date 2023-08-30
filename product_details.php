<?php
    // Including connect.php to connect to Database 
    include('./includes/connect.php');

    // including common_function.php which contains all the helper functions.
    include('./Functions/common_function.php');
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
                <a href="index.php"><img class="logo" src="./USER/Images/Logo.png" alt="Logo"></a>
                <a class="navbar-brand" href="index.php">Shoppers Bay</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all_products.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">
                                <i class="fa-solid fa-cart-shopping">
                                    <sup>
                                        <!-- PHP Code -->
                                        <?php 
                                            // Function to get number of items in cart from database
                                            getNumberOfCartItems(); 
                                        ?>
                                        <!-- PHP Code -->
                                    </sup>
                                </i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Total Price : &#8377; 
                                <!-- PHP Code -->
                                <?php
                                    // Function to get total price of items in cart from database
                                    getTotalCartPrice();
                                ?>
                                <!-- PHP Code -->
                            </a>
                        </li>
                    </ul>

        <!-- ******************************************** || Search Starts Here || *********************************************** -->
                    <form action="search_product.php" method="GET" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" name="search_data" placeholder="Search Products..." aria-label="Search">
                        <input type="submit" class="btn btn-outline-light" value="Search" name="search_data_product"></input>
                    </form>
                </div>
            </div>
        <!-- ******************************************** || Search Ends Here || *********************************************** -->
        </nav>
        <!-- ******************************************** || Navbar Ends Here || *********************************************** -->
    </header>
    
    <!-- PHP Code -->
    <?php
        cart();
    ?>
    <!-- PHP Code -->
    <!-- ******************************************** || Header Ends Here || *********************************************** -->

    <!-- ******************************************** || Welcome Starts Here || *********************************************** -->
    <section class="welcome_container container_fluid">
        <div class="navbar navbar-expand-lg navbar-dark bg-dark">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link text-light">Welcome Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="./users_area/user_login.php">Login</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- ******************************************** || Welcome Ends Here || *********************************************** -->

    <!-- ******************************************** || Main Starts Here || *********************************************** -->
    <main>
        <!-- ******************************************** || Product Section Starts Here || *********************************************** -->
        <section class="product_section">
            <div class="product_section_container row">
                <!-- ******************************************** || Products Container Starts Here || *********************************************** -->
                <div class="products_container col-md-10">
                    <!-- Product Details -->
                    <div class="products_row mt-5 mx-1">
                        <!-- Product 1 -->
                        <!-- PHP Code -->
                        <?php
                            // Function to get that product from database for which the user has clicked on the view more button and insert in the DOM. 
                            viewMore();
                            
                            // Function to get specific brand or category products from database and insert in the DOM. 
                            getUniqueProducts();

                            // Function to get the IP Address of the User. 
                            getIPAddress();
                        ?>
                        <!-- PHP Code -->
                        <!-- <div class="product_carousel m-auto">
                            <div id="carouselExample" class="carousel slide">
                                <button class="carousel-control-prev prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon product_prev_btn" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="data:image/jpeg;base64,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" class="carousel_image d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTaj_8CStF7VcfvNk4s9ALIjr7e5wCIFzl2Fc3WJMWrk6w84K48E1mz4alvcVwIhOQ9Bz4&usqp=CAU" class="carousel_image d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR5zd8MyLEbbBfx_NhMoBo6g7CvM56Kz8iEJw&usqp=CAU" class="carousel_image d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-next next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                                    <span class="carousel-control-next-icon product_next_btn" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="product_details d-flex flex-column align-items-center mt-2 mb-4">
                            <h2 class="my-4 fs-1">Samsung Galaxy M04</h2>
                            <p class="mt-4 mb-2 fs-4">About this product</p>
                            <p class="product_description fs-5 w-75 mb-4">Powerful MediaTek Helio P35 Octa Core 2.3GHz with Android 12,One UI Core 4.1
                                    13MP+2MP Dual camera setup- True 13MP (F2.2) main camera + 2MP (F2.4) | 5MP (F2.2) front came
                                    16.55 centimeters (6.5-inch) LCD, HD+ resolution with 720 x 1600 pixels resolution, 269 PPI with 16M color
                                    5000mAH lithium-ion battery, 1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase</p>
                            <p class="fs-3">Price:  &#8377; 8,499</p>
                        </div>
                        <div class='buttons mt-2 d-flex justify-content-center column-gap-5 my-4'>
                            <a href='#' class='btn btn-primary fs-5'>Add to Cart</a>
                            <a href='#' class='btn btn-dark px-3 fs-5'>Continue Shopping</a>
                        </div> -->
                    </div>
                    <!-- Product Details -->
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
                            // Function to get all the brands from database and insert in the DOM. 
                            getAllBrands();
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
                            // Function to get all the categories from database and insert in the DOM. 
                            getAllCategories();
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
    <!-- PHP Code -->
    <?php
        // File containing code for footer section.
        include('./USER/PHP/footer.php');
    ?>
    <!-- PHP Code -->
    <!-- ******************************************** || Footer Ends Here || *********************************************** -->

    <!-- BootStrap Script Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>