<?php
ob_start();
session_start();
include("include/connection.php");
if(isset($_POST['amt']) && isset($_POST['name'])){
    $amt=$_POST['amt'];
    $name=$_POST['name'];
    $user_id=$_POST['user_id'];
    $phone=$_POST['phone'];
    $payment_status="pending";
    $added_on=date('Y-m-d h:i:s');
    mysqli_query($con, "INSERT INTO `tbl_recharge` (userid, amount,status,createdate,mobile,txn,paymentMethod ) VALUES ('$user_id','$amt',2,'$added_on','$phone','','RazorPay')");
    $_SESSION['OID']=mysqli_insert_id($con);

}


if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($con, "update `tbl_recharge` set status='1' ,txn='$payment_id' where id='".$_SESSION['OID']."'");
    $summery=mysqli_query($con, "select * from tbl_recharge where txn='$payment_id'");
    $result=mysqli_fetch_array($summery);
    $userid=$result['userid'];
    $amount=$result['amount'];
    $added_on=date('Y-m-d h:i:s');
          $sql = mysqli_query($con, "INSERT INTO `tbl_order`(`userid`,`transactionid`,`amount`,`status`) VALUES ('" . $userid . "','" . $payment_id . "','" . $amount . "','1')");
          $orderid = mysqli_insert_id($con);    
          $sql3 = mysqli_query($con, "INSERT INTO `tbl_walletsummery`(`userid`,`orderid`,`amount`,`type`,`actiontype`,`createdate`) VALUES ('" . $userid . "','','" . $amount . "','credit','recharge','" . $added_on . "')");
         
          $sqlwall = "SELECT * FROM `tbl_rechargetemp` WHERE `userid`='$userid'";
          $reswall = mysqli_query($con, $sqlwall);
          
          if (mysqli_num_rows($reswall) > 0) {
            
            $rowwall = mysqli_fetch_assoc($reswall);
            $walletbalance = $rowwall['amount'];
            $finalbalanceCredit = $walletbalance + $amount;
    
            $sqlwallet = mysqli_query($con, "UPDATE `tbl_rechargetemp` SET `amount` = '$finalbalanceCredit' WHERE `userid`= '$userid'");
          } else {
           
            $walletbalance = 0;
            $finalbalanceCredit = $walletbalance + $amount;
    
            $sqlwallet = mysqli_query($con, "INSERT INTO `tbl_rechargetemp`(`userid`,`amount`)VALUES('$userid','$finalbalanceCredit')");

            
          }
    
}
?>