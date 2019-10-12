# Cross-site-Request-Forgery-protection---Synchronizer_Token<!--
/**
*Registration No:IT18089714
 * Name: Tharsha.S
 * Date: 12/10/2019
 */
 -->
<?php

session_start();
session_unset();
session_destroy();
unset($_COOKIE['session_cookie']);
setcookie('PHPSESSID', '', time() - 3600, '/');
setcookie('session_cookie', '', time() - 3600, '/');
setcookie('csrf_token', '', time() - 3600, '/');

header("Location:index.php");
exit;

?>
#Web Security-Assignment 



<h1 style="font-size: 35px;">Web Security </br> Assignment 1</h1>
        <p>Cross-site-Request-Forgery-protection---Synchronizer_Token</p>
    <hr>
    
 <h1 style="font-size: 35px;">Username : admin </br> Password : admin123</h1>

For More details: https://github.com/tharsh96/Cross-site-Request-Forgery-protection---Synchronizer_Token

<?php

session_start(); //server session starts
generateToken(); //create and store token in to a session array



if(isset($_POST['submit']))
{
    ob_end_clean(); //clean outer buffer memory
    
    validate($_POST['user'],$_POST['pass'],$_POST['user_csrf'],$_COOKIE['user_login']);

}


//create csrf token
function generateToken(){

    if(empty($_SESSION['key']))
    {
        $_SESSION['key']=bin2hex(random_bytes(32));       
    }

    $token = hash_hmac('sha256',"token for user login",$_SESSION['key']);
    $_SESSION['CSRF_TOKEN'] = $token;

    ob_start(); //store  in buffer
    echo $token;
}
//validate 
function validate($username, $password,$user_token,$user_sessionCookie)
{

    if($username=="admin" && $password=="admin123")
    {
        if($user_token==$_SESSION['CSRF_TOKEN'] && $user_sessionCookie==session_id())
        {
            echo "<script> alert('Logged in Successfully') </script>";
            echo "<h1 style=\"font-size:50px;text-align:center;\">Welcome : ".$username."<br/></h1>";
            echo "<h3 style=\"font-size:30px;text-align:center;\">Cross-site-Request-Forgery-protection---Synchronizer_Token | SUCCESSFUL<br/></h3>"; 
			echo '<a href="logout.php">Logout</a>';			
        }
        else
        {
           echo "<script> alert('Login failed! CSRFToken not matching!!') </script>"; 
           
           
           echo "<script type=\"text/javascript\"> window.location.href = 'index.php'; </script>";
            
        }         
    }
    else{
        echo "<script> alert('Login failed! Check your username, password and login again!!') </script>"; 
           
        echo "<script type=\"text/javascript\"> window.location.href = 'index.php'; </script>";
    }  
}

?>

@import url(https://fonts.googleapis.com/css?family=Open+Sans);

.btn { display: inline-block; *display: inline; *zoom: 1; padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
.btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
.btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
.btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
.btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
.btn-primary.active { color: rgba(255, 255, 255, 0.75); }
.btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
.btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
.btn-block { width: 100%; display:block; }

* { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

html { width: 100%; height:100%; overflow:hidden; }

body { 
	width: 100%;
	height:100%;
	font-family: 'Open Sans', sans-serif;
	background: black;
	
}
.login { 
	position: absolute;
	top: 50%;
	left: 50%;
	margin: -250px 0 0 -150px;
	width:350px;
	height:300px;
}


.login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }
.login a:hover {color: #c7ecee}
input { 
	width: 100%; 
	margin-bottom: 10px; 
	background: rgba(0,0,0,0.3);
	border: none;
	outline: none;
	padding: 10px;
	font-size: 13px;
	color: #fff;
	text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
	border: 1px solid rgba(0,0,0,0.3);
	border-radius: 4px;
	box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
	-webkit-transition: box-shadow .5s ease;
	-moz-transition: box-shadow .5s ease;
	-o-transition: box-shadow .5s ease;
	-ms-transition: box-shadow .5s ease;
	transition: box-shadow .5s ease;
}

input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }

* linguist-vendored
*.php linguist-vendored=false




var csrf_token;


function loadDOC(method,url,htmlTag)
{
    var xhttp = new XMLHttpRequest(); 
    xhttp.onreadystatechange = function() 
    {
        if(this.readyState==4 && this.status==200)
        {           
            document.getElementById(htmlTag).value = this.responseText;
                   
        }
    };

    xhttp.open(method,url,true);
    xhttp.send();
}


<?php 
     session_start();

     //setting a cookie
     $sessionID = session_id(); //storing session id
 
     setcookie("user_login",$sessionID,time()+3600,"/","localhost",false,true); //cookie terminates after 1 hour - HTTP only flag
     
?>


<!DOCTYPE html>
<html>

<head>
    <title>Web Security - Assignment</title>		
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="conf.js"> </script>
</head>



<body>
		
	
<div class="login">

<h1 style="font-size: 35px;text-align:center;color: #dff9fb;">Web Security</h1>
<p style="text-align:center;color: #95afc0">Cross-Site Request Forgery Protection---Synchronizer_Token</p>
       
    <hr>

	<h1>Login</h1>
    <form method="POST" action="server.php">
    	<input type="text" name="user" placeholder="Username" required="required" />
		<input type="password" name="pass" placeholder="Password" required="required" />
		<input type="hidden" name="user_csrf" id="IdOfToken" /> 
        <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Login.</button>
    </form>

    <p style="text-align:Left;color: #95afc0"><b>Contact me:</b></p> 
	<p style="text-align:Left;color: #95afc0">Blogspot:<a href="https://tharsh30.blogspot.com/2019/10/cross-site-request-forgery-protection.html
">  tharsha</a> <br>
	 GitHub:<a href="https://github.com/tharsh96/Cross-site-Request-Forgery-protection---Synchronizer_Token">  tharsh96</a></p>
	
</div>


<?php 
    //ajax call
       if(isset($_COOKIE['user_login']))
            { 
                echo '<script> var token = loadDOC("POST","server.php","IdOfToken");  </script>'; 
                        
            }
    ?>

</body>
</html>
