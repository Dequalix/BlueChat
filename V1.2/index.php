<?php
if ( $_SESSION['logged_in'] != 1 ) {
  //$_SESSION['message'] = "You must log in before ";
  header("location: login/index.php");    
}
else {
    header ("location: chat/index.php");
}
?>