<?php
include("include/connection.php");
session_start();
$mobile=user($con,'mobile',$userid);
echo $mobile;
?>