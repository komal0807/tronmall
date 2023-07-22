<?php 
$con =  @mysqli_connect('localhost', 'tronmall', 'tronmall', 'tronmall');




if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    
    
    
    $qry = "SELECT * FROM tbl_user";
    $response = mysqli_query($con, $qry);
    $users = mysqli_fetch_array($row);
   
    
    while($row = mysqli_fetch_assoc($response)){
     //    print_r($row); 
     
    $sqlqry1 =  "SELECT * FROM tbl_intrest_amt where `userid`='".$row['id']."' ";
    $response1 = mysqli_query($con, $sqlqry1);
    $users1 = mysqli_fetch_assoc($response1);
    
    if(!empty($users1)){
        
             $selectwallet=mysqli_query($con,"select * from `tbl_wallet` where `userid`='".$row['id']."' ");
            $oldAmt=mysqli_fetch_array($selectwallet);
            $oldAmount =  $oldAmt['amount'];
            $userid = $oldAmt['userid'];
            $newAmt = $oldAmount + $oldAmount * 0.05;
            $points = $oldAmount * 0.05;
            
            echo $userid." ".$oldAmount." ".$newAmt."<br>";
            
        $useridup = $row['id'];
        
         $sqlfetch =mysqli_query($con,"select * from `tbl_intrest_amt` where `userid`='".$row['id']."' ");
         $sqlfetchresult=mysqli_fetch_array($sqlfetch);
         $oldpt  =  $sqlfetchresult['amount'] + $points ;
        
        
         
            
             $sqlUpdateQuery1 = mysqli_query($con,"UPDATE tbl_wallet  SET  amount = $newAmt  WHERE userid = $useridup ");
             
             
             
             $sqlUpdateQuery1 = mysqli_query($con,"UPDATE tbl_intrest_amt  SET  amount = $oldpt  WHERE userid = $useridup ");
             
             
             
             
              
             
        
    }else{
        
           $selectwallet=mysqli_query($con,"select * from `tbl_wallet` where `userid`='".$row['id']."' ");
            $oldAmt=mysqli_fetch_array($selectwallet);
            $oldAmount =  $oldAmt['amount'];
            $userid = $oldAmt['userid'];
            $newAmt = $oldAmount * 0.05;
            $userid_new = $row['id'];
            $points =0;
            
        
        $sqlinsert =  mysqli_query($con,"INSERT INTO `tbl_intrest_amt` (userid, amount) VALUES ('$userid_new','$newAmt')" );
        
    }
        
    }
    
    
    

            
   
    }
    
        
    
    
    
    
 
    

       
  

?>