<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
  <?php include '../assets/css/css.html'; ?>
</head>
<body>
<div class="form">
    <h1>Error</h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) && !empty($_SESSION['message']) ) {
        echo $_SESSION['message']; 
        unset( $_SESSION['message'] );
    }           
    else {
        
        header( "location: index.php" );
    }
        
    
    ?>
    </p>     
    <a href="index.php"><button class="button button-block">Home</button></a>
</div>
</body>
</html>
