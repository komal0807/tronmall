<?php 
   ob_start();
   session_start();
   if($_SESSION['userid']=="")
   {
    header("location:index.php");
    exit();
   }
   
   include ("include/connection.php");
   
   if(isset($_POST['submit'])=='Save'){
   
    $content1=mysqli_real_escape_string($con,$_POST['facebook']);
    $content2=mysqli_real_escape_string($con,$_POST['twitter']);
    $content3=mysqli_real_escape_string($con,$_POST['telegram']);
    $content4=mysqli_real_escape_string($con,$_POST['instagram']);
    
    
    
   $sql= "UPDATE `social_settings` SET `facebook` = '".$content1."',`twitter` = '".$content2."',`telegram`='".$content3."',`instagram`='".$content4."'  WHERE `id`= '1'";
   $query=mysqli_query($con,$sql);
   if($query){
    
    header("location:social_settings.php?msg=updt");
    
    }
    }
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>DHB Royal | Social Setting</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="css/ionicons.min.css">
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
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/app.css" id="maincss">
   </head>
   <body class="hold-transition skin-red sidebar-mini">
      <div class="wrapper">
         <?php include ("include/header.inc.php");?>
         <?php include ("include/navigation.inc.php");
            $sql="SELECT * FROM `social_settings` where `id`='1'";
            $query=mysqli_query($con,$sql);
            $role=mysqli_fetch_array($query);
            
            ?>
         <div class="content-wrapper">
            <section class="content-header">
               <h1> Site Setting</h1>
               <ol class="breadcrumb">
                  <li><a href="desktop.php"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li class="active"> Social Setting</li>
               </ol>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-xs-12 text-center">
                     <?php if(isset($_GET['msg'])=="updt"){ ?>
                     <span class="text-center red_txt">Update Successfully......</span><?php  } ?>
                  </div>
                  <div class="col-xs-12">
                     <div class="box">
                        <!-- /.box-header -->
                        <form  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="taskform">
                           <div class="box-body">
                              <div class="clearfix"></div>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <div class="form-group">
                                    <label for="content1">Facebook Link</label>
                                    <input class="form-control" id="content1" name="facebook" type="text" value="<?php echo @$role['facebook']; ?>">
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <div class="form-group">
                                    <label for="content2">Twitter Link</label>
                                    <input class="form-control" id="content2" name="twitter" type="text" value="<?php echo @$role['twitter']; ?>">
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <div class="form-group">
                                    <label for="content3">Telegram Link</label>
                                    <input class="form-control" id="content3" name="telegram" type="text" value="<?php echo @$role['telegram']; ?>">
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                 <div class="form-group">
                                    <label for="content4">Instagram Link</label>
                                    <input class="form-control" id="content4" name="instagram" type="text" value="<?php echo @$role['instagram']; ?>">
                                 </div>
                              </div>
                              <div class="clearfix"></div>
                              <input name="id" value="<?php echo @$id?>" type="hidden">
                              <div class="clearfix"></div>
                              <div class="clearfix"></div>
                              <div class="clearfix"></div>
                              <div class="col-md-12 col-sm-6 col-xs-12">
                                 <div class="form-group">
                                    <div class="text-center">
                                       <input type="submit" name="submit" class="btn btn-primary" value="Save" >
                                    </div>
                                 </div>
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
         <?php  include("include/footer.inc.php");?>
      </div>
   </body>
</html>