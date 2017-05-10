<?php 
include("connection.php");

$hora_inici = $_POST["hora_inici"];
$hora_fi = $_POST["hora_fi"];
$client = $_POST["client"];
$desc = $_POST["descripcio"];
$data = $_POST["data"];
$conc = $_POST["conc"];

if ((!isset($hora_inici) || $hora_inici == "") || 
    (!isset($hora_fi) || $hora_fi == "") ||
    (!isset($client) || $client == "") ||
    (!isset($data) || $data == "") ||
    (!isset($conc) || $conc == "") ||
    (!isset($desc) || $desc == "")) {
    $valid = false;
} else {
    $valid = true;
}

if(!$conn){
    echo "<h5>Error al connectar amb la base de dades.</h5>";
    exit();
} else {
    $query = "INSERT INTO work_done(hora_inicial, hora_final, client, descripcio, data, concepte) VALUES ('$hora_inici', '$hora_fi', '$client', '$desc', '$data', '$conc')";
    if ($valid) {
        $insert = $conn->query($query);
        if ($insert)
            header("location: index.php?page=entra_hores&msg=ok");
        else
            header("location: index.php?page=entra_hores&msg=ko");
    } else
        header("location: index.php?page=entra_hores&msg=ko");
}

?>