<?php

?>
<!DOCTYPE html>
<html long="en"
<head>
    <title>Add Author</title>
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
      <li class="nav-item active">
        <a class="nav-link" href="add-category.php">Add Catagory<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="add-author.php">Add Author<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>
      </li>
    
    
   
  </div>
</nav>
    <form action="admin/add-author.php"
          method="post"
          class="shadow p-4 rounded mt-5"
          style="width: 90%; max-width: 50rem;background-color:#25bfca">
     <h1 class ="text-center pb-5 display-4 fs-3">
                Add New Author
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
		           	Author Name
		           </label>
		    <input type="text" 
		           class="form-control" 
		           name="author_name">
		</div>
        <button type="submit" 
	            class="btn btn-primary">
	            Add Author</button>
        </form>
        </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudfare.com/ajax/libs/popper.js/1.16.0/umd.popper.min.ks"></script>
<script src ="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

</body>
</html>

