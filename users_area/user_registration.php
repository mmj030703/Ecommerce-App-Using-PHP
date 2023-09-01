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
        <div class="form_container container_fluid my-3">
            <h1 class="heading text-center mb-2">Register</h1>

            <div class="w-100">
                <!-- ******************************************** || Form Starts Here || *********************************************** -->
                <form action="" method="POST" enctype="multipart/form-data" class="has-error">
                    <!-- UserName -->
                    <div class="username_container form-outline mb-4 w-50 m-auto">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="user_username" id="username" class="form-control" placeholder="Enter your Username" autocomplete="off" required="required">
                    </div> 

                    <!-- Email -->
                    <div class="email_container form-outline mb-4 w-50 m-auto">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="user_email" id="email" class="form-control" placeholder="Enter your Email" autocomplete="off" required="required">
                    </div> 

                    
                    <!-- User Image -->
                    <div class="user_image_container form-outline mb-4 w-50 m-auto">
                        <label for="user_image" class="form-label">Your Image</label>
                        <input type="file" name="user_image" id="user_image" class="form-control" required="required">
                    </div>
                    
                    <!-- Password -->
                    <div class="password_container form-outline mb-4 w-50 m-auto">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="user_password" id="password" class="form-control" placeholder="Enter your Password" autocomplete="off" required="required">
                    </div> 

                    <!-- Confirm Password -->
                    <div class="password_container form-outline mb-4 w-50 m-auto">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" name="user_password_confirmed" id="confirm_password" class="form-control" placeholder="Enter your Password" autocomplete="off" required="required">
                    </div> 

                    <!-- Address -->
                    <div class="address_container form-outline mb-4 w-50 m-auto">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter your Address" autocomplete="off" required="required">
                    </div>

                    <!-- Contact -->
                    <div class="contact_container form-outline mb-4 w-50 m-auto">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="text" name="user_contact" id="user_contact" class="form-control" placeholder="Enter Mobile Number" autocomplete="off" required="required">
                    </div>

                    <!-- Register Button -->
                    <div class="register_button_container form-outline mb-4 w-50 m-auto">
                        <input type="submit" name="register_user" class="btn btn-primary mb-3" value="Register">
                        <p class="mx-1 fw-bold small">Already have an account ?<a class="text-danger text-decoration-none" href="./user_login.php"> Login</a></p>
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
    if(isset($_POST['register_user'])) {
        $user_username = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        // Password Hashing for security purpose.
        $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
        $user_password_confirmed = $_POST['user_password_confirmed'];
        $user_address = $_POST['user_address'];
        $user_contact = $_POST['user_contact'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        $user_ip_address = getIPAddress();

        // Checking Edge Cases 
        $check_query = "select * from `user_table` where user_email = '$user_email'";
        $check_query_result = mysqli_query($con, $check_query);
        $number_of_rows = mysqli_num_rows($check_query_result);

        // If there are already records with same email address than we dont register this user and give that user a suitable message.
        if($number_of_rows > 0) {
            echo "
                <script>
                    alert('User Already Registered! Please Log In.');
                    window.open('user_login.php', '_self');
                </script>
            ";
        }
        // If the passwords do not match then give the user a suitable mesaage.
        else if($user_password != $user_password_confirmed) {
            echo "
                <script>
                    alert('Passwords do not Match.');
                </script>
            ";
        }
        // If user is not already registered and passwords are matching then this users details can be added to the database.
        else {
            move_uploaded_file($user_image_tmp, "./user_images/$user_image");

            $insert_query = "insert into `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) values ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip_address', '$user_address', '$user_contact')";
            $insert_query_result = mysqli_query($con, $insert_query);

            if($insert_query_result) {
                echo "
                    <script>
                        alert('User Registered Successfully.');
                    </script>
                ";
            }
        }
    }
?>
<!-- PHP Code -->