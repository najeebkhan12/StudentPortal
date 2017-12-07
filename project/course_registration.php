<?php  

require('connect.php');

session_start();
if (empty($_SESSION['username'] && $_SESSION['password'])) {
	header("location:index.html");
}


$uname = $_SESSION['username'];
$cid = $_REQUEST['cid'];
$con = connect();
$query = "SELECT C_id FROM course_registration WHERE std_email = '$uname' AND C_id = '$cid' ";
$res = query($con, $query);

if (mysqli_num_rows($res) > 0) {
	echo "Course Already Registered";
	close($con);
}

else
{
	$con = connect();
	$query = "INSERT INTO course_registration(C_id, std_email) VALUES('$cid','$uname')";
	$res = query($con, $query);
	close($con);
	if($res == 1) {
		echo "Registered";
	}

	else {
		echo "Error Registering";
	}
}
?>