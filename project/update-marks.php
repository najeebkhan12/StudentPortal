<?php 
  require('connect.php');
  $cid = $_POST['cid'];	
  $eval_type = $_POST['eval_type'];
  $std_id = $_POST['std_id'];
  $eval_id = $_POST['eval_id'];
  $marks = $_POST['marks']; 

  $conn = connect();
  
  $query = "UPDATE ".$eval_type." SET MarksObtained = '$marks' WHERE std_id ='$std_id' AND ID = '$eval_id'";
  $res = query($conn, $query);
  if ($res == 1)
  	echo "Marks Updated";
  else
  	echo "Cannot Update Marks";

  close($conn);
?>