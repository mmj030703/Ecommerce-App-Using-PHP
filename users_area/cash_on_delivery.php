<!-- PHP Code -->
<?php
    include('../includes/connect.php');
    include('../Functions/common_function.php');

    if(isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
    }

    // Getting total items & total price of all cart items
    $ip_address = getIPAddress();
    $total_cart_price = 0;

    $products_from_cart_query = "select * from `cart_details` where ip_address='$ip_address'"; 
    $products_from_cart_query_result = mysqli_query($con, $products_from_cart_query);
    $number_of_products = mysqli_num_rows($products_from_cart_query_result); 
    
    while($cart_detail = mysqli_fetch_assoc($products_from_cart_query_result)) {
        $product_id = $cart_detail['product_id'];

        $select_product_query = "select * from `products` where product_id=$product_id";
        $select_product_query_result = mysqli_query($con, $select_product_query);

        $product_detail = mysqli_fetch_assoc($select_product_query_result);
        $product_price = array($product_detail['product_price']);
        $product_values = array_sum($product_price);
        $total_cart_price += $product_values;
    }
?>
<!-- PHP Code -->