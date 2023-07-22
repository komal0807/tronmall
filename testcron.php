<?php

$con =  @mysqli_connect('localhost', 'mango-1234', 'fghbgvfyfvjh567', 'mango-1234');



if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    
    $sqlinsert =  mysqli_query($con,"INSERT INTO `tbl_test` (test) VALUES ('123')" );
    
}

?>