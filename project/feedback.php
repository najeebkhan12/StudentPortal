<?php  
session_start();
if(!empty(@$_SESSION['username'])) {

  $uname = @$_SESSION['username'];	
  require('connect.php');	
  $course = @$_GET['C_id'];
  $review = @$_GET['rev'];
  $comment = @$_GET['comm'];
  $link = connect();

  $query = "SELECT Reg_id FROM course_registration WHERE C_id = '$course' AND std_email = '$uname'";
  $res = query($link, $query);
  $reg = mysqli_fetch_array($res);
  $fdb_querry="insert into feedback (Reg_std_id, S_Description, Std_review) VALUES ('$reg[0]','$comment','$review')";
  $res = query($link, $fdb_querry);
  if($res) {
    	echo "Feedback Submitted";
	}

  else	{  	
	 echo "Feedback Cannot be Submitted";         }       
    }


else {
	header("location:index.html");
}

?>