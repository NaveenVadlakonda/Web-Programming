<?php 
session_start();
$_SESSION['players'] = '';
?><!doctype unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="css/index.css"/>
</head>
<body>
   
<div class="headingDiv">
	<marquee behavior="scroll" direction="right">Reach MileStone</marquee>
</div>
<div class="headingDiv2">
	<a href="http://www.twitter.com" target="_blank">
	<img class="headingDiv2IMG" alt="T" src="images/t.png"/>
	</a>
	
	<a href="http://www.facebook.com" target="_blank">
	<img class="headingDiv2IMG" alt="T" src="images/f.png"/>
	</a>
	
	<a href="http://www.youtube.com" target="_blank">
	<img class="headingDiv2IMG" alt="T" src="images/y.png"/>
	</a>
	
	<a href="http://www.pinterest.com" target="_blank">
	<img class="headingDiv2IMG" alt="T" src="images/p.png"/>
	</a>
</div>
<div class="menu">
	<img class="imgB1" src="images/success.png" />
	<ul>  
	 <li class="li0"><a class = "a1" ></a></li>
	  <li class="li1"><a class = "a1" class="active" href="Home.php">HOME</a></li>
	  <li class="li2"><a class = "a2" href="about.php">How to Play</a></li>	
	  
	</ul>
</div>
    
    
<div class="mainBodyDiv">
	<div class="mainContentDiv">
        <center>
        <h2>Enter Username and Password</h2> 
      <div class = "container form-signin">
         
         <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['username'] && 
                  $_POST['password'] == 'game') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = $_POST['username'];
               }else {
                  $msg = 'Wrong username or password';
               }
            }
         ?>
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "milestone.php" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "password=game" required><br>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
         </form>
			
         
         </center>
      </div> 
	</div>
</div>


</body>
</html>
<?php
?>