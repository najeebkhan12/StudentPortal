<?php 
require('connect.php');

session_start();
if(!empty($_SESSION['username']) && !empty($_SESSION['password']))  {
    $uname = $_SESSION['username'];  
}


else {
  header("location:/project/LoginRegistrationForm/");
}

?>


<!DOCTYPE html>
<html > 
<head>
  <meta charset="UTF-8">
  <title>Student</title>
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

h4 {
  background-color: lightgrey;
  font-size: 20px;
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
  <label for="tab2">Registered Courses</label>
    
  <input id="tab3" type="radio" name="tabs">
  <label for="tab3">Marks</label>
    
  <!--
  
  <input id="tab4" type="radio" name="tabs">
  <label for="tab4">Course Feedback</label>

-->
  
  <input id="tab6" type="radio" name="tabs">
  <label for="tab6">Course Registration</label>

  <a href="discussionform/discussion_form.php" target="_blank"><label class="fa-bookmark">Discussion Forum</label></a> 

  <a href="logout.php"><label class="fa-sign-out">Log Out</label></a>
  
  <section id="content1">

    <?php

      $conn = connect();
      $query = "SELECT * FROM student where std_email = '$uname'";
      $res = query($conn, $query);
      $row = @mysqli_fetch_array($res);      
      close($conn);
      echo "<div class = 'container'><div class = 'row'>";
       echo "<div class = 'col-md-6'><table id='info'>";
       echo "<tr><td>Name</td><td>"; echo $row[0]."</td></tr>";
       echo "<tr><td>Email</td><td>"; echo $row[1]."</td></tr>";
       echo "<tr><td>Mobile</td><td>"; echo $row[2]."</td></tr>";
       echo "<tr><td>Registration Date </td><td>"; echo $row[3]."</td></tr>";
       echo "</table></div></div>";  

    ?>
  
    
  </section>
    
  <section id="content2">
      
      <?php
      
      $conn = connect();
      $query = "SELECT Course_name FROM courses, course_registration WHERE std_email = '$uname' AND course_registration.C_id = courses.c_id";
      $res = query($conn, $query);
      
      
      if (mysqli_num_rows($res) == 0) {
          echo "<p>No Courses Registered </p>"; 
      }

      else {            
            $row = mysqli_fetch_array($res);      
            while($row != NULL) {           
              
              echo "<h4>".$row[0]."</h4>";             
              $row = mysqli_fetch_array($res);     

            }
      }


      close($conn);
       
       ?>   
  <a href="feedback-page.php" target="_blank"><button type="button" class="btn btn-info btn-md">Submit Feedback for Courses</button></a>  
  </section>


  <section id="content3">
       <?php
      
      $conn = connect();
      $query = "SELECT Course_name, course_registration.C_id FROM courses, course_registration WHERE std_email = '$uname' AND course_registration.C_id = courses.c_id";
      $res = query($conn, $query);
      
      
      if (mysqli_num_rows($res) == 0) {
          echo "<p>No Courses Registered </p>"; 
      }

      else {
          
            $row = mysqli_fetch_array($res);      
            while($row != NULL) {              
              
              echo "<h4>".$row[0]."</h4>";
              

              // Assignment

              $query  = "SELECT MarksAssigned, MarksObtained, WeightageAssigned, WeightageObtained, date FROM assignments WHERE StudentID = '$uname' AND CourseID = '$row[1]' ORDER BY date ASC";
              $res2 = query($conn, $query);
              $count = 1;
              $row2 = mysqli_fetch_assoc($res2);
               echo "<div class='table-responsive'>";
               echo "<table class='table table-bordered table-hover'><thead><tr><td>Assignment No.</td><td>Date</td><td>Marks Assigned</td><td>Marks Obtained</td><td>Weightage Assigned</td><td>Weightage Obtained</td></tr></thead><tbody>";              
               while($row2 != NULL) {
                  echo "
                    <tr><td>".$count++."<td>".$row2['date']."</td><td>".$row2['MarksAssigned']."</td><td>".$row2['MarksObtained']."</td><td>".$row2['WeightageAssigned']."</td><td>".$row2['WeightageObtained']."</td></tr>";
                  $row2 = mysqli_fetch_assoc($res2);                    
               }          
              echo "</tbody></table></div>"; 
   
               //Quizzes
              echo "<br><br><br><br>";
              $query  = "SELECT MarksAssigned, MarksObtained, WeightageAssigned, WeightageObtained date FROM quizzes WHERE  CourseID = '$row[1]' ORDER BY date ASC";
              $res2 = query($conn, $query);
              $count = 1;
              $row2 = mysqli_fetch_assoc($res2);
               echo "<div class='table-responsive'>";
              echo "<table class='table table-bordered table-hover'><thead><tr><td>Quiz No.</td><td>Date</td><td>Marks Assigned</td><td>Marks Obtained</td><td>Weightage Assigned</td><td>Weightage Obtained</td></tr></thead><tbody>";              
               while($row2 != NULL) {
                  echo "
                    <tr><td>".$count++."<td>".$row2['date']."</td><td>".$row2['MarksAssigned']."</td><td>".$row2['MarksObtained']."</td><td>".$row2['WeightageAssigned']."</td><td>".$row2['WeightageObtained']."</td></tr>";
                  $row2 = mysqli_fetch_assoc($res2);                    
               }       
              
              echo "</tbody></table></div>";  
            $row = mysqli_fetch_array($res);            
            }
      }


      close($conn);
      ?>
  </section>    
  <section id="content4">
  </section>
  <section id="content5">
  </section>
  <section id="content6">
    <?php 
      $conn = connect();

      $query = "SELECT C_id FROM course_registration WHERE std_email = '$uname'";
      $res = query($conn, $query);    

      $courses = array();

      while(($row = mysqli_fetch_array($res)) != NULL){
          array_push($courses, $row[0]);
      }

      $query = "SELECT Course_name, c_id FROM courses";
      $res = query($conn, $query);

      echo "<table><col width='200'><col width='200'>"; 
        while (($row = mysqli_fetch_array($res)) != NULL) {
            echo "<tr style='height:30px'>";
            echo "<td>".$row[0]."</td>";

            if (array_key_exists($row[1], $courses))
              echo "<td style='color: skyblue'>Registered</td>";            

            else
               echo "<td><input style='display:block;' id='".$row[1]."' type='submit' value='Register' onclick='register(".$row[1].")'></td>";
            echo "</tr>";
        }
      close($conn);  
      echo "</table>";

    ?>
    <script>
    function register(cid) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(cid).value = this.responseText;
            }
        };
        xmlhttp.open("GET", "course_registration.php?cid=" + cid, true);
        xmlhttp.send();
    }
    </script>

  </section>
    
</main>
  
  
</body>
</html>
