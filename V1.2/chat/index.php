<?php
/* Displays user information and some useful messages */
session_start();
require '../system/_config.php';

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing the chat!";
  header("location: ../login/error.php");    
}
else {
    // Makes it easier to read
    $username = $_SESSION['username'];
    $nickname = $_SESSION['nickname'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $id = $_SESSION['user_id'];
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title><?= $chatName . ' | ' .  $nickname.' ' ?></title>
  <?php include '../assets/css/css.html'; ?>
</head>

<body>
    <div class="form chatBox">
        
        <a href="../logout.php"><button id="chatLogout" class="button" name="logout">Log Out</button></a>
        <h1>Welcome <?=$nickname?></h1>
        <p>
            <?php
            /*
             // Display message about account verification link only once
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              
              // Don't annoy the user with more messages upon page refresh
              unset( $_SESSION['message'] );
          }
          */
            ?>
        </p>
        <div class="contentBox leftBox">
            <h2><?php echo 'Display name: '.$nickname.' <br>Username: '.$username; ?></h2>
            <p>Email: <?= $email ?></p>
            <a href="../panel"><button id="chatBtnPanel" class="button" name="panel">User Panel</button></a>
        </div>
        
        
        <div class="contentBox chat rightBox">
            <div id="chatOutput"></div>
            <input id="chatInput" type="text" placeholder="Input Text here" maxlength="128">
            <button id="chatSend" class="button">Send</button>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>
