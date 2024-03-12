<?php
    // Including connect.php to connect to Database 
    include('../includes/connect.php');

    // including common_function.php which contains all the helper functions.
    include('../Functions/common_function.php');

    // Starting the Session
    session_start();

    if (isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];
        $select_data = "Select * from `user_orders` where order_id = $order_id";
        $result = mysqli_query($con, $select_data);
        $row_fetch = mysqli_fetch_assoc($result);
        $invoice_number = $row_fetch['invoice_number'];
        $amount_due = $row_fetch['amount_due'];
    }

    if(isset($_POST['confirm_payment_through_cash_on_delivery'])) {
        $invoice_number = $_POST['invoice_number'];
        $amount = $_POST['amount'];
        $payment_mode = 'cash on delivery';
        $insert_query = "insert into `user_payments` (payment_id_razorpay, order_id, invoice_number, amount, payment_mode) values (NULL, $order_id, $invoice_number, $amount, '$payment_mode')";
        $result = mysqli_query($con, $insert_query);
    
        if($result){
            echo "
                <script>
                    alert('Successfully completed the payment!');
                    window.open('profile.php?my_orders','_self')
                </script>
            ";
        }
        $update_orders = "update `user_orders` set order_status = 'Complete' where order_id = $order_id";
        $update_orders_query_result = mysqli_query($con, $update_orders);
    }
    else if(isset($_POST['confirm_payment_through_razorpay'])) {
        $order_id = $_GET['order_id'];
        $select_data = "Select * from `user_orders` where order_id = $order_id";
        $result = mysqli_query($con, $select_data);
        $row_fetch = mysqli_fetch_assoc($result);
        $invoice_number = $row_fetch['invoice_number'];
        $amount_due = $row_fetch['amount_due'];
        echo "<script>window.open('./payOnline.php?order_id=$order_id&invoice_number=$invoice_number&amount=$amount_due', '_self')</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Payment</title>
    <!-- BootStrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Custom CSS -->
    <style>
        body {
            margin-top: -30px;
        }

        .payment-form {
            padding: 50px 100px;
            margin: 0px 0px;
            border-radius: 12px;
        }

        .form-input {
            width: 300px;
            margin-top: -3px;
        }

        .form-label {
            font-size: 14px;
            font-weight: 500;
        }
    </style>
</head>

<body class="vh-100 d-flex justify-content-center align-items-center">
    <div class="payment-form mt-3 bg-dark">
        <h1 class="text-white text-center fs-2">Confirm Payment</h1>
        <form action="" method="POST">
            <div class="form-outline my-4">
                <label for="amount" class="form-label text-light">Invoice Number</label>
                <input type="text" value="<?php echo $invoice_number ?>" readonly class="form-input form-control"
                    name="invoice_number">
            </div>
            <div class="form-outline my-4">
                <label for="amount" class="form-label text-light">Amount</label>
                <input type="text" value="<?php echo $amount_due ?>" readonly class="form-input form-control"
                    name="amount">
            </div>
            <div class="form-outline d-flex column-gap-4 justify-content-center mt-2">
                <input type="submit" class="w-50 bg-secondary text-center py-1 rounded-5 text-white border-0" value="Razorpay" name="confirm_payment_through_razorpay">
                <input type="submit" class="w-50 bg-secondary text-center py-1 rounded-5 text-white border-0" value="Cash on Delivery" name="confirm_payment_through_cash_on_delivery">
            </div>
        </form>
    </div>
</body>

</html>