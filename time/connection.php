<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$pass = "root";
$usr = "root";
$db = "time_db";

$conn = new mysqli($host, $usr, $pass, $db);

?>