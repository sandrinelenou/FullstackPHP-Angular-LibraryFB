<?php

include "database.php";

/*header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");*/
  //Select all data
  try{
    $sql = "SELECT * FROM books ORDER BY id ASC";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);
    echo $json;
  }// show error
  catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
  }

?>
