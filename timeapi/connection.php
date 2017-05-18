<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "127.0.0.1";
$pass = "root";
$usr = "root";
$db = "time_db";

$conn = new mysqli($host, $usr, $pass, $db);

?>