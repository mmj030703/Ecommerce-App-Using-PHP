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
    <h3 class="text-center mt-4">All Products</h3>
    <table class="table table-bordered mt-4 mb-5 text-center">
        <thead class="bg-info">
            <tr>
                <th class="bg-dark text-white">Sr. No</th>
                <th class="bg-dark text-white">Due Amount</th>
                <th class="bg-dark text-white">Invoice Number</th>
                <th class="bg-dark text-white">Total Products</th>
                <th class="bg-dark text-white">Order Date</th>
                <th class="bg-dark text-white">Status</th>
                <th class="bg-dark text-white">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
                $get_orders = "SELECT * FROM `user_orders`";
                $result = mysqli_query($con, $get_orders);
                $number = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $order_id = $row['order_id'];
                    $amount_due = $row['amount_due'];
                    $invoice_number = $row['invoice_number'];
                    $total_products = $row['total_products'];
                    $order_date = $row['order_date'];
                    $status = $row['order_status'];
                    $number++;
            ?>
                        <tr>
                            <td id='table-cell'><?php echo $number ?></td>
                            <td id='table-cell'>₹ <?php echo $amount_due ?></td>
                            <td id='table-cell'><?php echo $invoice_number ?></td>
                            <td id='table-cell'><?php echo $total_products ?></td>
                            <td id='table-cell'><?php echo $order_date ?></td>
                            <td id='table-cell' class='fw-semibold'><?php echo $status ?></td>
                            <td id='table-cell'><a href='./index.php?delete_order=<?php echo $order_id ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>

</html>