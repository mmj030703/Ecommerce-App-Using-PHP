<?php
    if (isset($_GET['delete_order'])) {
        $order_id = $_GET['delete_order'];
        
        // Delete query
        $delete_order = "DELETE FROM `user_orders` WHERE order_id = $order_id";
        $result_order = mysqli_query($con, $delete_order);
        
        if ($result_order) {
            echo "<script>alert('Order deleted successfully!')</script>";
            echo "<script>window.open('./index.php', '_self')</script>";
        }
    }
?>