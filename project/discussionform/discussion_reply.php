<?php
@session_start();

include('../connect.php');

$link = connect();
if(!(empty($_SESSION['username'])))
{	

	$Question_id = $_GET['id'];

/*	
	if(empty($_SESSION['id']))
	       	{ 
		       	$_SESSION['id']=$_GET['id'];
		       	$Question_id=$_SESSION['id'];
	        }

	        else 	
	        	$Question_id=$_SESSION['id'];  */      

 } // username check

 else
 	header("location:../web/index.php");
?>

<html>
<head>
<title>NUCES Discussion</title>
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
	height:70px;
}

.space2 {
	height:100px;
}

.name {
	font-family: Century;
	color: skyblue;
}

.name:hover {
	text-decoration: underline;
}

</style>
</head>
<body>	
		<div class='space'></div>
	    <div class ='container'>
			<div class="text-center">
			<h4 class="info"><i class="fa  fa-houzz fa-3x"></i>&nbsp;&nbsp;NUCES Discussion Forum<hr></h4>			
			</div>
		</div>
		<div class='space2'></div>
	    
<?php 

	$Display_query = "select * from discussion_form where Q_id='$Question_id'";
	$Display=mysqli_query($link,$Display_query);

	if((mysqli_num_rows($Display)>0)) 
	{			
				$display_question=mysqli_fetch_assoc($Display);
				echo "
					<div class='container well'>
						<div class='row'>
							<div class='col-md-8'>
								<h4>asked by : <span class='name'>".$display_question['Id']."</span>   ".$display_question['type']."</h4><br />
							</div>
							<div class='col-md-4'>
								<h5>On : ".$display_question['q_date']."
							</div>							
						</div>
						<div class='row'>
							<div class='col-md-12'>
								<h5>QUESTION :<br /><br /><b>".$display_question['Comment']."</b></h5>
							</div>
						</div>
					</div>
					";
				
				
	}

	$replier_comments="select * from replier_form where Q_id='$Question_id'";
	$Display_comments=mysqli_query($link,$replier_comments);
	if((mysqli_num_rows($Display_comments) > 0)) {
		
		echo "	
			<div class='container'>
				<div class='row'>
					<h5>Answers:</h5><hr />
				</div>					
			";

			while(($display_replier_comments=mysqli_fetch_assoc($Display_comments))) {
				echo "<div class='row'>".$display_replier_comments['Id']."       ".$display_replier_comments['type']."<br />";
				echo "Reply :<b>".$display_replier_comments['Replier_Comment']."</b> <br />";
				echo  $display_replier_comments['replier_date']."<br /><hr /></div>";		

			}

			echo "</div></div>";
	}

	else
		echo "<br><div class='container'><div><h5>No Answers</h5><hr /></div></div>";

	if(isset($_POST['submit'])){

			$name=$_SESSION['username'];
			$com=$_POST['comment'];
			$type=$_SESSION['type'];

			if((strcmp($type,"instructor"))==0)
				$ins_rep_query="insert into replier_form (Q_id,Id,type,Replier_Comment) values ('$Question_id','$name','instructor','$com')";

			else 
				$ins_rep_query="insert into replier_form (Q_id,Id,type,Replier_Comment) values ('$Question_id','$name','student','$com')";
			    $ins_q =mysqli_query($link,$ins_rep_query);
		} // submit 
?>

	<div class='container'>		
		<div class='row'>			
			<div class='col-md-12'>
				<h5>Submit your Reply</h5>
				<form name="reply" action="discussion_reply.php" method="post">
					<textarea rows='5' class="form-control" name="comment" placeholder="Reply Here"></textarea><br>
					<input class='btn btn-info' type="submit" name="submit"  value="Reply" />
				</form>
			</div>
		</div>
	</div>
</body>
</html>
