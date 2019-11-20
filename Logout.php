<?php
   session_start();
 $_SESSION=[];
session_destroy();
   
  
   header('location: http://codd.cs.gsu.edu/~schinnapullaiah1/project2/index.php');
?>