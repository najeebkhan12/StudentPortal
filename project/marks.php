<?php 
	require('connect.php');

// Assignment

  $cid = $_GET['cid'];	
  $eval_type = $_GET['eval_type'];



  $conn = connect();
  
  if ($eval_type == "assignment") {
  	   $query  = "SELECT StudentID, MarksAssigned, MarksObtained, weightage, date FROM assignments WHERE  CourseID = '$cid' ORDER BY date ASC";
	  $res2 = query($conn, $query);
	  $count = 1;
					
	   echo "<table class='table table-bordered table-hover'><thead><tr><td>Student Name</td><td>Student ID</td><td>Marks Obtained</td></tr></thead><tbody>"; 

	   while($row2 = mysqli_fetch_assoc($res2)) {
	   		$sname = getStudentName($row['StudentID']);
	      		echo "<tr><td>".$sname."</td><td>".$row2['StudentID']."</td><td><input type='text' id='".$row2['StudentID']."MarksObtained' value='".$row2['MarksObtained']."'></td><td>
	      			<input type='button' value='Save' onclick='save(".$row2['StudentID'].")'>
	      			</td></tr>";
	                     
	   }          
	  echo "</tbody></table>"; 
	}
   //Quizzes

	else if ($eval_type == "quiz") {

	  $query  = "SELECT MarksAssigned, MarksObtained, weightage, date FROM quizzes WHERE  CourseID = '$cid' ORDER BY date ASC";
	  $res2 = query($conn, $query);
	  $count = 1;
	  $row2 = mysqli_fetch_assoc($res2);
	  
	   echo "<table class='table table-bordered table-hover'><thead><tr><td><td>Marks Obtained</td></thead><tbody>";              
	   while($row2 = mysqli_fetch_assoc($res2)) {
	   		$sname = getStudentName($row['StudentID']);
	      echo "<tr><td>".$sname."</td><td>".$row2['StudentID']."</td><td><input type='text' id='".$row2['StudentID']."MarksObtained' value='".$row2['MarksObtained']."'></td><td>
	      			<input type='button' value='Save' onclick='save(".$row2['StudentID'].")'>
	      			</td></tr>";
	                          
	   }          
	     
  
  echo "</tbody></table>"; 
  } 
  close($conn);

  function getStudentName($sname){
  		$query = "SELECT std_name FROM student WHERE std_id ='$sname'";
  		$conn = connect();
  		$row = mysqli_fetch_assoc(query($conn, $query));
  		close($conn);
  		return $row['std_name'];
  }
?>