<?php 
ob_start();
session_start();
if($_SESSION['frontuserid']=="")
{header("location:login.php");exit();}?>

<?php
include("include/connection.php");
$userid=$_SESSION['frontuserid'];

$sqlget = mysqli_query($con,"SELECT * FROM tbl_user WHERE id  =  $userid");
$sqlgetresult =mysqli_fetch_array($sqlget);
$mobilenew =    $sqlgetresult['mobile'] ;


if(isset($_POST['rechargeNow'])){
    
  $userid =   $_SESSION['frontuserid'];
  
  
   /*$GLOBALS["userRechammount"]  = $_POST['userRechammount'];
   $GLOBALS["mobile"]   = $_POST['mobile'];*/
  /*$mobile  = $_POST['mobile'];
  $amount = $_POST['userammount'];*/
  
  $_SESSION['userRechammount'] = $_POST['userRechammount'];
  //$_SESSION['mobile'] = $_POST['mobile'];
  
 // $utr_id =   $_POST['channel_order'];
 $utr_id = 121;
  $status = 2;
  $createdate = date("Y h:i:s");
  $paymentMethod = 'manual';
  $amount =   500 ;
  
    $sqlinsert =  mysqli_query($con,"INSERT INTO `tbl_recharge` (userid, amount,status,createdate,mobile,txn,paymentMethod ) VALUES ('$userid','$amount','$status','$createdate','$mobilenew','$utr_id','$paymentMetho)");
  
  if($sqlinsert){
      echo '<script>alert("Recharge Request Sent")</script>';
    
  }else{
      echo '<script>alert("Please try after some time !!")</script>';
  }
  
}

   // $GLOBALS["userRechammount"] ;

///exit();

/*
if(isset($_POST['submitRecharge'])){
    
    //include("include/connection.php");
    
  /*  
  $userid =   $_SESSION['frontuserid'];
  $utr_id =   $_POST['channel_order'];
  $status = 2;
  $createdate = date("Y h:i:s");
  $paymentMethod = 'manual';
  $amount =   $_SESSION['userRechammount'] ;
  
  
   //echo $amount ;
   //echo $mobile ;
   //exit();
  
  $sqlinsert =  mysqli_query($con,"INSERT INTO `tbl_recharge` (userid, amount,status,createdate,mobile,txn,paymentMethod ) VALUES ('$userid','$amount','$status','$createdate','$mobilenew','$utr_id','$paymentMetho)");
  
  if($sqlinsert){
      echo '<script>alert("Recharge Request Sent")</script>';
    
  }else{
      echo '<script>alert("Please try after some time !!")</script>';
  }
  
}
//header( "refresh:3;url=gamedashboard.php" );
 // header('Location: gamedashboard.php');

*/

?>