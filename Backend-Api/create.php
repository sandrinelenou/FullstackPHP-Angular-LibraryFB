<?php

include "database.php";

//create o insert Book
if($_POST){
  try{
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
  catch(PDOException $e){
    echo 'Error'.$e->getMessage();
  }
}



?>
