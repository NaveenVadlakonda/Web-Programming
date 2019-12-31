<!DOCTYPE html>
<html>
   <head>
      <title>Validation Confirm</title>
      <link href="style.css" rel="stylesheet" type="text/css">

   </head>
   <body>
      <div class="pageContainer centerText">
         <?php
         include 'ValidationUtilities.php';

         //Retrieve inputs (using helper function)
         $email = $_POST['email'];
         $fname = $_POST['fname'];
        // $phone = $_POST['phone'];
          $date=$_POST['birthday'];
         $state = $_POST['state'];
          $age=$_POST['age'];
          $zip=$_POST['zip'];
         //set validation flag
         $IsValid = true;
  
         echo "<p class='centeredNotice'>";
         //email
         if (!fIsValidEmail($email)) {
            echo "Invalid email<br>";
            $IsValid = false;
         }
        
         if (!fIsValidLength($fname, 2, 20)) {
            echo "Enter first name (2-20 characters)<br>";
            $IsValid = false;
         }
           if (!fIsValidRange($age, 1, 99)) {
            echo "Enter Age in between (1-99)<br>";
            $IsValid = false;
         }

      /*   if (!fIsValidPhone($phone)) {
            echo "Enter 10 digit phone number<br>";
          $IsValid = false;
       }*/
          if (!fIsValidZipcode($zip)) {
            echo "Zip code should be numeric & length of 5<br>";
            $IsValid = false;
         }
 if (!fIsValidDate($date)) {
            echo "Enter date in MM/DD/YYYY format OR choose from calender<br>";
            $IsValid = false;
         }
         if (!fIsValidStateAbbr($state)) {
            echo "Enter 2-character state abbreviation<br>";
            $IsValid = false;
         }

         echo "</p>";
         if (!$IsValid) {
            //at least one element not valid. Echo a message and stop execution
            echo "<img class='validImage' src='images/Red_X.png' /><br><br>
            <p><input type='button' class='button' value='<< Go Back <<' onClick='history.back()'><br></p>";
            //stop execution. 
            exit();
         }
         //all inputs are valid. 
            echo "<div class='center'>
            <img class='validImage' src='images/valid.png' />
            <h3>All inputs have valid formats!</h3>
            Email: $email <br>
            First name: $fname <br>
            Age:$age<br>
            State: $state <br>
            Zip:$zip<br>
            ";
         ?>
      </div>
   </body>
</html>
