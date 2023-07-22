<?php

// Merchant secret key

$secret_key = "7019bc5445383efd94dc7d5eea97b62d";

// Data received from gateway
$order_id = $_SESSION['order_id'];
$amount = $_SESSION['amount'];
$status = $_SESSION['status'];
$post_hash = $_SESSION['post_hash'];




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
                  <?php echo $order_id; ?>
                  <div class="well">
                  <?php echo $amount; ?>
               </div>
               <div class="well">
                  <?php echo $status; ?>
               </div>
               <div class="well">
                  <?php echo $post_hash; ?>
               </div>
               </div>
            </div>
            <div class="col-sm-4">
            </div>
         </div>
      </div>
   </body>
</html>
