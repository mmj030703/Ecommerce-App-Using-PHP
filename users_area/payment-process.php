<?php
    include('../includes/connect.php');
    
    $order_id = $_POST['order_id'];
    $payment_id_razorpay = $_POST['payment_id'];
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = 'razorpay';
    $insert_query = "insert into `user_payments` (payment_id_razorpay, order_id, invoice_number, amount, payment_mode) values ('$payment_id_razorpay', $order_id, $invoice_number, $amount, '$payment_mode')";
    $result = mysqli_query($con, $insert_query);

    $update_orders = "update `user_orders` set order_status = 'Complete' where order_id = $order_id";
    $update_orders_query_result = mysqli_query($con, $update_orders);

    if($result) {
        echo "Done";
    }
    else {
        echo "Error: " . $sql / "<br>" . mysqli_error($con);
    }

?>