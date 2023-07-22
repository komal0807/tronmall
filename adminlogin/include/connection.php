<?php
// $con =  @mysqli_connect('localhost', 'mango-1234', 'fghbgvfyfvjh567', 'mango-1234');
$con =  @mysqli_connect('localhost', 'tronmall', 'tronmall', 'tronmall');
// $con =  @mysqli_connect('localhost', 'root', '', 'tronmall');


    if (!$con) {
        echo "Error: " . mysqli_connect_error();
        exit();
    }
?>
<?php
function newname()
{

    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    srand((float) microtime() * 1000000);
    $i = 0;
    $pass = '';
    while ($i <= 5) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}
function generateSKU()
{
    $characters = '1234567890';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 4; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $pin = $randomString;
}

function encryptor($action, $string)
{
    $output = false;

    $encrypt_method = "AES-256-CBC";
    //pls set your unique hashing key
    $secret_key = 'muni';
    $secret_iv = 'muni123';

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

//chk permission page==================================
function chpermission($a, $actionurl)
{
    $session_roles = $_SESSION['role_id'];
    $urll = $actionurl;
    $chkurls = mysqli_query($a, "select `c_id` from `secondchild_menu` where `url`='" . $urll . "' and `status`='1'");
    $chkurls_result = mysqli_fetch_array($chkurls);
    $chk = $chkurls_result['c_id'];
    $valurls = mysqli_query($a, "SELECT * FROM `task` where `role_id`='" . $session_roles . "' And task  like '%$chk%' and `status`='1'");
    $vals_row = mysqli_num_rows($valurls);
    if ($vals_row == '0') {
        header("location:404.php");
    }
} //chk permission page end==================================

function subcategory($b, $id)
{
    $sql_page = mysqli_query($b, "select `subcategory` from `tbl_subcategory` where `id`='$id'");
    $page_result = mysqli_fetch_array($sql_page);
    return  $page_result['subcategory'];
}
function gameid($a)
{
    $selectruser = mysqli_query($a, "select `gameid` from `tbl_gameid` order by id desc limit 1");
    $userresult = mysqli_fetch_array($selectruser);
    return $userresult["gameid"];
}


function wallet($a, $field, $id)
{
    $selectwallet = mysqli_query($a, "select `$field` from `tbl_wallet` where `userid`='" . $id . "'");
    $walletResult = mysqli_fetch_array($selectwallet);
    return $walletResult["$field"];
}


function winner($con, $periodid, $tab, $column)
{
$sqlqyery="select* FROM `tbl_paymentsetting` WHERE id='1'";
$resultquery=mysqli_query($con,$sqlqyery);
$manualresul=mysqli_fetch_array($resultquery);
$manualresult0=$manualresul['gamevalue0'];
$manualresult1=$manualresul['gamevalue1'];
$manualresult2=$manualresul['gamevalue2'];
$manualresult3=$manualresul['gamevalue3'];
$manualresult4=$manualresul['gamevalue4'];
$manualresult5=$manualresul['gamevalue5'];
$manualresult6=$manualresul['gamevalue6'];
$manualresult7=$manualresul['gamevalue7'];
$manualresult8=$manualresul['gamevalue8'];
$manualresult9=$manualresul['gamevalue9'];

    $query = mysqli_query($con, "SELECT 
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
    END)/100*2))*2 as greenwinamount,
	
	(SUM(CASE
        WHEN value = 'Green' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Green' THEN amount
    END)/100*2))*1.5 as greenwinamountwithviolet,
    
    SUM(CASE
        WHEN value = 'Violet' THEN amount
    END) violet,
    
    (SUM(CASE
        WHEN value = 'Violet' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Violet' THEN amount
    END)/100*2))*4.5 as violetwinamount,
    
    SUM(CASE
        WHEN value = 'Red' THEN amount
    END) red,
    
    (SUM(CASE
        WHEN value = 'Red' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Red' THEN amount
    END)/100*2))*2 as redwinamount,
	(SUM(CASE
        WHEN value = 'Red' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Red' THEN amount
    END)/100*2))*1.5 as redwinamountwithviolet,
    
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
    END)/100*2))*$manualresult0 as zerowinamount,
    
    SUM(CASE
        WHEN value = '1' THEN amount
    END) `one`,
    (SUM(CASE
        WHEN value = '1' THEN amount
    END)-(SUM(CASE
        WHEN value = '1' THEN amount
    END)/100*2))*$manualresult1 as onewinamount,
    
    SUM(CASE
        WHEN value = '2' THEN amount
    END) `two`,
    (SUM(CASE
        WHEN value = '2' THEN amount
    END)-(SUM(CASE
        WHEN value = '2' THEN amount
    END)/100*2))*$manualresult2 as twowinamount,
    
    SUM(CASE
        WHEN value = '3' THEN amount
    END) `three`,
    (SUM(CASE
        WHEN value = '3' THEN amount
    END)-(SUM(CASE
        WHEN value = '3' THEN amount
    END)/100*2))*$manualresult3 as threewinamount,
    
    SUM(CASE
        WHEN value = '4' THEN amount
    END) `four`,
    (SUM(CASE
        WHEN value = '4' THEN amount
    END)-(SUM(CASE
        WHEN value = '4' THEN amount
    END)/100*2))*$manualresult4 as fourwinamount,
    
    SUM(CASE
        WHEN value = '5' THEN amount
    END) `five`,
    (SUM(CASE
        WHEN value = '5' THEN amount
    END)-(SUM(CASE
        WHEN value = '5' THEN amount
    END)/100*2))*$manualresult5 as fivewinamount,
    
    SUM(CASE
        WHEN value = '6' THEN amount
    END) `six`,
    (SUM(CASE
        WHEN value = '6' THEN amount
    END)-(SUM(CASE
        WHEN value = '6' THEN amount
    END)/100*2))*$manualresult6 as sixwinamount,
    
    SUM(CASE
        WHEN value = '7' THEN amount
    END) `seven`,
    (SUM(CASE
        WHEN value = '7' THEN amount
    END)-(SUM(CASE
        WHEN value = '7' THEN amount
    END)/100*2))*$manualresult7 as sevenwinamount,
    
    SUM(CASE
        WHEN value = '8' THEN amount
    END) `eight`,
    (SUM(CASE
        WHEN value = '8' THEN amount
    END)-(SUM(CASE
        WHEN value = '8' THEN amount
    END)/100*2))*$manualresult8 as eightwinamount,
    
    SUM(CASE
        WHEN value = '9' THEN amount
    END) `nine`,
    (SUM(CASE
        WHEN value = '9' THEN amount
    END)-(SUM(CASE
        WHEN value = '9' THEN amount
    END)/100*2))*$manualresult9 as ninewinamount
	    
FROM
    `tbl_betting` where `periodid`='$periodid' and `tab`='$tab'");
    $result = mysqli_fetch_array($query);
    return $result["$column"];
}
$numbermappings = array("zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine");


function getusercount($a, $periodid, $tab, $value)
{
    $selectquery = mysqli_query($a, "select * from `tbl_betting` where `periodid`='$periodid' and `tab`='$tab' and `value`in($value) group by `userid`
");
    $row = mysqli_num_rows($selectquery);
    return $row;
}

function get_times($a)
{

    $default = '00:00';
    $interval = '+30 minutes';

    $output = '';
    $current = strtotime('00:00');
    $end = strtotime('23:59');

    while ($current <= $end) {
        $time = date('H:i', $current);
        if ($a == $time) {
            $sel = "selected='selected'";
        } else {
            $sel = "";
        }

        $output .= "<option value=\"{$time}\"{$sel}\">" . date('H:i', $current) . '</option>';
        $current = strtotime($interval, $current);
    }

    return $output;
}
$days = array(
    1 => 'Monday',
    2 => 'Tuesday',
    3 => 'Wednesday',
    4 => 'Thursday',
    5 => 'Friday',
    6 => 'Saturday',
    7 => 'Sunday'
);
date_default_timezone_set('Asia/Kolkata');
//mysqli_close($conn);

function recharge_bonus($a, $user_id, $amount)
{
    // print_r($user_id); die;
    $commissionQuery = mysqli_query($a, "select * from `tbl_paymentsetting` where `id`='1'");
    $commissionResult = mysqli_fetch_array($commissionQuery);
    $recharge_bonus = $commissionResult['rechargebonus']; 
    
    // getting direct user ref code 
    $get_direct = mysqli_query($a, "select `code` from `tbl_user` where `id`= '$user_id' ");
    $get_direct_code = mysqli_fetch_assoc($get_direct);
    $direct_code = $get_direct_code['code'];
    
    // getting direct user id 
    $get_direct_id = mysqli_query($a, "select `id` from `tbl_user` where `owncode`= '$direct_code'");
    $get_direct_user_id = mysqli_fetch_assoc($get_direct_id);
    $get_direct_userid = $get_direct_user_id['id'];
    
    
    $new_amount = ( $amount * 15 ) / 100;
    // echo "UPDATE `tbl_bonus` SET `amount` = amount + '$new_amount' WHERE `userid`= '" . $get_direct_userid . "'"; die;
    mysqli_query($a, "UPDATE `tbl_bonus` SET `amount` = amount + '$new_amount' WHERE `userid`= '" . $get_direct_userid . "'");
    
    //get current bal of direct
    // $da = mysqli_query($a, "select `amount` from `tbl_bonus` where `userid`='$get_direct_userid'");
    // $dar = mysqli_fetch_assoc($da);
    // $new_amount =  $dar['amount'] + $recharge_bonus;
    //setting the  new bonus
    
    return true;
}
?>