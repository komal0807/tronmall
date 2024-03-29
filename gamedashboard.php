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
<?php include 'head.php';?>
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<style>

.modal-header{
    background-color : #009688 !important;
}
.btn {
    border-radius: 0px 0px 0px 0px;
    border: 0px solid white;
    width: 65px;


    transition: 0.5s;
    
}

.appHeader1 {
  background-color: #fff !important;
  border-color: #fff !important;
}
.appContent3 {
  background-color: #009688 !important;
  border-color: #009688 !important;
  padding:10px;
  border-radius:3px;
  font-size:16px;
}
.user-block img {
  width: 40px;
  height: 40px;
  float: left;
  margin-right:10px;
  background:#333;
}
.img-circle {
  border-radius: 50%;
}
.reaload {
  box-shadow:none;
}
.ion-md-refresh {
  font-size:26px !important;
}
.responsive {
  height:300px;
  overflow-x: auto;
}
.vcard {
  box-shadow:none;
}
p.ratio {
    font-size: 17px;
    margin: -6px;
    font-style: normal;
    font-weight: normal;
}
h5{ color:#888; font-size:20px; font-weight:normal;}
h5 span{ color:#333; font-size:22px;}
/* .divsize4 .btn{padding: 0 10px; width:100px;} */

.gamehouse
{
    align-items: center;
    display: flex;
    justify-content: space-between;
    padding: 10px;
}
.divsize4
{
    border-radius: 6px;
    color: #f8f8ff;
    cursor: pointer;
    font-family: serif;
    height: -webkit-fit-content;
    height: -moz-fit-content;
    height: fit-content;
    line-height: 24px;
    margin: 2px;
    padding: 6px 0 4px;
    transition: -webkit-transform .1s;
    transition: transform .1s;
    transition: transform .1s,-webkit-transform .1s;
    white-space: nowrap;

    align-items: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    width: -webkit-fill-available;
}
.green{
    background: #00c282;
    box-shadow: 0 0 8px rgb(0 194 130 / 40%);
}
.violet
{
    background: #6655d3;
}
.red{
  background: #fa3c09;
}
.divsize4 img
{
    background-size: contain;
    display: inline-flex;
    height: 36px;
    min-width: 40px;
    mix-blend-mode: luminosity;
    vertical-align: middle;
}
.left-addon input {
    padding-left: 20px;
}
.error {
    top: 45px;
}
.containerrecord{border-bottom: solid 2px #565EFF;}
.recordlink{
    font-size: 26px;
    color: #333;
  border-bottom: solid 2px #565EFF ;
}
.recordlink .title{font-size: 14px;
font-weight: 500;}
#alert h4{font-size: 1rem;}
#alert p{font-size: 13px; margin-top:25px;}
#alert .modal-content{border-radius:3px}
#alert .modal-dialog{padding:30px; margin-top:200px;}
#payment .modal-dialog{padding:10px;margin-top:60px;}
#loader .modal-dialog{padding:30px; margin-top:200px;}


.transcation-content .kline .buttonBox .oddNumber button[data-v-02a17d78] {
    background-color: #2cc741;
}

.btn-info .oddNumber{
    background :red;
}

.selected
{
background-color:green;
}


</style>
</head>

<body>
<?php
include("include/connection.php");
$userid=$_SESSION['frontuserid'];
$selectruser=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
$userresult=mysqli_fetch_array($selectruser);
$selectwallet=mysqli_query($con,"select * from `tbl_wallet` where `userid`='".$userid."'");
$walletResult=mysqli_fetch_array($selectwallet);
$sqlwall = "SELECT * FROM `tbl_rechargetemp` WHERE `userid`='$userid'";
$reswall = mysqli_query($con, $sqlwall);
$rowwall = mysqli_fetch_assoc($reswall);
$walletbalance = $rowwall['amount'];
$sql="select* FROM `tbl_paymentsetting` WHERE id='1'";
$query=mysqli_query($con,$sql);
$role=mysqli_fetch_array($query);
//print_r($role['gamevalue0']);die;
?>
<!-- Page loading -->


<!-- App Header -->
<div class="vcard">
  <div class="appContent3 text-white">
    <div class="row">
      <div class="col-12">
        <div class="col-12 mb-1" style="font-size:18px;">Available balance: ₹ <span id="balance"><?php echo number_format((wallet($con,'amount',$userid)+$walletbalance), 2); ?></span></div>
        <div class="col-12">
          <div> <a href="recharge.php" class="btn btn-sm btn-primary m-0" style="background: #2196f3!important;font-size:14px;width:80px">&nbsp;Deposit&nbsp;</a> <a  data-toggle="modal" href="#rule" data-backdrop="static" data-keyboard="false" class="btn btn-sm btn-light" style="background: white!important;font-size:14px;width:80px">Trend</a>
<!-- <a  data-toggle="modal" href="#" data-backdrop="static" data-keyboard="false" class="btn btn-sm btn-light" style="background: white!important;border-radius:12px;font-size:10px;width:250px">Support : aonemalls111@gmail.com</a>  -->         
          <a href="javascript:void(0);" onClick="reloadbtn(<?php echo $userid;?>);" class="reaload text-white pull-right mt-1" onclick="getResultbyCategory(parity,parity)"> <div  class="user-block" > <img class="img-circle img-bordered-lg" src="assets/img/icon/reloadbutton.png" style="background:#009688; height:20px;width:20px; margin: 10px -10px 10px 10px"> </div></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- searchBox --> 

<!-- * searchBox --> 
<!-- * App Header --> 

<!-- App Capsule -->
<div class="mb-5">
  <div class="long mb-3">      
      <!-- listview -->
      <ul class="nav nav-tabs size4" id="myTab3" role="tablist">
        <li class="nav-item"> 
<a class="nav-link active" id="home-tab3" data-toggle="tab" href="#parity" role="tab" onClick="tabname('parity');getResultbyCategory('parity','parity');">Parity</a> 
        </li>
        
       
        <li class="nav-item"> 
<a class="nav-link" id="profile-tab3" data-toggle="tab" href="#sapre" role="tab" onClick="tabname('sapre');getResultbyCategory('sapre','sapre');">Sapre</a>
         </li> 
        <li class="nav-item"> 
<a class="nav-link" id="contact-tab3" data-toggle="tab" href="#bcone" role="tab" onClick="tabname('bcone');getResultbyCategory('bcone','bcone');">Bcone</a> 
        </li>
        <li class="nav-item"> 
<a class="nav-link" id="contact-tab3" data-toggle="tab" href="#emerd" role="tab" onClick="tabname('emerd');getResultbyCategory('emerd','emerd');">Emerd</a> 
        </li> 
      </ul>
      <!--=====================game area============================-->
      <div class="appContent1 bg-light mt-n1">
      <div class="layout">
        <div class="gameidtimer"> 
      <h5 class="mb-2"><i class="icon ion-md-trophy"></i> Period</h5>
      <h5>
      <span class="showload">
      <div class="spinnner-border text-danger" role="status">
                    </div></span>
             <span id="gameid" class="none"><?php echo sprintf("%03d",gameid($con));?></span>
             <input type="hidden" id="futureid" name="futureid" value="<?php echo sprintf("%03d",gameid($con));?>">
             </h5>
      </div>
      <div class="gameidtimer text-right"> 
      <h5 class="mb-2">Count Down</h5>
       <h5 id="demo"></h5>
      </div>
      </div>
      <div class="game_house d-flex">
          <div class="divsize4 green" onClick="betbutton('#1DCC70','button','Green');">
            <img src="https://www.fastwin.app/includes/icons/rocket.png" alt="">
            <p style="font-weight: bold;"> Join Green</p>
        </div>
        
          <div class="divsize4 violet" onClick="betbutton('#1DCC70','button','Violet');">
            <img src="https://www.fastwin.app/includes/icons/rocket.png" alt="">
            <p style="font-weight: bold;"> Join Violet</p>
          </div>
          
              <div class="divsize4 red" onClick="betbutton('#1DCC70','button','Red');">
                <img src="https://www.fastwin.app/includes/icons/rocket.png" alt="">
                <p style="font-weight: bold;"> Join Red</p>
              </div>
          </div>
<br>
      
      <div cla="container-fluid  ">
          <div class="layout text-center bg-light  d-flex justify-content-center">

            <div class="divsize2" id="0">
              <button type="button" class="btn btn-md  gbutton none" style="border-radius:36px;height: 53px; width: 59px; background-color: rgb(235, 247, 255); color:rgb(52, 58, 64); border-bottom: 2px solid #6655d3; font-size:20px;" >0<p class="ratio">1:<?php echo $role['gamevalue0'] ?></p></button>

            </div>
            <div class="divsize2" id="1">
              <button type="numbutton" class="btn btn-md  gbutton none " style="border-radius:36px; height:53px; width:59px;background-color: rgb(235, 247, 255); border-bottom: 2px solid #fa3c09; font-size:20px; color:rgb(52, 58, 64)" >1<p class="ratio">1:<?php echo $role['gamevalue1'] ?></p></button>
            </div>

            <div class="divsize2" id="2">
              <button type="button" class="btn btn-md  gbutton none" style="border-radius:36px; height:53px; width: 59px;background-color: rgb(235, 247, 255); border-bottom: 2px solid #00c282; font-size:20px; color:rgb(52, 58, 64)" >2<p class="ratio">1:<?php echo $role['gamevalue2'] ?></p></button>
            </div>

            <div class="divsize2" id="3">
              <button type="button" class="btn btn-md  gbutton none  " style="border-radius:36px; height:53px; width: 59px;background-color: rgb(235, 247, 255); border-bottom: 2px solid #6655d3; font-size:20px; color:rgb(52, 58, 64)" >3<p class="ratio">1:<?php echo $role['gamevalue3'] ?></p></button>
            </div>

            <div class="divsize2" id="4">
              <button type="button" class="btn btn-md  gbutton none  " style="border-radius:53px; height:53px; width: 59px;background-color: rgb(235, 247, 255); border-bottom: 2px solid #fa3c09; font-size:20px; color:rgb(52, 58, 64)" >4<p class="ratio">1:<?php echo $role['gamevalue4'] ?></p></button>
            </div>

          </div>
          <div class="layout text-center bg-light d-flex justify-content-center">

            <div class="divsize2" id="5">
              <button type="button" class="btn btn-md  gbutton none" style="border-radius:36px; height:53px; width: 59px;background-color: rgb(235, 247, 255); border-bottom: 2px solid #00c282; font-size:20px; color:rgb(52, 58, 64)" >5 <p class="ratio">1:<?php echo $role['gamevalue5'] ?></p></button>
            </div>

            <div class="divsize2" id="6">
              <button type="button" class="btn btn-md  gbutton none  " style="border-radius:53px; height:53px; width: 59px;background-color: rgb(235, 247, 255); border-bottom: 2px solid #6655d3; font-size:20px; color:rgb(52, 58, 64)" > 6 <p class="ratio">1:<?php echo $role['gamevalue6'] ?></p></button>
            </div>

            <div class="divsize2" id="7">
              <button type="button" class="btn btn-md  gbutton none number oddNumber" style="border-radius:36px; height:53px; width: 59px; border-bottom: 2px solid #fa3c09; font-size:20px; background-color: rgb(235, 247, 255);color:rgb(52, 58, 64)" >7 <p class="ratio">1:<?php echo $role['gamevalue7'] ?></p></button>
            </div>
            <div class="divsize2" id="8">
              <button type="button" class="btn btn-md  gbutton none  " style="border-radius:36px; height:53px; width: 59px;background-color: rgb(235, 247, 255); border-bottom: 2px solid #00c282; font-size:20px; color:rgb(52, 58, 64)" > 8 <p class="ratio">1:<?php echo $role['gamevalue8'] ?></p></button>
            </div>
            <div class="divsize2" id="9">
              <button type="button" class="btn btn-md  gbutton none number oddNumber" style="border-radius:36px; height:53px; width: 59px;background-color: rgb(235, 247, 255); border-bottom: 2px solid #6655d3; font-size:20px; color:rgb(52, 58, 64)" >9 <p class="ratio">1:<?php echo $role['gamevalue9'] ?></p></button>
            </div>
          </div>
  <button type="button" id="getID" value="Buy" >Buy</button>
   
        </div>
      </div>
      <!--=====================game area end============================-->
      
      <div class="mt-1 pb-5">
      <div class="tab-content" id="myTabContent">
      <!--=========================tab-1========================================-->
        <div class="tab-pane fade active show" id="parity" role="tabpanel"></div>
       <!--=========================tab-1 end========================================-->
       <!--=========================tab-2========================================-->
        <div class="tab-pane fade" id="sapre" role="tabpanel"></div>
        <!--=========================tab-2 end========================================-->
        <!--=========================tab-3========================================-->
        <div class="tab-pane fade" id="bcone" role="tabpanel"></div>
        <!--=========================tab-3 end========================================-->
        <!--=========================tab-4========================================-->
        <div class="tab-pane fade" id="emerd" role="tabpanel"></div>
        <!--=========================tab-4 end========================================-->
      </div>
      </div>
  </div>
</div>
<!-- appCapsule -->
<?php include("include/footer.php");?>
<div id="rule" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-header"> </div>
      <div class="modal-body responsive"> <?php echo content($con,"rule");?> </div>
      <div class="modal-footer"> 
      <a type="button" class="pull-left" data-dismiss="modal"><strong>CLOSE</strong></a> 
      </div>
    </div>
  </div>
</div>

<div id="payment" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-header paymentheader" id="paymenttitle" style="background-color: rgb(24 127 255);"> 
      <h4 class="modal-title" id="chn"></h4>
       </div>
 <form action="#" method="post" id="bettingForm" autocomplete="off">
      <div class="modal-body mt-1" id="loadform">
      <div class="row">
                    <div class="col-12">
                    <p class="mb-1">Contract Money</p>
                    <div class="btn-group btn-group-toggle mb-2" data-toggle="buttons">
                        <label class="btn btn-secondary active" onClick="contract(10);">
                          <input class="contract" type="radio" name="contract" id="hoursofoperation" value="10" checked >
                          10 </label>
                        <label class="btn btn-secondary" onClick="contract(100);">
                          <input type="radio" class="contract" name="contract" id="hoursofoperation" value="100">
                          100 </label>
                          <label class="btn btn-secondary" onClick="contract(1000);">
                          <input type="radio" class="contract" name="contract" id="hoursofoperation" value="1000">
                          1000 </label>
                          <label class="btn btn-secondary" onClick="contract(10000);">
                          <input type="radio" class="contract" name="contract" id="hoursofoperation" value="10000" >
                          10000 </label>
                      </div>
                      
                   <input type="hidden" id="contractmoney" name="contractmoney" value="10">   
                      
                    <p class="mb-1">Contract Count</p>
      <div class="def-number-input number-input safari_only">
  <button type="button" onClick="this.parentNode.querySelector('input[type=number]').stepDown(); addvalue();" class="minus"></button>
  <input class="quantity" min="1" name="amount" id="amount" value="1" type="number" onKeyUp="addvalue();">
  <button type="button" onClick="this.parentNode.querySelector('input[type=number]').stepUp(); addvalue();" class="plus"></button>
</div>
<input type="hidden" name="userid" id="userid" class="form-control" value="<?php echo $userid;?>">
      <input type="hidden" name="type" id="type" class="form-control">
      <input type="hidden" name="value" id="value" class="form-control" >
      <input type="hidden" name="counter" id="counter" class="form-control" >
      <input type="hidden" name="inputgameid" id="inputgameid" class="form-control" value="<?php echo sprintf("%03d",gameid($con));?>"> 
      <div class="mt-2">Total contract money is <span id="showamount">10</span></div>
      <input type="hidden" name="finalamount" id="finalamount" value="10">
      <div class="custom-control custom-checkbox mt-2">
    <input type="checkbox" checked class="custom-control-input" id="presalerule" name="presalerule">
  <label class="custom-control-label text-muted" for="presalerule">I agree <a data-toggle="modal" href="#privacy" data-backdrop="static" data-keyboard="false">PRESALE RULE</a></label>
                        </div>
                    </div>
                    
                </div>
      </div>
      <input type="hidden" name="tab" id="tab" value="parity">
      <div class="modal-footer"> 
   <a type="button" class="pull-left btn btn-sm closebtn" data-dismiss="modal">CANCEL</a>
<button type="submit" class="pull-left btn btn-sm btn-white">CONFIRM</button> 
      </div>
      </form>
    </div>
  </div>
</div>
<div id="alert" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body" id="alertmessage"> </div>
      <div class="text-right pb-1 pr-2">
    <a type="button" class="text-info" data-dismiss="modal">OK</a>
    </div> 
    </div>
  </div>
</div>
  <div id="loader" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <div class="modal-content" style="background:transparent; border:none;">
    <div class="text-center pb-1">
  <a type="button" id="closbtnloader" data-dismiss="modal"> <div class="spinner-grow text-success"></div></a></div>
  
    </div>
    </div>
  </div>
<!-- Jquery --> 
<script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
<!-- Bootstrap--> 
<script src="assets/js/lib/popper.min.js"></script> 
<script src="assets/js/lib/bootstrap.min.js"></script> 
<!-- Owl Carousel --> 
<script src="assets/js/plugins/owl.carousel.min.js"></script> 
<!-- Main Js File --> 
<script src="assets/js/app.js"></script>
<script src="assets/js/betting.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>

 
 
<script>
$(document).ready(function () {
    $('.divsize2').click(function () {
      $(this).toggleClass('selected');  
 });
var ids = new Array();
    $('#getID').click(function () {

    var selected_activities =$('.selected');
    var ids = new Array();

    selected_activities.each(function(){
          var id_str   =  $(this).attr("id");

          var id_arr      =  id_str.split("_");

          var selval       =  id_arr[1];
          
        //if(selval!='undefined' && selval!='' && selval!=null){
            ids.push(id_arr);
        //}
    });
    if(ids == "")
    {
      $('#alert').modal('show');
      document.getElementById('alertmessage').innerHTML = "<h4>Fail !</h4><p>Please select value !</p>";
                  return false;

    }
    betbutton('','button',ids)
    
});
var x = setInterval(function() { 
start_count_down(); 
  $('#closbtnloader').click(); 
}, 1e3);

getResultbyCategory('parity','parity');

$('#example').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
});
function start_count_down() { 
$(".showload").hide();
$(".none").show();
var countDownDate = Date.parse(new Date) / 1e3;
  var now = new Date().getTime();
  var distance = 180 - countDownDate % 180;
  //alert(distance);
  var i = distance / 60,
   n = distance % 60,
   o = n / 10,
   s = n % 10;
  var minutes = Math.floor(i);
  var seconds = ('0'+Math.floor(n)).slice(-2);
  document.getElementById("demo").innerHTML = "<span class='timer'>0"+Math.floor(minutes)+"</span>" + "<span>:</span>" +"<span class='timer'>"+seconds+"</span>";
document.getElementById("counter").value = distance;
if(distance==180 || distance==175 || distance==170 || distance==165 || distance==160){
generateGameid();
getResultbyCategory('parity','parity');
getResultbyCategory('sapre','sapre');
getResultbyCategory('bcone','bcone');
getResultbyCategory('emerd','emerd');
}
if(distance<=30)
{
$(".gbutton").prop('disabled', true);
}else{ 
$(".gbutton").prop('disabled', false);
  }
}

function generateGameid()
{
var futureid=$('#futureid').val();
  $.ajax({
    type: "Post",
    data:"futureid=" + futureid + "& type=" + "generate" ,
    url: "periodid-generation.php",
    success: function (html) {
     //alert(html);
   var arr = html.split('~');
   //alert(arr[1]);
   document.getElementById("gameid").innerHTML=arr[0];
   document.getElementById("inputgameid").value=arr[0];
   document.getElementById("futureid").value=arr[0];
      return false;
      },
      error: function (e) {}
      });
  }
  
  function betbutton(color,type,name)
{
  $.ajax({
    type: "Post",
    data:"type=" + type+ "& name=" + name ,
    url: "betform.php",
    success: function (html) {
    
   document.getElementById("loadform").innerHTML=html;
      return false;
      },
      error: function (e) {}
      });

  if(type=='number'){
  $(".paymentheader").css("background-color", color);
  document.getElementById('chn').innerHTML = 'Select '+name;

    }else{
  $(".paymentheader").css("background-color", color);
  document.getElementById('chn').innerHTML = 'Join '+name;
  }
  $('#payment').modal({backdrop: 'static', keyboard: false})  
     $('#payment').modal('show');
     document.getElementById('type').value = type;
   document.getElementById('value').value = name;

  }
//=====================amount calculation====================== 
function contract(abc){ //alert(abc);
var amount =$("#amount").val();
document.getElementById('contractmoney').value = abc;
var addvalue=abc*amount;
document.getElementById('showamount').innerHTML = addvalue;
document.getElementById('finalamount').value = addvalue;

};  
function addvalue()
{ 
var amount =$("#amount").val();
var contractmoney =$("#contractmoney").val();
var addvalue=contractmoney*amount;
document.getElementById('showamount').innerHTML = addvalue;
document.getElementById('finalamount').value = addvalue;
  }

function tabname(tabname){
document.getElementById('tab').value = tabname; 
  } 

//=====================amount calculation======================
//====================== get Result==============================

function getResultbyCategory(category,containerid)
{ 
$.ajax({
    type: "Post",
    data:"category=" + category,
    url: "getResultbyCategory.php",
    success: function (html) {
   document.getElementById(containerid).innerHTML=html;
   waitlist('parity',<?php echo $userid;?>,'paritywait');
   waitlist('sapre',<?php echo $userid;?>,'saprewait');
   waitlist('bcone',<?php echo $userid;?>,'bconewait');
   waitlist('emerd',<?php echo $userid;?>,'emerdwait');
   if(category=='parity'){
    $('#parityt').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
  $('#myrecordparityt').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
   }
   else if(category=='sapre'){
    $('#sapret').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
  $('#myrecordsapret').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
   }
   else if(category=='bcone'){
    $('#bconet').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
  $('#myrecordbconet').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
   }
   else if(category=='emerd'){
    $('#emerdt').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
  $('#myrecordemerdt').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
   }
      return false;
      },
      error: function (e) {}
      });
   
  }

$(document).ready(function () {
  waitlist('parity',<?php echo $userid;?>,'paritywait');
});
  function reloadbtn(id){
    $('#loader').modal({backdrop: 'static', keyboard: false})  
 $('#loader').modal('show');

$.ajax({
    type: "Post",
    data:"userid=" + id,
    url: "getwalletbalance.php",
    success: function (html) {
   
      document.getElementById('balance').innerHTML =html;
      return false;
      },
      error: function (e) {}
      });
  
  }

</script>


</body>
</html>