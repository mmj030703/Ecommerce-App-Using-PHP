<?php
    // Including connect.php to connect to Database 
    include('./includes/connect.php');

    // including common_function.php which contains all the helper functions.
    include('./Functions/common_function.php');

    // Starting the Session
    session_start();
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

    <!-- Internal CSS -->
    <style>
        body {
            overflow-x: hidden;
        }    
    </style>
    <!-- Internal CSS -->
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
                            <a class="nav-link" href="./users_area/user_registration.php">Register</a>
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
                            <a class="nav-link">
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
                    <!-- ******************************************** || Search Ends Here || *********************************************** -->
                </div>
            </div>
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
                <!-- PHP Code -->
                <?php
                    if(!isset($_SESSION['email'])) {
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link text-light'>Welcome Customer</a>
                            </li>
                        ";
                    }
                    else {
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link text-light'>Welcome ".$_SESSION['username']."</a>
                            </li>
                        ";
                    }

                    if(!isset($_SESSION['email'])) {
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link text-light' href='./users_area/user_login.php'>Login</a>
                            </li>
                        ";
                    }
                    else {
                        echo "
                            <li class='nav-item'>
                                <a class='nav-link text-light' href='./users_area/logout.php'>Logout</a>
                            </li>
                        ";
                    }
                ?>
                <!-- PHP Code -->
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
                            // Function to get all the products from database and insert in the DOM. 
                            getAllProducts();

                            // Function to get specific brand or category products from database and insert in the DOM. 
                            getUniqueProducts();

                            // Function to get the IP Address of the User. 
                            getIPAddress();
                        ?>
                        <!-- PHP Code -->
                    </div>
                </div>
                <!-- ******************************************** || Products Container Ends Here || *********************************************** -->

                <!-- ******************************************** || Filter Container Starts Here || *********************************************** -->
                <div class="filter_container col-md-2 bg-dark p-0 pb-3 h-100">

                    <!-- ******************************************** || Brands Starts Here || *********************************************** -->
                    <ul class="brands navbar-nav me-auto text-center pb-2">
                        <li class="nav-item bg-primary">
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
                        <li class="nav-item bg-primary">
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