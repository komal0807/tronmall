<?php
include("include/connection.php");

if(isset($_POST['type']))
{
if($_POST['type']=='mobile'){
@$mobile=$_POST['mobile'];
$otp=generateOTP();
$chkuser=mysqli_query($con,"select * from `tbl_user` where `mobile`='".$mobile."'");
$userRow=mysqli_num_rows($chkuser);

if($userRow == 0){

	session_start();
	unset($_SESSION["signup_mobile"]);
	unset($_SESSION["signup_otp"]);
  $_SESSION["signup_mobile"] = $mobile;
  $_SESSION["signup_otp"] = $otp;
	
	
	
$fields = array(
    "sender_id" => "FSTSMS",
    "message" => "Your verification code is $otp",
    "language" => "english",
    "route" => "p",
    "numbers" => $mobile,
    "flash" => "1"
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: LN1sEYHDfwdqHrYQWNHqenu63d2uQIj7hkqm30HuSVO7Cuwtt5jgA8PftQV3",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

//$oldkey = QzCIVcrZHF3RXSo19pWmv0k6MB2N5OEP7qJ8ntadgYlTDLjeywG8vkdiRYewao0FgTUyN9KV1Z7MXH6P";

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
echo '1';
}


}else{echo"2";}

}
if($_POST['type']=='otpval'){
    
session_start();

$otp=$_POST['otp'];

$mobile= $_SESSION["signup_mobile"];
$sessionotp=$_SESSION["signup_otp"];
    if($sessionotp!==$otp)  
    {
    echo"0";
    }else{
    $_SESSION["signup_mobilematched"] = $_SESSION["signup_mobile"];
    unset($_SESSION["signup_mobile"]);
    unset($_SESSION["signup_otp"]);
    
    		echo"1";}
    }
}
?>
