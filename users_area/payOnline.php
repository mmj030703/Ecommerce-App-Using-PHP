<?php 
    include('../includes/connect.php');
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Pay Online</title>
    <style>
    div {
        background-color: #888;
        color: #fff;
        font-size: 1.2rem;
        border-radius: 7px;
        padding: 5px;
        width: fit-content;
    }

    div button {
        font-size: 1rem;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <?php 
        if(isset($_GET['order_id']) && isset($_GET['invoice_number']) && isset($_GET['amount'])) {
            $amount = $_GET['amount'];
            $order_id = $_GET['order_id'];
            $invoice_number = $_GET['invoice_number'];
        }

        echo "
                <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
                <script src='https://checkout.razorpay.com/v1/checkout.js'></script>
                <script>
                    var options = {
                        'key': 'rzp_test_hk2omNQ8UBkRLy', // Enter the Key ID generated from the Dashboard
                        'amount': '$amount' + '00', // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        'currency': 'INR',
                        'name': 'Shoppers Bay',
                        'image': 'https://th.bing.com/th/id/OIP.dB0xx6ZM9GzLszjbZX3emwHaIA?w=169&h=182&c=7&r=0&o=5&pid=1.7',
                        'handler': function(response) {
                            var payment_id = response.razorpay_payment_id;

                            $.ajax({
                                url: 'payment-process.php',
                                type: 'POST',
                                data: {order_id: $order_id, payment_id: payment_id, invoice_number: $invoice_number, amount: $amount},
                                success: function(finalResponse) {
                                    if (finalResponse == 'Done') {
                                        alert('Razorpay Payment done successfully!');
                                        window.open('./profile.php?my_orders', '_self');
                                    }
                                    else {
                                        alert('Something went wrong! Please check console.log to find error!');
                                        console.log(finalResponse);
                                    }
                                }
                            });
                        },
                        'theme': {
                            'color': '#3399cc'
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                </script>
                ";
            ?>
</body>

</html>