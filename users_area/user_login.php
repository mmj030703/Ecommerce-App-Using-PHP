<!-- PHP Code -->
<?php 
    include('../includes/connect.php');
    include('../Functions/common_function.php');
?>
<!-- PHP Code -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <!-- BootStrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- ******************************************** || Main Starts Here || *********************************************** -->
    <main>
        <div class="form_container container_fluid pb-5 mb-3 mt-4">
            <h1 class="heading text-center mb-2">Login</h1>

            <div class="w-100 mt-4">
                <!-- ******************************************** || Form Starts Here || *********************************************** -->
                <form action="" method="POST">
                    <!-- Email -->
                    <div class="email_container form-outline mb-4 w-50 m-auto">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="user_email" id="email" class="form-control" placeholder="Enter your Email" autocomplete="off" required="required">
                    </div> 
                    
                    <!-- Password -->
                    <div class="password_container form-outline mb-4 w-50 m-auto">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="user_password" id="password" class="form-control" placeholder="Enter your Password" autocomplete="off" required="required">
                    </div>

                    <!-- Login Button -->
                    <div class="login_button_container form-outline mb-4 w-50 m-auto">
                        <input type="submit" name="login_user" class="btn btn-primary mb-3" value="Login">
                        <p class="mx-1 fw-bold small">Don't have an account ?<a class="text-danger text-decoration-none" href="./user_registration.php"> Register</a></p>
                    </div> 
                </form>
                <!-- ******************************************** || Form Ends Here || *********************************************** -->
            </div>
        </div>
    </main>
    <!-- ******************************************** || Main Ends Here || *********************************************** -->
</body>
</html>

<!-- PHP Code -->
<?php 
    // Checking if user clicked on Login Button
    if(isset($_POST['login_user'])) {
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_ip_address = getIPAddress();

        $select_query = "select * from `user_table` where user_email = '$user_email'";
        $select_query_result = mysqli_query($con, $select_query);
        $number_of_users = mysqli_num_rows($select_query_result);
        $hash_password = mysqli_fetch_assoc($select_query_result)['user_password'];

        $products_select_query = "select * from `cart_details` where ip_address = '$user_ip_address'";
        $products_select_query_result = mysqli_query($con, $products_select_query);
        $number_of_cart_products = mysqli_num_rows($products_select_query_result);

        // Checking if there is a user with the entered email in the database already and the password matches the one present in the database then login the user.
        // password_verify() function checks whether the entered passwords hash and password in database in hash format are equal or not.
        if($number_of_users > 0 && password_verify($user_password, $hash_password)) {
            $_SESSION['email'] = $user_email;
            if($number_of_cart_products > 0) {
                $_SESSION['email'] = $user_email;
                echo "
                    <script>
                        alert('Login Successful !');
                        window.open('../cart.php', '_self');
                    </script>
                ";
            }
            else {
                $_SESSION['email'] = $user_email;
                echo "
                    <script>
                        alert('Login Successful !');
                        window.open('../index.php', '_self');
                    </script>
                ";
            }
        }
        else {
            echo "
                <script>
                    alert('Invalid Credentials !');
                </script>
            ";
        }
    }
?>
<!-- PHP Code -->