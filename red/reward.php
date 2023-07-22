<?php
ob_start();
include("../include/connection.php");
session_start();
if(isset($_POST['reward'])){
    if($_POST['reward']=='reward'){
        $key= $_POST['key'];
        $mob=$_POST['mob'];
        $queryuser=mysqli_query($con,"select * from tbl_user WHERE mobile='".$mob."'");
        $count=mysqli_num_rows($queryuser);
        if($count==1){
            $userdata=mysqli_fetch_assoc($queryuser);
            $queryuserwallet=mysqli_query($con,"select * from tbl_wallet WHERE userid='".$userdata['id']."'");
            $userdatawallet=mysqli_fetch_assoc($queryuserwallet);
            $queryuserredkey=mysqli_query($con,"select * from tbl_rewardkey WHERE share_key='".$key."'");
            $count1=mysqli_num_rows($queryuserredkey);
            if($count1==1){
                    $userredkey=mysqli_fetch_assoc($queryuserredkey);
                    if($userredkey['strength']>$userredkey['current_strength']){
                        $ispresent=mysqli_query($con,"select * from tbl_userreward WHERE redkey='".$key."' && mobile='".$mob."'");
                        $count2=mysqli_num_rows($ispresent);
                        echo $count2;
                        if($count2==0){
                        $finalbalanceCredit1 = $userdatawallet['amount'] + $userredkey['amount'];
                        $current_user=$userredkey['current_strength']+1;
                         $sqlwallet12 = mysqli_query($con, "UPDATE `tbl_rewardkey` SET `current_strength` = '$current_user' WHERE share_key='".$key."'");
                         $sqlwallet11 = mysqli_query($con, "UPDATE `tbl_wallet` SET `amount` = '$finalbalanceCredit1' WHERE `userid`='".$userdata['id']."'");
                         $sqlinsert=mysqli_query($con,"insert into tbl_userreward (`userid`,`amount`,`mobile`,`redkey`) VALUES ('" . $userdata['id'] . "','" . $userredkey['amount'] . "','" . $mob . "','" . $key . "')");
                         	$_SESSION["errorsing"]="Succesfully rewarded.....";
                         header("location:reward.php?key=".$key);
                         exit();
                        }
                        else{
                         $_SESSION["errorsing"]="Already awarded.....";
                         header("location:reward.php?key=".$key);
                         exit();
                        }
                    }
                    else{
                         $_SESSION["errorsing"]="Finish the reward.....";
                         header("location:reward.php?key=".$key);
                         exit();
                    }
            }
            else{
                $_SESSION["errorsing"]="Expire the link.....";
                header("location:reward.php?key=".$key);
                exit();
            }
        }
        else{
             $_SESSION["errorsing"]="Invalid user.....";
             header("location:reward.php?key=".$key);
             exit();
        }
        
        // header("location:reward.php?key=".$_POST['key']);
        
        
    }
    else{
        $_SESSION["errorsing"]="Invalid link....";
        header("location:reward.php?key=".$_POST['key']);
        exit();
        
    }
}





?>

<!DOCTYPE html><html lang="en"><head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="stylesheet" href="includes/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="includes/assets/css/light.css" />
<link rel="stylesheet" href="includes/dropzone/css/dropzone.css" />
<script type="text/javascript" src="includes/popper/popper.min.js"></script>
<script type="text/javascript" src="includes/jquery/jquery.min.js"></script>
<script type="text/javascript" src="includes/jquery/jquery.cookie.min.js"></script>
<script type="text/javascript" src="includes/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="includes/dropzone/js/dropzone.js"></script>
<script type="text/javascript" src="includes/osqr/qrious.min.js"></script><meta name="msapplication-TileColor" content="#050a30">
<meta name="theme-color" content="#050a30">
<meta name="msapplication-navbutton-color" content="#050a30">
<meta name="apple-mobile-web-app-status-bar-style" content="#050a30">
<title>Gift</title></head>
<style>
.airfrm{
    margin: 0;
    background: #fff;
    border-radius: 5px;
    box-shadow: 0px 4px 7px #9effca;
    border: 1px solid #a1c8b2;
	padding: 10px;
	height: 126px;
    align-content: center;}
</style>
<body>
<section class="container-fluid">
<div class="row mcas">
    <div class="col-md-6 col-lg-4 wms-tf-24 xtc main">
       <div class="row xtl nav-top mrcd">
           <div class="col-12 ddavc">
               <span class="nav-back wt" id="backF" onclick="home()"></span>
               <span class="ml-2 tfw-7 tf-20" id="MoreRCT">Gift</span>
           </div>
       </div>
       <div class="row">
           <div class="col-12">
               <img src="includes/images/lifaf_bg.png" height="196">
           </div>
       </div>
        
        
                  <?php
                    if(isset($_SESSION["errorsing"]))
                    {                      
                    ?>
                    <p style="color: red; text-align: center;}"><?php echo  $_SESSION["errorsing"] ?></p>
                    <?php 
                    }
                    ?>
       <form action="reward.php"  method="post" class="card-body" autocomplete="off" style="padding: 0px;">
            <div class="row airfrm mb-2" >
               <div data-v-309ccc10 class="recharge_box col-12 inpbcx">
                      <span class="xicon">+91</span>
                    <input type="tel" class="xbox" maxlength="10" autocomplete="off" placeholder="Enter mobile number" id="mob" name="mob" value=''>
                    <input type="hidden" id="key" name="key" value='<?php echo $_GET['key']?>'>
              </div>
              <div data-v-309ccc10  class="col-12 pa-0">
                <button data-v-309ccc10 class="login_btn ripple btn-main act openair login_btn ripple" style="width:100%;" name="reward" id="reward" value="reward">Open</button>
              </div>
            </div>
      </form>
   
   
        <div class="row mr-0 tf-12 lfrcd">
            <div class="col-12 pt-2">
                  <span class="seamg mcpl tf-14" onclick="copyGLink()" id="glink">Copy Link</span>
            </div>
           <div  class="col-12 mt-4 mb-2 xtl tf-16 tfw-6 pa-0">
               <span class="brd3PG" id="rcdN">Open Records</span>
           </div>
           <div class="col-12 pa-0" id="boxrc">
                   <?php 
                    
                     $Query=mysqli_query($con,"SELECT * FROM `tbl_userreward` WHERE redkey='".$_GET['key']."' ORDER BY id DESC");
                    $i=0; 
                  while($row=mysqli_fetch_array($Query)){$i++;
                   ?> 
                                <div class="row tfwr tf-14 pt-2 pb-2 bd-t">
                                    <div class="col-6 xtl tfcdb"><?php echo substr($row["mobile"], 0, 4); ?>XXXX<?php echo substr($row["mobile"], -2); ?></div>
                                    <div class="col-6 xtr tfss tfs-org">₹<?php echo @$row["amount"]; ?></div>
                                    <div class="col-6 xtl tfc-sc pt-2 tf-12"><?php echo @$row["time"]; ?> pm</div>
                                </div>
                    <?php }?>
           </div>
        </div>
    </div>
    <div class="row smg">
    </div>
</div>
</section>
<script type="text/javascript" src="lucky/lifafa.js"></script>
</body></html>