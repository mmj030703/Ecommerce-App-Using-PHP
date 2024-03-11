<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Payments</title>
    <style>
        #table-cell {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <h3 class="text-center mt-4">All Payments</h3>
    <table class="table table-bordered mt-4 text-center">
        <thead class="bg-info">
            <tr>
                <th class="bg-dark text-white">Sr. No</th>
                <th class="bg-dark text-white">Invoice Number</th>
                <th class="bg-dark text-white">Amount</th>
                <th class="bg-dark text-white">Payment Mode</th>
                <th class="bg-dark text-white">Order Date</th>
                <th class="bg-dark text-white">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
                $get_payments = "SELECT * FROM `user_payments`";
                $result = mysqli_query($con, $get_payments);
                $number = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $payment_id = $row['payment_id'];
                    $invoice_number = $row['invoice_number'];
                    $amount = $row['amount'];
                    $payment_mode = $row['payment_mode'];
                    $order_date = $row['date'];
                    $number++;
            ?>
                        <tr>
                            <td id='table-cell'><?php echo $number ?></td>
                            <td id='table-cell'><?php echo $invoice_number ?></td>
                            <td id='table-cell'>₹ <?php echo $amount ?></td>
                            <td id='table-cell'><?php echo $payment_mode ?></td>
                            <td id='table-cell'><?php echo $order_date ?></td>
                            <td id='table-cell'><a href='./index.php?delete_payment=<?php echo $payment_id ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <div class="bg-white w-100 p-1 my-4"></div>
</body>

</html>