<?php 

include("../connection.php");

$hora_inici = $_POST["hora_inici"];
$hora_fi = $_POST["hora_fi"];
$temps_total = $_POST["temps_total"];
$client = $_POST["client"];
$desc = $_POST["descripcio"];
$data = $_POST["data"];
$conc = $_POST["conc"];

if(!$conn){
    echo "<h5>Error al connectar amb la base de dades.</h5>";
    exit();
} else {
    $query = "INSERT INTO work_done(hora_inicial, hora_final, temps_total, client, descripcio, data, concepte) VALUES ('$hora_inici', '$hora_fi', $temps_total, '$client', '$desc', '$data', '$conc')";
    $insert = $conn->query($query);
    var_dump($query);
    if ($insert)
        echo "Dades registrades.";
    else
        echo "Error:".$conn->error;
}

?>