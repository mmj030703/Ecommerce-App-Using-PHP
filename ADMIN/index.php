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
                        <a href="#" class="nav-item"><img src="../USER/Images/Logo.png" class="logo" alt="Logo"></a>
                        <a class="navbar-brand fs-5" href="#">Shoppers Bay</a>
                    </div>
                    <!-- ******************************************** || Navbar 1 Ends Here || *********************************************** -->

                    <!-- ******************************************** || Navbar 2 Starts Here || *********************************************** -->
                    <nav class="nav nav-expand-lg">
                        <div class="logo_item d-flex align-items-center">
                            <a class="navbar-brand fs-5" href="#">Welcome Admin</a>
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
                <img class="admin_image rounded-circle me-3" src="https://img.freepik.com/premium-photo/smiling-young-man-using-laptop-modern-office_109710-4878.jpg?w=2000" alt="admin_image">
                <p class="admin_name text-light mb-0 ms-1 mt-1">Admin Name</p>
            </div>
            <!-- ******************************************** || Admin Details Ends Here || *********************************************** -->

            <!-- ******************************************** || Admin Control Buttons Starts Here || *********************************************** -->
            <div class="control_buttons_row container-fluid">
                <div class="control_buttons d-flex justify-content-center mt-4 gap-2 flex-wrap">
                    <button class="border-0"><a class="nav-link bg-primary text-light p-2" href="#">Insert Products</a></button>
                    <button class="border-0"><a class="nav-link bg-primary text-light p-2" href="#">View Products</a></button>
                    <button class="border-0"><a class="nav-link bg-primary text-light p-2" href="#">Insert Categories</a></button>
                    <button class="border-0"><a class="nav-link bg-primary text-light p-2" href="#">View Categories</a></button>
                    <button class="border-0"><a class="nav-link bg-primary text-light p-2" href="#">Insert Brands</a></button>
                    <button class="border-0"><a class="nav-link bg-primary text-light p-2" href="#">View Brands</a></button>
                    <button class="border-0"><a class="nav-link bg-primary text-light p-2" href="#">All Orders</a></button>
                    <button class="border-0"><a class="nav-link bg-primary text-light p-2" href="#">All Payments</a></button>
                    <button class="border-0"><a class="nav-link bg-primary text-light p-2" href="#">List Users</a></button>
                    <button class="border-0"><a class="nav-link bg-primary text-light p-2" href="#">Logout</a></button>
                </div>
            </div>
            <!-- ******************************************** || Admin Control Buttons Ends Here || *********************************************** -->
        </div>
    </section>
    <!-- ******************************************** || Admin Control Buttons Section Ends Here || *********************************************** -->

    <!-- ******************************************** || Footer Starts Here || *********************************************** -->
    <!-- <div class="footer container-fluid bg-primary text-center">
        <h4 class="text-black mt-2">All Rights Reserved &copy; Shoppers Bay.</h4>
        <p class="fs-5 m-2">Made by Mayank M Jain ♥</p>
    </div> -->
    <!-- ******************************************** || Footer Ends Here || *********************************************** -->

    <!-- BootStrap Script Link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>
</html>