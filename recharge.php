<?php 
ob_start();
session_start();
if($_SESSION['frontuserid']=="")
{header("location:login.php");exit();}?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php include'head.php' ?>
<link rel="stylesheet" href="assets/css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Brozers Mall">
<meta name="keywords" content="Brozers Mall" />
<style>
h3{ font-weight:normal; font-size:14px;}


    .btn { background-image: linear-gradient(
#009688, 
#009688);
    border-radius: 5px 5px 5px 5px;
    border: 0.5px solid white;
    color: white;
    transition: 0.5s;
    
}
    
    

</style>
</head>

<body>
<?php
include("include/connection.php");
$userid=$_SESSION['frontuserid'];

$sqlwall = "SELECT * FROM `tbl_rechargetemp` WHERE `userid`='$userid'";
$reswall = mysqli_query($con, $sqlwall);
$rowwall = mysqli_fetch_assoc($reswall);
$walletbalance = $rowwall['amount'];
?>


<!-- App Header -->
<div class="appHeader1">
<div class="left">
            <a href="#" onClick="goBack();" class="icon goBack">
                <i class="icon ion-md-arrow-back"></i>
            </a>
            <div class="pageTitle">Deposit</div>
        </div>
 
</div>
<!-- * App Header --> 
<!-- App Capsule -->



<div id="appCapsule" >
<div class="appContent1">
<h3 class="text-center m-2">Balance: <span>₹ <?php echo number_format((wallet($con,'amount',$userid)+$walletbalance), 2);?></span></h3>
<form action="#" id="paymentForm" method="post" class="card-body" autocomplete="off">
      <div class="inner-addon1 left-addon">
      
      <?php
// $con =  @mysqli_connect('localhost', 'mango-1234', 'fghbgvfyfvjh567', 'mango-1234');

      $up1 = mysqli_query($con, "SELECT * FROM `tbl_user` WHERE id = $userid");
      $rup1 = mysqli_fetch_array($up1);
    ?>
         <input type="number" id="userammount" name="userammount" class="form-control" placeholder="Enter Deposit amount" onKeyPress="return isNumber(event)" >
     
      </div>
      
      <div class="inner-addon left-addon">
      
        <input type="hidden" id="mobile" name="mobile" class="form-control" value="<?php echo  $rup1['mobile'] ; ?>" placeholder="<?php  echo $rup1['mobile'] ;?> " >
      </div>
      
      <div class="container" style="padding-top: 25px;">
  <div class="row" >
    <div class="col-4">
      <button type="button" style="color:black;background:white !important" class="btn btn-primary"  value="500" id="rechamt" name="rechamt"  onclick="displayRechargeValue('500')">200</button>
    </div>
    <div class="col-4">
      <button type="button" style="color:black;background:white !important" class="btn btn-primary"  value="1000" id="rechamt" name="rechamt"  onclick="displayRechargeValue('1000')">500</button>
    </div>
    <div class="col-4">
      <button type="button" style="color:black;background:white !important" class="btn btn-primary" value="2000" id="rechamt"  name="rechamt"  onclick="displayRechargeValue('2000')">1000</button>
    </div>
  </div>
  
   <div class="row">
    <div class="col-4">
      <button type="button" style="color:black;background:white !important" class="btn btn-primary" value="3000" id="rechamt"  name="rechamt"  onclick="displayRechargeValue('3000')">2000</button>
    </div>
    <div class="col-4">
      <button type="button" style="color:black;background:white !important" class="btn btn-primary"  value="5000" id="rechamt" name="rechamt"  onclick="displayRechargeValue('5000')">3000</button>
    </div>
    <div class="col-4">
      <button type="button" style="color:black;background:white !important" class="btn btn-primary"  value="10000" id="rechamt" name="rechamt"  onclick="displayRechargeValue('10000')">20000</button>
    </div>
    
  </div >
  <div style="margin-top: 19px;">
  <h3> Payment</h3>
  <div style="margin: 9px;" id="payment">
   <input type="radio" id="online" name="same" value="online">Online <a style="color: red;">Blocked</a><br> 
   <input type="radio" id="ekpay" name="same" value="ekpay">EKpay<br> 
   <input type="radio" id="rozorpay" name="same" value="rozorpay">Razorpay<br> 

</div>     
  </div>
  <p style="margin-top:20px;padding:15px">Tips:Please contact support@dhbroyal.com if you have any questions about the order or payment failure</p>

            <div>

        <button type="submit" name = "rechargeNow" class="btn btn-primary" style="width:264px;">Deposit </button>

        </div>
        
       </div>
    </form>
</div>
  </div>
</div>
<div class="container d-flex "><a href="rechargehistory.php" class="badge bg-info" style="background: #dcd7e9 !important;"> Deposit Record</a>
</div>




<!-- appCapsule -->

<div id="ekpaymoney" class=" fade" role="dialog">
<button type="submit" name = "rechargeNow" class="btn btn-primary" style="width:264px;">Recharge </button>
</div>
<?php include("include/footer.php");?>
<div id="paymentdetail" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-body">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">×</span></button>
       <p>&nbsp;</p>
        <div class="">
        <form action="#" method="post" id="paymentdetailForm">
        <div class="inner-addon left-addon">
      <i class="icon ion-md-person"></i>
  <input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name">
      </div>
      <div class="inner-addon left-addon">
      <i class="icon ion-md-phone-portrait"></i>
        <input type="tel" id="mobile" name="mobile" class="form-control" placeholder="Enter Mobile Number"  value="<?php echo user($con,'mobile',$userid);?>" onKeyPress="return isNumber(event)">
      </div>
      <div class="inner-addon left-addon">
      <i class="icon ion-ios-mail"></i>
   <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email id"  value="<?php echo user($con,'email',$userid);?>">
      </div>
      <input type="hidden" name="finalamount" id="finalamount" value="">
      <input type="hidden" name="action" id="action" value="paydetail">
      <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary" style="width:264px;"> Recharge </button>
        </div>
        </form>          
        </div>
      </div>
    </div>
  </div>
</div>

<?php include("include/footer.php");?>
<div id="paymentdetail" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-body">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">×</span></button>
       <p>&nbsp;</p>
        <div class="">
        <form action="#" method="post" id="paymentdetailForm">
        <div class="inner-addon left-addon">
      <i class="icon ion-md-person"></i>
  <input type="text" id="name" name="name" class="form-control" placeholder="Enter Your Name">
      </div>
      <div class="inner-addon left-addon">
      <i class="icon ion-md-phone-portrait"></i>
        <input type="tel" id="mobile" name="mobile" class="form-control" placeholder="Enter Mobile Number"  value="<?php echo user($con,'mobile',$userid);?>" onKeyPress="return isNumber(event)">
      </div>
      <div class="inner-addon left-addon">
      <i class="icon ion-ios-mail"></i>
   <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email id"  value="<?php echo user($con,'email',$userid);?>">
      </div>
      <input type="hidden" name="finalamount" id="finalamount" value="">
      <input type="hidden" name="action" id="action" value="paydetail">
      <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary" style="width:264px;"> Recharge </button>
        </div>
        </form>          
        </div>
      </div>
    </div>
  </div>
</div>

<script>
        function displayRechargeValue(rechamt) {
           document.getElementById("userammount").value  = rechamt;
        }
    </script>
<script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
<!-- Bootstrap--> 
<script src="assets/js/lib/popper.min.js"></script> 
<script src="assets/js/lib/bootstrap.min.js"></script> 
<!-- Owl Carousel --> 
<script src="assets/js/plugins/owl.carousel.min.js"></script> 
<!-- Main Js File --> 
<script src="assets/js/app.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/payment.js.php"></script>

</body>
</html>