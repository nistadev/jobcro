<?php

header('Access-Control-Allow-Methods: GET, POST, DELETE');
header("access-control-allow-origin: *");
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
  if (isset($_POST['data'])) {
    $data = $_POST['data'];
    $registres = json_decode($data);
    $registres[0][0] = explode("/", $registres[0][0]);
    $registres[0][0] = $registres[0][0][2]."/".$registres[0][0][1]."/".$registres[0][0][0];
    $insert_query = "INSERT INTO work_done VALUES (null, '".$registres[0][0]."', '".$registres[0][1]."', '".$registres[0][2]."', '".$registres[0][4]."', '".$registres[0][5]."', '".$registres[0][6]."', 0)";
    
    $insert = $conn->query($insert_query);
    if($insert) echo "Registre introduit.";
    else echo $conn->error;
  } else {
    $id = $_GET['id'];
    $data = $_GET['data'];
    $hora_inici = $_GET["hora_inici"];
    $hora_fi = $_GET["hora_fi"];
    $client = $_GET["client"];
    $conc = $_GET["conc"];
    $desc = $_GET["descripcio"];
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