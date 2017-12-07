


<?php


@session_start();
include('../connect.php');
$link = connect();
if(!(empty($_SESSION['username'])))
{
	if(isset($_POST['submit']))
	{
	$com=$_POST['comment'];
	$email=$_SESSION['username'];
	$type=$_SESSION['type'];
	$c_id=2;

		if((strcmp($type,"instructor"))==0)
			$querry = "insert into discussion_form (C_id,id,type,Comment) VALUES ('$c_id','$email','instructor','$com')"; // for INSTRUCTOr
	
		else
			$querry = "insert into Discussion_form (C_id,id,type,Comment) VALUES ('$c_id','$email','student','$com')";  // for students
			       

			            $c_q =mysqli_query($link, $querry);
             

	}  //2nd submit button



}   // check session first

else 
	echo "please login First then you discuss any problem regarding Courses Thankyou ...! ";
	
?>

<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' type="text/css" rel='stylesheet'>
	<script>
		function subm(){
				alert("function is calling");
	
			var xhttp;
			if(window.XMLHttpRequest)
				xhttp= new XMLHttpRequest();
			else
				xhttp = new ActiveXObject("Microsoft.XMLHTTP");

			xhttp.onreadystatechange=function(){
				if(this.readyState==4 && this.status==200){

					document.getElementById("display").innerHTML=(this.responseText);
				}
			};

		xhttp.open("GET","question_display.php?like_id="+0,true);
		xhttp.send();
		}		
	
	</script>

<script>
	function likes(v){
		var xhttp;
		if(window.XMLHttpRequest)
			xhttp=new XMLHttpRequest();
		else
			xhttp=new ActiveXObject("Microsoft.XMLHTTP");

		xhttp.onreadystatechange=function(){
			if(this.readyState==4 && this.status==200)
				{
					document.getElementById(v).innerHTML=(this.responseText);
				}
		};
		xhttp.open("GET","question_display.php?like_id="+v,true);
		xhttp.send();

	}
</script>



<title>NUCES Discussion Forum</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../font-awesome-4.7.0/css/font-awesome.min.css"> 
<style>
p {
	font-family: verdana;
	font-size:12px;
}

.space {
	height:50px;
}

.space2 {
	height:100px;
}
</style>
</head>
	<body onload="subm()">
		<div class='space'></div>
	    <div class ='container'>
			<div class="text-center">
			<h4 class="info"><i class="fa  fa-houzz fa-3x"></i>  NUCES Discussion Forum<hr></h4>
			<h5>
			NUCES Discussion Forum is a community of student, programmers and teachers, just like you, helping each other.Here you can post any Question in the Post, box below and you can also answer the questions and help your fellows
			</h5>
			</div>
		</div>
		<div class='space2'></div>
		<div class="container">					
			<div class='row'>
				<div class="col-lg-4 col-md-6 col-sm-4">
					<h3>Have a Question? Post It Here&nbsp; <i class='fa fa-chevron-circle-right'></i> </h3>
				</div>
				<div class='col-lg-8 col-md-6 col-sm-4'>	
					<form method="post" name="df" action="discussion_form.php"><br>
						<textarea  rows='5' class="form-control" name="comment" id="comment" placeholder="Discuss your problem" rows="5"></textarea>
						<br>					
						<input type="submit" class="btn btn-primary" name="submit" id="btn" value="Post" onclick="subm()"/>
					</form>
				</div>			
			</div>
		</div>
		<div class='container'>
			<h3>Top Questions<hr class='divider'></h3>
			<div id="display"></div>

		</div>
	</body>
</html>




