<?php 
	require('connect.php'); 
  
  $cid = $_POST['cid'];	
  $eval_type = $_POST['eval_type'];
  $std_id = $_POST['std_id'];
  $eval_id = $_POST['eval_id'];
  $MA = $_POST['ma'];
  $MO = $_POST['mo'];
  $WA = $_POST['wa'];
  $date = $_POST['date']; 
  $WO = ((float)$MO/(float)$MA) * (float)$WA;
  /*
  $cid = 1; 
  $eval_type = 'assignments';
  $std_id = 'najeeb.khan12@outlook.com';
  $eval_id = '1';
  $MA = '8';
  $MO = '6';
  $WA = '2';
  $WO = ((float)$MO/(float)$MA) * (float)$WA;
  $date = '1-1-1';
*/
  $conn = connect();
  
  $query = "INSERT INTO ".$eval_type." (`ID`, `CourseID`, `StudentID`, `MarksAssigned`, `MarksObtained`, `WeightageAssigned`, `WeightageObtained`,`date`) VALUES('$eval_id','$cid','$std_id','$MA', '$MO', '$WA','$WO' ,'$date')";

  $res = query($conn, $query);
  if ($res == 1)
    echo "Added";
  else
    echo "Cannot Added";
  close($conn);

?>