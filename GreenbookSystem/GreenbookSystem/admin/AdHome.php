<?php


  #Database connection file
  include "db_conn.php";

  #book helper function
    include "function-book.php";
    $book = get_all_books($conn);

  #Author helper function
  include "funtion-author.php";
  $authors = get_all_authors($conn);

  #Categories helper function
  include "function-category.php";
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
    <link rel="stylesheet"href="adHome.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="adHome.php">Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Green Book<span class="sr-only">(current)</span></a>
      </li>
      
      
      <li class="nav-item active">
        <a class="nav-link" href="../add-book.php">Add book<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../add-category.php">Add Catagory<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../add-author.php">Add Author<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>
      </li>
    
    
   
    </div>
  </nav>

  <form action="../search.php"
             method="get" 
             style="width: 100%; max-width: 30rem">

       	<div class="input-group m-5">
		  <input type="text" 
		         class="form-control"
		         name="key" 
		         placeholder="Search Book..." 
		         aria-label="Search Book..." 
		         aria-describedby="basic-addon2">

		  <button class="input-group-text
		                 btn btn-primary" 
		          id="basic-addon2">
		          <img src="../images/search.png"
		               width="20">

		  </button>
		</div>
       </form>
  <div class="mt-5"></div>
                <?php if (isset($_GET['error'])) { ?>
                  <div class="alert alert-danger" role="alert">
                <?=htmlspecialchars($_GET['error']); ?>
              </div>
            <?php } ?>
            <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success" role="alert">
                    <?=htmlspecialchars($_GET['success']); ?>
                </div>
              <?php } ?>
              
          <?php if($book == 0){ ?>
            <div class="alert alert-warning text-center p-3" style="width: 90%" 
                 role="alert">
                
                 <img src="../images/empty.jpg" width="100">
                 <br>
                      There is no books in the database
                
                </div>
          <?php } else{?>

          <!-- List of all books  -->
          <h2 class="m-5"> All books</h2>
            <table class ="table table-bordered shadow m-5"
            style="width: 90%;">
          <thead>
              <tr>
                <th>#</th>
                <th>Tittle</th>
                <th>Cost</th>
                <th>Edition</th>
                <th>Publish Place</th>
                <th>Author</th>
                <th>Category</th>
                <th>Action</th>
          </tr>
      </thead>
    </tbody>
    <?php 
    $i=0;
    foreach ($book as $book){
      $i++;
      ?>
    
    <tr>
                 <td><?=$i?></td>
                 <td>
                    <img width="80"
                    src="../uploads/cover/<?=$book['cover']?>" >
                    <a class ="link-dark d-block
                    text-left"
                    href="../uploads/files/<?=$book['file']?>" >
                
                  <?=$book['tittle']?>
                  </a>
                </td>
                 <td><?=$book['cost']?></td>
                 <td><?=$book['edition']?></td>
                 <td> <?=$book['pubPlace']?></td>
                 <td>

                 <?php if($authors == 0){
                  echo"undefined";}else{
                  foreach ($authors as $author){
                    if($author['id']==$book['author_id']){
                      echo $author['name'];

                    }

                  }
                 }
                 ?>
                </td>
                 <td>
                 <?php if($categories == 0){
                  echo"undefined";}else{
                  foreach ($categories as $category){
                    if($category['id']==$book['category_id']){
                      echo $category['name'];

                    }

                  }
                 }
                 ?>
                </td>
                 <td>

                   <a href="../edit-book.php?id=<?=$book['id']?>"
                    class="btn btn-warning">
                    Edit</a>
                    <a href="delete-book.php?id=<?=$book['id']?>"
                    class="btn btn-danger">
                      Delete</a>
          </td>
          </tr>
          <?php }?>

              </tbody>
          </table>
          <?php }?>
           <?php if($categories == 0){ ?>
              
            <div class="alert alert-warning text-center p-3" style="width: 90%" 
                 role="alert">
                
                 <img src="../images/empty.jpg" width="100">
                 <br>
                  There is no category in the database
                
                </div>
            <?php } else{?>


        <!-- List of all Catagories -->
        <h2 class="m-5"> All Catagories</h2>
        <table class ="table table-bordered shadow m-5"
        style="width: 90%;">
          <thread> 
            <tr>
                <th>#</th>
                <th>Category Name</th>
                <th>Action</th>
        
                </tr>
                  </thread>
                  <tbody>
                    <?php
                    $j=0;
                    foreach ($categories as $category){
                      $j++;
              ?>
            <tr>
              <td><?=$j?></td>
              <td><?=$category['name']?></td>
              <td>

                      <a href="../edit-category.php?id=<?=$category['id']?>"
                      class="btn btn-warning">
                      Edit</a>
                      <a href="delete-category.php?id=<?=$category['id']?>"
                      class="btn btn-danger">
                      Delete</a>
            </td>
          </tr>
      <?php }?>
                  
      </tbody>
    </table>

    <?php }?>
    <?php if($authors == 0){ ?>
      <div class="alert alert-warning text-center p-3" style="width: 90%" 
                 role="alert">
                
                 <img src="../images/empty.jpg" width="100">
                 <br>
                  There is no author in the database
          <?php } else{?>


        <!-- List of all Authors -->
        <h2 class="m-5"> All Authors</h2>
        <table class ="table table-bordered shadow m-5"
        style=" width: 90%;">
          <thread> 
            <tr>
                <th>#</th>
                <th>Author Name</th>
                <th>Action</th>
        
                </tr>
                  </thread>
                  <tbody>
                    <?php
                    $k=0;
                    foreach ($authors as $author){ 
                      $k++;
              ?>
            <tr>
              <td><?=$k?></td>
              <td><?=$author['name']?></td>
              <td>

                      <a href="../edit-author.php?id=<?=$author['id']?>"
                      class="btn btn-warning">
                      Edit</a>
                      <a href="delete-author.php?id=<?=$author['id']?>"
                      class="btn btn-danger">
                      Delete</a>
            </td>
          </tr>
      <?php }?>
      </tbody>
    </table>
  <?php }?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudfare.com/ajax/libs/popper.js/1.16.0/umd.popper.min.ks"></script>
<script src ="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

</body>
</html>

