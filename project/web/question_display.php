	<?php

	include("link.php");
	$lke_id=$_GET['like_id'];
	$link=connect();
		
	function display_comment(){
		$link=connect();
		
		$Display_query = "select * from discussion_form";
		
	
	
	$Display=mysqli_query($link,$Display_query);
	
		if((mysqli_num_rows($Display)>0)) {			
				while($display_question=mysqli_fetch_assoc($Display)){
							$Question_id=$display_question['Q_id'];
											$display_likes = "Select * from likes where Q_id='$Question_id'";
													$Likes = mysqli_query($link,$display_likes);
					echo "
							<div class='container'>
								<div class='row'>
									<div class='col-md-8'>
										<h5><a id='anchor' target='_blank' href='discussion_reply.php?id=".$display_question['Q_id']."'>".$display_question['Comment']."</a></h5>"."<span id='".$Question_id."'>
										".mysqli_num_rows($Likes)."</span><button onclick='likes(".$Question_id.")'>like</button> 
									"."
									</div>
									<div class='col-3'>	
										<p>asked on ".$display_question['q_date']."<hr></p>
									</div>
								</div>
							</div>
						";
					

			    }//while loop  
		}

}

session_start();

if($lke_id == 0){
	display_comment();
}

else{

	$name=@$_SESSION['username'];
	
	$type=@$_SESSION['type'];


	$check_likes_table="Select * from likes where Q_id='$lke_id' AND Id='$name' AND type='$type'";
    $Check_Likes_exist=@mysqli_query($link,$check_likes_table);
	if(mysqli_num_rows($Check_Likes_exist)>0){
			     	echo "You have like already";
											 }

     else{
	$query_like="insert into likes (Q_id,Id,type) values('$lke_id','$name','$type')";
	mysqli_query($link,$query_like);

	$display_likes="Select * from likes where Q_id='$lke_id'";
    $Likes=@mysqli_query($link,$display_likes);
	echo @mysqli_num_rows($Likes);
    }











}
?>