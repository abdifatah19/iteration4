<?php

#start the session
session_start();

# If search key is not set or empty
if (!isset($_GET['key']) || empty($_GET['key'])) {
	header("Location: index.php");
	exit;
}
  $key = $_GET['key'];

  #Database connection file
  include "admin/db_conn.php";

  #book helper function
  include "admin/function-book.php";
  $book = search_book($conn, $key);

  #Author helper function
  include "admin/funtion-author.php";
  $authors = get_all_authors($conn);

  #Categories helper function
  include "admin/function-category.php";
  $categories = get_all_categories($conn);
  
?>

<!DOCTYPE html>
<html long="en"
<head>
    <title>Admin</title>
    <meta charset="UTF-8">
    <meta html-equiv="X-UA-Compatible" content="IE=edge">
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet"href="css/search.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="admin/adHome.php">Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Green Book<span class="sr-only">(current)</span></a>
      </li>
      
        
        <li class="nav-item active">
          <a class="nav-link" href="add-book.php">Add book<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="add-category.php">Add Catagory<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="add-author.php">Add Author<span class="sr-only">(current)</span></a>
        </li>
        <?php  
          ?>
        <li class="nav-item active">
          <a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>
        </li>
      
    
   
    </div>
      </nav>
      <br>
          Search result for <b><?=$key?></b>

          <div class ="d-flex">
            <?php if ($book == 0){?>
              <div class="alert alert-warning text-center p-3 pdf-list" style="width: 90%" 
                 role="alert">
                
                 <img src="images/empty-search.png" width="100">
                 <br>
                      The <b> "<?=$key?>"</b>
                       did't match to any record in the database
                
                </div>
              <?php } else { ?>

            
            <div class ="pdf-list d-flex flex-wrap">
              <?php foreach($book as $book){ ?>
              <div class="card m-1">

                <img src="uploads/cover/<?=$book['cover']?>"
                <?php } ?>
                class="card-img-top">
                <div class ="card-body">
                  <h5 class = "card-tittle">
                    <?=$book['tittle']?>

              </h5>
              <p class ="card-text">
                <i> <b> BY:
                  <?php foreach($authors as $author) { 
                   
                   if($author['id'] == $book['author_id']){
                    echo $author['name'];
                    break;

                   }
                  ?>

                 <?php } ?>
                 
              <br></b> </i>
             
                  
              <br><i> <b> category:
                  <?php foreach($categories as $category) { 
                   
                   if($category['id'] == $book['category_id']){
                    echo $category['name'];
                    break;

                   }
                  ?>

                 <?php } ?>
                 
              <br> </b> </i>
              <i> <b> Cost: 
              <?=$book['cost']?>
              </b> </i>

              </p>
              <a href="uploads/files/<?=$book['file']?>"
                          class="btn btn-success">Open</a>
                  
              </div>
            </div>
            <?php } ?>
        </div>
      
      </div>
</div>
  
</body>
</html>


