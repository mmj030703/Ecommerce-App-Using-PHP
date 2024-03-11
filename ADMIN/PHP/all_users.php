<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <style>
        #admin-user-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        #table-cell {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <h3 class="text-center mt-4">All Users</h3>
    <table class="table table-bordered mt-4 text-center">
        <thead class="bg-info">
            <tr>
                <th class="bg-dark text-white">Sr. No</th>
                <th class="bg-dark text-white">Username</th>
                <th class="bg-dark text-white">User Email</th>
                <th class="bg-dark text-white">User Image</th>
                <th class="bg-dark text-white">User Address</th>
                <th class="bg-dark text-white">User Mobile</th>
                <th class="bg-dark text-white">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
                $get_users = "SELECT * FROM `user_table`";
                $result = mysqli_query($con, $get_users);
                $number = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    $user_email = $row['user_email'];
                    $user_image = $row['user_image'];
                    $user_address = $row['user_image'];
                    $user_mobile = $row['user_mobile'];
                    $number++;
            ?>
                        <tr>
                            <td id='table-cell'><?php echo $number ?></td>
                            <td id='table-cell'><?php echo $username ?></td>
                            <td id='table-cell'><?php echo $user_email ?></td>
                            <td id='table-cell'><img id='admin-user-image' src='../users_area/user_images/<?php echo $user_image ?>'></td>
                            <td id='table-cell'><?php echo $user_address ?></td>
                            <td id='table-cell'><?php echo $user_mobile ?></td>
                            <td id='table-cell'><a href='./index.php?delete_user=<?php echo $user_id ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <div class="bg-white w-100 p-1 my-4"></div>
</body>

</html>