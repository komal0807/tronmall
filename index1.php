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
<link rel="stylesheet" href="assets/css/style.css?v=2">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="DHB Royal">
<meta name="keywords" content="bootstrap, mobile template, bootstrap 4, mobile, html, responsive" />

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>


<style>
.pleft {
	padding-left:3px;
}
.pright {
	padding-right:3px;
}
  .height{ height:40px; line-height:40px;}
.height .pageTitle{ line-height:2em;}

</style>
</script>
</head>

<body>
<?php include("include/connection.php");?>

<a href="assets/dhb.apk">
<div class="appHeader1 height" style="background-color: #009688;">
  <div class="text-center"> 
    <div class="pageTitle"><i class="icon ion-md-download right"></i> Open With An App</div>
  </div>
</div>
</a>
<div class="appHeader">
  <div class="pageTitle"> 
    <h2 style="color: #009688; font-size: px; font-family: vijaya ;">
    <marquee>
      Welcome to DHB Royal     </marquee>
  </h2></div>
</div>


<!-- App Capsule -->
<div id="appCapsule"> 
  <!-- Card Overlay Carousel -->
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="assets/img/img1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/img2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/img3.jpg" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/img4.jpg" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/img5.jpg" alt="Third slide">
    </div>
  </div>
</div>
  <!-- * Card Overlay Carousel -->
  
  <div class="appContent">
    <div class="mb-2"> 
      
      <!-- post list -->
      <div class="vcard">
        <div class="row"> 
          <!-- item -->
          <?php
	$i=0;
  $productQuery=mysqli_query($con,"select * from `tbl_product` where `status`='1'");
  while($productResult=mysqli_fetch_array($productQuery)){$i++;?>
          <div class="col-6 <?php if(($i%2)==0){echo"pleft";}else{echo "pright";}?>">
            <div class="vcard card"> <a href="productdetails.php?pid=<?php echo encryptor('encrypt', $productResult['id']); ?>" class="postItem">
              <div class="imageWrapper"> <img src="<?php echo $productResult['images'];?>" alt="image" class="image"> </div>
              <p class="text-center"><?php echo $productResult['name'];?></p>
              <footer>₹ <?php echo number_format($productResult['price'], 2);?></footer>
              </a> </div>
          </div>
          <?php }?>
          <!-- * item --> 
          <!-- item -->
          
        </div>
      </div>
      <!-- * post list -->
      
      <div class="p-3"></div>
      
      <!-- * listview --> 
      
    </div>
    
    <!-- app Footer --> 
    
    <!-- * app Footer --> 
    
  </div>
</div>
<!-- * appCapsule -->

<?php include("include/footer.php");?>

<!-- ///////////// Js Files ////////////////////  --> 
<!-- Jquery --> 
<script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
<!-- Bootstrap--> 
<script src="assets/js/lib/popper.min.js"></script> 
<script src="assets/js/lib/bootstrap.min.js"></script> 
<!-- Owl Carousel --> 
<script src="assets/js/plugins/owl.carousel.min.js"></script> 
<!-- Main Js File --> 
<script src="assets/js/app.js"></script>
</body>
</html>