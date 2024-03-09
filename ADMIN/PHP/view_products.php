<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <style>
        #admin-product-image {
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
    <h3 class="text-center mt-4">All products</h3>
    <table class="table table-bordered mt-4 text-center">
        <thead class="bg-info">
            <tr>
                <th class="bg-dark text-white">Product ID</th>
                <th class="bg-dark text-white">Product Title</th>
                <th class="bg-dark text-white">Product Image</th>
                <th class="bg-dark text-white">Product Price</th>
                <th class="bg-dark text-white">Total Sold</th>
                <th class="bg-dark text-white">Status</th>
                <th class="bg-dark text-white">Edit</th>
                <th class="bg-dark text-white">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
                $get_products = "SELECT * FROM `products`";
                $result = mysqli_query($con, $get_products);
                $number = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_image = $row['product_image1'];
                    $product_price = $row['product_price'];
                    $status = $row['status'];
                    $number++;
            ?>
                        <tr>
                            <td id='table-cell'><?php echo $number ?></td>
                            <td id='table-cell'><?php echo $product_title ?></td>
                            <td id='table-cell'><img id='admin-product-image' src='./images/<?php echo $product_image ?>'></td>
                            <td id='table-cell'>₹ <?php echo $product_price ?></td>
                            <td id='table-cell'>
                                <?php
                                    $get_count = "SELECT * FROM orders_pending WHERE product_id = $product_id";
                                    $result_count = mysqli_query($con, $get_count);
                                    $rows_count = mysqli_num_rows($result_count);
                                    
                                    echo $rows_count;
                                ?>
                            </td>
                            <td id='table-cell' class='fw-semibold'><?php echo $status ?></td>
                            <td id='table-cell'><a href='./index.php?edit_product=<?php echo $product_id ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
                            <td id='table-cell'><a href='./index.php?delete_product=<?php echo $product_id ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>

</html>