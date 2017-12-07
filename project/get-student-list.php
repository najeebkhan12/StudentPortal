<?php 
require('connect.php');
 $cid = $_POST['cid'];
 $query = "SELECT std_email FROM course_registration WHERE c_id = '$cid'";
 $conn = connect();
 $res = query($conn, $query);
 $count = 0;
 $std = array();
 $myobj = array();
	while($row2 = mysqli_fetch_assoc($res)){
		$count++;
		$sname = getStudentName($row2['std_email']);		
		echo "<tr><td>".$sname."</td><td id='".$count."smail'>".$row2['std_email']."</td><td><input type='number' id='".$count."mo' value='0'></td><td id='".$count."status'></td></tr>";		
	}
	echo "<input type='hidden' id='st-count' value='".$count."'>";
	function getStudentName($sname){
	  		$query1 = "SELECT std_name FROM student WHERE std_email ='$sname'";
	  		$conn = connect();
	  		$row = mysqli_fetch_assoc(query($conn, $query1));
	  		close($conn);
	  		return $row['std_name'];
	  }
?>