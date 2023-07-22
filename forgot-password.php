<?php
ob_start();
session_start();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php include'head.php' ?>
<link rel="stylesheet" href="assets/css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Bitter Mobile Template">
<meta name="keywords" content="bootstrap, mobile template, bootstrap 4, mobile, html, responsive" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<style>
#alert .modal-dialog{padding:20px; margin-top:130px;}
#registertoast .modal-dialog{padding:0px; margin-top:130px;}

</style>
</head>

<body style="font-family: 'Poppins', sans-serif;">

<!-- Page loading -->
<div class="loading" id="loading">
  <div class="spinner-grow"></div>
</div>
<!-- * Page loading --> 

<!-- App Header -->
<div class="bg-primary pb-2 pt-2">
  <!-- <div class="left"> <a href="login.php" class="icon goBack"> <i class="icon ion-md-arrow-back"></i> </a> -->
    <div class="text-white fs-5 text-center">Reset Password</div>
  </div>
</div>
<!-- searchBox --> 

<!-- * searchBox --> 
<!-- * App Header --> 

<!-- App Capsule -->
<div class="container">
<div id="appCapsule" class="mt-5 pt-5">
  <div class="appContent1 pt-5 pt-5">
    <h4 class="text-center fw-normal mb-5"></h3>
    <form action="#" id="forgotform">
    <label for="exampleInputEmail1" class="form-label">Phone Number</label>
      <div class=" input-group">
      <span class="input-group-text" id="basic-addon1"><i class="bi bi-phone"></i></span>
        <input type="tel" class="form-control" placeholder="Enter phone" id="fmobile" name="fmobile" onKeyPress="return isNumber(event)">
        <input type="hidden" name="type" id="type" value="chkmobile">
      </div>
      <div class="text-center mt-3 me-3">
        <button type="submit" class="btn btn-primary btn-block" > Continue </button>
      </div>
    </form>
  </div>
</div>

<!-- appCapsule -->

<?php include("include/footer.php");?>
  <div id="otpform" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content ">
      <div class="modal-body">
    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
       <p><strong>Plese Enter OTP</strong></p>
        <div class="pt-2">
   <form action="#" method="post" id="otpsubmitForm">
  <input type="tel" id="otp" name="otp" class="form-control" placeholder="Enter OTP" onKeyPress="return isNumber(event)" >
     <input type="hidden" id="userid" name="userid" value="">
      <input type="hidden" name="type" id="type" value="otpval">
      <div class="text-center mt-3">
        <button type="submit" class="btn btn-primary" style="width:264px;"> Submit OTP </button>
        </div>
        </form>          
        </div>
      </div>
    </div>
  </div>
</div>
<div id="registertoast" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content ">
      <div class="modal-body">
    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
       <span aria-hidden="true">×</span></button>
        <div class="text-center" id="regtoast">          
        </div>
      </div>
    </div>
  </div>
</div>
<div id="alert" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body" id="alertmessage"> </div>
      <div class="text-center pb-1">
    <a type="button" class="text-info" data-bs-dismiss="modal">OK</a>
    </div> 
    </div>
  </div>
</div>
</div>

<!-- Jquery --> 
<script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
<!-- Bootstrap--> 
<script src="assets/js/lib/popper.min.js"></script> 
<script src="assets/js/lib/bootstrap.min.js"></script> 
<!-- Owl Carousel --> 
<script src="assets/js/plugins/owl.carousel.min.js"></script> 
<!-- Main Js File --> 
<script src="assets/js/app.js"></script>
  <script src="assets/js/jquery.validate.min.js"></script>
  <script src="assets/js/forgot-password.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>