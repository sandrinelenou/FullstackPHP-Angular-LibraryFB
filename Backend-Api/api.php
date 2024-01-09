<?php

include "database.php";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json; charset=UTF-8");

// Operazione READ all books
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Codice per ottenere dati dal database e restituire JSON
    $sql = "SELECT * FROM books ORDER BY id ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   // echo 'ee <br>';
    echo json_encode($result);
}


// Operazione CREATE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Codice per inserire dati nel database
}

// Operazione UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
  // Codice per aggiornare dati nel database
}

// Operazione DELETE
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  // Codice per eliminare dati dal database
}

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
  case 'GET':
    //fetch data
    //implement select query here
    // Codice per ottenere dati dal database e restituire JSON
    break;
  case 'POST':
    //create new post
    //Implement insert query here
    break;
  case 'PUT':
    //update record
    //Implement update query here
    break;
  case 'DELETE':
    //delete record
    //implement delete query here
    break;
  default:
    http_response_code(405); //method not allowed
    echo json_encode(array('error'=>'Method not allowed'));
    break;
}






//Create table
/*try{
if($_SERVER["RREQUEST_METHOD"] === "POST"){
  $data = json_decode(file_get_contents("php://input"));
}
  // CREATE DATABASE IF NOT EXITS library_fb_db ;
  // USE library_fb_db;

    $sql = "CREATE TABLE Books(
    id INT 11 UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    title_orig VARCHAR(255)  NOT NULL,
    /*author VARCHAR(255) NOT NULL,*/
    /*date_1st_pub DATE
    )";
    //use exe() because no results are returned
    $conn->exec ($sql);
    echo "Table Books created successfully";
  }catch(PDOException $e){
    echo $sql ."<br>" . $e->getMessage();
  }*/

?>
