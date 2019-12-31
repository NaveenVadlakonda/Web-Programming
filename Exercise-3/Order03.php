
<html>
   <head>
      <title>Select Color</title>
      <link href="style.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div class="pageContainer centerText">
      <?php
          

          $color = $_POST['color'];
          if((strlen($color) < 2 || strlen($color) > 20)){

               echo "<p>Color String length should be 2 to 20 chars.</p>";
          }
          else{
                $fname = "";
                $model = "";
                foreach ($_COOKIE as $key=>$val) {
                  if($key == "fname"){
                    $fname = $val;
                  }
                  else if($key=="model"){
                    $model = $val;
                  }
                }

      ?>

         

            <p></p>
            <h2 class="centerText">Information</h2>
            <div class="pageContainer">
              <?php 
                  $model = lcfirst($model);
                  $color = ucfirst($color);
                  echo "<div class='center'>
                  <img width='350px' height='300px' src='images/$model$color.jpg' /><br>
                  First Name: $fname <br>
                  Car Model: $model <br>
                  Car Color: $color <br></div>
                  ";
               ?>
            </div>
      <?php
         }
      ?>
      </div>
   </body>
</html>