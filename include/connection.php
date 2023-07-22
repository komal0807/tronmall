<?php
$con =  @mysqli_connect('localhost', 'tronmall', 'tronmall', 'tronmall');
// $con =  @mysqli_connect('localhost', 'root', '', 'tronmall');


if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
date_default_timezone_set("Asia/Calcutta");

function encryptor($action, $string)
{
    $output = false;

    $encrypt_method = "AES-256-CBC";
    //pls set your unique hashing key
    $secret_key = '7019bc5445383efd94dc7d5eea97b62d';
    $secret_iv = '7019bc5445383efd94dc7d5eea97b62d';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    //do the encyption given text/string/number
    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        //decrypt the given text/string/number
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

function refcode()
{
    $characters = '123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 5; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $pin = $randomString;
}

function generateOTP()
{
    $characters = '123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 4; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $pin = $randomString;
}

function user($a, $field, $id)
{
    $selectruser = mysqli_query($a, "select `$field` from `tbl_user` where `id`='" . $id . "'");
    $userresult = mysqli_fetch_array($selectruser);
    return $userresult["$field"];
}

function wallet($a, $field, $id)
{
    $selectwallet = mysqli_query($a, "select `$field` from `tbl_wallet` where `userid`='" . $id . "'");
    $walletResult = mysqli_fetch_array($selectwallet);
    if ($walletResult != null) {
        return $walletResult["$field"];
    } else {
        return 0;
    };
}

function bonus($a, $field, $id)
{
    $selectwallet = mysqli_query($a, "select `$field` from `tbl_bonus` where `userid`='" . $id . "'");
    $walletResult = mysqli_fetch_array($selectwallet);
    return $walletResult["$field"];
}

function new_bonus($a, $field, $id)
{
    $selectwallet = mysqli_query($a, "select sum(`$field`) from `tbl_bonus` where `userid`='" . $id . "'");
    $walletResult = mysqli_fetch_array($selectwallet);
    // echo "<pre>";
    // print_r($walletResult[0]);exit;
    return $walletResult[0];
}

function intrest_user($a, $field, $id)
{
    $selectwallet = mysqli_query($a, "select `$field` from `tbl_intrest_amt` where `userid`='" . $id . "'");
    $walletResult = mysqli_fetch_array($selectwallet);
    return $walletResult["$field"];
}

function gameid($a)
{
    $selectruser = mysqli_query($a, "select `gameid` from `tbl_gameid` order by id desc limit 1");
    $userresult = mysqli_fetch_array($selectruser);
    if ($userresult != null) {
        return $userresult["gameid"];
    } else {
        return 0;
    }
}

function content($a, $page)
{
    $sql_page = "select `$page` from `content` where `id`='1'";
    $query_page = mysqli_query($a, $sql_page);
    $page_result = mysqli_fetch_array($query_page);
    return  $page_result["$page"];
}
function minamountsetting($a, $page)
{
    $sql_page = "select `$page` from `tbl_paymentsetting` where `id`='1'";
    $query_page = mysqli_query($a, $sql_page);
    $page_result = mysqli_fetch_array($query_page);
    return  $page_result["$page"];
}
function truncate($mytext)
{
    //Number of characters to show  
    $chars = 610;
    $mytext = substr($mytext, 0, $chars);
    $mytext = substr($mytext, 0, strrpos($mytext, ' '));
    return $mytext;
}
function truncate2($mytext)
{
    //Number of characters to show  
    $chars = 220;
    $mytext = substr($mytext, 0, $chars);
    $mytext = substr($mytext, 0, strrpos($mytext, ' '));
    return $mytext;
}
function setting($a, $page)
{
    $sql_page = "select `$page` from `site_setting` where `id`='1'";
    $query_page = mysqli_query($a, $sql_page);
    $page_result = mysqli_fetch_array($query_page);
    return  $page_result["$page"];
}


function winner($con, $periodid, $tab, $column)
{
    $query = mysqli_query($con, "SELECT 
( SUM(amount)-SUM(amount)/100*5)as tradeamountwithtax,
 SUM(amount)as tradeamount,
    SUM(CASE
        WHEN type = 'button' THEN amount
    END) button,
    SUM(CASE
        WHEN value = 'Green' THEN amount
    END) as green,
    
    (SUM(CASE
        WHEN value = 'Green' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Green' THEN amount
    END)/100*5))*2 as greenwinamount,
	
	(SUM(CASE
        WHEN value = 'Green' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Green' THEN amount
    END)/100*5))*1.5 as greenwinamountwithviolet,
    
    SUM(CASE
        WHEN value = 'Violet' THEN amount
    END) violet,
    
    (SUM(CASE
        WHEN value = 'Violet' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Violet' THEN amount
    END)/100*5))*4.5 as violetwinamount,
    
    SUM(CASE
        WHEN value = 'Red' THEN amount
    END) red,
    
    (SUM(CASE
        WHEN value = 'Red' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Red' THEN amount
    END)/100*5))*2 as redwinamount,
	(SUM(CASE
        WHEN value = 'Red' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Red' THEN amount
    END)/100*5))*1.5 as redwinamountwithviolet,
    
    SUM(CASE
        WHEN type = 'number' THEN amount
    END) number,
    SUM(CASE
        WHEN value = '0' THEN amount
    END) `zero`,
    (SUM(CASE
        WHEN value = '0' THEN amount
    END)-(SUM(CASE
        WHEN value = '0' THEN amount
    END)/100*5))*9 as zerowinamount,
    
    SUM(CASE
        WHEN value = '1' THEN amount
    END) `one`,
    (SUM(CASE
        WHEN value = '1' THEN amount
    END)-(SUM(CASE
        WHEN value = '1' THEN amount
    END)/100*5))*9 as onewinamount,
    
    SUM(CASE
        WHEN value = '2' THEN amount
    END) `two`,
    (SUM(CASE
        WHEN value = '2' THEN amount
    END)-(SUM(CASE
        WHEN value = '2' THEN amount
    END)/100*5))*9 as twowinamount,
    
    SUM(CASE
        WHEN value = '3' THEN amount
    END) `three`,
    (SUM(CASE
        WHEN value = '3' THEN amount
    END)-(SUM(CASE
        WHEN value = '3' THEN amount
    END)/100*5))*9 as threewinamount,
    
    SUM(CASE
        WHEN value = '4' THEN amount
    END) `four`,
    (SUM(CASE
        WHEN value = '4' THEN amount
    END)-(SUM(CASE
        WHEN value = '4' THEN amount
    END)/100*5))*9 as fourwinamount,
    
    SUM(CASE
        WHEN value = '5' THEN amount
    END) `five`,
    (SUM(CASE
        WHEN value = '5' THEN amount
    END)-(SUM(CASE
        WHEN value = '5' THEN amount
    END)/100*5))*9 as fivewinamount,
    
    SUM(CASE
        WHEN value = '6' THEN amount
    END) `six`,
    (SUM(CASE
        WHEN value = '6' THEN amount
    END)-(SUM(CASE
        WHEN value = '6' THEN amount
    END)/100*5))*9 as sixwinamount,
    
    SUM(CASE
        WHEN value = '7' THEN amount
    END) `seven`,
    (SUM(CASE
        WHEN value = '7' THEN amount
    END)-(SUM(CASE
        WHEN value = '7' THEN amount
    END)/100*5))*9 as sevenwinamount,
    
    SUM(CASE
        WHEN value = '8' THEN amount
    END) `eight`,
    (SUM(CASE
        WHEN value = '8' THEN amount
    END)-(SUM(CASE
        WHEN value = '8' THEN amount
    END)/100*5))*9 as eightwinamount,
    
    SUM(CASE
        WHEN value = '9' THEN amount
    END) `nine`,
    (SUM(CASE
        WHEN value = '9' THEN amount
    END)-(SUM(CASE
        WHEN value = '9' THEN amount
    END)/100*5))*9 as ninewinamount
	    
FROM
    `tbl_betting` where `periodid`='$periodid' and `tab`='$tab'");
    $result = mysqli_fetch_array($query);
    return $result["$column"];
}

$numbermappings = array("zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine");

function userpromocode($a, $userid, $code, $tradeamount, $periodid)
{
    $today = date("Y-m-d H:i:s");
    $commissionQuery = mysqli_query($a, "select * from `tbl_paymentsetting` where `id`='1'");
    $commissionResult = mysqli_fetch_array($commissionQuery);
    $level1commission = $commissionResult['level1'];
    $level2commission = $commissionResult['level2'];
    $level1 = ($tradeamount * $level1commission / 100);
    $level2 = ($tradeamount * $level2commission / 100);

    $userlevel1Query = mysqli_query($a, "select `code`,(select `id` from `tbl_user` where `owncode`='$code')level1id,(select `code` from `tbl_user` where `owncode`='$code')level1code from `tbl_user` where `id`='" . $userid . "'");
    $userlevel1Result = mysqli_fetch_array($userlevel1Query);
    $level1id = $userlevel1Result['level1id'];
    $level1code = $userlevel1Result['level1code'];
    //===============================================================================================
    $userlevel2Query = mysqli_query($a, "select `id` from `tbl_user` where `owncode`='" . $level1code . "'");
    $userlevel2Result = mysqli_fetch_array($userlevel2Query);
    $level2id = $userlevel2Result['id'];
    //=================================================================================================
    $sql = mysqli_query($a, "INSERT INTO `tbl_bonussummery`(`userid`,`periodid`,`level1id`,`level2id`,`level1amount`,`level2amount`,`tradeamount`,`createdate`) 
    VALUES ('" . $userid . "','" . $periodid . "','" . $level1id . "','" . $level2id . "','" . $level1 . "','" . $level2 . "','" . $tradeamount . "','" . $today . "')");
    

    $amount1=((($level2)*50)/100);
    $amount2=((($level2)*40)/100);
    $amount3=((($level2)*10)/100);
   
    
    $sqlwallet1 = mysqli_query($a, "select * from tbl_user where owncode=(select code from tbl_user where id='$userid') ");           
    if (mysqli_num_rows($sqlwallet1) > 0) {
    $firstiddata = mysqli_fetch_assoc($sqlwallet1);
    $firstid1=$firstiddata['id'];
    $firstamount = mysqli_query($a, "select amount as firststamount  FROM `tbl_wallet` WHERE userid='$firstid1'");
    $firstamountdata = mysqli_fetch_assoc($firstamount);
    $finalbalanceCredit1 = $firstamountdata['firststamount'] + $amount1;    
    $sqlwallet11 = mysqli_query($a, "UPDATE `tbl_wallet` SET `amount` = '$finalbalanceCredit1' WHERE `userid`= '$firstid1'");
    
    
     $level1balance = bonus($a, 'level1', $firstid1);
    $finallevel1balance = $level1balance + $amount1;
    $bonusbalance1 = bonus($a, 'amount', $firstid1);
    $finalbonusbalance1 = $bonusbalance1 + $amount1;   
	$sqlbonuslevel1 = mysqli_query($a, "UPDATE `tbl_bonus` SET `amount` = '" . $finalbonusbalance1 . "',`level1` = '" . $finallevel1balance . "' WHERE `userid`= '" . $firstid1 . "'");

    }


    $sqlwallet2 = mysqli_query($a, "select * from tbl_user where owncode=(select code from tbl_user where id='$firstid1') ");           
    if (mysqli_num_rows($sqlwallet2) > 0) {
    $secondiddata = mysqli_fetch_assoc($sqlwallet2);
    $firstid2=$secondiddata['id'];
    $second = mysqli_query($a, "select amount as 2amount  FROM `tbl_wallet` WHERE userid='$firstid2'");
    $seconddata = mysqli_fetch_assoc($second);
    $finalbalanceCredit2 = $seconddata['2amount'] + $amount2;    
    $sqlwallet22 = mysqli_query($a, "UPDATE `tbl_wallet` SET `amount` = '$finalbalanceCredit2' WHERE `userid`= '$firstid2'");
    
    
     $level2balance = bonus($a, 'level2', $firstid2);
    $finallevel2balance = $level2balance + $amount2;
    $bonusbalance2 = bonus($a, 'amount', $firstid2);
    $finalbonusbalance2 = $bonusbalance2 + $amount2;
    $sqlbonuslevel2 = mysqli_query($a, "UPDATE `tbl_bonus` SET `amount` = '" . $finalbonusbalance2 . "',`level2` = '" . $finallevel2balance . "' WHERE `userid`= '" . $firstid2 . "'");

    }


    $sqlwallet3 = mysqli_query($a, "select * from tbl_user where owncode=(select code from tbl_user where id='$firstid2') ");           
    if (mysqli_num_rows($sqlwallet3) > 0) {
    $thirdiddata = mysqli_fetch_assoc($sqlwallet3);
    $firstid3=$thirdiddata['id'];
    $third = mysqli_query($a, "select amount as 3amount  FROM `tbl_wallet` WHERE userid='$firstid3'");
    $thirddata = mysqli_fetch_assoc($third);
    $finalbalanceCredit3 = $thirddata['3amount'] + $amount3;    
    $sqlwallet33 = mysqli_query($a, "UPDATE `tbl_wallet` SET `amount` = '$finalbalanceCredit3' WHERE `userid`= '$firstid3'");
    
    
    
    $level2balance1 = bonus($a, 'level2', $firstid3);
    $finallevel2balance1 = $level2balance1+ $amount3;
    $bonusbalance21 = bonus($a, 'amount', $firstid3);
    $finalbonusbalance21 = $bonusbalance21 + $amount3;
    $sqlbonuslevel21 = mysqli_query($a, "UPDATE `tbl_bonus` SET `amount` = '" . $finalbonusbalance21 . "',`level3` = '" . $finallevel2balance1 . "' WHERE `userid`= '" . $firstid3 . "'");

    }


}

function new_userpromocode($a, $userid, $code)
{
    $today = date("Y-m-d H:i:s");
    $commissionQuery = mysqli_query($a, "select * from `tbl_paymentsetting` where `id`='1'");
    $commissionResult = mysqli_fetch_array($commissionQuery);
    $joining_bounus = $commissionResult['bonusamount'];

    $level1commission = $commissionResult['level1'];
    $level2commission = $commissionResult['level2'];

    $level1 = ($joining_bounus * $level1commission / 100);
    $level2 = ($joining_bounus * $level2commission / 100);

    $userlevel1Query = mysqli_query($a, "select `code`,(select `id` from `tbl_user` where `owncode`='$code')level1id,(select `code` from `tbl_user` where `owncode`='$code')level1code from `tbl_user` where `id`='" . $userid . "'");
    $userlevel1Result = mysqli_fetch_array($userlevel1Query);
    var_dump("select `code`,(select `id` from `tbl_user` where `owncode`='$code')
    level1id,(select `code` from `tbl_user` where `owncode`='$code')level1code from `tbl_user` where `id`='" . $userid . "'");
    exit;
    // getting upline id and promo code 
    $level1id = $userlevel1Result['level1id'];
    $level1code = $userlevel1Result['level1code'];
    //===============================================================================================
    $userlevel2Query = mysqli_query($a, "select `id` from `tbl_user` where `owncode`='" . $level1code . "'");
    $userlevel2Result = mysqli_fetch_array($userlevel2Query);
    $level2id = $userlevel2Result['id'];
    //=================================================================================================
    /**
     * $sql= mysqli_query($a,"INSERT INTO `tbl_bonussummery`(`userid`,`periodid`,`level1id`,`level2id`,`level1amount`,`level2amount`,`tradeamount`,`createdate`) 
     *VALUES ('".$userid."','".$periodid."','".$level1id."','".$level2id."','".$level1."','".$level2."','".$tradeamount."','".$today."')");
     */


    $level1balance = new_bonus($a, 'level1', $level1id);
    $finallevel1balance = $level1balance + $level1;
    $bonusbalance1 = new_bonus($a, 'amount', $level1id);
    $finalbonusbalance1 = $bonusbalance1 + $level1;


    $level2balance = new_bonus($a, 'level2', $level2id);
    $finallevel2balance = $level2balance + $level2;

    $bonusbalance2 = new_bonus($a, 'amount', $level2id);
    $finalbonusbalance2 = $bonusbalance2 + $level2;


    $sqlbonuslevel1 = mysqli_query($a, "UPDATE `tbl_bonus` SET `amount` = '" . $finalbonusbalance1 . "',`level1` = '" . $finallevel1balance . "' WHERE `userid`= '" . $level1id . "'");

    $sqlbonuslevel2 = mysqli_query($a, "UPDATE `tbl_bonus` SET `amount` = '" . $finalbonusbalance2 . "',`level2` = '" . $finallevel2balance . "' WHERE `userid`= '" . $level2id . "'");
}


function invitation_bonus($a, $rcode)
{
    $commissionQuery = mysqli_query($a, "select * from `tbl_paymentsetting` where `id`='1'");
    $commissionResult = mysqli_fetch_array($commissionQuery);
    $joining_bounus = $commissionResult['bonusamount'];
    //joining_bounus as per bounsamount
    $userlevel1Query = mysqli_query($a, "select `id` from `tbl_user` where `owncode`=$rcode");
    $userlevel1Result = mysqli_fetch_assoc($userlevel1Query);
    $directid = $userlevel1Result['id'];
    //get current bal of direct
    $da = mysqli_query($a, "select `amount` from `tbl_bonus` where `userid`=$directid");
    $dar = mysqli_fetch_assoc($da);
    $new_amount = $dar['amount'] + $joining_bounus;
    //setting the  new bonus
    mysqli_query($a, "UPDATE `tbl_bonus` SET `amount` = '" . $new_amount . "' WHERE `userid`= '" . $directid . "'");
    return true;
}



function invitebonus($a, $userid, $refcode)
{
    $chksummery = mysqli_query($a, "select * from `tbl_walletsummery` where `userid`='$userid' and `actiontype`='recharge'");
    $chksummeryRow = mysqli_num_rows($chksummery);
    if ($chksummeryRow == '1') {
        $userQuery = mysqli_query($a, "select `id` from `tbl_user` where `owncode`='$refcode'");
        $userResult = mysqli_fetch_array($userQuery);
        $refuserid = $userResult['id'];
        $selectwallet = mysqli_query($a, "select `amount` from `tbl_bonus` where `userid`='" . $refuserid . "'");
        $walletResult = mysqli_fetch_array($selectwallet);
        $availableBalance = $walletResult['amount'];

        $sqlbonus = mysqli_query($a, "select `bonusamount` from `tbl_paymentsetting` where `id`='1'");
        $bonusResult = mysqli_fetch_array($sqlbonus);
        var_dump($bonusResult);
        exit;
        $bonusAmount = $bonusResult['bonusamount'];
        $finalbonusbalance = $availableBalance + $bonusAmount;
        $today = date("Y-m-d H:i:s");

        $sqlbonuslevel1 = mysqli_query($a, "UPDATE `tbl_bonus` SET `amount` = '" . $finalbonusbalance . "',`level1` = '" . $finalbonusbalance . "' WHERE `userid`= '" . $refuserid . "'");

        $sql = mysqli_query($a, "INSERT INTO `tbl_bonussummery`(`userid`,`periodid`,`level1id`,`level2id`,`level1amount`,`level2amount`,`tradeamount`,`createdate`) VALUES ('" . $userid . "','0','" . $refuserid . "','0','110','0','0','" . $today . "')");
    }
}

function getBaseUrl()
{
    // output: /myproject/index.php
    $currentPath = $_SERVER['PHP_SELF'];

    // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
    $pathInfo = pathinfo($currentPath);

    // output: localhost
    $hostName = $_SERVER['HTTP_HOST'];

    // output: http://
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https://' ? 'https://' : 'http://';

    // return: http://localhost/myproject/
    return $protocol . $hostName . $pathInfo['dirname'] . '/';
} 



//mysqli_close($conn);
