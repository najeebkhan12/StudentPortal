<?php 
	require('connect.php');

// Assignment

  $cid = $_GET['cid'];	
  $eval_type = $_GET['eval_type'];



  $conn = connect();
  
  
  $query  = "SELECT `ID`, `CourseID`, `StudentID`, `MarksAssigned`, `MarksObtained`, `WeightageAssigned`, `WeightageObtained`, `date` FROM `".$eval_type."` WHERE  CourseID = '$cid' ORDER BY date ASC";

  $res2 = query($conn, $query);
  $count = 1;
				
  echo "<table class='table table-bordered table-hover'><thead><tr><td>Student Name</td><td>Student ID</td><td>Marks Obtained</td></tr></thead><tbody>"; 

   while($row2 = mysqli_fetch_assoc($res2)) {
   		$sname = getStudentName($row2['StudentID']);
      		echo "<tr><td>".$sname."</td><td>".$row2['StudentID']."</td><td>".$row2['MarksObtained']."</td></tr>";
                     
   }          
  echo "</tbody></table>"; 
	
  close($conn);

  function getStudentName($sname){
  		$query = "SELECT Std_name FROM student WHERE std_email ='$sname'";
  		$conn = connect();
  		$row = mysqli_fetch_assoc(query($conn, $query));
  		close($conn);
  		return $row['Std_name'];
  }
?>