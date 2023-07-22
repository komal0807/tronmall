<?php 
ob_start();
session_start();
if($_SESSION['frontuserid']=="")
{header("location:login.php");exit();}?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php include'head.php' ?>
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Bitter Mobile Template">
<meta name="keywords" content="bootstrap, mobile template, bootstrap 4, mobile, html, responsive" />
<style>
h3 {
	font-weight:normal;
}
.tdtext{ font-size:16px !important; color:##1B2C42; !important; font-weight:normal; text-align:right;}
.tdtext2{ font-size:16px !important; color:#f00 !important; font-weight:normal; text-align:right;}
.tdtext3{ font-size:16px !important; color:#FFB400 !important; font-weight:normal; text-align:right;}

.text small{ font-size:12px; color:#888;}
.listView .listItem {
   padding: 0px 55px 0px 0px;
}
.listView .listItem .text {
    font-size: 16px;
}
.dropdown-menu{ background:#fff;top: -15px;
left: -145px; border:none;
border-radius:0px;
-webkit-box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);
box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);}
.appHeader1 .right{right:20px;}
.dropdown-item {
    padding: .75rem 1.5rem;
}

</style>

</head>

<body>
<?php
include("include/connection.php");
$userid=$_SESSION['frontuserid'];
?>


<!-- App Header -->
<div class="appHeader1">
  <div class="left"> <a href="#" onClick="goBack();" class="icon goBack"> <i class="icon ion-md-arrow-back"></i> </a>
    <div class="pageTitle">Red Enevelop</div>
  </div>
  <div class="right"> 
  <div class="dropdown">
 

</div>
  </div>
  
  
</div>
<!-- searchBox --> 

<!-- * searchBox --> 
<!-- * App Header --> 

<!-- App Capsule -->
<div id="appCapsule" class="pb-2">
  <div class="pb-5">
   <section class="">
      <div >
        <div class="col-xs-12">
          

          <div class="box">
          
            <!-- /.box-header -->
            <div class="box-body">
            <form id="formID" name="formID" method="post" action="#" enctype="multipart/form-data">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Sr.No</th>
                
                  <th>Time</th>
                   <th>Amount</th>
                </tr>
                </thead>
                <tbody>
     <?php
  $Query=mysqli_query($con,"SELECT * FROM `tbl_userreward` WHERE userid='".$_SESSION['frontuserid']."' ORDER BY id DESC");
  $i=0; 
  
  while($row=mysqli_fetch_array($Query)){$i++;
   ?>   
                <tr>
                  <td><?php echo $i;?>.</td>
                 
                
                  <td><?php echo @$row["time"]; ?></td>
                 
                   <td style="color:green;"><?php echo @$row["amount"]; ?></td>
                   
   
     
                </tr>
        <?php }?>
               
               
                </tbody>
                
              </table>
              
              </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </div>
</div>
<!-- appCapsule -->

<?php include("include/footer.php");?>


<script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
<!-- Bootstrap--> 
<script src="assets/js/lib/popper.min.js"></script> 
<script src="assets/js/lib/bootstrap.min.js"></script> 
<!-- Owl Carousel --> 
<script src="assets/js/plugins/owl.carousel.min.js"></script> 
<!-- Main Js File --> 
<script src="assets/js/app.js"></script> 
<script src="assets/js/jquery.dataTables.min.js"></script>

<script>

  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
	$('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>