<?php
require("../system/_con.php");



//$query="SELECT * FROM users, messages WHERE users.id = messages.user_id  ORDER BY messages.id ASC";
$result = $mysqli->query("SELECT users.nickname, messages.message, messages.date FROM users, messages WHERE users.id = messages.users_id  ORDER BY messages.id ASC");

$messages = $result;

while ($messages = $result->fetch_assoc() ) {
    

    $nickname = $messages["nickname"]; // Get nickname by userID
    $message = $messages["message"];
    $time=date('G:i', strtotime($messages["date"])); //outputs date as # #Hour#:#Minute#
    
    echo "<p>$time | $nickname: $message</p>\n";
}


/*
//execute query
if ($mysqli->real_query($query)) {
    //If the query was successful
    $res = $mysqli->use_result();

    while ($row = $res->fetch_assoc()) {
        $nickname=$row["nickname"];
        $message=$row["message"];
        $time=date('G:i', strtotime($row["date"])); //outputs date as # #Hour#:#Minute#

        echo "<p>$time | $nickname: $text</p>\n";
    }
} else {
    //If the query was NOT successful
    echo "An error occured";
    //echo $mysqli->errno;
}
*/


?>