<?php 
session_start();
require('../connect.php');
$msg = "";
$msg1 = "";
$mess = "";

if(isset($_POST['login'])){
    if (!(strcmp($_POST['login'] ,'login')))
    {   
        $uname = @$_POST['username'];
        $password = @$_POST['password'];
        $conn = connect();
        

        $query = "SELECT * FROM login WHERE uname = '$uname' AND password = '$password'";

        $res = query($conn, $query);
        $mess = @mysqli_num_rows($res);

        if ($mess > 0) {

                    $ck_query = "SELECT inst_name, inst_id FROM instructor WHERE ins_email = '$uname'";
                    $c_q = query($conn, $ck_query);
                    $ck_ins = @mysqli_num_rows($c_q);
                    
                    $_SESSION['username'] = $uname;
                    $_SESSION['password'] = $password; 

                    $v3 = $ck_ins;
                    if($ck_ins > 0)
                    {           $sir = mysqli_fetch_assoc($c_q);
                                $_SESSION['type']="instructor";
                                $_SESSION['inst_id'] = inst_id;
                                header("location:../teacher-profile.php");
                              
                    }

                   else {    
                    
                    $_SESSION['type']="student";
                   header("location:../profile.php");
                   }

        }
        
        else {
            $msg = "Invalid Username or Password";
        }
}  
 //// end if

if(!(strcmp($_POST['login'] ,'signup')))
 
{
    $password = @$_POST['p1'];
    $uname = @$_POST['emailsignup'];
    $conn = connect();
    $query = "SELECT * FROM login WHERE uname = '$uname'";
    $res = @query($conn, $query);
    $mess = @mysqli_num_rows($res);
    
    close($conn);

    if ($mess > 0) {
        $msg1 = "User already registered with this Email";
    }

    else {

        $query = "INSERT INTO login(uname, password) VALUES('$uname', '$password')";
        $conn = connect();
        $res = query($conn, $query);

        if ($res == 1) {
            $name = $_POST['name'];
            $address = $_POST['address'];
            $query = "INSERT INTO student(Std_name, std_email, address) VALUES('$name', '$uname', '$address')";
            $res = query($conn, $query);
            $msg1 = "Registered Sucessfully! <br> <a href='index.php'>Login</a>";
        }

        else {            
            $msg1 = "Cannot Register";
        }
        close($conn);
    }
    
}
}
?>


<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    </head>
    <body>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
                <span class="right">
                    <a href="../web/index.html">
                        <strong>Back to Home</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header style="visibility: hidden;">
                <h1>Login and Registration Form <span>with HTML5 and CSS3</span></h1>
                <nav class="codrops-demos">
                    <span>Click <strong>"Join us"</strong> to see the form switch</span>
                    <a href="index.html" class="current-demo">Demo 1</a>
                    <a href="index2.html">Demo 2</a>
                    <a href="index3.html">Demo 3</a>
                </nav>
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
 
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  method="post" action="index.php" autocomplete="on">
                                <input type="hidden" name="login" value="login" /> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p> 
									<label><?php echo $msg?></label>
								</p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  method="post" action="index.php#toregister" autocomplete="on">
                                <input type="hidden" name="login" value="signup"/> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="e">Your Name </label>
                                    <input id="passwordsignup_confirm" name="name" required="required" type="text" placeholder="e.g John Snow"/>
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="e.g ysupermail@mail.com"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                    <input id="passwordsignup" name="p1" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Address</label>
                                    <input id="address" name="address" required="required" type="text" placeholder="e.g Hayatabad, Peshawar"/>
                                </p>

                                <p> 
                                    <label><?php echo $msg1; ?></label>
                                </p>
                                <p class="signin button"> 
									<input type="submit" value="Sign up"/> 
								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
   
    </body>
</html>