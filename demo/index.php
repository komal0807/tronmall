<?php 
ob_start();
session_start();
if($_SESSION['frontuserid']=="")
{header("location:../login.php");exit();}

?>

<?php
// Defining the URL to hit to initiate the payment
$url = "https://upi.amazepay.in/checkout.php";

// Generating the order id
$order_id = "AMZ".rand(9,99999999999);

// Defining the merchant id
$pid = "1244362626";

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>UPI Gateway Integration</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
   <body>
      <div class="container">
         <br><br>
         <h3 class="text-center">UPI Gateway Integration</h3>
         <br><br>
         <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
               <div class="well">
                  <form action="<?php echo $url; ?>" method="post">
                     <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                     <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                     <div class="form-group">
                        <label>Purpose</label>
                        <input type="text" class="form-control" name="purpose" placeholder="Purpose of payment" required>
                     </div>
                     <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" name="amt" placeholder="Amount" required>
                     </div>
                     <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email id" required>
                     </div>
                     <br>
                     <button type="submit" name="submit" class="btn btn-success btn-block">Proceed</button>
                  </form>
               </div>
            </div>
            <div class="col-sm-4">
            </div>
         </div>
      </div>
   </body>
</html>
