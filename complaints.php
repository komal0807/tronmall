<?php 
ob_start();
session_start();
include("include/connection.php");
// print_r($_SESSION); die;
if($_SESSION['frontuserid']=="")
{header("location:login.php");exit();}
    // $id = $_SESSION['frontuserid'];
    // $query = "select amount from `tbl_bonus` where userid = '".$id."' ";
    // $run = mysqli_query($con, $query);
    // $rows = mysqli_fetch_array($run);
    // print_r($rows); die;
    $_SESSION["mes"]="";
    if (isset($_POST['submit'])) {
    //   echo $_POST['select'];
    //   echo $_POST['Reference'];
    //   echo $_POST['Whatsapp'];
    //   echo $_POST['floatingTextarea2'];
      if($_POST['select'] &&   $_POST['Whatsapp'] && $_POST['floatingTextarea2']){
         $select= $_POST['select'];
         $refer= sprintf("%06d", mt_rand(100000, 999999));
         $whatsapp= $_POST['Whatsapp'];
         $float= $_POST['floatingTextarea2'];
         $userid=$_SESSION['frontuserid'];
         $query="INSERT INTO `comlaints`(`userid`, `type`, `ref_id`, `whatsapp`, `description`) VALUES ($userid,$select, '".$refer."', '".$whatsapp."', '".$float."')";
        //  echo $query;
         $sql=mysqli_query($con,$query);
        //  echo $query;
         $_SESSION["mes"]="suc";
      }
      else{   
        $_SESSION["mes"]="fail";
      }
      
    }



?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php include'head.php' ?>

<link rel="stylesheet" href="assets/css/style.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Bitter Mobile Template">
<meta name="keywords" content="bootstrap, mobile template, bootstrap 4, mobile, html, responsive" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .app
        {
        display: flex;
        justify-content: center;
        min-height: 100vh;
        width: 100vw;
        }
        .main
        {
            background-color: #f1f1f1;
            height: -webkit-fit-content;
            height: -moz-fit-content;
            height: fit-content;
            
            position: absolute;
            width: 100vw;
            margin: auto;
        }
    </style>
</head>

<body>
<?php
// include("include/connection_1.php");
$userid=$_SESSION['frontuserid'];
?>

<!-- App Header -->
<div class="appHeader1">
  <div class="left"> <a href="#" onClick="goBack();" class="icon goBack"> <i class="icon ion-md-arrow-back"></i> </a>
    <div class="pageTitle">Complaints & Suggestions</div>
      </div>    
        
      </div>
  </div>
</div>
<!-- searchBox --> 
      <div id="appCapsule" class="pb-2">
        <div class="pb-5">
          <ul class="nav nav-tabs size2" id="myTab3" role="tablist">
            <li class="nav-item" style="width: 50%;"> 
              <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#complete" role="tab">COMPLETED</a> 
            </li>
            <li class="nav-item" style="width: 50%;"> 
              <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#wait" role="tab">Wait</a>
            </li>
          </ul>
            <div class="mt-1">
               <div class="tab-content" id="myTabContent">
       <!--=========================tab-1========================================-->
                  <div class="tab-pane fade active show" id="complete" role="tabpanel">
                  <div class="row">
                  <div class="col-12">
                  <div class="table-container listView pl-2 pr-2">  
                  <div class="app">
    <div class="main">
       
        <div class="container mt-4">
          <form action=" " method="POST">
            <label class="form-label ms-1" for="select">Type</label>
            <select class="form-select mb-3" name="select" id="select" aria-label="Default select example" require>
              <option value="1">Suggestion</option>
              <option value="2">Consult</option>
              <option value="3">Recharge Problem</option>
              <option value="4">Withdraw Problem</option>
              <option value="5">Parity Problem</option>
              <option value="6">Gift Receive Problem</option>
              <option value="7">Other</option>
          </select>
          <label class="form-label ms-1 mt-4" for="Whatsapp">Whatsapp</label>
          <input type="text" name="Whatsapp" class="form-control " id="Whatsapp" require value="">
          <label class="form-label ms-1 mt-4" for="floatingTextarea2">Description</label>
          <textarea class="form-control" name="floatingTextarea2" placeholder="Description of complain" id="floatingTextarea2" style="height: 100px" require value=""></textarea>
          
            <div class="fs-6 mt-4 w-75 mx-auto text-center">Service: 10:00~17:00, Mon~Fri about 1~5 business day</div>
            <?php if($_SESSION["mes"] == "suc" ){?>
              <div class="alert alert-success" role="alert">
              Successfully Done!
            </div>
              <?php }
              else if($_SESSION["mes"] == "fail" ){?>
                <div class="alert alert-danger" role="alert">
                Fill the all require things!
              </div>
                <?php }?>
          
         
            <button type="submit"  value="submit" name="submit" class="btn btn-sm btn-primary mt-4 d-block mx-auto">Continue</button>
          </form>
         
        </div>

    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
               
                  </div>
                  </div>            
                  </div>
                  </div>
       <!--=========================tab-1 end========================================-->
       <!--=========================tab-2========================================-->
                  <div class="tab-pane fade" id="wait" role="tabpanel">
                  <div class="row">
                  <div class="col-12">
                  <div class="table-container listView pl-2 pr-2">  
                                      <!-- Content Wrapper. Contains page content -->
                      <div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                        

                        <!-- Main content -->
                        <section class="content">
                          <div class="row">
                            <div class="col-xs-12">


                              <div class="box">
                                
                                <!-- /.box-header -->
                                <div class="box-body">
                                  <form id="formID" name="formID" method="post" action="#" enctype="multipart/form-data">
                                    <!--<div class="table-responsive"> -->
                                    <table id="example1" class="table table-bordered table-striped">
                                      <thead>
                                        <tr>
                                          <th>Sr.No</th>
                                          <th>Type</th>
                                          <th>Reference ID</th>
                                          <th>Whatsapp</th>
                                          <th>Description</th>
                                          <th>Date</th>                                          
                                          <th>Status</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                        $userid=$_SESSION['frontuserid'];
                                        $Query = mysqli_query($con, "select * from `comlaints`  where userid=".$userid." order by id desc");
                                        $i = 0;
                                        while ($row = mysqli_fetch_array($Query)) {
                                          $i++;
                                           ?>
                                          <tr>
                                            <td><?php echo @$i; ?></td>
                                            <td><?php echo @$row['type']; ?></td>
                                            <td><?php echo @$row['ref_id']; ?></td>
                                            <td><?php echo strtoupper(@$row["whatsapp"]); ?></td>
                                            <td><?php echo strtoupper(@$row["description"]); ?></td>
                                            <td><?php echo @$row["time"]; ?></td>
                                            
                                            <td><?php if ($row['status'] == 1) {
                                                  echo "Resolve";
                                                } elseif ($row['status'] == 0) {
                                                  echo "Pending";
                                                } elseif ($row['status'] == 2) {
                                                  echo "Rejected";
                                                } ?></td>
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
                  </div>
                  </div>            
                  </div>
                  </div>
               </div>
            </div>      
        </div>
      </div>
<!-- appCapsule -->
<!-- * searchBox --> 



<!-- Jquery --> 
<script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
<!-- Bootstrap--> 
<script src="assets/js/lib/popper.min.js"></script> 
<script src="assets/js/lib/bootstrap.min.js"></script> 
<!-- Owl Carousel --> 
<script src="assets/js/plugins/owl.carousel.min.js"></script> 
<!-- Main Js File --> 
<script src="assets/js/app.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/bonus.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>



</body>
</html>