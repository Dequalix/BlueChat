<?php
/* Database connection settings */
$host = 'localhost';
$user = 'db_user';
$pass = 'Water30Meloen';
$db = 'chatdb';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
?>