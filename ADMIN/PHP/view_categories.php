<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Categories</title>
    <style>
        #table-cell {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <h3 class="text-center mt-4">All Categories</h3>
    <table class="table table-bordered mt-4 mb-5 text-center">
        <thead class="bg-info">
            <tr>
                <th class="bg-dark text-white">Sr. No</th>
                <th class="bg-dark text-white">Category Title</th>
                <th class="bg-dark text-white">Edit</th>
                <th class="bg-dark text-white">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
                $get_categories = "SELECT * FROM `categories`";
                $result = mysqli_query($con, $get_categories);
                $number = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $category_id = $row['category_id'];
                    $category_title = $row['category_title'];
                    $number++;
            ?>
                        <tr>
                            <td id='table-cell'><?php echo $number ?></td>
                            <td id='table-cell'><?php echo $category_title ?></td>
                            <td id='table-cell'><a href='./index.php?edit_category=<?php echo $category_id ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                            <td id='table-cell'><a href='./index.php?delete_category=<?php echo $category_id ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>

</html>