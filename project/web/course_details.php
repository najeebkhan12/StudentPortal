<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE HTML>
<html>
<head>
<title>Course Details</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script async="" src="./analytics.js.download"></script><script src="./81759863.js.download"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script> 
<script src="js/bootstrap.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="./edxcourse.css">

<style type="text/css">

hr { 
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
} 

.togle{

	display:none;
}

.sty{
color:black;
font-size:30px;
}

.comment{
margin-left:20px;
}

#rew{
color:red;
font-size: 20px;
margin-left:2px;
}

.nme{
font-size:20px;
margin-left:5px;
}

p {
	font-family: Century;
	font-size:10px;
}




</style>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#click").click(function(){
        $("#togle").toggle();
    });
});
</script>

 <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- start plugins -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!--font-Awesom-->
   	<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
<!--font-Awesome-->
</head>
<body>
<div class="header_bg1">
<div class="container">
	<div class="row header">
		<div class="logo navbar-left">
			<h1><a href="index.php">Learner </a></h1>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="row h_menu">
		<nav class="navbar navbar-default navbar-left" role="navigation">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		        <li><a href="index.php">Home</a></li>
		        <li><a href="courses.php">Courses</a></li>		        
		        <li><a href="contact.html">Contact</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		    <!-- start soc_icons -->
		</nav>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/project/LoginRegistrationForm/#tologin?id=10">Log In</a></li>
				<li><a href="/project/LoginRegistrationForm/#toregister?id=10">Register</a></li>
		<!--
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-youtube"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
			--></ul>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</div>
<br />
<div class="main_bg"><!-- start main -->
	<div class="container">
		<div class="jumbotron" style="background-color: rgba(255, 84, 84,0.8);">
			<?php 
			require('../connect.php');
			$course_id = $_GET['id'];
			$link= connect() or die("Error : cannot connect with database");

			$course_query ="SELECT Course_name , Course_desp , link, inst_name from courses, instructor where c_id='$course_id' AND Course_Instructor_ID = inst_id";

			$Query = mysqli_query($link, $course_query);
			

			if(!(mysqli_num_rows($Query) == 0)){
				@$row = mysqli_fetch_assoc($Query);
				echo "<center><img src="."image/".$row['link']."></center>";
				echo "<h4><center><b>".$row['Course_name']."</b></center></h4><h4>Instructor : ".$row['inst_name']."</h4>";
				echo "<div class='well'>";
				echo "<h5>COURSE DESCRIPTION</h5><strong><hr></strong>";
				echo "<p class='h6' >".$row['Course_desp']."</h3>";
			}

			echo "</div>";
			close($link);

			?>
			

			<!--<a href="#" class="fa-btn btn-1 btn-1e" id="click">FeedBack</a>-->
		</div>
	</div>
<div class="container">
	<div class="jumbotron" style="background-color: skyblue;">
		<h4 class='text-center'>What Our Students Say About this Course : </h4>
		<?php
		$link = connect();
		$reg_q="select * from course_registration WHERE C_id='$course_id'";
		$c_k2=mysqli_query($link,$reg_q);

		while($row1=mysqli_fetch_assoc($c_k2)) {
			echo "<div class='well'>";
			$v2=$row1['Reg_id'];
			$reg_q = "select * from feedback WHERE Reg_std_id='$v2'";
			$c_k3 = mysqli_query($link,$reg_q);

			if (mysqli_num_rows($c_k3) == 0)
				continue;

			$P_f = mysqli_fetch_assoc($c_k3);

			echo "<h4>".$row1['std_email']." Says On ".$P_f['Fdb_date']."</h4>";
			echo "<br /> <h4>Feedback : ".$P_f['S_Description']."</h4>";	
			echo "<b class='nme'>Review : </b>";
			echo "<span class=\"badge\">";
			for($i=0;$i<$P_f['Std_review'];$i++)
				echo "<b id='rew'>*</b>";
			echo $P_f['Std_review']."</span></div>";
		}

		?>
	</div>
</div>

</div>								<!--Feedback end-->

</div><!-- end main -->
<div class="footer_bg"><!-- start footer -->
	<div class="container">
		<div class="row  footer">
			<div class="copy text-center">
				<p class="link"><span>&#169; All rights reserved | Design by&nbsp;<a href="http://w3layouts.com/"> W3Layouts</a></span></p>
			</div>
		</div>
	</div>
</div>
</body>
</html>