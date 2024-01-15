<?php

include "database.php";
  //Update data
//check id form is submitted
if($_POST){
  try{
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

  }catch(PDOException $e){
    echo "Updated Failled ". $e->getMessage();
  }

}

?>
