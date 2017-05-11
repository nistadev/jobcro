<?php 

include("../connection.php");

$hora_inici = $_POST["hora_inici"];
$hora_fi = $_POST["hora_fi"];
$client = $_POST["client"];
$desc = $_POST["descripcio"];
$data = $_POST["data"];
$conc = $_POST["conc"];

if(!$conn){
    echo "<h5>Error al connectar amb la base de dades.</h5>";
    exit();
} else {
    $query = "INSERT INTO work_done(hora_inicial, hora_final, client, descripcio, data, concepte) VALUES ('$hora_inici', '$hora_fi', '$client', '$desc', '$data', '$conc')";
    $insert = $conn->query($query);
    if ($insert)
        echo "Dades registrades.";
    else
        echo "Error";
}

?>