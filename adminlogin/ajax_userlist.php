<?php
include ("include/connection.php");
if($_POST['id'])
{

$id=$_POST['id'];

$sql=mysqli_query($con,"select * from `tbl_reward` where `userid` ='".$id."'");
$Query = mysqli_query($con, "select * from `tbl_recharge` where status=1 and `userid` ='".$id."'");
$Query2 = mysqli_query($con, "select * from `tbl_withdrawal` where status=0 and `userid` ='".$id."'");

// echo "select * from `tbl_reward` where `userid` ='".$id."'";
// echo "select * from `tbl_recharge` where status=1 and `userid` ='".$id."'";
// echo "select * from `tbl_withdrawal` where status=0 and `userid` ='".$id."'";

$row2=mysqli_num_rows($Query2);
$row1=mysqli_num_rows($Query);                   
$rows=mysqli_num_rows($sql);
if($rows!='' || $rows1!=''){
?>
<div class="col-xs-12 text-center">
<h4>User History</h4>
<table class="table table-bordered table-striped text-center">
    <tr>
        <th>Amount</th>
        <th>type</th>
        <th>Date</th>
    </tr>




<?php
while($row=mysqli_fetch_array($sql))
{
$id=$row['id'];
?>
<tr>
    <td><?php echo $row['amount']; ?></td>
    <td>Reward</td>
    <td><?php echo @date('d-m-Y', strtotime($row['createdate']));?></td>
    </tr>
<?php }?>

<?php
while($row1=mysqli_fetch_array($Query))
{
$id=$row1['id'];
?>
<tr>
    <td><?php echo $row1['amount']; ?></td>
    <td>Recharge</td>
    <td><?php echo @date('d-m-Y', strtotime($row1['createdate']));?></td>
    </tr>
<?php }?>

<?php
while($row2=mysqli_fetch_array($Query2))
{
$id=$row2['id'];
?>
<tr>
    <td><?php echo $row2['amount']; ?></td>
    <td>Withdrawal</td>
    <td><?php echo @date('d-m-Y', strtotime($row2['createdate']));?></td>
    </tr>
<?php }?>


</table>
</div>
<?php 
}else{
$id='0';
$data='Nothing found...';
?>
<div class="col-xs-12 text-center">
<h4>Reward History</h4>
<table class="table table-bordered table-striped text center">
    <tr><td colspan="2"><?php echo $data;?></td></tr>
</table>
</div>
<?php
}
}
?>