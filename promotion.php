<?php 
ob_start();
session_start();
include("include/connection.php");
// print_r($_SESSION); die;
if($_SESSION['frontuserid']=="")
{header("location:login.php");exit();}
    // $id = $_SESSION['frontuserid'];
    // $query = "select amount from `tbl_bonus` where userid = '".$id."' ";
    // $run = mysqli_query($con, $query);
    // $rows = mysqli_fetch_array($run);
    // print_r($rows); die;
    
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php include('head.php'); ?>
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<style>
  body {
  -ms-user-select:text;
  user-select:text;
  -moz-user-select:text;
  -webkit-user-select:text
}

.btn-copy {
margin-left: 8px;
display: inline-block;
background: #009688;
color: #fff;
padding: 8px;
font-size: 12px;
border-radius: 4px;
cursor: pointer;
float: left;
}


.card {
    border: 1px solid #E5E9F2;
    border-radius: 3px;
    padding: 0px;
}
.card .card-title {
    margin-bottom: 7px;
}
h3{ font-weight:normal; font-size:20px;}
h4{ font-weight:normal; font-size:18px; color:#858585;}
.card-body{ padding:.6rem;}
td{ padding:3px;}
.btn-sm {
    height: 26px;
    padding: 0px 12px;
}
.form-control{box-shadow:none; border-bottom:#ccc solid 1px; margin-bottom:3px;}
#alert h4{font-size: 1rem; font-weight:bold; color:#333;}
#alert p{font-size: 13px; margin-top:20px;}
#alert .modal-content{border-radius:3px}
#alert .modal-dialog{padding:20px; margin-top:130px;}

label{ color:#999;}
#bonus .modal-dialog{margin-top:100px;}
#bonus .modal-footer{ border:none;}
.dropdown-menu{ background:#fff;top: -15px;
left: -145px; border:none;
border-radius:0px;
-webkit-box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);
box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);}
.appHeader1 .right{right:20px;}
.dropdown-item {
    padding: .75rem 1.5rem;
}

.social .fbtn {
    width: 50px;
    display: inline-block;
    color: #fff;
    text-align: center;
    line-height:18px;
    float: left;
}
.social .fa{padding:15px 0px}
.facebook {
    background-color: #3b5998;
}

.whatsapp {
    background-color: #25D366;
}
 
.gplus {
    background-color: #dd4b39;
}
 
.twitter {
    background-color: #55acee;
}
 
.stumbleupon {
    background-color: #eb4924;
}
 
.pinterest {
    background-color: #cc2127;
}
 
.linkedin {
    background-color: #0077b5;
}
 
.buffer {
    background-color: #323b43;
}

.share-button.sharer {
  height: 20px;
  padding: 100px;
}
.share-button.sharer .social.active.top {
  transform: scale(1) translateY(-10px);
}
.share-button.sharer .social.active {
  opacity: 1;
  transition: all 0.4s ease 0s;
  visibility: visible;
}
.share-button.sharer .social.networks-5 {

}
.share-button.sharer .social.top {
  margin-top: -80px;
  transform-origin: 0 0 0;
}
.share-button.sharer .social {
  margin-left: -65px;
  opacity: 0;
  transition: all 0.4s ease 0s;
  visibility: hidden;
}
</style>
</head>

<body>
<?php
// include("include/connection_1.php");
$userid=$_SESSION['frontuserid'];
?>

<!-- App Header -->
<div class="appHeader1">
  <div class="left"> <a href="#" onClick="goBack();" class="icon goBack"> <i class="icon ion-md-arrow-back"></i> </a>
    <div class="pageTitle">Promotion</div>
  </div>
  
  <div class="right"> 
  <div class="dropdown">
  <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size:20px;">
    <i class="icon ion-md-list"></i></a>
  

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="promotionrecord.php">Promotion Record</a>
    <a class="dropdown-item" href="bonusrecord.php">Bonus Record</a>
    <!--<a class="dropdown-item" href="promotionApplyrecord.php">Apply Record</a>-->
  </div>
</div>
  </div>
</div>
<!-- searchBox --> 

<!-- * searchBox --> 
<!-- * App Header --> 

<!-- App Capsule -->
<div id="appCapsule" class="pb-2">
  <div class="appContent1 pb-5">
   
  <?php 
  $userwallet=mysqli_query($con,"select sum(level1) as level1, sum(level2) as level2, sum(level3) as level3 from `tbl_bonus` where `userid`='".$_SESSION['frontuserid']."'");
      $userwal=mysqli_fetch_assoc($userwallet);
  ?>
  <h3 class="text-center m-2">Bonus: <span>₹ <span id="bms"> <?php echo($userwal['level1']+$userwal['level2']+$userwal['level3']);?></span></span></h3>
  <!--<div class="text-center mb-2">-->
  <!--<a data-toggle="modal" href="#bonus" data-backdrop="static" data-keyboard="false" class="btn btn-primary" style="width:160px; height:36px;">Apply to Balance</a>-->
  <!--</div>-->
     
      <ul class="nav nav-tabs size2" id="myTab3" role="tablist">
        <li class="nav-item" style="width: 33.33%  ;"> 
<a class="nav-link active" id="home-tab3" data-toggle="tab" href="#level1" role="tab">Level 1</a> 
        </li>
        <li class="nav-item"  style="width: 33.33%  ;"> 
<a class="nav-link" id="profile-tab3" data-toggle="tab" href="#level2" role="tab">Level 2</a>
         </li>
           </li>
      <li class="nav-item"  style="width: 33.33%  ;">
          <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#level3" role="tab">Level 3</a>
        </li>
        
      </ul>
   
   
      <div class="mt-1">
      <div class="tab-content" id="myTabContent">
      
        <div class="tab-pane fade active show" id="level1" role="tabpanel">
        <div class="row">
        <div class="col-6">
        <div class="mb-3">
                <div class="text-center">
                    <h4><em>Total People</em> </h4>
                    <h3>
                    <?php
    @$userid=$_SESSION['frontuserid'];
      $user=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
      
      
    $userRows=mysqli_num_rows($user);
    $userResult=mysqli_fetch_array($user);
    $owncode=$userResult['owncode'];
    $userlevel1=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode."' order by id asc");
    $userlevel1Rows=mysqli_num_rows($userlevel1);
    echo $userlevel1Rows;
    
    ?>
</h3>
                </div>
            </div>
        </div> 
        <div class="col-6">
        <div class="mb-3">
                <div class="text-center">
                    <h4><em>Contribution</em> </h4>
                    <h3>₹ <?php echo $userwal['level1'];?></h3>
                </div>
            </div>
        </div>   
        </div>
        </div>
       <!--=========================tab-1 end========================================-->
        <!--=========================tab-3========================================-->
          <div class="tab-pane fade" id="level3" role="tabpanel">
            <div class="row">
              <div class="col-6">
                <div class="mb-3">
                  <div class="text-center">
                    <h4><em>Total People</em> </h4>
                    <h3>
                      <?php
                      @$userid = $_SESSION['frontuserid'];
                      $user2 = mysqli_query($con, "select * from `tbl_user` where `id`='" . $userid . "'");
                      $userRows2 = mysqli_num_rows($user2);
                      $userResult2 = mysqli_fetch_array($user2);
                      $owncode2 = $userResult2['owncode'];
                      $userlevel2 = mysqli_query($con, "select * from `tbl_user` where `code`='" . $owncode2 . "' order by id asc");
                      $i = 0;
                      $userleve21Rows = mysqli_num_rows($userlevel2);
                      if ($userleve21Rows != '') {
                        while ($userlevel2Result = mysqli_fetch_array($userlevel2)) {
                          $lvl2user = mysqli_query($con, "select * from `tbl_user` where `code`='" . $userlevel2Result['owncode'] . "'");
              
                  $userleve21Rows22 = mysqli_num_rows($lvl2user);
                if ($userleve21Rows22 != '') {
                while ($userlevel2Result11 = mysqli_fetch_array($lvl2user)) {
                  $lvl2user11 = mysqli_query($con, "select * from `tbl_user` where `code`='" . $userlevel2Result11['owncode'] . "'");  
              
                  $level2Arr = [];
                  while ($userlvl2Result = mysqli_fetch_array($lvl2user11)) {
                  $i++;
                  }
                }
                echo $i;
                }
                else{
                  echo '0';
                }           
              
                        }
                        
                      } else {
                        echo '0';
                      }
                      ?>

                    </h3>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <div class="text-center">
                    <h4><em>Contribution</em> </h4>
                    <h3>₹ <?php echo $userwal['level3']; ?></h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
       <!--=========================tab-2========================================-->
        <div class="tab-pane fade" id="level2" role="tabpanel">
<div class="row">
        <div class="col-6">
        <div class="mb-3">
                <div class="text-center">
                    <h4><em>Total People</em> </h4>
                    <h3>
 <?php
        @$userid=$_SESSION['frontuserid'];
        $user2=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
        $userRows2=mysqli_num_rows($user2);
        $userResult2=mysqli_fetch_array($user2);
        $owncode2=$userResult2['owncode'];
        $userlevel2=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode2."' order by id asc");
        $i = 0;
        $userleve21Rows=mysqli_num_rows($userlevel2);
        if($userleve21Rows!=''){
          while($userlevel2Result=mysqli_fetch_array($userlevel2)){
        $lvl2user=mysqli_query($con,"select * from `tbl_user` where `code`='".$userlevel2Result['owncode']."'");
        $level2Arr = [];
        while($userlvl2Result = mysqli_fetch_array($lvl2user)){
            $i++;
        }
        
    }
        echo $i;
        }else{
            echo '0';
        }
    ?>
                    
                    </h3>
                </div>
            </div>
        </div> 
        <div class="col-6">
        <div class="mb-3">
                <div class="text-center">
                    <h4><em>Contribution</em> </h4>
                    <h3>₹ <?php echo $userwal['level2'];?></h3>
                </div>
            </div>
        </div>   
        </div>
        </div>

        </div>
      </div>
      <div class="mt-1">
      <div class="mt-3 border-bottom">
<label>My Promotion Code</label>
<p><strong><?php echo user($con,'owncode',$userid);?></strong></p>
</div>
        <div class="mt-3 border-bottom">
<!--<label>Long press to share or copy download app link</label>-->
<p><strong style="color:black;">https://tronmall.in/login/singup.php?code=<?php echo user($con,'owncode',$userid);?></strong></p>
</div><br>

<!-- 31-10-22  -->
<input type="tel" value="https://tronmall.in/login/singup.php?code=<?php echo user($con,'owncode',$userid);?>" style="display: none;" id="copyRefferalCode">
<!-- <button class="btn-copy" style="text-align: center;color: white;border: none;width: 160px;font-size:16px" onclick="copyRefferalCode()">Copy</button><p id="appendCode"></p> -->
<div class="share-button sharer" style="display: block;">
<button type="button" class="btn-copy share-btn">Copy</button>
<div class="social top center networks-5 ">
 <!-- Facebook Share Button -->
 <a href="https://wa.me"  data-action="share/whatsapp/share"  
        target="_blank" id="share-wa" class="fbtn share whatsapp"><i class="fa fa-whatsapp"></i></a>
    <a class="fbtn share facebook" href="https://www.facebook.com/sharer/sharer.php?u=https://tronmall.in/login/singup.php?=<?php echo user($con,'owncode',$userid);?>"><i class="fa fa-facebook"></i></a> 
    <!-- Google Plus Share Button -->
    <a class="fbtn share gplus" href="https://plus.google.com/share?url=https://tronmall.in/login/singup.php?=<?php echo user($con,'owncode',$userid);?>"><i class="fa fa-google-plus"></i></a> 
    <!-- Twitter Share Button -->
    <a class="fbtn share twitter" href="https://twitter.com/intent/tweet?text=title&amp;url=https://tronmall.in/login/singup.php?=<?php echo user($con,'owncode',$userid);?>&amp;via=creativedevs"><i class="fa fa-twitter"></i></a> 
       <!-- Pinterest Share Button -->
    <a class="fbtn share pinterest" href="https://pinterest.com/pin/create/button/?url=https://tronmall.in/login/singup.php?=<?php echo user($con,'owncode',$userid);?>&amp;description=data&amp;media=image"><i class="fa fa-pinterest"></i></a>
 
    <!-- LinkedIn Share Button -->
    <a class="fbtn share linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://tronmall.in/login/singup.php?=<?php echo user($con,'owncode',$userid);?>&amp;title=title&amp;source=url/"><i class="fa fa-linkedin"></i></a>
 </a>
</div>
</div>
<!-- 32-10-22 -->

<!-- <a class="btn-copy" data-clipboard-text="https:/DHB Royal.in/singup.php?code=<?php echo user($con,'owncode',$userid);?>" style="text-align: center;color: white;width: 160px;font-size:16px">Copy</a> -->
<!--<div class="mt-3">
<label>My Promotion Link</label>
<p>Test</p>
</div>-->
      </div>
  </div>
</div>
<!-- appCapsule -->

<?php include("include/footer.php");?>
<div id="bonus" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header paymentheader" id="paymenttitle"> 
      <h4 class="modal-title text-dark">Apply to Balance</h4>
       </div>
 <form action="#" method="post" id="bonusForm" autocomplete="off">
      <div class="modal-body mt-1" id="loadform">
      <div class="row">
                    <div class="col-12">
<div class="inner-addon left-addon mt-3">
      <i class="icon"><i class="fa fa-rupee"></i></i>
        <input type="number" id="bonusammount" name="bonusammount" class="form-control" placeholder="Bonus" onKeyPress="return isNumber(event)" >
      </div>                   
<input type="hidden" name="userid" id="userid" class="form-control" value="<?php echo $userid;?>">
<input type="hidden" name="action" id="action" class="form-control" value="bonus">
      
                    </div>
                </div>
      </div>
      <input type="hidden" name="tab" id="tab" value="parity">
      <div class="modal-footer"> 
   <a type="button" class="pull-left btn btn-sm closebtn" data-dismiss="modal">CANCEL</a>
<button type="submit" class="pull-left btn btn-sm btn-white text-info">CONFIRM</button> 
      </div>
      </form>
    </div>
  </div>
</div>

<div id="alert" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body" id="alertmessage"> </div>
      <div class="text-center pb-1">
    <a type="button" class="text-info" data-dismiss="modal">OK</a>
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
<script src="assets/js/bonus.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>

<script>
    new ClipboardJS('.btn-copy');


    // 31-10-22 
    function copyRefferalCode()
    {
        // Get the text field
        var copyText = document.getElementById("copyRefferalCode");
alert(copyText)
        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

         // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        // Alert the copied text
        
        $("#appendCode").append("<b style='margin-left:15px'>Copied the code</b>");
        setTimeout(function() {
          document.getElementById("appendCode").style.display = "none";
        }, 3000);
    }

    $( document ).ready(function() {
  //custom button for homepage
     $( ".share-btn" ).click(function(e) {
      var copyText = document.getElementById("copyRefferalCode");
      // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

         // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);
       $('.networks-5').not($(this).next( ".networks-5" )).each(function(){
          $(this).removeClass("active");
       });
     
            $(this).next( ".networks-5" ).toggleClass( "active" );
    });   
});
  </script>

</body>
</html>