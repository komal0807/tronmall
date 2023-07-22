<?php
ob_start();
session_start();
if ($_SESSION['userid'] == "") {
    header("location:index.php?msg1=notauthorized");
    exit();
}
?>

<?php
include("include/connection.php");

$sql_data = mysqli_query($con, "Select * from setting");
// while($row = mysqli_fetch_assoc($sql_data)) {
//     echo "Roll No: " . $row["status"];
// }


?>


<!DOCTYPE html>
<html lang="en">

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

    <link rel="stylesheet" href="css/app.css" id="maincss">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">
        <?php include("include/header.inc.php"); ?>
        <!-- Left side column. contains the logo and sidebar -->
        <?php include("include/navigation.inc.php"); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- main section -->
            <section class="content" style="min-height:600px;">
                <div class="row">
                    <div class="col-xs-12">


                        <div class="box">
                            <div class="box-body">

                                <?php
                                if (mysqli_num_rows($sql_data) > 0) {
                                    $sn = 1;
                                    while ($data = mysqli_fetch_assoc($sql_data)) {
                                        // echo ($data['status']);
                                ?>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" <?php if ($data["status"] == '1') {
                                                                                echo "checked";
                                                                            } ?> onclick="toggle_Status();" type="checkbox" role="switch" id="flexSwitchCheckChecked" />

                                            <label class="form-check-label" for="flexSwitchCheckChecked">ON/OFF Withdraw Button</label>
                                        </div>
                                    <?php
                                        $sn++;
                                    }
                                } else { ?>
                                    <tr>
                                        <td colspan="8">No data found</td>
                                    </tr>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
        </div>
        <?php include("include/footer.inc.php"); ?>

    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function toggle_Status() {
        var id = 1;
        $.ajax({
            url: "switch_post.php",
            type: "post",
            data: {
                id: id
            },
            success: function(result) {
                if (result == '1') {
                    swal.fire("Done!, withdraw Button is ON, successfully ")
                } else {
                    swal.fire("Done!, withdraw Button is OFF, successfully");
                }

            }
        });
    }
</script>

</html>