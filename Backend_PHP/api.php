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
  $insertQuery = "INSERT INTO Books
  SET p_title=:title, p_title_orig=:title_orig, p_date_1st_pub=:date_1st_pub ";
//prepare query for execute
$stmt = $conn->prepare($insertQuery);
//post values
$title= $_POST['title'];
$title_orig= $_POST['title_orig'];
$date_1st_pub= $_POST['date_1st_pub'];
//bind parameters
$stmt->bindParam(':title', $title);
$stmt->bindParam(':title_orig', $title_orig);
$stmt->bindParam(':date_1st_pub', $date_1st_pub);
//execute the query
  if($stmt->execute()){
  echo json_encode(array('result'=>'success'));
  }else{
  echo json_encode(array('result'=>'fail'));
  }
}

// Operazione UPDATE
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
  // Codice per aggiornare dati nel database
  $updateQuery = "UPDATE Books
  SET p_title=:title, p_title_orig=:title_orig, p_date_1st_pub=:date_1st_pub
  WHERE p_id=: id";
//prepare query for execution
$stmt = $conn->prepare($updateQuery);
//posted values
$id = $_POST['id'];
$title = $_POST['title'];
$title_orig = $_POST['title_orig'];
$date_1st_pub = $_POST['date_1st_pub'];
//bind the parameters
$stmt->bindParam(':id',$id);
$stmt->bindParam(':title',$id);
$stmt->bindParam(':title_orig',$id);
$stmt->bindParam(':date_1st_pub',$id);
// Execute the query
  if($stmt->execute()){
  echo json_encode(array('result'=>'success'));
  }else{
  echo json_encode(array('result'=>'fail'));
  }

}

// Operazione DELETE
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
  // Codice per eliminare dati dal database
  //get record id
  //isset is a aphp function used to verify if a value is there or not
  $deleteQuery= "DELETE FROM books WHERE id = ?";
   //prepare query for execution
   $stmt = $conn->prepare($deleteQuery);
    //bind the parameters
  $stmt->bindParam(1,$id);
    // Execute the query
  if($stmt->execute()){
    //redirect user to read page and show msg record was deleted
    echo json_encode(array('result'=>'success'));
  }else{
    echo json_encode(array('result'=>'fail'));
  }
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

/*?>*/
