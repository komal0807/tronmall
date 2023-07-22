<?php 
ob_start();
session_start();
if($_SESSION['userid']=="")
{
	header("location:index.php?msg1=notauthorized");
	exit();
}
	
include ("include/connection.php");

if(isset($_POST['submit'])=='Submit'){
	$mra=($_POST['mra']);
	$mwa=($_POST['mwa']);
	$ib=($_POST['ib']);
	$rb=($_POST['rb']);
	$level1=($_POST['level1']);
	$level2=($_POST['level2']);
  $gamevalue0=($_POST['gamevalue0']);
  $gamevalue1=($_POST['gamevalue1']);
  $gamevalue2=($_POST['gamevalue2']);
  $gamevalue3=($_POST['gamevalue3']);
  $gamevalue4=($_POST['gamevalue4']);
  $gamevalue5=($_POST['gamevalue5']);
  $gamevalue6=($_POST['gamevalue6']);
  $gamevalue7=($_POST['gamevalue7']);
  $gamevalue8=($_POST['gamevalue8']);
  $gamevalue9=($_POST['gamevalue9']);
  $gameValueViolet=($_POST['gameValueViolet']);
  $gameValueGreen=($_POST['gameValueGreen']);
  $gameValueRed=($_POST['gameValueRed']);

	
$sql= "UPDATE `tbl_paymentsetting` SET `rechargeamount` = '$mra',`withdrawalamount` = '$mwa',`bonusamount` = '$ib',`rechargebonus` = '$rb',`level1` = '$level1',`level2` = '$level2',`gamevalue0` = '$gamevalue0',`gamevalue1` = '$gamevalue1',`gamevalue2` = '$gamevalue2',`gamevalue3` = '$gamevalue3',`gamevalue4` = '$gamevalue4',`gamevalue5` = '$gamevalue5',`gamevalue6` = '$gamevalue6',`gamevalue7` = '$gamevalue7',`gamevalue8` = '$gamevalue8',`gamevalue9` = '$gamevalue9',`gameValueViolet` = '$gameValueViolet',`gameValueGreen` = '$gameValueGreen',`gameValueRed` = '$gameValueRed' WHERE `id`= '1'";
$query=mysqli_query($con,$sql);
if($query){
	
	header("location:manage_amount.php?msg=updt");
	
	}

	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DHB Royal | Amount Setup</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="plugins/select2/select2.min.css">
<link rel="stylesheet" href="plugins/iCheck/all.css">
<link rel="stylesheet" type="text/css" href="css/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">
<?php include ("include/header.inc.php");?>
 <?php include ("include/navigation.inc.php");
 $sql="select* FROM `tbl_paymentsetting` WHERE id='1'";
$query=mysqli_query($con,$sql);
$role=mysqli_fetch_array($query);

 ?> 
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Amount Setup</h1>
      <ol class="breadcrumb">
        <li><a href="desktop.php"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Amount Setup</li>
      </ol>
    </section>

                        
    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-xs-12 text-center">
          
          <?php if(isset($_GET['msg'])=="updt"){ ?>
              <span class="text-center red_txt">Update Successfully......</span><?php  } ?></div>
        <div class="col-xs-12">
          <div class="box">
          
      <form id="formID" name="formID" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
            <div class="box-body">
<div class="clearfix"></div>

<div class="col-sm-6">
              <div class="form-group">
              <label>Minium Recharge Amount</label>
              <input type="text" class="form-control" onkeypress="return isNumber(event)" name="mra" id="mra" required value="<?php echo $role['rechargeamount'];?>">
              </div>
              </div>
  <div class="col-sm-6">
              <div class="form-group">
              <label>Minimum Withdrawal Amount</label>
              <input type="text" class="form-control" onkeypress="return isNumber(event)" name="mwa" id="mwa" required value="<?php echo $role['withdrawalamount'];?>">
              </div>
              </div>          
 <div class="col-sm-6">
              <div class="form-group">
              <label>Invite Bonus Amount</label>
              <input type="text" class="form-control" onkeypress="return isNumber(event)" name="ib" id="ib" required value="<?php echo $role['bonusamount'];?>">
              </div>
              </div>
<div class="col-sm-6">
              <div class="form-group">
              <label>Recharge Bonus <i class="red_txt">[in %]</i></label>
              <input type="text" class="form-control" onkeypress="return isNumber(event)" name="rb" id="rb" required value="<?php echo $role['rechargebonus'];?>">
              </div>
              </div>
 <div class="col-sm-6">
              <div class="form-group">
              <label>Level1 Commission Percent <i class="red_txt">[in %]</i></label>
              <input type="text" class="form-control" name="level1" id="level1" required value="<?php echo $role['level1'];?>">
              </div>
              </div>
<div class="col-sm-6">
              <div class="form-group">
              <label>Level2 Commission Percent <i class="red_txt">[in %]</i></label>
              <input type="text" class="form-control"  name="level2" id="level2" required value="<?php echo $role['level2'];?>">
              </div>
              </div>
<div class="col-sm-6">
              <div class="form-group">
              <label>Manual SetUp Game Value For 0<i class="red_txt">[in * of time]</i></label>
              <input type="text" class="form-control" name="gamevalue0" id="gamevalue0" required value="<?php echo $role['gamevalue0'];?>">
              </div>
              </div>
<div class="col-sm-6">
              <div class="form-group">
              <label>Manual SetUp Game Value For 1 <i class="red_txt">[in * of time]</i></label>
              <input type="text" class="form-control" name="gamevalue1" id="gamevalue1" required value="<?php echo $role['gamevalue1'];?>">
              </div>
              </div>
<div class="col-sm-6">
              <div class="form-group">
              <label>Manual SetUp Game Value For 2 <i class="red_txt">[in * of time]</i></label>
              <input type="text" class="form-control" name="gamevalue2" id="gamevalue2" required value="<?php echo $role['gamevalue2'];?>">
              </div>
              </div>
<div class="col-sm-6">
              <div class="form-group">
              <label>Manual SetUp Game Value For 3 <i class="red_txt">[in * of time]</i></label>
              <input type="text" class="form-control" name="gamevalue3" id="gamevalue3" required value="<?php echo $role['gamevalue3'];?>">
              </div>
              </div>
<div class="col-sm-6">
              <div class="form-group">
              <label>Manual SetUp Game Value For 4 <i class="red_txt">[in * of time]</i></label>
              <input type="text" class="form-control" name="gamevalue4" id="gamevalue4" required value="<?php echo $role['gamevalue4'];?>">
              </div>
              </div>
<div class="col-sm-6">
              <div class="form-group">
              <label>Manual SetUp Game Value For 5<i class="red_txt">[in * of time]</i></label>
              <input type="text" class="form-control" name="gamevalue5" id="gamevalue5" required value="<?php echo $role['gamevalue5'];?>">
              </div>
              </div>
<div class="col-sm-6">
              <div class="form-group">
              <label>Manual SetUp Game Value For 6<i class="red_txt">[in * of time]</i></label>
              <input type="text" class="form-control" name="gamevalue6" id="gamevalue6" required value="<?php echo $role['gamevalue6'];?>">
              </div>
              </div>
<div class="col-sm-6">
              <div class="form-group">
              <label>Manual SetUp Game Value For 7<i class="red_txt">[in * of time]</i></label>
              <input type="text" class="form-control" name="gamevalue7" id="gamevalue7" required value="<?php echo $role['gamevalue7'];?>">
              </div>
              </div>
<div class="col-sm-6">
              <div class="form-group">
              <label>Manual SetUp Game Value For 8<i class="red_txt">[in * of time]</i></label>
              <input type="text" class="form-control" name="gamevalue8" id="gamevalue8" required value="<?php echo $role['gamevalue8'];?>">
              </div>
              </div>
<div class="col-sm-6">
              <div class="form-group">
              <label>Manual SetUp Game Value For 9<i class="red_txt">[in * of time]</i></label>
              <input type="text" class="form-control" name="gamevalue9" id="gamevalue9" required value="<?php echo $role['gamevalue9'];?>">
              </div>
              </div>
              <div class="col-sm-6">
              <div class="form-group">
              <label>Manual SetUp Game Value For Green Color<i class="red_txt">[in * of time]</i></label>
              <input type="text" class="form-control" name="gameValueGreen" id="gameValueGreen" required value="<?php echo $role['gameValueGreen'];?>">
              </div>
              </div>
              <div class="col-sm-6">
              <div class="form-group">
              <label>Manual SetUp Game Value For Violet Color<i class="red_txt">[in * of time]</i></label>
              <input type="text" class="form-control" name="gameValueViolet" id="gameValueViolet" required value="<?php echo $role['gameValueViolet'];?>">
              </div>
              </div>
              <div class="col-sm-6">
              <div class="form-group">
              <label>Manual SetUp Game Value For Red Color<i class="red_txt">[in * of time]</i></label>
              <input type="text" class="form-control" name="gameValueRed" id="gameValueRed" required value="<?php echo $role['gameValueRed'];?>">
              </div>
              </div>
              

             <div class="clearfix"></div>   
              <div class="form-group">
              <div class="text-center">
  
 <input type="submit" class="btn btn-primary" value="Submit"  name="submit" ></div>
                </div> 
               </div>
                <div class="clearfix"></div>
             
 

          </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php include("include/footer.inc.php"); ?>
</div>

</body>
</html>
