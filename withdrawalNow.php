<?php 
ob_start();
session_start();
include("include/connection.php");

@$userid=$_POST['userid'];
@$userammount=$_POST['userammount'];
@$optionsname=$_POST['optionsname'];
@$acid=$_POST['acid'];
@$walletbalance=wallet($con,'amount',$userid);
@$action=$_POST['action'];
$today = date("Y-m-d H:i:s");

if($action=="withdrawal")
{
	/*
	$checkMinRecharge = mysqli_query("SELECT * FROM tbl_recharge where userid = $userid ");
	 $rup11 = mysqli_fetch_array($checkMinRecharge);
	 */
	$sqlqry1 =  "SELECT * FROM tbl_recharge where userid = '$userid' AND status = 1 ";
    $response1 = mysqli_query($con, $sqlqry1);
    $users1 = mysqli_fetch_assoc($response1);
    $sqlqry111 =  "SELECT * FROM tbl_rechargetemp where userid = '$userid' ";
    $response111 = mysqli_query($con, $sqlqry111);
    $users111 = mysqli_fetch_assoc($response111);
	$tempamount=$users111['amount'];
	
            if($walletbalance>=$userammount && $users1['status'] == 1)
            { 
            $chkbankdetailQuery=mysqli_query($con,"select * from `tbl_bankdetail` where `userid`='".$userid."'");
            $bankdetailRows=mysqli_num_rows($chkbankdetailQuery);
            if($bankdetailRows!='')
            {
            $chkwalletstatus=wallet($con,'envelopestatus',$userid);
            //if(3==1){ echo"4";}else{
            //$newamt = $userammount-$_POST['userammount']/100*5;
            $withdrawalsql= mysqli_query($con,"INSERT INTO `tbl_withdrawal`(`userid`,`amount`,`payout`,`payid`,`status`,`createdate`) VALUES ('".$userid."','".$userammount."','".$optionsname."','".$acid."','1','".$today."')");
            $withdrawalid=mysqli_insert_id($con);
            $sql= mysqli_query($con,"INSERT INTO `tbl_order`(`userid`,`transactionid`,`amount`,`status`) VALUES ('".$userid."','withdraw','".$userammount."','1')");
            @$orderid=mysqli_insert_id($con);
            
            $actiontype="withdraw~".$withdrawalid;
            $sql3= mysqli_query($con,"INSERT INTO `tbl_walletsummery`(`userid`,`orderid`,`amount`,`type`,`actiontype`) VALUES ('".$userid."','".$orderid."','".$userammount."','debit','$actiontype')");
            
            $walletbalance=wallet($con,'amount',$userid);	
            $finalbalanceCredit=$walletbalance-$userammount;	
            $sqlwallet= mysqli_query($con,"UPDATE `tbl_wallet` SET `amount` = '$finalbalanceCredit' WHERE `userid`= '$userid'");	
            echo"1";	
            //}
            	}
            
            	
            else{echo"2";}//bank detail chk
            }
             else if($walletbalance>=$userammount && $users1['status'] == 0){
             echo "77";
            }
            else if(($walletbalance+$tempamount)>=$userammount){
                echo "66";
            }

else{echo"3";}
	
	
	
	
}
?>

