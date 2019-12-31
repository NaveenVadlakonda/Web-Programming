
<html>
   <head>
      <title>Select Color</title>
      <link href="style.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div class="pageContainer centerText">
      <?php

          /*$referrer = $_SERVER['HTTP_REFERER']; 
          if (stripos($referrer, 'Order02.php') == false) 
          header("location:order01.php");*/

          $fname = $_POST['fname'];
          $model = $_POST['model'];
          if((strlen($fname) < 2 || strlen($fname) > 20)){

               echo "<p>First Name String length should be 2 to 20 chars.</p>";
          }
          else{
               setcookie("fname", $fname, time() + 31536000);
               setcookie("model", $model, time() + 31536000);

      ?>

         

            <p></p>
            <h2 class="centerText">Select Color</h2>


            <div class="pageContainer">
               <form action="Order03.php" method="post" class="formLayout">
                  <div class="formGroup">
                     <label>Car color:</label>
                     <div class="formElements">
                        <select name="color" required >
                           <option  value=""></option>
                           <option style="background-color: blue; color:white;" value="blue">Blue</option>
                           <option style="background-color: red" value="red">Red</option>
                           <option style="background-color: yellow" value="yellow">Yellow</option>
                        </select> 

                     </div>
                  </div>
                  <div class="formGroup">
                     <label></label>
                     <button type="submit"> >> Next >> </button>
                  </div>
                  <div class="centerText vertGap55">
                     <button type="submit" formnovalidate>Submit without validation</button><br><br>
                     <a href="?">Reload page</a>
                  </div>
               </form>
            </div>
      <?php
         }
      ?>
      </div>
   </body>
</html>