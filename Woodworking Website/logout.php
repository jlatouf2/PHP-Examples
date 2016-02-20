<?php
session_start();//access the current session. #1 // if no session variable exists then redirect the user
if (!isset($_SESSION['user_id'])) { #2 header("location:index.php");
exit();
//cancel the session and redirect the user:
}else{ //cancel the session #3
    $_SESSION = array(); // Destroy the variables.
    session_destroy(); // Destroy the session
setcookie('PHPSESSID', ", time()-3600,'/', ", 0, 0);//Destroy the cookie
header("location:index.php");
exit();
}
?>