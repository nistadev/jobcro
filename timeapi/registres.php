<?php
header('content-type: application/json; charset=utf-8');
header("access-control-allow-origin: *");

$accio = $_SERVER['REQUEST_METHOD'];

include("connection.php");

$query = "SELECT * FROM work_done";
$result = $conn->query($query);
$registres = array();
$registres["data"] = array();

while($row = $result->fetch_array(MYSQLI_ASSOC))
    $registres["data"][] = $row;

$regs = json_encode($registres);
echo $regs;

$conn->close();

?>