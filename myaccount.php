<?php
ob_start();
session_start();
if ($_SESSION['frontuserid'] == "") {
  header("location:login.php");
  exit();
} ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php include 'head.php' ?>
  <link rel="stylesheet" href="assets/css/style.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <style>
    .vcard {
      padding: 16px;
      background: #009688 !important;
    }



    .logout {
      background-image: linear-gradient(#F5F5F5, #F5F5F5) !important;
    }

    .appHeader1 {
      background-color: #fff !important;
      border-color: #fff !important;
    }

    .appContent3 {
      background-color: #009688 !important;
      border-color: #009688 !important;
      padding: 12px;
      border-radius: 3px;
      font-size: 14px;
    }

    .user-block img {
      width: 40px;
      height: 40px;
      float: left;
      margin-right: 10px;
      background: #333;
    }

    .img-circle {
      border-radius: 50%;
    }

    .accordion .btn-link {
      box-shadow: none;
      padding: 8px !important;
      margin: 0px 0px;
      color: #333 !important;
      font-size: 16px;
      font-weight: normal;
      border-top: solid 1px #ccc;
    }

    .accordion .collapsed {
      border: none;
    }

    .accordion .show {
      border-bottom: solid 1px #ccc;
    }

    .accordion .sub-link {
      box-shadow: none;
      padding: 8px !important;
      color: #333 !important;
      font-size: 14px;
      font-weight: normal;
      display: block;
    }

    .accordion .sub-link:hover {
      color: #00F !important;
    }

    .accordion .btn-link:hover {
      background: #F5F5F5;
    }

    .accordion .btn-link {
      position: inherit;
    }

    .accordion .btn-link::after {
      content: "\f107";
      color: #333;
      top: 8px;
      right: 9px;
      position: absolute;
      font-family: "FontAwesome";
      font-size: 24px;
    }

    .accordion .btn-link[aria-expanded="true"]::after {
      content: "\f106";
    }

    .light {
      height: 24px;
      padding: 0px 0px;
      margin: 5px 2px;
      border-radius: 20px;
      width: 24px;
    }

    .light1 {
      height: 26px;
      padding: 0px 0px;
      margin: 5px 2px;
      border-radius: 20px;
      width: 26px;
    }

    .nameContainer {
      display: flex;
      justify-content: flex-start;
      align-items: center;
    }

    img {
      width: 25px;
      height: 25px;
    }


    /* Just i start from here */
    .mine_top[data-v-ecfa0006] {
      width: 100%;
      box-sizing: border-box;
      box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);
      transition: .3s cubic-bezier(.25, .8, .5, 1);
      background: #fff;
    }

    .mine_top .mine_info[data-v-ecfa0006] {
      width: 100%;
      background: #009688;
      border-radius: 2px;
      padding: 12px 8px 8px 8px;
      box-sizing: border-box;
    }

    .mine_info_top[data-v-ecfa0006] {
      width: 100%;
      display: flex;
      flex-direction: row;
      justify-content: space-between;
    }

    .info_left[data-v-ecfa0006] {
      display: flex;
      flex-direction: row;

    }

    .info_left img[data-v-ecfa0006] {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: #424242;
      margin: 0 5px 0 13px;
      border: 0;
      box-shadow: 0 3px 5px -1px rgba(0, 0, 0, .2), 0 6px 10px 0 rgba(0, 0, 0, .14), 0 1px 18px 0 rgba(0, 0, 0, .12) !important;
    }

    .info_left ul[data-v-ecfa0006] {
      color: #fff;
      font-size: 14px;
      margin-left: -25px;
    }

    .info_left ul li[data-v-ecfa0006] {
      line-height: 22px;
    }

    .info_right .notice[data-v-ecfa0006] {
      width: 40px;
      height: 40px;
      background: #fff;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .mine_top_items[data-v-ecfa0006] {
      display: flex;
      align-items: center;
      justify-content: space-around;
      color: #fff;
      font-size: 16px;
      padding: 10px 0;
    }

    .top_item[data-v-ecfa0006] {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .top_item>div[data-v-ecfa0006] {
      margin-bottom: 5px;
    }

    .top_item>button[data-v-ecfa0006] {
      border-color: #2196f3 !important;
      padding: 0 8px;
      margin-top: 5px;
      width: 80px;
      font-size: 14px;
    }

    .one_btn[data-v-ecfa0006] {
      background: #2196f3 !important;
      color: #fff !important;
    }
  </style>
</head>

<body>
  <?php
  include("include/connection.php");
  $userid = $_SESSION['frontuserid'];
  $selectruser = mysqli_query($con, "select * from `tbl_user` where `id`='" . $userid . "'");
  $userresult = mysqli_fetch_array($selectruser);
  $selectwallet = mysqli_query($con, "select * from `tbl_wallet` where `userid`='" . $userid . "'");
  $walletResult = mysqli_fetch_array($selectwallet);
  $sqlwall = "SELECT * FROM `tbl_rechargetemp` WHERE `userid`='$userid'";
  $reswall = mysqli_query($con, $sqlwall);
  $rowwall = mysqli_fetch_assoc($reswall);
  $walletbalance = $rowwall['amount'];
  $userwallet = mysqli_query($con, "select sum(level1) as level1, sum(level2) as level2, sum(level3) as level3 from `tbl_bonus` where `userid`='" . $_SESSION['frontuserid'] . "'");
  $userwal = mysqli_fetch_assoc($userwallet);
  ?>
  <!-- Page loading -->
  <div class="loading" id="loading">
    <div class="spinner-grow"></div>
  </div>
  <!-- * Page loading -->

  <!-- App Header -->
  <div>
    <div>
      <div class="row">
        <div class="col-12 mb-1">
          <!-- <div class="user-block"> <img class="img-circle img-bordered-lg" src="assets/img/headimg.webp"> </div>
        User : Member_ <?php echo user($con, 'mobile', $userid); ?><br>
        ID : <?php echo sprintf("%06d", user($con, 'id', $userid)); ?><br>
        Mobile  : <?php echo user($con, 'mobile', $userid); ?><br>
        Available Balance : ₹ <?php echo number_format(wallet($con, 'amount', $userid), 2); ?><br><br>
         -->
          <!-- <p style="font-size:15px;color:white" class="text-left">Mobile  : <?php echo user($con, 'mobile', $userid); ?><br><span style="margin: 0 0 0 10px"></span></p> -->

          <!-- <p style="font-size:15px;color:white">Available Balance : ₹ <?php echo number_format(wallet($con, 'amount', $userid), 2); ?><br><span style="margin: 0 0 0 10px"></span></p>
    <a href="manualRecharge.php"><button  class="btn-sm" style="color:white;background: #2196f3!important;border: 0px solid ;border-radius:10px"> Recharge </button></a>
    <button type="submit" class="btn-sm" style="color:black;background: #fff !important;border: 0px solid ;border-radius:10px"> Change Nick Name </button>-->
          <div data-v-ecfa0006 class="mine_top">
            <div data-v-ecfa0006 class="mine_info">
              <div data-v-ecfa0006 class="mine_info_top">
                <div data-v-ecfa0006 class="info_left">
                  <img data-v-ecfa0006 alt class="photo_img" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgaGVpZ2h0PSIxMDAiIHdpZHRoPSIxMDAiPjxyZWN0IGZpbGw9InJnYigxOTcsMjI5LDE2MCkiIHg9IjAiIHk9IjAiIHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIj48L3JlY3Q+PHRleHQgeD0iNTAiIHk9IjUwIiBmb250LXNpemU9IjUwIiB0ZXh0LWNvcHk9ImZhc3QiIGZpbGw9IiNmZmZmZmYiIHRleHQtYW5jaG9yPSJtaWRkbGUiIHRleHQtcmlnaHRzPSJhZG1pbiIgYWxpZ25tZW50LWJhc2VsaW5lPSJjZW50cmFsIj45PC90ZXh0Pjwvc3ZnPg==">
                  <ul data-v-ecfa0006 style="list-style-type: none;">
                    <li data-v-ecfa0006>User: <?php echo user($con, 'mobile', $userid); ?></li>
                    <li data-v-ecfa0006>ID: <?php echo sprintf("%06d", user($con, 'id', $userid)); ?></li>
                  </ul>
                </div>
                <div data-v-ecfa0006 class="info_right">
                  <div data-v-ecfa0006 class="notice">
                    <img data-v-ecfa0006 src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAACxklEQVRoQ+2ZP2gUQRTGv7dHqjSWahVBicQyB4J/IGkEW0XBzk5stNiZvSNNkibc7pstFATt7ARFLAUbA2pAMKXBoIWVWtqkkOP2ycAdRHOX3dmbu1zCPjgWbt68937zvpvdmyWM0LTWTwBc6aZ4w8x3RpWORhVYKbVMRCu744vIijFmdRQ5RwaitZZ+BddqtVOtVuu7b5ixg4jIojFmvQIZsAJeO6K1vgVgAcB899Mv7R8ieiQiG8z80ldnvIBora8DuA/gsmNh7wA88AE0FEiz2ZzpdDrLAG47Avzv/rRWq60OswmUBtFa3wCQAJgZEqI33e5kETO/KBOvFEgX4nmZhAXm3CwD4wyilFogorcFCirtUmaLdgbRWlsIuzON0taZedElgRNIv8cOl2Quvq6PM4VBlpaWTrTb7U8ATroUNITvj6mpqfra2trPIjEKg4yzG73CXbriAvKViE4XWR1fPiLyzRhzpki8QiCNRuNClmUfigT07RMEwcU4jjfy4hYCOQhZucpr4kEAPGbmu4e+IwBeMfO1owBS6OZ4GKRVgeyR40HuWgCqjlQdydsiS45X0qqkVVI6edMqaVXSytNIyfFKWpW0Skonb1p5aSmlzgNYJSJ7PZaXaUzjv0XkI4BlY4y9/mN9/49ore35lX3HMYm2ycz1XJAwDOeCIPg8iQS9mrIsO5em6dbuGvd0JIqiWRH5MskgRHQ2SZLtfUHs4JGQlgUJw/AqET0c98lingrsyaOI3EvT9HXub6TnoJSaFpE5IprOSzCOcRHZIaItY8xOv3yFTlHGUeiwOSqQQSuolHpGRMf3W2ER+WWMse/kvZn3jkRRpEXEvu0daEQUJUnC3igAeAcJw3A+CAL7ZDDQsiyrp2m6OdEg3fuQAjBoxTUzG58QNpb3jvQKbDQal7IsawGY7X63HQRBM47j974hbLy/futAQjLys7MAAAAASUVORK5CYII=" alt>
                  </div>
                </div>
              </div>
              <div data-v-ecfa0006 class="mine_top_items">
                <div data-v-ecfa0006 class="top_item">
                  <div data-v-ecfa0006> ₹ <?php echo number_format((wallet($con, 'amount', $userid) + $walletbalance), 2); ?></div>
                  Balance
                  <form action="recharge.php">
                    <button data-v-ecfa0006 class="one_btn ripple">
                      Deposit
                    </button>
                  </form>
                </div>
                <div data-v-ecfa0006 class="top_item">
                  <div data-v-ecfa0006> ₹ <?php echo ($userwal['level1'] + $userwal['level2'] + $userwal['level3']); ?></div>
                  Commission
                  <form action="promotion.php">
                    <button style="border-color: #2196f3!important; padding: 0 8px; margin-top: 5px; width: 80px;font-size: 14px;background: #2196f3!important;color: #fff!important;">
                      See
                    </button>
                  </form>
                </div>
                <div data-v-ecfa0006 class="top_item">
                  <div data-v-ecfa0006> ₹ 00</div>
                  Interest
                  <button data-v-ecfa0006 class="one_btn ripple">
                    See
                  </button>
                </div>
              </div>
            </div>
          </div>



        </div>


      </div>


      <div class="container">
        <div class="row align-items-start">
          <div class="col">

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
  <div class="appContent1 mb-5">
    <div class="contentBox long mb-3">
      <div class="contentBox-body card-body">

        <!-- listview -->

        <div class="accordion" id="accordionExample">
          <!--<div class="card-header">
            <h2 class="mb-0"> <a href="order.php" class="btn btn-link collapsed">Bonus Records </a> </h2>
          </div> -->
          <!-- <div class="card-header">
            <h2 class="mb-0"> <a href="order.php" class="btn btn-link collapsed">Orders </a> </h2>
          </div> -->
          <!--<div class="card-header">
            <h2 class="mb-0"> <a href="transactions.php" class="btn btn-link collapsed">Transactions</a> </h2>
          </div> -->

          <div class="card-header">
            <div class="nameContainer">
              &nbsp; <i class="fa fa-calendar-check-o" style="font-size:21px"></i>
              <h2 class="mb-0"> <a href="promotionrecord.php" class="btn btn-link collapsed">Bonus Record </a> </h2>
            </div>
          </div>


          <br>
          <div class="card-header">
            <div class="nameContainer">
              <img src="./assets/img/Icons/Promotion.png">
              <h2 class="mb-0"> <a href="promotion.php" class="btn btn-link collapsed"> Promotion </a> </h2>
            </div>
          </div>

          <br>
          <div class="card-header">
            <div class="nameContainer">
              <img src="./assets/img/Icons/redenvelop.png">
              <h2 class="mb-0"> <a href="redenvelop.php" class="btn btn-link collapsed"> Red Envelope </a> </h2>
            </div>
          </div>

          <br>
          <div class="card-header" id="headingThree">
            <div class="nameContainer">
              <img src="./assets/img/Icons/Wallet.png">
              <h2 class="mb-0"> <a href="#" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Wallet </a> </h2>
            </div>

            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <a href="recharge.php?" class="sub-link"> Deposit </a>
              <a href="withdrawal.php" class="sub-link"> Withdrawal </a>
              <a href="transactions.php" class="sub-link"> Transactions </a>
            </div>
          </div>
          <br>
          <div class="card-header">
            <div class="nameContainer">
              <img src="./assets/img/Icons/Bank Card.png">
              <h2 class="mb-0"> <a href="manage_bankcard.php" class="btn btn-link collapsed"> Account Details</a> </h2>
            </div>
          </div>
          <br>
          <!-- <div class="card-header">
            <div class="nameContainer">
           <img src="./assets/img/Icons/Address.png">
            <h2 class="mb-0"> <a href="#" class="btn btn-link collapsed"> Address </a> </h2>
          </div> 
        </div>
         <br> -->

          <div class="card-header" id="headingThree">
            <div class="nameContainer">
              <img src="./assets/img/Icons/Account Security.png">
              <h2 class="mb-0"> <a href="#" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseone" aria-expanded="false" aria-controls="collapseone">Account Security </a> </h2>
            </div>
            <div id="collapseone" class="collapse">
              <a href="resetpassword.php" class="sub-link"> Reset Password </a>
            </div>
          </div>
          <br>
          <div class="card-header">
            <div class="nameContainer">
              &nbsp; <i class="fa fa-calendar-check-o" style="font-size:21px"></i>
              <h2 class="mb-0"> <a href="promotionrecord.php" class="btn btn-link collapsed" data-toggle="modal" href="#rule" data-backdrop="static" data-keyboard="false" class="btn btn-sm btn-light">
                  Rules </a> </h2>
            </div>
            
          </div>
           <br>
          <div class="card-header">
            <div class="nameContainer">
              <img src="./assets/img/Icons/App Download.png">
              <h2 class="mb-0"> <a href="#" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="false" aria-controls="collapsefour"> App Download </a> </h2>
            </div>
            <div id="collapsetwo" class="collapse">
              <a href="./assets/vwin.apk" class="sub-link"> AS Dhb royal </a>

            </div>
          </div>
          <br>
          <div class="card-header">
            <div class="nameContainer">
              <img src="./assets/img/Icons/Complaints.png">
              <h2 class="mb-0"> <a href="https://t.me/newhope20" class="btn btn-link collapsed"> Join Teligram Support </a> </h2>
            </div>
          </div>
          <br>
          <div class="card-header">
            <div class="nameContainer">
              <img src="./assets/img/Icons/sugges.png">
              <h2 class="mb-0"> <a href="complaints.php" class="btn btn-link collapsed"> Complaints & Suggestions </a> </h2>
            </div>
          </div>
          <br>
          <div class="card-header">
            <div class="nameContainer">
              <img src="./assets/img/Icons/About.png">
              <h2 class="mb-0"> <a href="#" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix"> About Us </a> </h2>
            </div>

            <div id="collapsesix" class="collapse" aria-labelledby="headingsix" data-parent="#accordionExample">
              <a href="privacy.php" class="btn btn-link collapsed"> Privacy Policy </a>
              <a href="riskagreement.php" class="btn btn-link collapsed">Risk Disclosure Agreement </a>
              <!-- <a href="refund.php" class="btn btn-link collapsed">Refund Policy</a>
          <a href="terms-and-conditions.php" class="btn btn-link collapsed">Terms & Conditions</a>
          <a href="contact.php" class="btn btn-link collapsed">Contact Us</a>
          <a href="about.php" class="btn btn-link collapsed">About Us</a> -->
            </div>
          </div>

          <!-- <div class="card-header">
            <h2 class="mb-0"> 
             <a href="https://t.me/myspo11" class="btn btn-link collapsed"><i class="fa fa-telegram text-primary" style="font-size:16px"></i>
           Join Telegram </a> </h2>
          </div> -->

        </div>

        <!-- * listview -->

      </div>
    </div>

    <!-- app Footer -->
    <div class="text-center mt-4 "> <a href="logout.php" class="btn btn-sm  logout" style="width:200px; background-image: linear-gradient(
#29B6F6, 
#29B6F6);">Logout</a> </div>
    <!-- * app Footer -->

  </div>
  <!-- appCapsule -->
  <?php include("include/footer.php"); ?>
  <!-- Jquery -->

  <!-- chat bot -->

  <script src="https://app.wotnot.io/chat-widget/5HYsNfAk3BQd062048601248PaW2MKsk.js" defer></script>

  <!-- Jquery -->
  <script src="assets/js/lib/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap-->
  <script src="assets/js/lib/popper.min.js"></script>
  <script src="assets/js/lib/bootstrap.min.js"></script>
  <!-- Owl Carousel -->
  <script src="assets/js/plugins/owl.carousel.min.js"></script>
  <!-- Main Js File -->
  <script src="assets/js/app.js"></script>
</body>

</html>