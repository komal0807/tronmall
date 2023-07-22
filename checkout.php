<?php 
ob_start();

session_start();
$key="CRSyPq";
$salt="A317bi9cZ7PcTQfKEPwAmMS8TLfMeUn2";

$action = 'https://secure.payu.in/_payment';

$html='';
include("include/connection.php");
$user_id= $_SESSION['frontuserid'];

?>



<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="stylesheet" href="assets/css/style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="description" content="Bitter Mobile Template">
  <meta name="keywords" content="bootstrap, mobile template, bootstrap 4, mobile, html, responsive" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <style>
.appHeader1 {
	background-color: #f44336 !important;
	border-color: #f44336 !important;
}
.card {
	border-radius:0px;
	padding:10px !important;
}
h3 {
	font-weight:normal;
	font-size:18px;
}
.razorpay-payment-button {
	padding: 10px 50px;
	color: #fff;
	background: #ff2e17;
	font-weight: 600;
	font-size: 14px;
	border: 1px solid #ff2e17;
	text-transform:uppercase;
}
.razorpay-payment-button:hover {
	color: #fff;
	background-color: #f33076;
	border-color: #f2246e;
	cursor:pointer;
}

.btn{ background-color: blue;
}
</style>
  
  </head>

  <body>
  

  <!-- App Header -->
  <div class="appHeader1">
    <div class="left"> <a href="#" onClick="goBack()" class="icon goBack"> <i class="icon ion-md-arrow-back"></i> </a>
      <div class="pageTitle">Pay Now</div>
    </div>
  </div>

    <?php include'head.php' ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <br>
    <div class="conntainer-fluid col-md-12 d-flex justify-content-center">
	<div class="card col-md-9 shadow">
	<div id="appCapsule">
    <div class="appContent">
      <div class="sectionTitle3"> 
        
        <!-- post list -->
        <div class="">
          <div class="row"> 
            <!-- item -->
            <div class="col-12 pright">
              <div class="vcard card mt-5">
                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th colspan="2" style="text-align:center; font-size:18px; border-top:none;">Payment Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Name </td>
                      <td><?php echo $_SESSION['name'];?></td>
                    </tr>
                    <tr>
                      <td>Mobile </td>
                      <td><?php echo $_SESSION['mobile'];?></td>
                    </tr>
                    <tr>
                      <td>Email Id</td>
                      <td><?php echo $_SESSION['email'];?></td>
                    </tr>
                    <tr>
                      <td>Payable Amount </td>
                      <td>₹ <?php echo number_format($_SESSION['finalamount'],2);?></td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
	
		<div>
			
		</div>
			
		  <div class="form-group">

			<form action="" class="form-control"  id="payment_form" method="post">
			
		
			<input type="hidden" class="form-control"  id="udf5" name="udf5" value="PayUBiz_PHP7_Kit" />					
    
		
				<input type="hidden" class="form-control"  id="ORDER_ID" name="txnid" placeholder="Transaction ID" value="<?php echo  "Txn" . rand(10000,99999999)?>" />
			
				<input type="hidden" class="form-control"  id="amount" name="amount" placeholder="Amount" value="<?php echo number_format($_SESSION['finalamount'],2, '.', '');?>" readonly />
				
				<input type="hidden" class="form-control"  id="productinfo" name="productinfo" placeholder="Product Info" value="<?php echo $_SESSION['frontuserid']; ?>" />
				
				<input type="hidden" class="form-control"  id="firstname" name="firstname" placeholder="First Name" value="<?php echo $_SESSION['name']; ?>" />
				<input type="hidden" class="form-control"  id="user_id" name="user_id" placeholder="user_id" value="<?php echo $user_id;?>" />
    
				<input type="hidden" class="form-control"  id="Zipcode" name="Zipcode" placeholder="Zip Code" value="" />
		
    
			
			    <input type="hidden" name="surl" value="https://cashontree.in/payment-success.php" />
				
				<input type="hidden" class="form-control"  id="email" name="email" placeholder="Email ID" value="<?php echo $_SESSION['email'];?>" readonly />
				
				
				<input type="hidden" class="form-control"  id="phone" name="phone" placeholder="Mobile/Cell Number" value="<?php echo $_SESSION['mobile'];?>" readonly />	
				
		<input type="hidden" class="form-control"  id="address1" name="address1" placeholder="Address1" value="" /> 
							
				<input class="form-control"  type="hidden" id="address2" name="address2" placeholder="Address2" value="" />
				<input class="form-control"  type="hidden" id="city" name="city" placeholder="City" value="" />
				<input type="hidden" class="form-control"  id="state" name="state" placeholder="State" value="" />
				 <input type="hidden" class="form-control"  id="country" name="country" placeholder="Country" value="" />
				<input type="hidden" class="form-control"  id="Pg" name="Pg" placeholder="PG" value="upi" /> 
			
    
			 <input class="form-control bg-danger text-light" tyle="text-align: center; font-size: 70px;" type="button" id="btnsubmit" name="btnsubmit" value="Pay Now ₹ <?php echo number_format($_SESSION['finalamount'],2);?>" onclick="pay_now()" />
			</form>
		
		
		
		<?php if($html) echo $html; //submit request to PayUBiz  ?>
			</div> 

		
	</div> 
	<script type="text/javascript">		
		<!--
		function pay_now(){
        var name=jQuery('#firstname').val();
        var email=jQuery('#email').val();
        var phone=jQuery('#phone').val();
        var amount=jQuery('#amount').val();
        var user_id=jQuery('#user_id').val();
         jQuery.ajax({
               type:'post',
               url:'payment_process.php',
               data:"amt="+amount+"&name="+name+"&email="+email+"&phone="+phone+"&user_id="+user_id,
               success:function(result){           
                   var options = {
                        "key": "rzp_test_K5OU5M6THwmcOk", 
                        "amount": amount*100, 
                        "currency": "INR",
                        "name": name,
                        "email":email,
                        "description": "Test Transaction",
                        "image": "https://cdn.dribbble.com/users/60166/screenshots/15010083/sunset_sunrise_1_4x.jpg",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_process.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                alert('Payment Done Successfully!!');
                                   window.location.href="myaccount.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
		
	</script>

 
</body>
</html>