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
