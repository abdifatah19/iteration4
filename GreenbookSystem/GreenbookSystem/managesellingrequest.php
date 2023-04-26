<?php
include 'connection.php';
if(isset($_GET['delid']))
{
$rid=intval($_GET['delid']);
$sql=mysqli_query($con,"delete from tblsellbooks where id=$rid");
echo "<script>alert('Data deleted');</script>";
echo "<script type='text/javascript'> document.location ='managesellingrequest.php'; </script>";
} 
?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/Cart.css">
    <title>Book Submission Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Green Book System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sellUsedBook.php">Sell Book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
      </div>

      

    </nav>

  <section id="container" >
     
          	
          	<div class="container">
				<div class="row">
				<h3> Manage Book Selling Request</h3>
                  <!--table for users-->
	                  
                  <div class="col-md-12">
                      <div class="content-panel table-responsive">
                          <table class="table ">
	                  	  	  <hr>
                              <thead>
                                  <!--table heads-->
                              <tr>
                                  <th>Sno.</th>
                                  <th>Title</th>
                                  <th>Author</th>
                                  <th>Price</th>
                                  <th>Image</th>
                                   <th>Action</th> 
                              </tr>
                              </thead>
                              <tbody>
                                  <!--select all data query-->
                              <?php $ret=mysqli_query($con,"select * from tblsellbooks");
                              if(mysqli_num_rows($ret)>0){
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['title'];?></td> 
                                  <td><?php echo $row['author'];?></td>
                                   <td><?php echo $row['price'];?></td>
                                  <td><img src="uploads/books/<?php  echo $row['book_image'];?> " style="height: 50px;"></td>
                                  <td>
                                     <button class="btn btn-info btn-xs"><i class="fa fa-check" aria-hidden="true"></i></button>
                                     <a href="viewsellingrequest.php?id=<?php echo $row['id'];?>">
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-eye"></i></button></a>
                                     <a href="?delid=<?php echo ($row['id']);?>" class="btn btn-danger btn-xs delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="fa fa-trash "></i></a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }}else{?>
                              <tr>
                                  <td colspan="5" style="color:red; text-align:center;">No record Found</td>
                              </tr>
                             <?}?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
	</div>
      
      </section>
      <!--footer inclusion-->
     
  </body>
</html>
                              