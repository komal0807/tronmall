<?php $urlpage= basename($_SERVER['PHP_SELF']);
$active='';

?>
<?php //include ("include/header.inc.php");?>
 <?php //include ("include/connection.php");
 $sql="SELECT * FROM `social_settings` where `id`='1'";
$query=mysqli_query($con,$sql);
$role=mysqli_fetch_array($query);

 ?>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<div class="appBottomMenu">
  <!-- <div class="item <?php if($urlpage=='index.php'){echo'active';}?>"> <a href="index.php">
    <p> <img src="assets/img/home.png" alt="" style="height:25px; margin-bottom:15px;"> <span>Home</span> </p>
    </a> </div>
  <div class="item <?php if($urlpage=='search.php'){echo'active';}?>"> <a href="search.php">
    <p> <img src="assets/img/magnifying-glass.png" alt="" style="height:25px; margin-bottom:15px;"> <span>Search</span> </p>
    </a> </div> -->
   <?php if(isset($_SESSION['frontuserid'])){?>
    <div class="item <?php if($urlpage=='gamedashboard.php'){echo'active';}?>"> <a href="gamedashboard.php">
    <p> <img src="assets/img/trophy.png" alt="" style="height:25px; margin-bottom:15px;"> <span>Win</span> </p>
    </a> </div>
    
    <div class="item <?php if($urlpage=='index.php' || $urlpage=='signup.php' || $urlpage=='forgot-password.php' || $urlpage=='myaccount.php' || $urlpage=='recharge.php' || $urlpage=='transactions.php'){echo'active';}?>"> <a href="myaccount.php" >
    <p> <img src="assets/img/user.png" alt="" style="height:25px; margin-bottom:15px; "> <span>My</span> </p>
    </a> </div>
    <?php }else{?>
  <div class="item <?php if($urlpage=='index.php' || $urlpage=='signup.php' || $urlpage=='forgot-password.php'){echo'active';}?>"> <a href="index.php" class="icon toggleSidebar">
    <p> <img src="assets/img/user.png" alt="" style="height:25px; margin-bottom:15px;"> <span>My</span> </p>
    </a> </div>
    <?php }?>
      <div class="dropdown">
  <button><i style="font-size:24px" class="fa fa-share-alt"></i></button>
  <div class="dropdown-options">
    <a href="<?php echo @$role['facebook']; ?>" class="fa fa-facebook"></a>
    <a href="<?php echo @$role['twitter']; ?>" class="fa fa-twitter"></a>
    <a href="<?php echo @$role['instagram']; ?>" class="fa fa-instagram"></a>
    <a href="<?php echo @$role['telegram']; ?>" class="fa fa-telegram"></a>
    
  </div>
</div>
</div>

<style type="text/css">
  .fa {
  padding: 10px;
  font-size: 30px;
  width: 50px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}
.fa-telegram {
  background: #55ACEE;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}

.dropdown {
  display: inline-block;
  position: relative;
}

.dropdown-options {
  display: none;
  position: relative;
  overflow: auto;
}

.dropdown:hover .dropdown-options {
  display: block;
}


</style>