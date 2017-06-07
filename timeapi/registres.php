<?php
header('content-type: application/json; charset=utf-8');
header("access-control-allow-origin: *");

include("connection.php");
<<<<<<< HEAD
$accio = $_SERVER['REQUEST_METHOD'];

if ($accio = 'GET') {
	$query = "SELECT * FROM work_done ORDER BY data DESC, hora_inicial ASC";
	$result = $conn->query($query);
	$registres = array();
	$registres["registres"] = array();
=======
$query = "SELECT * FROM work_done";
$result = $conn->query($query);
$registres = array();
$registres["data"] = array();

while($row = $result->fetch_array(MYSQLI_ASSOC))
    $registres["data"][] = $row;
>>>>>>> bf3d0f9e860998c75789b4ad21610bf1541afc17

	while($row = $result->fetch_array(MYSQLI_ASSOC))
	    $registres["registres"][] = $row;

	echo json_encode($registres);
}

$conn->close();
?>