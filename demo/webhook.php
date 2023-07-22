<?php

// Merchant secret key

$secret_key = "7019bc5445383efd94dc7d5eea97b62d";

// Data received from gateway
$order_id = $_POST['order_id'];
$amount = $_POST['amount'];
$status = $_POST['status'];
$post_hash = $_POST['post_hash'];

// Compute the payment hash locally
$local_hash = md5($order_id.$amount.$status.$secret_key);

if ($post_hash == $local_hash) {
  // Mark the transaction as success & process the order
  $hash_status = "Hash Matched";
  $pay_status = "Order ID : $order_id <br> Amount : $amount <br> Status : $status <br> Hash Status : $hash_status";
  
$_SESSION['order_id'] = $order_id;
$_SESSION['amount'] = $amount;
$_SESSION['status'] = $status ;
$_SESSION['post_hash'] = $post_hash ;
  
header('Location: response.php');
  
  
}

else {
  // Suspicious payment, dont process this payment.
  $hash_status = "Hash Mismatch";
  $pay_status = "Order ID : $order_id <br> Amount : $amount <br> Status : $status <br> Hash Status : $hash_status";
}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>UPI Gateway Response</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
   <body>
      <div class="container">
         <br><br>
         <h3 class="text-center">UPI Gateway Response</h3>
         <br><br>
         <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
               <div class="well">
                  <?php echo $pay_status; ?>
               </div>
            </div>
            <div class="col-sm-4">
            </div>
         </div>
      </div>
   </body>
</html>
