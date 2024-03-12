<!-- PHP Code -->
<?php
    include('../includes/connect.php');
    include('../Functions/common_function.php');

    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
    }

    // Getting total items & total price of all cart items
    $ip_address = getIPAddress();
    $total_cart_price = 0;
    $invoice_number = mt_rand();
    $status = 'pending';

    $products_from_cart_query = "select * from `cart_details` where ip_address='$ip_address'";
    $products_from_cart_query_result = mysqli_query($con, $products_from_cart_query);
    $total_number_of_products = mysqli_num_rows($products_from_cart_query_result);

    while ($cart_detail = mysqli_fetch_assoc($products_from_cart_query_result)) {
        $product_id = $cart_detail['product_id'];
        $quantity = $cart_detail['quantity'];

        $select_product_query = "select * from `products` where product_id=$product_id";
        $select_product_query_result = mysqli_query($con, $select_product_query);

        $product_detail = mysqli_fetch_assoc($select_product_query_result);
        $product_total_price = array($product_detail['product_price'] * (($quantity == 0) ? 1 : $quantity));
        $product_values = array_sum($product_total_price);
        $total_cart_price += ($product_values);
    }

    $subtotal = $total_cart_price;

    if ($quantity == 0) {
        $quantity = 1;   
    }


    //* Inserting Above data inside the Orders Table in DB
    $insert_orders = "insert into `user_orders` (user_id, amount_due, invoice_number, total_products, order_date, order_status) values ($user_id, $subtotal, $invoice_number, $total_number_of_products, NOW(), '$status')";
    $insert_orders_result = mysqli_query($con, $insert_orders);
    if($insert_orders_result) {
        echo "
            <script>
                alert('Orders are Submitted Successfully');
            </script>
        ";
        echo "
            <script>
                window.open('profile.php', '_self');
            </script>
        ";
    }

    //* Inserting Above data inside the Orders Pending Table in DB
    $insert_pending_orders = "insert into `orders_pending` (user_id, invoice_number, product_id, quantity, order_status) values ($user_id, $invoice_number, $product_id, $quantity, '$status')";
    $insert_pending_orders_result = mysqli_query($con, $insert_pending_orders);


    //* Deleting the Products inside Cart Details as Orders are made Successfully
    $empty_cart = "delete from `cart_details` where ip_address = '$ip_address'";
    $empty_cart_result = mysqli_query($con, $empty_cart);
?>
<!-- PHP Code -->