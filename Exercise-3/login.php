<?php
      if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
          $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
          header('HTTP/1.1 301 Moved Permanently');
          header('Location: ' . $location);
          exit;
      }
      $name = "";
      session_start();
      if(isset($_POST['postback'])){
         $name = $_POST['username'];
         $password = $_POST['pwd'];
         if ($password == 'guest' && strlen($name) > 0) {
               $_SESSION['username'] = $name;
               //echo $_SESSION['username'];
               header("location: protected.php"); 
               exit;
         }
      }
?>
<html>
   <head>
      <title>Login Page</title>
      <link href="style.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div class="pageContainer centerText">

            <h2>Login Page</h2><hr>

         <form method="post" class="formLayout">
            <div class="formGroup">
               <input type="hidden" name="postback" value="true">
               
               <input type="text" name="username" class="textbox" required placeholder="User Name" autofocus value="<?php if(isset($_POST['postback'])){echo $name;} ?>"/>
               <?php if(isset($_POST['postback']) && strlen($name) < 1){echo "Please enter your name.";}?>
               <br><br>
               <input type="password" name="pwd" class="textbox" required placeholder="Password" minlength="5" autofocus /><br><br>
               <button type="submit">Login</button>
            </div>
         </form>
         <a href="protected.php">Protected Page</a>

      </div>
   </body>
</html>