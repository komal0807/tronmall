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
<link rel="stylesheet" href="../assets/css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Brozers Mall">
<meta name="keywords" content="Brozers Mall" />
<style>
h3{ font-weight:normal; font-size:14px;}


    .btn { background-image: linear-gradient(
#29B6F6, 
#29B6F6);
    border-radius: 5px 5px 5px 5px;
    border: 0.5px solid white;
    color: white;
    transition: 0.5s;
    
}
    
    

</style>
</head>

<body>
<?php
include("../include/connection.php");
$userid=$_SESSION['frontuserid'];
?>


<?php

if(isset($_POST['rechargeNow'])){
    
  $userid =   $_SESSION['frontuserid'];
  $amount  = $_POST['userammount'];
  $mobile   = $_POST['mobile '];
  $txn  = $_POST['txn'];
  $paymentMethod  = $_POST['paymentMethod'];
  $status = 2;
  $createdate = date("Y h:i:s");
  
  
 // echo $userid."<br>".$amount."<br>".$mobile."<br>".$txn."<br>".$paymentMethod."<br>".$status."<br>".$createdate;
  
  $sqlinsert =  mysqli_query($con,"INSERT INTO `tbl_recharge` (userid, amount,status,createdate,mobile,txn,paymentMethod ) VALUES ('$userid','$amount','$status','$createdate','$mobile','$txn','$paymentMethod')" );
  
  if($sqlinsert){
      echo '<script>alert("Recharge Request Sent")</script>';
  }else{
      echo '<script>alert("Please try after some time !!")</script>';
  }
        
  
     
};


?>





<!-- App Header -->
<div class="appHeader1">
<div class="left">
            <a href="#" onClick="goBack();" class="icon goBack">
                <i class="icon ion-md-arrow-back"></i>
            </a>
            <div class="pageTitle">Recharge</div>
        </div>
 
</div>
<!-- * App Header --> 
<!-- App Capsule -->
<div id="appCapsule">
  <div class="appContent1">
<h3 class="text-center m-2">Balance: <span>₹ <?php echo number_format(wallet($con,'amount',$userid), 2);?></span></h3>
    <form action="" id="" method="post" class="card-body" autocomplete="off">
      <div class="inner-addon left-addon">
      
        <input type="number" id="userammount" name="userammount" class="form-control" placeholder="Enter recharge amount" onKeyPress="return isNumber(event)" >
      </div>
      <div class="inner-addon left-addon">
      
        <input type="text" id="txn" name="txn" class="form-control" placeholder="Enter TXN Number" >
      </div>
      <div class="inner-addon left-addon">
      
        <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Enter Registered Mobile Number" >
      </div>
      <div class="inner-addon left-addon">
     
        <input type="text" id="paymentMethod" name="paymentMethod" class="form-control" placeholder="Payment Method : Eg: Paytm" >
      </div>
            <div>
        <p style="color: red; font-size:11px;" ><strong>Note:</strong> <br>
        1.Minimmum Recharge = 300 Rs 
        <br>

  2. If any one  not add Rechrge amount in wallet contact our customer service 
      
      <a class="badge badge-danger" href="#">Recharge Support</a>
        </p>

    <div class="text-center mt-3">
        <button type="submit" name = "rechargeNow" class="btn btn-primary" style="width:264px;">Recharge </button>
        </div>
        
       </div>
    </form>
  </div>
</div>

<div class="container d-flex justify-content-center"><a href="rechargehistory.php" class"badge bg-info"> Recharge Record</a>
</div>


<!-- appCapsule -->

<?php include("../include/footer.php");?>
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
<script src="../assets/js/lib/jquery-3.4.1.min.js"></script> 
<!-- Bootstrap--> 
<script src="../assets/js/lib/popper.min.js"></script> 
<script src="../assets/js/lib/bootstrap.min.js"></script> 
<!-- Owl Carousel --> 
<script src="../assets/js/plugins/owl.carousel.min.js"></script> 
<!-- Main Js File --> 
<script src="../assets/js/app.js"></script>
<script src="../assets/js/jquery.validate.min.js"></script>
<script src="../assets/js/payment.js.php"></script>

</body>
</html>