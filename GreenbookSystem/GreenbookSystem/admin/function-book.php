<?php

#Get all books function
function get_all_books($conn){
  $sql= "select * from book ORDER by id DESC";
    $stmt= $conn->prepare($sql);
    $stmt->execute();

    if($stmt->rowCount() > 0 ){
        $book = $stmt->fetchAll();

    }else{
        $book = 0;

    }
    return $book;
}


#Get book by id
function get_book($conn, $id){
    $sql= "select * from book WHERE id=?";
      $stmt= $conn->prepare($sql);
      $stmt->execute([$id]);
  
      if($stmt->rowCount() > 0 ){
          $books = $stmt->fetch();
  
      }else{
          $books = 0;
  
      }
      return $books;
  }

  
#Search book function
function search_book($conn, $key){
    $key = "%{$key}%";

    $sql= "SELECT * from book 
        where tittle LIKE ?
        OR cost LIKE ?";

      $stmt= $conn->prepare($sql);
      $stmt->execute([$key, $key]);
  
      if($stmt->rowCount() > 0 ){
          $book = $stmt->fetchAll();
  
      }else{
          $book = 0;
  
      }
      return $book;
  }
  