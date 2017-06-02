<?php
include("connection.php");
$accio = $_SERVER['REQUEST_METHOD'];

if ($accio = 'GET') {
	$query = "SELECT * FROM work_done ORDER BY data DESC, hora_inicial ASC";
	$result = $conn->query($query);
	$registres = array();
	$registres["registres"] = array();

	while($row = $result->fetch_array(MYSQLI_ASSOC))
	    $registres["registres"][] = $row;

	echo json_encode($registres);
}

$conn->close();
?>