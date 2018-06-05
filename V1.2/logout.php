<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
require 'system/_config.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="form">
          <h1>Thanks for using <?php echo $chatName; ?></h1>
              
          <p><?= 'You have been logged out!'; ?></p>
          
          <a href="index.php"><button class="button button-block">Home</button></a>

    </div>
</body>
</html>
