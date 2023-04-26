<?php
include "admin/db_conn.php";
require_once('header.php'); 
$title = $_GET['title'];
$author = $_GET['author'];
if(isset($_POST['submit']))
  {
    
  	//getting the post values
    $bookname=$_POST['title'];
    $authorname=$_POST['author'];
    $price=$_POST['price'];
   $ppic=$_FILES["book_image"]["name"];
   $seller_email=$user['email'];
//   echo $seller_email;exit;
// get the image extension
$extension = substr($ppic,strlen($ppic)-4,strlen($ppic));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.

//rename the image file
$imgnewfile=md5($imgfile).time().$extension;
// Code for move image into directory
move_uploaded_file($_FILES["book_image"]["tmp_name"],"uploads/books/".$imgnewfile);
// Query for data insertion
$query=mysqli_query($con, "insert into tblsellbooks (title, seller_email, author, price ,book_image,status) VALUES ('$bookname','$seller_email','$authorname', '$price','$imgnewfile', '0' )");
  //echo "insert into tblsellbooks (title, seller_email, author, price ,book_image,status) VALUES ('$bookname','$seller_email','$authorname', '$price','$imgnewfile', '0' )";exit; 
// echo $con;exit;
if ($query) {
echo "<script>alert('You have successfully inserted the data');</script>";
echo "<script type='text/javascript'> document.location ='sellUsedBook.php'; </script>";
} else{
echo "<script>alert('Something Went Wrong. Please try again');</script>";
}
}

?>



    <div class="container">
      <h1>Book Submission Form</h1>
      <form method="POST" enctype="multipart/form-data" >
        <div class="form-group">
          <label for="title">Title:</label>
          <input type="text" class="form-control" id="title" name="title"  value="<?php echo $title; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="author">Author:</label>
          <input type="text" class="form-control" id="author" name="author"   value="<?php echo $author; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="author">price:</label>
          <input type="text" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
          <label for="image">Image:</label>
          <input type="file" class="form-control-file" id="image" name="book_image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary"  name="submit">Submit</button>
      </form>
    </div>
    <!--<div class="container mt-5">-->
    <!--  <h1 class="mb-5">Cart</h1>-->
    <!--  <div class="row">-->
    <!--    <div class="col-md-8">-->
    <!--      <table class="table">-->
    <!--        <thead>-->
    <!--          <tr>-->
    <!--            <th>Book Title</th>-->
    <!--            <th>Author</th>-->
    <!--            <th>Price</th>-->
    <!--          </tr>-->
    <!--        </thead>-->
    <!--        <tbody id="cart-items">-->
              <!-- This is where the selected book data will be inserted -->
    <!--        </tbody>-->
    <!--      </table>-->
    <!--    </div>-->
    <!--    <div class="col-md-4">-->
    <!--      <div class="card">-->
    <!--        <div class="card-header">-->
    <!--          <h4 class="mb-0">Order Summary</h4>-->
    <!--        </div>-->
    <!--        <div class="card-body">-->
    <!--          <p>Total Items: <span id="total-items"></span></p>-->
    <!--          <p>Total Price: <span id="total-price"></span></p>-->
    <!--          <a href="checkout.html" class="btn btn-primary btn-block">Proceed to Checkout</a>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</div>-->
    <!--<script src="cart.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudfare.com/ajax/libs/popper.js/1.16.0/umd.popper.min.ks"></script>
<script src ="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>