<?php

#Get all category function
function get_all_categories($conn){
  $sql= "select * from catagories";
    $stmt= $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() > 0 ){
        $categories = $stmt->fetchAll();

    }else{
        $categories = 0;

    }
    return $categories;
}




#Catagories by Id
function get_category($conn, $id){
    $sql= "select * from catagories where id=?";
      $stmt= $conn->prepare($sql);
      $stmt->execute([$id]);
  
      if($stmt->rowCount() > 0 ){
          $category = $stmt->fetch();
  
      }else{
          $category = 0;
  
      }
      return $category;
    }
    