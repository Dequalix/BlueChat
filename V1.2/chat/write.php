<?php
/* Displays user information and some useful messages */
session_start();
require("../system/_con.php");

    // Makes it easier to read
    $username = $_SESSION['username'];
    $nickname = $_SESSION['nickname'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    $user_id = $_SESSION['user_id'];
    

    $message = $mysqli->escape_string($_GET['message']);
    //$message=substr($_GET["message"], 0, 128);
    //$messageEscaped = htmlentities(mysqli_real_escape_string($mysqli, $message)); //escape text and limit it to 128 chars

    $sql = "INSERT INTO messages (users_id, message) VALUES ('$user_id', '$message')";
    
    if ( $mysqli->query($sql) ){
        //If the query was successful
        echo "Wrote message to db";
    } else{
        //If the query was NOT successful
        echo "An error occurred";
        echo $mysqli->error;
    }


?>