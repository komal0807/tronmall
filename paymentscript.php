<?php
$apiKey="";

?>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<form action="paynow.php" method="POST">
  <script
  src="https://checkout.rozorpay.com/v1/checkout.js"
  data-key="<?php echo $apiKey; ?>"
  data-amount="<?php echo $_POST['amount']*100;?>"
  data-currency="INR"
  data-id="<?php echo 'OID'.rand(10,100).'END'; ?>"
  data-buttontext="Pay with Razorpay"
  data-name="Tronmall"
  data-description="Recharge Payment"
  data-image=""
  data-prefill.name="Aruvishal Patel"
  data-theme.color="#F37254"
  ></script>
  <input type="hidden" custom="Hidden Element" name="hidden">
</form>