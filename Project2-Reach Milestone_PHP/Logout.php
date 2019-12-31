<?php
   session_start();
 $_SESSION=[];
session_destroy();
   
  
   header('location: http://codd.cs.gsu.edu/~nvadlakonda1/Project2/Home.php');
?>