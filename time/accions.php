<?php

include("connection.php");

$accio = $_SERVER['REQUEST_METHOD'];

if ($accio == 'DELETE'){
  $id = $_GET['id'];
  if (isset($id) && $id != "") {
      $qry = "DELETE FROM work_done WHERE id =".$id;
      $resultat = $conn->query($qry);
      if ($resultat) echo "Eliminat correctament!";
      else echo "Error al eliminar el registre.";
  } else {
  	echo "Error, no data was passed.";
  }
} elseif ($accio == 'POST') {
  $id = $_POST['id'];
  $data = $_POST['data'];
  $hora_inici = $_POST["hora_inici"];
  $hora_fi = $_POST["hora_fi"];
  $client = $_POST["client"];
  $conc = $_POST["conc"];
  $desc = $_POST["descripcio"];

  $qry = "UPDATE work_done SET data='$data', hora_inicial='$hora_inici', hora_final='$hora_fi', client='$client', concepte='$conc', descripcio='$desc' WHERE id='$id'";

  $resultat = $conn->query($qry);

  if ($resultat) echo "Registre actualiztat correctament!";
  else echo $conn->error;
}

?>