<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// Set session variables

$_SESSION['email'] = $_POST['email'];
$_SESSION['username'] = $_POST['username'];
$_SESSION['nickname'] = $_POST['nickname'];


    

// Escape all $_POST variables to protect against SQL injections
$username = $mysqli->escape_string($_POST['username']);
$nickname = $mysqli->escape_string($_POST['nickname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );

// Getting the auto incremented ID from the created users so we can put it in session again.
$resultId = $mysqli->query("SELECT id FROM users WHERE username='$username'") or die($mysqli->error());
if ($row = mysqli_fetch_array($resultId) ) {
    
    $_SESSION['user_id'] = $row["id"];
    
}



      
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

$result2 = $mysqli->query("SELECT * FROM users WHERE username='$username'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 || $result2->num_rows > 0) {
    
    $_SESSION['message'] = 'User with this email or username already exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (username, nickname, email, password, hash) " 
            . "VALUES ('$username','$nickname','$email','$password', '$hash')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 1; //0 until user activates their account with verify.php
        //$_SESSION['logged_in'] = true; // So we know the user has logged in
        /*$_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";
        */
        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification';
        $message_body = '
        Hello '.$nickname.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/login-system/verify.php?email='.$email.'&hash='.$hash;  
        
        

        //mail( $to, $subject, $message_body );

        header("location: ../chat/index.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}