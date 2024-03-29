<?php
    // Including connect.php to connect to Database 
    include('../includes/connect.php');

    // including common_function.php which contains all the helper functions.
    include('../Functions/common_function.php');

    // Starting the Session
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN Dashboard</title>
    <!-- BootStrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS Link -->
    <link rel="stylesheet" href="./CSS/style.css">

    <style>
        .main-section {
            min-height: 37.9vh;
        }

        .admin-nav-controls {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <!-- ******************************************** || Header Starts Here || *********************************************** -->
    <header>
        <!-- ******************************************** || Navbar Starts Here || *********************************************** -->
        <div class="navbar_section container-fluid p-0 bg-primary">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <!-- ******************************************** || Navbar 1 Starts Here || *********************************************** -->
                    <div class="logo_item d-flex align-items-center">
                        <a href="./" class="nav-item"><img src="../USER/Images/Logo.png" class="logo" alt="Logo"></a>
                        <a class="navbar-brand fs-5" href="./">Shoppers Bay</a>
                    </div>
                    <!-- ******************************************** || Navbar 1 Ends Here || *********************************************** -->

                    <!-- ******************************************** || Navbar 2 Starts Here || *********************************************** -->
                    <nav class="nav nav-expand-lg">
                        <div class="logo_item d-flex align-items-center">
                            <a class="navbar-brand fs-5" href="#">Welcome <?php getAdminDetails('admin_username') ?></a>
                        </div>
                    </nav>
                    <!-- ******************************************** || Navbar 2 Ends Here || *********************************************** -->
                </div>
            </nav>
        </div>
        <!-- ******************************************** || Navbar Ends Here || *********************************************** -->
    </header>
    <!-- ******************************************** || Header Ends Here || *********************************************** -->

    <!-- ******************************************** || Admin Control Buttons Section Starts Here || *********************************************** -->
    <section class="admin_control_buttons">
        <h3 class="heading text-center my-4">Manage Details</h3>
        <div class="control_buttons_container d-flex bg-dark p-3">
            <!-- ******************************************** || Admin Details Starts Here || *********************************************** -->
            <div class="admin_details">
                <img class="admin_image rounded-circle" src="./Images/<?php getAdminDetails('admin_image') ?>" alt="admin_image">
                <p class="admin_name text-light text-center mb-0 mt-1"><?php getAdminDetails('admin_username') ?></p>
            </div>
            <!-- ******************************************** || Admin Details Ends Here || *********************************************** -->

            <!-- ******************************************** || Admin Control Buttons Starts Here || *********************************************** -->
            <div class="control_buttons_row container-fluid ms-3">
                <div class="admin-nav-controls control_buttons d-flex justify-content-center gap-2 flex-wrap">
                    <button class="border-0"><a class="nav-link bg-secondary text-light p-2" href="./PHP/insert_product.php">Insert Products</a></button>
                    <button class="border-0"><a class="nav-link bg-secondary text-light p-2" href="index.php?view_products">View Products</a></button>
                    <!-- After ? -> insert_category is the GET Variable -->
                    <button class="border-0"><a class="nav-link bg-secondary text-light p-2" href="./index.php?insert_category">Insert Categories</a></button>
                    <button class="border-0"><a class="nav-link bg-secondary text-light p-2" href="./index.php?view_categories">View Categories</a></button>
                    <button class="border-0"><a class="nav-link bg-secondary text-light p-2" href="./index.php?insert_brand">Insert Brands</a></button>
                    <button class="border-0"><a class="nav-link bg-secondary text-light p-2" href="./index.php?view_brands">View Brands</a></button>
                    <button class="border-0"><a class="nav-link bg-secondary text-light p-2" href="./index.php?all_orders">All Orders</a></button>
                    <button class="border-0"><a class="nav-link bg-secondary text-light p-2" href="./index.php?all_payments">All Payments</a></button>
                    <button class="border-0"><a class="nav-link bg-secondary text-light p-2" href="./index.php?all_users">List Users</a></button>
                    <button class="border-0"><a class="nav-link bg-secondary text-light p-2" href="./PHP/admin_logout.php">Logout</a></button>
                </div>
            </div>
            <!-- ******************************************** || Admin Control Buttons Ends Here || *********************************************** -->
        </div>
    </section>
    <!-- ******************************************** || Admin Control Buttons Section Ends Here || *********************************************** -->

    <!-- ******************************************** || Main Starts Here || *********************************************** -->
    <main>
        <!-- ******************************************** || display on button click Starts Here || *********************************************** -->
        <section class="main-section display">
            <div class="container_to_display mt-3 px-5">
                <!-- PHP Code -->
                <?php 
                    // If the GET Variable => insert_category is set in the URL then we will include the content of insert_categories.php in the current div.
                    if(isset($_GET['insert_category'])) {
                        include('./PHP/insert_categories.php');
                    }
                    else if(isset($_GET['insert_brand'])) {
                        include('./PHP/insert_brands.php');
                    }
                    else if(isset($_GET['view_products'])) {
                        include('./PHP/view_products.php');
                    }
                    else if(isset($_GET['edit_product'])) {
                        include('./PHP/edit_product.php');
                    }
                    else if(isset($_GET['delete_product'])) {
                        include('./PHP/delete_product.php');
                    }
                    else if(isset($_GET['view_categories'])) {
                        include('./PHP/view_categories.php');
                    }
                    else if(isset($_GET['view_brands'])) {
                        include('./PHP/view_brands.php');
                    }
                    else if(isset($_GET['edit_category'])) {
                        include('./PHP/edit_category.php');
                    }
                    else if(isset($_GET['delete_category'])) {
                        include('./PHP/delete_category.php');
                    }
                    else if(isset($_GET['edit_brand'])) {
                        include('./PHP/edit_brand.php');
                    }
                    else if(isset($_GET['delete_brand'])) {
                        include('./PHP/delete_brand.php');
                    }
                    else if(isset($_GET['all_orders'])) {
                        include('./PHP/all_orders.php');
                    }
                    else if(isset($_GET['delete_order'])) {
                        include('./PHP/delete_order.php');
                    }
                    else if(isset($_GET['all_payments'])) {
                        include('./PHP/all_payments.php');
                    }
                    else if(isset($_GET['delete_payment'])) {
                        include('./PHP/delete_payment.php');
                    }
                    else if(isset($_GET['all_users'])) {
                        include('./PHP/all_users.php');
                    }
                    else if(isset($_GET['delete_user'])) {
                        include('./PHP/delete_user.php');
                    }
                ?>
                <!-- PHP Code -->
            </div>
        </section>
        <!-- ******************************************** || display on button click Ends Here || *********************************************** -->
    </main>
    <!-- ******************************************** || Main Ends Here || *********************************************** -->

    <!-- ******************************************** || Footer Starts Here || *********************************************** -->
    <?php 
        include('../USER/PHP/footer.php');
    ?>
    <!-- ******************************************** || Footer Ends Here || *********************************************** -->

    <!-- BootStrap Script Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>
</html>