<?php 
session_start();
require('connect.php');

if(!empty($_SESSION['username']) && !empty($_SESSION['password']))  {
    $ins_email = $_SESSION['username'];  
    $inst_id = $_SESSION['inst_id'];
}


else {
  header("location:/project/LoginRegistrationForm/");
}

?>


<!DOCTYPE html>
<html > 
<head>
  <meta charset="UTF-8">
  <title>Teacher</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
      <style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url("http://fonts.googleapis.com/css?family=Open+Sans:400,600,700");
@import url("http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css");
  <script src="jquery-3.2.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
*, *:before, *:after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html, body {
  height: 100%;
} 

body {
  font: 14px/1 'Open Sans', sans-serif;
  color: #555;
  background: #eee;
}

h1 {
  padding: 50px 0;
  font-weight: 400;
  text-align: center;
}

p {
  margin: 0 0 20px;
  line-height: 1.5;
}

main {
  min-width: 320px;
  max-width: 1200px;
  padding: 50px;
  margin: 0 auto;
  background: #fff;
}

section {
  display: none;
  padding: 20px 0 0;
  border-top: 1px solid #ddd;
}

input {
  display: none;
}

label {
  display: inline-block;
  margin: 0 0 -1px;
  padding: 15px 25px;
  font-weight: 600;
  text-align: center;
  color: #bbb;
  border: 1px solid transparent;
}

label:before {
  font-family: fontawesome;
  font-weight: normal;
  margin-right: 10px;
}

label[for*='1']:before {
  content: '\f007';
}

label[for*='2']:before {
  content: '\f19d';
}

label[for*='3']:before {
  content: '\f0a3';
}

label[for*='4']:before {
  content: '\f00a';
}

label[for*='5']:before {
  content: '\f170';
}

label[for*='6']:before {
  content: '\f085';
}

label[for*='eval']:before {
  content: '\f085';
}
label:hover {
  color: #888;
  cursor: pointer;
}

input:checked + label {
  color: #555;
  border: 1px solid #ddd;
  border-top: 2px solid orange;
  border-bottom: 1px solid #fff;
}

#tab1:checked ~ #content1,
#tab2:checked ~ #content2,
#tab3:checked ~ #content3,
#tab4:checked ~ #content4,
#tab5:checked ~ #content5,
#tab6:checked ~ #content6{
  display: block;
}

table#info td {
  border-spacing: 1px;
  padding-top: 5%;
  padding-left: 2%;
  }


@media screen and (max-width: 650px) {
  label {
    font-size: 0;
  }

  label:before {
    margin: 0;
    font-size: 18px;
  }
}
@media screen and (max-width: 400px) {
  label {
    padding: 15px;
  }
}

#header {
  font-family: Century;
  font-color:Blue;
  background-color: skyblue;
}

.eval {  
  border-spacing: 10px;
    border-collapse: separate;
    width:2%;
    text-align: center;
    background-color: lightgrey;
}


td>input {
  display:block;
}
.modal-body>input {
  display: inline;
}



  </style>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>

<body>
  <h1>Welcome To FAST NUCES Online Learning Platform</h1>
<main>
  
  <input id="tab1" type="radio" name="tabs" checked>
  <label for="tab1">Profile</label>
    
  <input id="tab2" type="radio" name="tabs">
  <label for="tab2">Courses</label>
  
  <input id="tab6" type="radio" name="tabs">
  <label for="tab6">Registered Students</label>

  <input id="tab3" type="radio" name="tabs">
  <label for="tab3">Manage Evaluation</label>
    
  <!--
  
  <input id="tab4" type="radio" name="tabs">
  <label for="tab4">Course Feedback</label>

-->
  
  

  <a href="discussionform/discussion_form.php" target="_blank"><label class="fa-bookmark">Discussion Forum</label></a> 

  <a href="logout.php"><label class="fa-sign-out">Log Out</label></a>
  
  <section id="content1">

    <?php

      $conn = connect();
      $query = "SELECT * FROM instructor where ins_email = '$ins_email'";
      $res = query($conn, $query);
      $row = @mysqli_fetch_assoc($res);      
      close($conn);
       echo "<div class = 'container'><div class = 'row'>";
       echo "<div class = 'col-md-6'><table class='table table-condensed'>";
       echo "<tbody><tr><td>Name</td><td>"; echo $row['inst_name']."</td></tr>";
       echo "<tr><td>Gender</td><td>"; echo $row['gender']."</td></tr>";       
       echo "<tr><td>Email</td><td>"; echo $row['ins_email']."</td></tr>";
       echo "<tr><td>Department </td><td>"; echo $row['dept']."</td></tr>";
       echo "</tbody></table></div>
       </div></div>";  

    ?>
  
    
  </section>
    
  <section id="content2">
      
      <?php
      
      $conn = connect();
      $query = "SELECT Course_name FROM courses WHERE Course_Instructor_ID = '$inst_id'";
      $res = query($conn, $query);
      
      
      if (@mysqli_num_rows($res) == 0) {
          echo "<p>No Courses Registered </p>"; 
      }


      else {            
            $row = mysqli_fetch_array($res);   
            echo "
            <table class='table table-condensed'><tbody>";   
            while($row != NULL) {           
              
              echo "<tr>".$row[0]."</tr>";             
              $row = mysqli_fetch_array($res);     

            }
            echo "</tbody></table>";
      }

      close($conn);
       
       ?>   
  </section>


  <section id="content3">
    <button id='save' class='btn btn-primary pull-right'>Save</button><br><br>

      <!--<div class="container">-->
      <div class="row">
          <div class='col-md-6'>
               <form>
                    <div class="form-group">
                      <label>Select a Course From List</label>
                      <select class="form-control" id="courses-list">
                      <option></option>
                      <?php 
                        $conn = connect();

                        $query = "SELECT Course_name, c_id FROM courses WHERE Course_Instructor_ID = '$inst_id'";
                        $res = query($conn, $query);

                        while($row = mysqli_fetch_assoc($res)) {
                          echo "<option value='".$row['c_id']."'>".$row['Course_name']."</option>";                 
                        }
                                         
                        close($conn);          
                      ?>   

                      </select>
                    </div>
                </form>
           </div>
           <div class='col-md-4'>     
                <form>
                    <div class="form-group"> 
                      <label>Select Evaluation Type</label>
                      <select class="form-control" id="evaluation">
                         <option></option>
                         <option value='assignments'>Assignment</option>
                         <option value='quizzes'>Quiz</option><!--
                         <option value='Sessional-I'>Sessional-I</option>
                         <option value='Sessional-II'>Sessional-II</option>   -->                  
                      </select>
                    </div>
                </form>
            </div>
           <div class="col-md-2">
              <br>
             <button id='show-eval' class='btn btn-info pull-right'>Show Evaluations</button><br><br><br>
             <button id='add-eval' class='btn btn-info pull-right'>Add Evaluation</button>
           </div>
        </div>
               <!-- </div>-->
         
        <div class="jumbotron table-responsive" id='results'>
        </div>
    
      <script> 

        $(document).ready(function(){
           $('#show-eval').click(function() {
                  var code = $("#courses-list option:selected").val();
                  var type = $("#evaluation option:selected").val();                 
                  $.get("show-eval.php?cid="+code+"&eval_type="+type, function(data){
                    $("#results").html(data);                  
                 });               
            });
        });

      </script>

  </section>    
  <section id="content4">
  </section>
  <section id="content5">
  </section>
  <section id="content6">  
    <?php 
      $conn = connect();

      $query = "SELECT std_email, course_registration.Reg_id, course_registration.Reg_date FROM course_registration, courses WHERE course_registration.C_id = courses.c_id AND courses.Course_Instructor_ID = '$inst_id'";

      $res = query($conn, $query); 

      if (@mysqli_num_rows($res) > 0) {
          echo "<table class='table table-bordered table-hover'><thead><tr>
            <td>Student Name </td>
            <td>Registration ID</td>
            <td>Registration Date</td>

          </thead><tr><tbody>";
          while($row = mysqli_fetch_array($res))
          {
              $query = "SELECT Std_name FROM student WHERE std_email = '$row[0]'";
              $res1  = query($conn, $query);
              $row2 = mysqli_fetch_array($res1);
              echo "<tr><td>".$row2[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td></tr>";
          }
          echo "<tbody></table>";
      }

      else {
         echo "No Students are Registered!";
      }
      close($conn);  
      
    ?>
  </section>
  <!-- Modal -->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
            <table class='table table-bordered' id='eval-table'>
            <tr><td id='et'></td><td>Date</td><td>Marks Assigned</td><td>Weightage Assigned</td></tr>
            <tr><td><input type='text' id='id' value="1"></td>
            <td><input type='date' id='date'></td>
            <td><input type='text' id='ma' value="10"></td>
            <td><input type='text' id='wa' value="1.5"></td></tr></table>
            <button type="button" id='add' class="btn btn-default">Add</button>
            <table class='table' id='student-list'></table>            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick='clear_data()' data-dismiss="modal">Close</button> 
          <button type="button" onclick='save(1)' class="btn btn-default">Save</button>         
        </div>
      </div>      
    </div>
  </div>
<script>
function save(i){
  var total_students = $("#st-count").val();
  var date = $("#date").val();

  if (i > total_students)
    return;
  //for(i = 1; i <= total_students; i++) {
      
      var status = i+"status"; 
      
      var mo = document.getElementById(i+"mo").value;
      var ma = document.getElementById("ma").value;
      var wa = document.getElementById("wa").value;
      
      var eval_id = document.getElementById("id").value;  

      var e = document.getElementById("courses-list");
      var cid = e.options[e.selectedIndex].value;
      
      var e = document.getElementById("evaluation");
      var eval_type = e.options[e.selectedIndex].value;
      
    
      var st_email = document.getElementById(i+"smail").innerText;
      document.getElementById(status).innerText = "adding...";
      //alert(mo+" - "+ma+" - "+wa+" - "+date+" - "+eval_id+" - "+cid+" - "+eval_type+" - "+st_email);


        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById(status).innerText = this.responseText;
            i += 1;
            save(i);
          }
        };
        xhttp.open("POST", "add-marks.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("cid="+cid+"&eval_type="+eval_type+"&std_id="+st_email+"&eval_id="+eval_id+"&ma="+ma+"&mo="+mo+"&wa="+wa+"&date="+date);
 // }
 // alert("Marks Added");
}


 function clear_data(){

        $('#et').html("");
        $('#ma').val("10");
        $('#wa').val("1.5");
        $("#date").val("1-1-1");
        $("#student-list").empty();
    }

</script>
<script>
$(document).ready(function(){
    $("#add-eval").click(function(){
        $("#myModal3").modal({backdrop: "static"});
        var a = $("#evaluation option:selected").html();
        a+=" No. ";
        $("#et").html(a);
    });
   

    $("#add").click(function(){
        var code = $("#courses-list option:selected").val();
        $.post("get-student-list.php", {cid: code}, function(result){
        $("#student-list").html(result);
      });
    });
});
</script>
    
</main>
  
  
</body>
</html>
