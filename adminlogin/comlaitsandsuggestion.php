<?php
ob_start();
session_start();
if ($_SESSION['userid'] == "") {
  header("location:index.php?msg1=notauthorized");
  exit();
}
?>

<?php


if (isset($_POST['reject'])) {

  include("include/connection.php");
  $id = $_POST['id'];
  $userid = $_POST['userid'];

  $wal11 = mysqli_query($con, "UPDATE `comlaints` SET status = 2 WHERE userid =  $userid && id = $id");
  if ($wal11) {
    echo '<meta http-equiv="refresh" content="1">';
  } else {
    echo '<script>alert("Rejected !"); </script>';
  }
}
if (isset($_POST['approve'])) {

  include("include/connection.php");
  $id = $_POST['id'];
  $userid = $_POST['userid'];

  $wal11 = mysqli_query($con, "UPDATE `comlaints` SET status = 1 WHERE userid =  $userid && id = $id");
  if ($wal11) {
    echo '<meta http-equiv="refresh" content="1">';
  } else {
    echo '<script>alert("Resolve Problems !"); </script>';
  }
}


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DHB Royal | Manage Withdrawal Request</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <link href="css/custom.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="css/app.css" id="maincss">

</head>

<body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper">
    <?php include("include/connection.php"); ?>
    <?php include("include/header.inc.php"); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include("include/navigation.inc.php"); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Manage Complain and Suggestion</h1>
        <ol class="breadcrumb">
          <li><a href="desktop.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Manage Complain and Suggestion</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">


            <div class="box">
              <div class="box-header box-header2">
                <div class="col-xs-6 text-right">
                  <h3 class="box-title"><?php
                                        if (isset($_GET['msg']) == "updt") { ?>
                      <font size="+1" color="#FF0000">Update Successfully...</font>
                    <?php  } ?>
                  </h3>
                </div>
                <div class="col-sm-6">
                  <div class="pull-right">&nbsp;</div>
                </div>

              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <form id="formID" name="formID" method="post" action="#" enctype="multipart/form-data">
                  <!--<div class="table-responsive"> -->
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Sr.No</th>
                        <th>User Id</th>
                        <th>Type</th>
                        <th>Out Id</th>
                        <th>Number</th>
                        <th>Description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $Query = mysqli_query($con, "select * from `comlaints`  where status=0 order by id desc");
                      $i = 0;
                      while ($row = mysqli_fetch_array($Query)) {
                        $i++;
                        ?>
                        <tr>
                       

                          <td><?php echo @$i; ?></td>
                          <td><?php echo @$row['userid']; ?></td>
                          <?php if($row['type']==1){?>
                             <td>Suggestion</td>
                          <?php } ?>
                          <?php if($row['type']==2){?>
                             <td>Consult</td>
                          <?php } ?>
                          <?php if($row['type']==3){?>
                             <td>Recharge Problem</td>
                          <?php } ?>
                          <?php if($row['type']==4){?>
                             <td>Withdraw Problem</td>
                          <?php } ?>
                          <?php if($row['type']==5){?>
                             <td>Parity Problem</td>
                          <?php } ?>
                          <?php if($row['type']==6){?>
                             <td>Gift Receive Problem</td>
                          <?php } ?>
                          <?php if($row['type']==7){?>
                             <td>Other</td>
                          <?php } ?>





                          <td><?php echo strtoupper(@$row["ref_id"]); ?></td>
                          <td><?php echo strtoupper(@$row["whatsapp"]); ?></td>
                          <td><?php echo @$row["description"]; ?></td>
                          <td>
                            <form action=" " method="POST">
                              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                              <input type="hidden" name="userid" value="<?php echo $row['userid']; ?>">
                              <input class="btn btn-primary" type="submit" name="approve" value="Resolve">
                            </form> <br>
                            <form action=" " method="POST">
                              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                              <input type="hidden" name="userid" value="<?php echo $row['userid']; ?>">
                              <input class="btn btn-danger" type="submit" name="reject" value="Reject">
                            </form>
                          </td>
                          
                        </tr>
                      <?php } ?>

                    </tbody>
                  </table>
                  <!--</div>-->
                 
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
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include("include/footer.inc.php"); ?>
  </div>
  <!-- ./wrapper -->
  <script>
    $(function() {
      $('#example1').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": true,
        "pageLength": 100
      });
    });
  </script>
</body>

</html>