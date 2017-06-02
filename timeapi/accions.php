<?php

include("connection.php");

$accio = $_SERVER['REQUEST_METHOD'];

if ($accio == 'DELETE'){
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }
  if (isset($_GET['data'])) {
    $data = $_GET['data'];
  }
  if (isset($id) && $id != "") {
      $qry = "DELETE FROM work_done WHERE id =".$id;
      $resultat = $conn->query($qry);
      if ($resultat) echo "Eliminat correctament!";
      else echo "Error al eliminar el registre.";
  } else if (isset($data) && $data != ""){
    $data = explode(',', $data);
    var_dump($data);
    foreach ($data as $idReg) {
      $qry = "DELETE FROM work_done WHERE id =".$idReg;
      $resultat = $conn->query($qry);
      if ($resultat) echo "Eliminat correctament!";
      else echo "Error al eliminar el registre.";
    }
  } else {
  	echo "Error, no data was passed.";
  }
} elseif ($accio == 'POST') {
  $data = $_POST['data'];
  if (isset($data)) {
    $objecte = json_decode($data);
    $insert_query = "INSERT INTO work_done VALUES (null, '".$objecte[0][0]."', '".$objecte[0][1]."', '".$objecte[0][2]."', '".$objecte[0][4]."', '".$objecte[0][5]."', '".$objecte[0][6]."', 0)";
    

    $insert = $conn->query($insert_query);
    var_dump($insert_query);
    var_dump($insert);
    echo $conn->error;
    if($insert) echo "Registre introduit.";
    else echo "Error, registre no introduit";

  } else {
    echo "no";
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
} elseif ($accio = "GET") {
  if (isset($_GET["registres"])) {
    $qry = "SELECT * FROM work_done ORDER BY data DESC, hora_inicial ASC";
    $res = $conn->query($qry);
    $result = array();
    $result["data"] = array();
    
    while($row = $res->fetch_assoc()){
      $result["data"][] = $row;
    }
    $result = json_encode($result);
    echo $result;
  }
}

?>