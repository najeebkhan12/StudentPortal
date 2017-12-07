<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>E-Learner</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- start plugins -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- start slider -->
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/modernizr.custom.28468.js"></script>
<script type="text/javascript" src="js/jquery.cslider.js"></script>
	<script type="text/javascript">
			$(function() {

				$('#da-slider').cslider({
					autoplay : true,
					bgincrement : 450
				});
			});
		</script>
<!-- Owl Carousel Assets -->
<link href="css/owl.carousel.css" rel="stylesheet">
<script src="js/owl.carousel.js"></script>
		<script>
			$(document).ready(function() {

				$("#owl-demo").owlCarousel({
					items : 4,
					lazyLoad : true,
					autoPlay : true,
					navigation : true,
					navigationText : ["", ""],
					rewindNav : false,
					scrollPerPage : false,
					pagination : false,
					paginationNumbers : false,
				});

			});
		</script>
		<!-- //Owl Carousel Assets -->
<!--font-Awesome-->
   	<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
<!--font-Awesome-->

<style type="text/css">
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
        background: #FF5454;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } 

        else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>
</head>
<body>
<div class="header_bg">
<div class="container">
	<div class="row header">
		<div class="logo navbar-left">
			<h1><a href="index.php">Learner </a></h1>
		</div>
		<div class="h_search navbar-right">
			<form>
				<div class="search-box">
		        <input type="text" autocomplete="off" placeholder="Search Courses" />
		        <div class="result"></div>
		    </form>    
    	</div>
			
			<script>
				function showResult(str) {
				  if (str.length==0) { 
				    document.getElementById("livesearch").innerHTML="";
				    document.getElementById("livesearch").style.border="0px";
				    return;
				  }
				  if (window.XMLHttpRequest) {
				    // code for IE7+, Firefox, Chrome, Opera, Safari
				    xmlhttp=new XMLHttpRequest();
				  } else {  // code for IE6, IE5
				    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				  xmlhttp.onreadystatechange=function() {
				    if (this.readyState==4 && this.status==200) {
				      document.getElementById("livesearch").innerHTML=this.responseText;
				      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
				    }
				  }
				  xmlhttp.open("GET","livesearch.php?q="+str,true);
				  xmlhttp.send();
			}
			</script>
</head>
<body>

		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<div class="container">
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
		        <li class="active"><a href="#">Home</a></li>
		        <li><a href="courses.php">Courses</a></li>		        
		        <li><a href="contact.html">Contact</a></li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		    <!-- start soc_icons -->
		</nav>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/project/LoginRegistrationForm/#tologin">Log In</a></li>
				<li><a href="/project/LoginRegistrationForm/#toregister">Register</a></li>
		<!--
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-youtube"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
			--></ul>
		</div>
	</div>
</div>
<div class="slider_bg"><!-- start slider -->
	<div class="container">
		<div id="da-slider" class="da-slider text-center">
			<div class="da-slide">
				<h2>Education Portal</h2>
				<p>Online E-LEARNING WEBSITE</span></p>
				<h3 class="da-link"><a href="courses.php" class="fa-btn btn-1 btn-1e">view more</a></h3>
			</div>
			<div class="da-slide">
				<h2>Online Education</h2>
				<p>We provide online courses</span></p>
				<h3 class="da-link"><a href="courses.php" class="fa-btn btn-1 btn-1e">view more</a></h3>
			</div>
			<div class="da-slide">
				<h2>Assessment</h2>
				<p><span class="hide_text">Evaluation</span></p>
				<h3 class="da-link"><a href="courses.php" class="fa-btn btn-1 btn-1e">view more</a></h3>
			</div>			
	   </div>
	</div>
</div><!-- end slider -->
<div class="main_bg"><!-- start main -->
	<div class='container'>
		<h1 style='background-color: #FF5454; border-radius: 2%;' class="btn-info text-center">Featured Courses</h1>
	</div>
	<div class="container">
		<div class="main row">
			<?php
			require('../connect.php');

			
		      $conn = connect();
          $query = "SELECT c_id, Course_name FROM courses";

          $res = query($conn, $query);
         
          $reviews = array();

            while($row = mysqli_fetch_assoc($res)) {
              $course_rev = 0;

              echo "<br/>";
              $conn2 = connect();
              $a = $row["c_id"];

              $query = "SELECT Reg_id FROM course_registration WHERE C_id = '$a'";
              
              $res1 = query($conn2, $query);

              if (mysqli_num_rows($res1) == 0) { 
                continue;                         
              }

              while($row2 = mysqli_fetch_assoc($res1)){
                
                $b = $row2["Reg_id"];

                $res3 = query($conn, "SELECT Std_review FROM feedback WHERE Reg_std_id = '$b'");
                
                $row3 = mysqli_fetch_assoc($res3);            

                $course_rev += $row3['Std_review']; 
              }

              $reviews += array($row['c_id'] => $course_rev);         
            }

            arsort($reviews);

            $i = 0;
            foreach($reviews as $x => $x_value) {
                if ($i == 4) break; 
                $query = "SELECT  Course_name FROM courses WHERE c_id = '$x'";
                $res = query($conn, $query);
                $row = mysqli_fetch_assoc($res);
                echo "
                    <div class='col-md-3 images_1_of_4 bg1 text-center'>
                    <span class='bg'><i class='fa fa-book'></i></span>
                    <h4>".$row["Course_name"]."</h4>                      
                    <a href='course_details.php?id=".$x."' class='fa-btn btn-1 btn-1e'>read more</a>
              </div>";               
                $i++;
            }
			?>			
			
		</div>
	</div>
</div><!-- end main -->
<div class="main_btm"><!-- start main_btm -->
	<div class="container">
		<div class="main row">
			<div class="col-md-6 content_left">
				<img src="images/pic1.jpg" alt="" class="img-responsive">
			</div>
			<div class="col-md-6 content_right">
				<h4>Provide High Quality Education  </h4>
				<p class="para">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words. </p>
				<p>Check out our List of Courses we Offer</p>
				<a href="courses.php" class="fa-btn btn-1 btn-1e">View Courses</a>
			</div>
		</div>
				
	</div>
</div>
<div class="footer_bg"><!-- start footer -->
	<div class="container">
		<div class="row  footer">
			<div class="copy text-center">
				<p class="link"><span>&#169; All rights reserved |  &nbsp;<a href="#"> Learner E-learning System</a></span></p>
			</div>
		</div>
	</div>
</div>
</body>
</html>