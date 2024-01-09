<?php

include "database.php";

//Delete record
try{
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

}catch(PDOException $e){
  echo "Updated Failled ". $e->getMessage();
}



?>
