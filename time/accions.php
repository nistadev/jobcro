<?php

$accio = $_SERVER['REQUEST_METHOD'];

if ($accio == 'DELETE'){
    $id = $_GET['id'];
    if (isset($id) && $id != "") {
        $qry = "DELETE FROM work_done WHERE id =".$id;
        $conn->query($qry);
    }
}

?>