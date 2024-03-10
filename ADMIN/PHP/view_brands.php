<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Brands</title>
    <style>
        #table-cell {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <h3 class="text-center mt-4">All Brands</h3>
    <table class="table table-bordered mt-4 mb-5 text-center">
        <thead class="bg-info">
            <tr>
                <th class="bg-dark text-white">Sr. No</th>
                <th class="bg-dark text-white">Brand Title</th>
                <th class="bg-dark text-white">Edit</th>
                <th class="bg-dark text-white">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
                $get_brands = "SELECT * FROM `brands`";
                $result = mysqli_query($con, $get_brands);
                $number = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $brand_id = $row['brand_id'];
                    $brand_title = $row['brand_title'];
                    $number++;
            ?>
                        <tr>
                            <td id='table-cell'><?php echo $number ?></td>
                            <td id='table-cell'><?php echo $brand_title ?></td>
                            <td id='table-cell'><a href='./index.php?edit_brand=<?php echo $brand_id ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                            <td id='table-cell'><a href='./index.php?delete_brand=<?php echo $brand_id ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>

</html>