<?php
include 'header.php';

?>
  <section id="container" >
     
          	
          	<div class="container">
				<div class="row">
				<h3> view Book Selling Request</h3>
                  <!--table for users-->
	                  
                  <div class="col-md-12">
                      <div class="content-panel table-responsive">
	                  	  	  <!--<h4><i class="fa fa-angle-right"></i> All User Details </h4>-->
	                  	  	  <hr>
                              
                              <?php $ret=mysqli_query($con,"select * from tblsellbooks where id = '".$_GET['id']."'");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <ul>
                                  <li><b>Sno : </b><?php echo $cnt;?></li>
                                  <li><b>Title : </b><?php echo $row['title'];?></li>
                                  <li><b>Author : </b><?php echo $row['author'];?></li>
                                  <li><b>Price : </b><?php echo $row['price'];?></li>
                                  <li><b>Image : </b><img src="uploads/books/<?php  echo $row['book_image'];?> " style="height: 50px;"></li>
                              </ul>
                              <?php $cnt=$cnt+1; }?>
                             

                      </div>
                  </div>
              </div>
	</div>
      
      </section>
      <!--footer inclusion-->
     
  </body>
</html>
