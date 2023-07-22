<?php 
include("include/connection.php");
$id=$_POST['id'];
$sql_data=mysqli_query($con,"Select * from setting where id='$id' ");
$data = mysqli_fetch_assoc($sql_data);

$status=$data['status'];
if($status=='1'){
    $status='0';
}
else{
    $status='1';
}
$update="UPDATE setting set status='$status' where id='$id' ";
$result=mysqli_query($con,$update);
if($result){
    echo $status;
}


	?>