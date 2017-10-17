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
  if (isset($_GET['configuracions'])) {
    $config = $_GET['configuracions'];
  }
  if (isset($id) && $id != "") {
      $qry = "DELETE FROM work_done WHERE id =".$id;
      $resultat = $conn->query($qry);
      if ($resultat) echo "Eliminat correctament!";
      else echo "Error al eliminar el registre. Error: ".$conn->error;
  } elseif (isset($data) && $data != ""){
    $data = explode(',', $data);
    var_dump($data);
    foreach ($data as $idReg) {
      $qry = "DELETE FROM work_done WHERE id =".$idReg;
      $resultat = $conn->query($qry);
      if ($resultat) echo "Eliminat correctament!";
      else echo "Error al eliminar el registre. Error: ".$conn->error;
    }
  } elseif (isset($config) && $config != '') {
    if($config == 'elimina_mes'){
      $any = $_GET['any'];
      $mes = $_GET['mes'];
      $qry = 'DELETE FROM hores_mes WHERE any = '.$any.' AND mes = '.$mes;
      echo $qry;
      $resultat = $conn->query($qry);
      if ($resultat) echo "Eliminat correctament!";
      else echo "Error al eliminar el registre. Error: ".$conn->error;
    }
  } else {
    echo "Error, no data was passed.";
  }
} elseif ($accio == 'POST') {
  if (isset($_POST['data'])) {
    $data = $_POST['data'];
    $registres = json_decode($data);
    var_dump($registres);
    $registres[0][0] = explode("/", $registres[0][0]);
    $registres[0][0] = $registres[0][0][2]."/".$registres[0][0][1]."/".$registres[0][0][0];
    $insert_query = "INSERT INTO work_done VALUES (null, '".$registres[0][0]."', '".$registres[0][1]."', '".$registres[0][2]."', '".$registres[0][4]."', '".$registres[0][5]."', '".$registres[0][6]."', '".$registres[0][7]."', 0)";
    
    $insert = $conn->query($insert_query);
    if($insert) echo "Registre introduit.";
    else echo $conn->error;
  } elseif (isset($_GET["configuracions"])) {
    $mes = $_GET['mes'];
    $any = $_GET['any'];
    $hores = $_GET['hores'];
    $qry = "UPDATE hores_mes SET hores=$hores WHERE any = $any AND mes = $mes";

    $resultat = $conn->query($qry);

    if ($resultat) echo "Configuracio del mes actualitzada correctament!";
    else echo $conn->error;
  
  } else {
    $id = $_GET['id'];
    $data = $_GET['data'];
    $hora_inici = $_GET["hora_inici"];
    $hora_fi = $_GET["hora_fi"];
    $temps_total = $_GET["temps_total"];
    $client = $_GET["client"];
    $conc = $_GET["conc"];
    $desc = $_GET["descripcio"];
    $qry = "UPDATE work_done SET data='$data', hora_inicial='$hora_inici', hora_final='$hora_fi', temps_total='$temps_total', client='$client', concepte='$conc', descripcio='$desc' WHERE id='$id'";
    $resultat = $conn->query($qry); 
    if ($resultat) echo "Registre actualitzat correctament!";
    else echo $conn->error;
  }
} elseif ($accio = "GET") {
  if (isset($_GET["registres"])) {
    $qry = "SELECT * FROM work_done ORDER BY data DESC, hora_inicial ASC";
    $res = $conn->query($qry);
    $result = array();
    $result["data"] = array();
    
    while($row = $res->fetch_assoc())
      $result["data"][] = $row;
    
    $result = json_encode($result);
    echo $result;
  } elseif (isset($_GET["data_registre"])) {
    $data_registre = $_GET["data_registre"];
    $qry = "SELECT * FROM work_done WHERE data LIKE '".$data_registre."' ORDER BY data DESC, hora_inicial ASC";
    $res = $conn->query($qry);
    $result = array();
    $result["data"] = array();
    
    while($row = $res->fetch_assoc())
      $result["data"][] = $row;
    
    $result = json_encode($result);
    echo $result;
  } elseif (isset($_GET["consulta"])) {
    $qry = $_GET["consulta"];
    $qry = str_replace("\\", "", $qry);
    $res = $conn->query($qry);
    $result = array();
    $result["data"] = array();
    
    while($row = $res->fetch_assoc()){
      $result["data"][] = $row;
    }
    $result = json_encode($result);
    echo $result;
  } elseif(isset($_GET["configuracions"])) {
    $qry = "SELECT * FROM ".$_GET['configuracions'];
    $res = $conn->query($qry);
    while($row = $res->fetch_assoc())
      $result[$row["any"]][intval($row["mes"])] = intval($row["hores"]);
    
    $result = json_encode($result);
    echo $result;
  }
}
?>