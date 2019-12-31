<?php
   session_start();
   $name = "";
   if (isset($_SESSION['username'])) 
   {     
      $name = $_SESSION["username"];
   }
   else{
      header("location: login.php");
   }

   if(isset($_POST['abandon'])){
      unset($_SESSION["username"]);
      session_destroy();
      header("location: login.php");
   } 
?>

<html>
   <head>
      <title>Password Protected Page</title>
      <link href="style.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div class="pageContainer centerText">

            <h2>Password Protected Page</h2><hr>

            <h2>Welcome <?php echo $name; ?></h2>
            <img src="images/vault.jpg" style="width:400px;height:auto;" />
            <br>
                 Your session will timeout
                 after 24 minutes of inactivity.<br><br>

         <form method="post" class="formLayout">
            <div class="formGroup">
               <input type="hidden" name="abandon" value="true">
               <label> </label>
               <button type="submit">Logout</button>
            </div>
         </form>

      </div>
   </body>
</html>