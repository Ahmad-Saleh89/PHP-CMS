<?php session_start(); ?>

<?php
  $_SESSION['user_id'] = null;
  $_SESSION['username'] = null;
  $_SESSION['firstname'] = null;
  $_SESSION['lastname'] = null;
  $_SESSION['user_role'] = null;
  $_SESSION['user_email'] = null;
  $_SESSION['user_pw'] = null;

  // remove all session variables
  session_unset(); 

  // destroy the session 
  session_destroy(); 

  header("Location: ../index.php");
?>