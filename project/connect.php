<?php 
	function connect(){
			$conn = mysqli_connect("localhost","root", "", "project") or die("Cannot connect to Database");
			return $conn;
	}

	function close($conn) {
			mysqli_close($conn);
	}

	function query($conn, $query) {
		$res = mysqli_query($conn, $query);
		return $res; 
	} 
 ?>