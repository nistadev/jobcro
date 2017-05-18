<?php
include("connection.php");
$query = "SELECT * FROM work_done";
$result = $conn->query($query);
$registres = array();
$registres["registres"] = array();

while($row = $result->fetch_array(MYSQLI_ASSOC))
    $registres["registres"][] = $row;

$regs = json_encode($registres);
echo $regs;

$conn->close();
?>