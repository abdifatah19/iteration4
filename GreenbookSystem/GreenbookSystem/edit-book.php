<?php
#start the session

if (!isset($_GET['id'])) {
  
  #Redirect to admin home page
  header("Location: admin/adHome.php");
  exit;
}

$id = $_GET['id'];


 #Database connection file
 include "admin/db_conn.php";

   #book helper function
   include "admin/function-book.php";
   $books = get_book($conn, $id);

   if ($books == 0) {
   
    header("Location: admin/adHome.php");
    exit;
}

   #Categories helper function
   include "admin/function-category.php";
   $categories = get_all_categories($conn);
   
  #Author helper function
  include "admin/funtion-author.php";
  $authors = get_all_authors($conn);




  
?>
<!DOCTYPE html>
<html long="en"
<head>
    <title>Edit Book</title>
    <meta charset="UTF-8">
    <meta html-equiv="X-UA-Compatible" content="IE=edge">
    <meta name ="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet"href="adHome.css">
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
        <a class="nav-link" href="../index.php">Green Book<span class="sr-only">(current)</span></a>
      </li>
      
      
      <li class="nav-item active">
        <a class="nav-link" href="add-book.php">Add book<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add-category.php">Add Category<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add-author.php">Add Author<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>
      </li>
    
    
   
  </div>
</nav>
    <form action="admin/edit-book.php"
          method="post"
          enctype="multipart/form-data"
          class="shadow p-4 rounded mt-5"
          style="width: 90%; max-width: 50rem;background-color:#25bfca">
     <h1 class ="text-center pb-5 display-4 fs-3">
           Edit Book
        </h1>
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

        <div class="mb-3">
		    <label class="form-label">
		           	 Book Tittle
		           </label>
		    <input type="text" 
		           class="form-control" 
               value="<?=$books['tittle']?>"
		           name="book_tittle">

        <input type="text" 
		           hidden
               value="<?=$books['id']?>"
		           name="book_id">
		</div>
        <div class="mb-3">
		    <label class="form-label">
		           	 Book Cost

		           </label>
		    <input type="text" 
		           class="form-control" 
               value="<?=$books['cost']?>"
		           name="book_cost">
		</div>
        <div class="mb-3">
		    <label class="form-label">
		           	 Book Edition

		           </label>
		    <input type="text" 
		           class="form-control" 
               value="<?=$books['edition']?>"
		           name="book_edition">
		</div>
        <div class="mb-3">
		    <label class="form-label">
		           	Publish Place

		           </label>
		    <input type="text" 
		           class="form-control" 
               value="<?=$books['pubPlace']?>"
		           name="book_pubPlace">
		</div>
        <div class="mb-3">
		    <label class="form-label">
		           	 Book Author

		           </label>
		
       <select name="book_author"
                  class="form-control" >
                  <option 
                  value ="<?=$author['id']?>">
                  Select Author
         </option>
         <?php
         if($authors == 0){
         }else{
         
         foreach ($authors as $author){
          if($books['author_id'] == $author['id']){

          ?>
              <option 
                selected
                value ="<?=$author['id']?>">
              <?=$author['name']?>
          </option>


         <?php }else{  ?>

              <option 
              value="<?=$author['id']?>">
              <?=$author['name']?>
        
            </option>

        
       <?php } } }?>
    </select>
		</div>
        <div class="mb-3">
		    <label class="form-label">
		           	 Book Category

		           </label>
            <select name="book_category"
                  class="form-control" >
                  <option 
                  value="<?=$category['id']?>">
                  Select category
         </option>
         <?php
         if($categories==0){

         }else{

          foreach ($categories as $category){
            if($books['category_id'] == $category['id']){
  
            ?>
                <option 
                  selected
                  value="<?=$category['id']?>">
                <?=$category['name']?>
            </option>
  
  
           <?php }else{  ?>
  
                <option 
                value="<?=$category['id']?>">
                <?=$category['name']?>
          
              </option>
  
          
         <?php } } }?>
    </select>
		          
		</div>
        <div class="mb-3">
		    <label class="form-label">
		           	 Book Cover

		           </label>
		    <input type="file" 
		           class="form-control" 
		           name="book_cover">

        <input type="text" 
		           hidden
               value="<?=$books['cover']?>"
		           name="current_cover">
		
          <a href="uploads/cover/<?=$books['cover']?>"
          <span style="text-decoration: underline; color:#021691">Current book cover</a></span>

          </div>
          <div class="mb-3">
          <label class="form-label">
                  File

                  </label>
            <input type="file" 
                    class="form-control" 
                    name="file">

            <input type="text" 
                  hidden
                  value="<?=$books['file']?>"
                  name="current_file">
		

              <a href="uploads/files/<?=$books['file']?>"
              <span style="text-decoration: underline; color:#021691">Current book</a></span>
        </div>
            <button type="submit" 
                  class="btn btn-primary">
                  Update</button>
            </form>
        </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudfare.com/ajax/libs/popper.js/1.16.0/umd.popper.min.ks"></script>
<script src ="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

</body>
</html>

