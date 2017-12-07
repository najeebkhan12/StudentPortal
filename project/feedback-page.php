<?php 
session_start();
if(!empty($_SESSION['username'])) {
    $uname = $_SESSION['username'];
   }           

else {
  header("location:LoginRegistrationForm");
}


?>


<!DOCTYPE html>
<html>
<head>
<title>Learner | Course Feedback</title>
<!-- for-mobile-apps -->
<!--
 

-->
<link href="css/feedback.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<style>
    body {
      background: -webkit-linear-gradient(left, #25c481, #25b7c4);
      background: linear-gradient(to right, #25c481, #25b7c4);
    }
</style>

<body>
<br><br><br>
<div class="container">
  <div class="jumbotron">    
      <form>
          <div class="form-group">
            <label for="sel1">Select a Course From List</label>
            <select class="form-control" id="sel1">
              <option></option>
            <?php 

                require('connect.php');

                $conn = connect();

                $query = "SELECT Course_name, course_registration.C_id, Reg_id FROM courses, course_registration WHERE std_email = '$uname' AND course_registration.C_id = courses.c_id";
                $res = query($conn, $query);
            
            
                if (mysqli_num_rows($res) == 0) {
                    echo "<p>No Courses Registered </p>"; 
                }

                else {            
                    $row = mysqli_fetch_array($res);      
                    while($row != NULL) {

                      $check_query = "SELECT Reg_std_id FROM feedback WHERE Reg_std_id='$row[2]'";
                      $c_k = mysqli_query($conn, $check_query);
                      $check = mysqli_num_rows($c_k);       
                      
                      if($check == 0){
                              echo "<option value='".$row[1]."'>".$row[0]."</option>";
                            }
                      else
                        echo "<option disabled title='Already Given Feedback'>".$row[0]."</option>";

                      $row = mysqli_fetch_array($res); 
                    }
                }                
                close($conn);          
            ?>   

            </select>
          </div>
      </form>
  </div>
</div>
 
<div class="container">
  <!-- Trigger the modal with a button -->
  <!--<button type="button" class="btn btn-info btn-lg" id="myBtn">Open Modal</button>-->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Course Feeback</h4>
        </div>
        <div class="modal-body">   
            <h5>Please rate our Course quality</h5>
              <span class="starRating">
                <input id="rating5" type="radio" name="rating" value="5">
                <label for="rating5">5</label>
                <input id="rating4" type="radio" name="rating" value="4">
                <label for="rating4">4</label>
                <input id="rating3" type="radio" name="rating" value="3" >
                <label for="rating3">3</label>
                <input id="rating2" type="radio" name="rating" value="2" checked>
                <label for="rating2">2</label>
                <input id="rating1" type="radio" name="rating" value="1">
                <label for="rating1">1</label>
              </span>
              <form>
                  <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                  </div>
              </form> 
              <button type="button" id='feed' onclick='submitFeedbaack()' class="btn btn-info">Send Feedback</button>    
              <p id='response'></p>                 
          </div>              
          <div class="modal-footer">
            <button type="button"  class="btn btn-default" data-dismiss="modal" onclick="location.reload()">Close</button>
          </div>
      </div>
      
    </div>
  </div>
  
</div>

<script>
 $(document).ready(function(){
    $('select').on('change', function() {
        $("#myModal").modal({backdrop: "true"});
    });
  });
</script>
<script>

function submitFeedbaack() {

        var e = document.getElementById("sel1");
        
        var CourseID = e.options[e.selectedIndex].value;
       
        var Review = 0;
            if(document.getElementById('rating1').checked)
                Review = 1;
            if(document.getElementById('rating2').checked)
                Review = 2;
            if(document.getElementById('rating3').checked)
                Review = 3;
            if(document.getElementById('rating4').checked)
                Review = 4;
            if(document.getElementById('rating5').checked)
                Review = 5;
        
        var Comment = document.getElementById('comment').value;
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {                
                document.getElementById('response').innerHTML =  this.responseText;   
                document.getElementById('feed').disabled = "disabled";
            }
        };
      
        xmlhttp.open("GET", "feedback.php?C_id="+CourseID+"&rev="+Review+"&comm="+Comment, true);
        xmlhttp.send();
}

</script>
</body>
</html>

  








