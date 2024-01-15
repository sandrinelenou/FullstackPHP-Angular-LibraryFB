<?php
// used to connect to the database
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; chardet=UTF-8");
header("Access-Control-Allow-Method: GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$data = json_decode(file_get_contents("php://input"),true);

$host = "localhost";
$dbname = "library_fb_db";
$username = "root";
$password = "";

try{

  $conn = new PDO("mysql:host ={$host}; dbname={$dbname}",$username,$password);
 // $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
}catch(PDOException $error){
  echo "Connection failed: ".$error->getMessage();
}
//$conn = null;

/*?>*/
