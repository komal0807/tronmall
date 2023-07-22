<?php 

ob_start();

session_start();

include("include/connection.php");



@$mobile=$_POST['mobile'];

@$email=$_POST['email'];

@$password=$_POST['password'];

@$rcode=$_POST['rcode'];

@$acceptTC=$_POST['remember'];

@$action=$_POST['action'];

$otpmobile=@$_SESSION["signup_mobilematched"];

$otp=$_SESSION["signup_otp"];

$signup_mobile=$_SESSION["signup_mobile"];

$varification=$_POST['varificationcode'];

// echo $otp;

// echo $varification;

// echo $mobile;

// // echo $password;

// echo $otp;

// // echo $rcode;

$chkuser=mysqli_query($con,"select * from `tbl_user` where `mobile`='".$mobile."'");

$userRow=mysqli_num_rows($chkuser);

// echo $userRow;

if($userRow==0)

	{

	if($signup_mobile == $mobile)

	{

	if($otp == $varification)

	{

		$chkrcode=mysqli_query($con,"select * from `tbl_user` where `owncode`='".$rcode."'");

		$codeRow=mysqli_num_rows($chkrcode);


		if($rcode!=''){           

		if($codeRow>0){

		    $codeRowdata=mysqli_fetch_assoc($chkrcode);

		    $useridshare=$codeRowdata['id'];

			$sql= mysqli_query($con,"INSERT INTO `tbl_user` (`mobile`, `email`, `password`,`code`,`owncode`,`privacy`,`status`) VALUES ('".$mobile."','".$email."','".$password."','".$rcode."','','".$acceptTC."','1')");

			$userid=mysqli_insert_id($con);

			$refcode=$userid.refcode();

			$sqlwall = "SELECT * FROM `tbl_rechargetemp` WHERE `userid`='$useridshare'";

            $reswall11 = mysqli_query($con, $sqlwall);

            $rowwall12 = mysqli_fetch_assoc($reswall11);
            // 28-10-2022

            //$walletbalance = $rowwall12['amount']+118;

			//$sqlshare= mysqli_query($con,"UPDATE `tbl_rechargetemp` SET `amount` = '".$walletbalance."' WHERE `userid`= '".$useridshare."'");

			$sqlwallet = mysqli_query($con, "INSERT INTO `tbl_rechargetemp`(`userid`,`amount`)VALUES('".$userid."','20')");

			$sql= mysqli_query($con,"UPDATE `tbl_user` SET `owncode` = '$refcode' WHERE `id`= '".$userid."'");

			$sql2= mysqli_query($con,"INSERT INTO `tbl_wallet`(`userid`,`amount`,`envelopestatus`) VALUES ('".$userid."','0','0')");

			$sql3= mysqli_query($con,"INSERT INTO `tbl_bonus`(`userid`,`amount`,`level1`,`level2`,`level3`) VALUES ('".$userid."','0','0','0','0')");

			//$sql4= mysqli_query($con,"INSERT INTO `referral_code_share_user`(`shareUserId`,`bonus`) VALUES ('".$useridshare."',1");


			// 28-10-2022

			//$sql65= mysqli_query($con,"INSERT INTO `tbl_bonus`(`userid`,`amount`,`level1`,`level2`,`level3`) VALUES ('".$useridshare."','118','118','0','0')");

			// $sqlwallet = mysqli_query($con, "INSERT INTO `tbl_rechargetemp`(`userid`,`amount`)VALUES('$userid','20')");

			$_SESSION["errorsing"]="Successfully Signup";

			header("Location: login.php");

			//Login successfully

		}

		else{ 

			$_SESSION["errorsing"]="Invalid Refer code";

			header("Location: singup.php");

			//Invalid rcode

		}

		}
		else{
           
			// $codeRowdata=mysqli_fetch_assoc($chkrcode);

		    // $useridshare=$codeRowdata['id'];

			$sql= mysqli_query($con,"INSERT INTO `tbl_user` (`mobile`, `email`, `password`,`code`,`owncode`,`privacy`,`status`) VALUES ('".$mobile."','".$email."','".$password."','".$rcode."','','".$acceptTC."','1')");

			$userid=mysqli_insert_id($con);

			$refcode=$userid.refcode();

			// $sqlwall = "SELECT * FROM `tbl_rechargetemp` WHERE `userid`='$useridshare'";

            // $reswall11 = mysqli_query($con, $sqlwall);

            // $rowwall12 = mysqli_fetch_assoc($reswall11);
            // 28-10-2022

            //$walletbalance = $rowwall12['amount']+118;

			//$sqlshare= mysqli_query($con,"UPDATE `tbl_rechargetemp` SET `amount` = '".$walletbalance."' WHERE `userid`= '".$useridshare."'");

			$sqlwallet = mysqli_query($con, "INSERT INTO `tbl_rechargetemp`(`userid`,`amount`)VALUES('".$userid."','20')");

			$sql= mysqli_query($con,"UPDATE `tbl_user` SET `owncode` = '$refcode' WHERE `id`= '".$userid."'");

			$sql2= mysqli_query($con,"INSERT INTO `tbl_wallet`(`userid`,`amount`,`envelopestatus`) VALUES ('".$userid."','0','0')");

			$sql3= mysqli_query($con,"INSERT INTO `tbl_bonus`(`userid`,`amount`,`level1`,`level2`,`level3`) VALUES ('".$userid."','0','0','0','0')");

			//$sql4= mysqli_query($con,"INSERT INTO `referral_code_share_user`(`shareUserId`,`bonus`) VALUES ('".$useridshare."',1");


			// 28-10-2022

			//$sql65= mysqli_query($con,"INSERT INTO `tbl_bonus`(`userid`,`amount`,`level1`,`level2`,`level3`) VALUES ('".$useridshare."','118','118','0','0')");

			// $sqlwallet = mysqli_query($con, "INSERT INTO `tbl_rechargetemp`(`userid`,`amount`)VALUES('$userid','20')");

			$_SESSION["errorsing"]="Successfully Signup";

			header("Location: login.php");

			//Login successfully



		}
		


	}

	else{

		$_SESSION["errorsing"]="Invalid OTP";

		header("Location: singup.php");

		// invalid otp

	}

	}

	else{

		$_SESSION["errorsing"]="Invaldi Number";

		header("Location: singup.php");

		//invalid number

	}

}

else{

    // $_SESSION["errorsing"]="User Already Present";

	// header("Location: singup.php");

	// already present

}

?>