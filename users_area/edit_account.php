<?php
    if(isset($_GET['edit_account'])){
        $username = $_SESSION['username'];
        $select_query = "SELECT * FROM user_table WHERE username='$username'";
        $result_query = mysqli_query($con, $select_query);
        $row_fetch = mysqli_fetch_assoc($result_query);
        $user_id = $row_fetch['user_id'];
        $user_email = $row_fetch['user_email'];
        $user_address = $row_fetch['user_address'];
        $user_mobile = $row_fetch['user_mobile'];
        $imageURL = $row_fetch['user_image']; // Assuming you have an 'user_image' column in your database
    } 

    if(isset($_POST['user_update'])) {
        $update_id = $user_id;    
        $username = $_POST['username'];    
        $user_email = $_POST['user_email'];    
        $user_address = $_POST['user_address'];    
        $user_mobile = $_POST['user_mobile'];    

        // Check if a new image is selected
        if(!empty($_FILES['user_image']['name'])) {
            $user_image = $_FILES['user_image']['name'];
            $user_image_tmp = $_FILES['user_image']['tmp_name'];
            move_uploaded_file($user_image_tmp, "./user_images/$user_image");
            // Update user_image in the database
        }

        // Update query
        $update_data = "UPDATE user_table SET username='$username', user_email='$user_email',
                        user_address='$user_address', user_mobile='$user_mobile'";
        
        // Add user_image to the update query if it's set
        if(isset($user_image)) {
            $update_data .= ", user_image='$user_image'";
        }

        $update_data .= " WHERE user_id=$update_id";

        $result_query = mysqli_query($con, $update_data);

        if($result_query) {
            echo "<script>alert('Data Updated Successfully!')</script>";
            echo "<script>window.open('logout.php', '_self')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <style>
        .update-image {
            object-fit: cover;
            width: 100px;
            height: 80px;
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px;
        }

        .image-field {
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div class='ps-3 pe-10 pb-3 text-center'>
        <h1 class='text-center'>Edit Account</h1>
        <form action="" class='mt-4' method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4">
                <input type="text" value="<?php echo $username ?>" class="form-control w-50 m-auto focus-ring-light border-subtle border-1" name="username">
            </div>
            <div class="form-outline mb-4">
                <input type="email" value="<?php echo $user_email ?>" class="form-control w-50 m-auto focus-ring-light border-dark-subtle border-1" name="user_email">
            </div>
            <div class="image-field form-outline mb-4 d-flex bg-white border-0 w-50 m-auto">
                <input type="file" name="user_image" class="form-control focus-ring-light border-dark-subtle border-1">
                <img src="./user_images/<?php echo $imageURL ?>" class="update-image" alt='Profile Image'>
            </div>
            <div class="form-outline mb-4">
                <input type="text" name="user_address" value="<?php echo $user_address ?>" class="form-control w-50 m-auto focus-ring-light border-dark-subtle border-1">
            </div>
            <div class="form-outline mb-4">
                <input type="text" name="user_mobile" value="<?php echo $user_mobile ?>" class="form-control w-50 m-auto focus-ring-light border-dark-subtle border-1">
            </div>

            <input type="submit" name="user_update" value="Update" class="text-bg-primary bg-secondary text-center py-2 px-5 rounded-5 border-0">
        </form>
    </div>
</body>
</html>