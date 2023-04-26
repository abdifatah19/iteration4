<?php

#Get all Authors function
function get_all_authors($conn){
  $sql= "select * from author";
    $stmt= $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() > 0 ){
        $authors = $stmt->fetchAll();

    }else{
        $authors = 0;

    }
    return $authors;
}


#Get Author by ID 
function get_author($conn, $id){
    $sql= "select * from author WHERE id=?";
      $stmt= $conn->prepare($sql);
      $stmt->execute([$id]);
  
      if($stmt->rowCount() > 0 ){
          $author = $stmt->fetch();
  
      }else{
          $author = 0;
  
      }
      return $author;
  }
  